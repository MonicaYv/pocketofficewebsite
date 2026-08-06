<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\CurrencyRate;
use App\Models\CurrencyTracker;
use Illuminate\Support\Facades\Log;

class UpdateCurrencyRates extends Command
{
    protected $signature = 'currency:update';

    protected $description = 'Update currency exchange rates';

    public function handle()
    {
        try {

            $baseCurrencies = CurrencyRate::where(
                'is_base_currency',
                1
            )->get();

            if ($baseCurrencies->count() != 1) {

                Log::error(
                    'Only one base currency row is allowed.'
                );
                $this->error(
                    'Only one base currency row is allowed.'
                );

                return;
            }

            $baseCurrency = $baseCurrencies->first();

            if (
                empty($baseCurrency->base_amount) ||
                $baseCurrency->base_amount <= 0
            ) {

                Log::error(
                    'Base amount must exist in the same base currency row.'
                );
                $this->error(
                    'Base amount must exist in the same base currency row.'
                );

                return;
            }

            $baseCode = $baseCurrency->currency_code;

            $baseAmount = (float) $baseCurrency->base_amount;

            $response = Http::timeout(20)
                ->retry(3, 100)
                ->get("https://api.frankfurter.dev/v1/latest?base={$baseCode}");

            if (!$response->successful()) {

                Log::error(
                    'Forex API failed'
                );
                $this->error('Forex API failed');

                return;
            }

            $apiData = $response->json();

            if (!isset($apiData['rates'])) {

                Log::error(
                    'Invalid API response'
                );
                $this->error('Invalid API response');

                return;
            }

            $rates = $apiData['rates'];

            $changedCurrencies = [];

            $baseCurrency->update([

                'exchange_rate' => 1,

                'actual_amount' => $baseAmount,

                'last_synced_at' => now()
            ]);

// Fixed currency codes that are NOT overwritten by the Forex API.
            $fixedCurrencies = config('constants.FIXED_CURRENCIES', []);

            foreach ($rates as $currencyCode => $newRate) {

                $currency = CurrencyRate::where(
                    'currency_code',
                    $currencyCode
                )->first();

                if (!$currency) {
                    continue;
                }

                // Skip fixed currencies - keep their manually set rates.
                if (array_key_exists($currencyCode, $fixedCurrencies)) {
                    continue;
                }

                $oldRate = (float) $currency->exchange_rate;

                $newRate = (float) $newRate;

                $oldAmount = (float) $currency->actual_amount;

                $newAmount = round(
                    $baseAmount * $newRate,
                    2
                );

                $currency->update([

                    'exchange_rate' => $newRate,

                    'actual_amount' => $newAmount,

                    'last_synced_at' => now(),
                ]);

                if (
                    $oldRate != $newRate ||
                    $oldAmount != $newAmount
                ) {

                    $changedCurrencies[$currencyCode] = [

                        'old_rate' => $oldRate,

                        'new_rate' => $newRate,

                        'old_amount' => $oldAmount,

                        'new_amount' => $newAmount,
                    ];
                }
            }

            if (!empty($changedCurrencies)) {

                CurrencyTracker::create([

                    'base_currency' => $baseCode,

                    'changed_data' => $changedCurrencies,

                    'source' => 'Frankfurter API',

                    'synced_at' => now(),
                ]);
            }

            $this->info(
                'Currency updated successfully.'
            );
        } catch (\Exception $e) {

            $this->error($e->getMessage());
        }
    }
}

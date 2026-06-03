<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OfficelesSsoService
{
    public function syncUser(User $user, string $plainPassword, ?int $roleId = null, ?string $context = null): array
    {
        $resolved = $this->resolveEndpointAndProvider((string) $user->usertype);
        $endpoint = $this->normalizeEndpoint($resolved['endpoint']);
        $finalRoleId = (int) config('services.officeles_sso.default_role_id', 3);
        if ($finalRoleId <= 0) {
            $finalRoleId = 3;
        }

        $logContext = [
            'user_id' => $user->id,
            'email' => $user->email,
            'usertype' => $user->usertype,
            'context' => $context,
            'endpoint' => $endpoint,
            'role_id' => $finalRoleId,
            'provider' => $resolved['provider'],
        ];

        if (empty($endpoint)) {
            Log::warning('SSO sync skipped: endpoint missing', $logContext);

            return [
                'status' => false,
                'message' => 'SSO endpoint missing',
                'skipped' => true,
                'endpoint' => null,
                'provider' => $resolved['provider'],
            ];
        }

        Log::info('SSO sync started', $logContext);

        try {
            $response = Http::timeout(20)->post($endpoint, [
                'name' => (string) $user->name,
                'email' => (string) $user->email,
                'password' => $plainPassword,
                'roles' => [$finalRoleId],
            ]);

            if ($response->successful()) {
                Log::info('SSO sync success', $logContext + [
                    'status_code' => $response->status(),
                ]);

                return [
                    'status' => true,
                    'message' => 'Synced successfully',
                    'endpoint' => $endpoint,
                    'provider' => $resolved['provider'],
                    'status_code' => $response->status(),
                ];
            }

            Log::error('SSO sync failed', $logContext + [
                'status_code' => $response->status(),
                'response_body' => $response->body(),
            ]);

            return [
                'status' => false,
                'message' => 'SSO API request failed',
                'endpoint' => $endpoint,
                'provider' => $resolved['provider'],
                'status_code' => $response->status(),
            ];
        } catch (\Throwable $e) {
            Log::error('SSO sync exception', $logContext + [
                'error' => $e->getMessage(),
            ]);

            return [
                'status' => false,
                'message' => 'SSO sync exception: ' . $e->getMessage(),
                'endpoint' => $endpoint,
                'provider' => $resolved['provider'],
            ];
        }
    }

    private function resolveEndpointAndProvider(string $usertype): array
    {
        $normalizedType = strtolower(trim($usertype));

        if (in_array($normalizedType, ['client', 'partner'], true)) {
            return [
                'endpoint' => config('services.officeles_sso.partner_endpoint'),
                'provider' => 'partner',
            ];
        }

        if ($normalizedType === 'company') {
            return [
                'endpoint' => config('services.officeles_sso.company_endpoint'),
                'provider' => 'company',
            ];
        }

        return [
            'endpoint' => config('services.officeles_sso.users_endpoint'),
            'provider' => 'default',
        ];
    }

    private function normalizeEndpoint(?string $endpoint): ?string
    {
        if (empty($endpoint)) {
            return null;
        }

        $value = rtrim(trim($endpoint), '/');

        if (str_ends_with($value, '/api/sso/login')) {
            return substr($value, 0, -strlen('/api/sso/login')) . '/api/sso/users';
        }

        if (str_ends_with($value, '/api/sso/users')) {
            return $value;
        }

        return $value . '/api/sso/users';
    }
}

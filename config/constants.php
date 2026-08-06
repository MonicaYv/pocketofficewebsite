<?php
return [
    'IMAGEFILEPATH' => 'assets/img/',
    'ROOTPATH' => 'app/root/',
    'CURRENCY' => 'RM',
    'PRICE_PER_USER' => '60',
    'EXTRA_DISC_YEAR' => '10',
    'EXTRA_DISC_MONTH' => '0',

    // Fixed/hardcoded currency rates (not overwritten by the Forex API sync).
    // These are the per-user base prices for the target currencies.
    'FIXED_CURRENCIES' => [
        'INR' => 999, // India – ₹999
        'MYR' => 59,  // Malaysia – RM59
        'USD' => 15,  // USA  – USD 15
    ],
];

?>

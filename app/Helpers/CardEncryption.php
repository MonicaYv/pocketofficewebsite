<?php

namespace App\Helpers;

class CardEncryption
{
    private static function getKey()
    {
        return hash('sha256', env('CARD_ENCRYPTION_KEY'), true);
    }

    public static function encrypt($plainText)
    {
        $cipher = 'AES-256-CBC';

        $iv = random_bytes(openssl_cipher_iv_length($cipher));

        $encrypted = openssl_encrypt(
            $plainText,
            $cipher,
            self::getKey(),
            OPENSSL_RAW_DATA,
            $iv
        );

        return base64_encode($iv . $encrypted);
    }

    public static function decrypt($encryptedText)
    {
        $cipher = 'AES-256-CBC';

        $data = base64_decode($encryptedText);

        $ivLength = openssl_cipher_iv_length($cipher);

        $iv = substr($data, 0, $ivLength);

        $encrypted = substr($data, $ivLength);

        return openssl_decrypt(
            $encrypted,
            $cipher,
            self::getKey(),
            OPENSSL_RAW_DATA,
            $iv
        );
    }
}
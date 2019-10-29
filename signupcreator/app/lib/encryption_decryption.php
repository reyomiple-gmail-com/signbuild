<?php

class encryption_decryption
{

    private $key;

    public function __construct(){
        $this->key = md5('ipp_key_pass12345');
    }

    function __encryptor($plaintext){
        $key = hex2bin($this->key);

        $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
        $nonce = openssl_random_pseudo_bytes($nonceSize);

        $ciphertext = openssl_encrypt(
            $plaintext,
            'aes-256-ctr',
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        return base64_encode($nonce.$ciphertext);
    }


    function __decryptor($plaintext){
        $key = hex2bin($this->key);
        $message = base64_decode($plaintext);
        $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
        $nonce = mb_substr($message, 0, $nonceSize, '8bit');
        $ciphertext = mb_substr($message, $nonceSize, null, '8bit');

        $origtext = openssl_decrypt(
            $ciphertext,
            'aes-256-ctr',
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        return $origtext;
    }
}
?>
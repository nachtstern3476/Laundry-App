<?php 
    function encrypt($param)
    {
        $encrypter = \Config\Services::encrypter();
        return base64_encode($encrypter->encrypt($param));
    }
    function decrypt($param)
    {
        $encrypter = \Config\Services::encrypter();
        return $encrypter->decrypt(base64_decode($param));
    }
?>
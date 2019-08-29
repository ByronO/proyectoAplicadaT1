<?php

function encriptar ($string) {
    $Key = "CLAVESUPERSECRETA";
    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($Key), $string, MCRYPT_MODE_CBC, md5(md5($Key))));
}

function desencriptar ($string) {
    $Key = "CLAVESUPERSECRETA";
    return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($Key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($Key))), "\0");
}


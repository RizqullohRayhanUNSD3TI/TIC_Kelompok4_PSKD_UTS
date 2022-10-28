<?php

require "vendor/autoload.php";

use MiladRahimi\PhpCrypt\PrivateRsa;
use MiladRahimi\PhpCrypt\PublicRsa;

$privateRsa = new PrivateRsa('../private.pem');
$publicRsa = new PublicRsa('../public.pem');
$result = $publicRsa->encrypt('secret');
$de = $publicRsa->decrypt('secret');
echo $result;
echo $de;
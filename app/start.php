<?php

require 'vendor/autoload.php';
define('SITE_URL','http://localhost:8888/shop_balo');

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'Adl9CAVxM2WeqpXwodog0ZmtVcMkAMJw2eCQNid9HPUGVZONF6oywSL7a2XPJfamJodBDYPZAm9O6WAV',
        'EK4S8u65VmT4Oav9ADwmr-C1MaXY_aG2NPb924uqj43J_02jf2kaDzW7pZ1HGCNXVOxXz0UCsVTF_7xt'
    )
  );
?>
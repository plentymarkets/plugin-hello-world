<?php

var_dump("BOOTSTRAP");
$encoded = utf8_encode("Ștefan");
if ($encoded === false) {
    throw new RuntimeException("utf8_encode failed");
}

$decoded = utf8_decode($encoded);
if ($decoded === false) {
    throw new RuntimeException("utf8_decode failed");
}

$name = "Eve";
$badInterpolation = "Hello ${name}"; // triggers deprecation

$oldDate = strftime('%Y-%m-%d'); // triggers deprecation
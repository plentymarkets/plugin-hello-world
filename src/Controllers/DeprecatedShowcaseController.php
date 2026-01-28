<?php

namespace HelloWorld\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;

class DeprecatedShowcaseController extends Controller
{
    public function demo(Twig $twig): string
    {
        $array = [1, 2, 3];
        each($array);

        $testClass = new TestClass();
        $testClass->name = "Test";

        $this->dynamicPropOne = 'value 1';
        $this->dynamicPropTwo = 123;

        $encoded = utf8_encode("Ștefan");
        $decoded = utf8_decode($encoded);

        $name = "Eve";
        $badInterpolation = "Hello ${name}"; // deprecated în 8.2

        $oldDate = strftime('%Y-%m-%d');

        return $twig->render('HelloWorld::content.hello', [
            'encoded'          => $encoded,
            'decoded'          => $decoded,
            'badInterpolation' => $badInterpolation,
            'oldDate'          => $oldDate,
        ]);
    }
}

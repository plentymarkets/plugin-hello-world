<?php

namespace HelloWorld\Containers;

use Plenty\Plugin\Templates\Twig;

class HelloWorldContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('HelloWorld::content.HelloWorld');
    }
}
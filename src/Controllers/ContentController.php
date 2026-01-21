<?php
namespace HelloWorld\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;

/**
 * Class ContentController
 * @package HelloWorld\Controllers
 */
class ContentController extends Controller
{
	/**
	 * @param Twig $twig
	 * @return string
	 */
	public function sayHello(Twig $twig):string
	{
        // PHP 8.2: Deprecated - Creation of dynamic property ... is deprecated
        $this->someUndeclaredProperty = 'boom';

        // PHP 8.2: Deprecated - Function utf8_encode() is deprecated
        $x = utf8_encode('test');

        return $twig->render('HelloWorld::content.hello', ['x' => $x]);
	}
}

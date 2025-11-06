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
		return $twig->render('HelloWorld::content.hello');
	}

    /**
     * @param Twig $twig
     * @return string
     */
    public function sayHelloDev(Twig $twig):string
    {
        return $twig->render('HelloWorld::content.helloDev');
    }
}
// stress-test 1 Thu Nov  6 16:31:35 EET 2025
// stress-test 2 Thu Nov  6 16:31:41 EET 2025
// stress-test 3 Thu Nov  6 16:31:46 EET 2025
// stress-test 4 Thu Nov  6 16:31:51 EET 2025
// stress-test 5 Thu Nov  6 16:31:56 EET 2025
// stress-test 6 Thu Nov  6 16:32:01 EET 2025
// stress-test 7 Thu Nov  6 16:32:06 EET 2025
// stress-test 8 Thu Nov  6 16:32:11 EET 2025
// stress-test 9 Thu Nov  6 16:32:16 EET 2025
// stress-test 10 Thu Nov  6 16:32:21 EET 2025
// stress-test 11 Thu Nov  6 16:32:26 EET 2025
// stress-test 12 Thu Nov  6 16:32:32 EET 2025

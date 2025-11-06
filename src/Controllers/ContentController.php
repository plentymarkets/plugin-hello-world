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
// stress-test 13 Thu Nov  6 16:32:37 EET 2025
// stress-test 14 Thu Nov  6 16:32:42 EET 2025
// stress-test 15 Thu Nov  6 16:32:48 EET 2025
// stress-test 16 Thu Nov  6 16:32:52 EET 2025
// stress-test 17 Thu Nov  6 16:32:57 EET 2025
// stress-test 18 Thu Nov  6 16:33:03 EET 2025
// stress-test 19 Thu Nov  6 16:33:08 EET 2025
// stress-test 20 Thu Nov  6 16:33:13 EET 2025
// stress test 1 Thu Nov  6 16:33:55 EET 2025
// stress test 2 Thu Nov  6 16:34:02 EET 2025
// stress test 3 Thu Nov  6 16:34:08 EET 2025
// stress test 4 Thu Nov  6 16:34:15 EET 2025
// stress test 5 Thu Nov  6 16:34:21 EET 2025
// stress test 6 Thu Nov  6 16:34:28 EET 2025
// stress test 7 Thu Nov  6 16:34:34 EET 2025
// stress test 8 Thu Nov  6 16:34:40 EET 2025
// stress test 9 Thu Nov  6 16:34:46 EET 2025
// stress test 10 Thu Nov  6 16:34:52 EET 2025
// stress test 11 Thu Nov  6 16:34:58 EET 2025
// stress test 12 Thu Nov  6 16:35:04 EET 2025
// stress test 13 Thu Nov  6 16:35:11 EET 2025
// stress test 14 Thu Nov  6 16:35:17 EET 2025

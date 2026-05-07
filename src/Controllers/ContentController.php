<?php
namespace HelloWorld\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;
use Plenty\Carbon;

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
		$past = Carbon::parse('2020-01-01 00:00:00');
		$future = Carbon::parse('2026-05-07 10:00:00');

		// Both should be positive (absolute) regardless of order
		$pastToFuture = $past->diffInSeconds($future);
		$futureToPast = $future->diffInSeconds($past);

		$pastToFutureMinutes = $past->diffInMinutes($future);
		$futureToPastMinutes = $future->diffInMinutes($past);

		// With $absolute = false, should return negative
		$signed = $future->diffInSeconds($past, false);

		return $twig->render('HelloWorld::content.hello', [
			'pastToFuture' => $pastToFuture,
			'futureToPast' => $futureToPast,
			'pastToFutureMinutes' => $pastToFutureMinutes,
			'futureToPastMinutes' => $futureToPastMinutes,
			'signed' => $signed,
		]);
	}
}

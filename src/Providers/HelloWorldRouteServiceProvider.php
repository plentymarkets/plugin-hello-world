<?php
namespace HelloWorld\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

/**
 * Class HelloWorldRouteServiceProvider
 * @package HelloWorld\Providers
 */
class HelloWorldRouteServiceProvider extends RouteServiceProvider
{
	/**
	 * @param Router $router
	 */
	public function map(Router $router)
	{
		$router->get('hello', 'HelloWorld\Controllers\ContentController@sayHello');
        $router->get('hello-dev', 'HelloWorld\Controllers\ContentController@sayHelloDev');
	}

}

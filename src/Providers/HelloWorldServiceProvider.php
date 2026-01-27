<?php
namespace HelloWorld\Providers;

use Plenty\Plugin\ServiceProvider;
use Exception;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class HelloWorldServiceProvider
 * @package HelloWorld\Providers
 */
class HelloWorldServiceProvider extends ServiceProvider
{

	/**
	 * Register the service provider.
	 */
	public function register()
	{
		$this->getApplication()->register(HelloWorldRouteServiceProvider::class);
	}
}

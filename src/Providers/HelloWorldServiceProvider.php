<?php
namespace HelloWorld\Providers;

use HelloWorld\Extensions\TwigVulnerabilityTestExtension;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

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

	/**
	 * Boot the service provider.
	 *
	 * @param Twig $twig
	 */
	public function boot(Twig $twig)
	{
		$twig->addExtension(TwigVulnerabilityTestExtension::class);
	}
}

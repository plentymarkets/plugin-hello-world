<?php
namespace HelloWorld\Providers;

use IO\Helper\TemplateContainer;
use Plenty\Plugin\Events\Dispatcher;
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
     * Boot a template for the basket that will be displayed in the template plugin instead of the original basket.
     */
    public function boot(Twig $twig, Dispatcher $eventDispatcher)
    {
        $eventDispatcher->listen('IO.tpl.basket', function(TemplateContainer $container)
        {
            $container->setTemplate('Theme::content.ThemeSection');
            return false;
        }, 0);
    }
}

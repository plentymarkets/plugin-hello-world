<?php
namespace HelloWorld\Providers;

use Plenty\Plugin\ServiceProvider;
use IO\Helper\TemplateContainer;
// use IO\Extensions\Functions\Partial;
use Plenty\Plugin\Events\Dispatcher;
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

	public function boot(Twig $twig, Dispatcher $eventDispatcher)
    {
        // $eventDispatcher->listen('IO.init.templates', function(Partial $partial)
        // {
        //    $partial->set('footer', 'HelloWorld::content.ThemeFooter');
        // }, 0);
        // return false;

		// $eventDispatcher->listen('IO.tpl.basket', function(TemplateContainer $container, $templateData)
        // {
        //     $container->setTemplate('HelloWorld::content.ThemeBasket');
        //     return false;
        // }, 0);

		$eventDispatcher->listen('IO.tpl.basket', function(TemplateContainer $container, $templateData)
        {
            $container->setTemplate('HelloWorld::content.ThemeBasketList');
            return false;
        }, 0);
    }
}

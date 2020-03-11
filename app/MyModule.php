<?php

namespace App;

use DateTime;
use Domynation\Core\Module;
use Domynation\Eventing\EventDispatcherInterface;
use Domynation\Http\RouterInterface;
use Domynation\View\ViewFactoryInterface;

final class MyModule extends Module
{
    /**
     * {@inheritdoc}
     */
    public function registerContainerDefinitions(): array
    {
        return [
            MyDependencyA::class => fn() => new MyDependencyA(123, "Banana"),
            MyService::class => fn(MyDependencyA $depA) => new MyService($depA),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function registerRoutes(RouterInterface $router): void
    {
        $router->get('/', function () {
            return "Hello World!";
        });
    }

    /**
     * {@inheritdoc}
     */
    public function registerViews(ViewFactoryInterface $view): void
    {
        $view->addNamespace('/modules/invoices', 'invoices');

        $view->addFunction('now', function () {
            return (new DateTime)->format("Y-m-d");
        });
    }

    /**
     * {@inheritdoc}
     */
    public function registerListeners(EventDispatcherInterface $dispatcher): void
    {
        $dispatcher->listen(MyEvent::class, function (MyEvent $event) {
            // do something when this event is fired
        });
    }

    public function boot(): void
    {
    }
}
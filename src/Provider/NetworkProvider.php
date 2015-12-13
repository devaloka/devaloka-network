<?php
/**
 * Network Provider
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

namespace Devaloka\Plugin\Network\Provider;

use Pimple\Container;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Devaloka\Devaloka;
use Devaloka\Provider\ServiceProviderInterface;
use Devaloka\Provider\BootableProviderInterface;
use Devaloka\Provider\EventListenerProviderInterface;
use Devaloka\DependencyInjection\ContainerInterface;
use Devaloka\DependencyInjection\ContainerAwareInterface;
use Devaloka\Translation\TranslatorAwareInterface;
use Devaloka\Plugin\TranslatablePluginInterface;
use Devaloka\Plugin\ActivatablePluginInterface;
use Devaloka\EventDispatcher\EventDispatcherAwareInterface;

/**
 * Class NetworkProvider
 *
 * @package Devaloka\Plugin\Network\Provider
 */
class NetworkProvider implements ServiceProviderInterface, BootableProviderInterface, EventListenerProviderInterface
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function register(Devaloka $devaloka, ContainerInterface $container)
    {
        // Plugin
        $container->add('devaloka.plugin.network.file', $this->file);
        $container->add('devaloka.plugin.network.class', 'Devaloka\\Plugin\\Network\\Network');
        $container->add(
            'devaloka.plugin.network',
            function (Container $container) {
                $plugin = new $container['devaloka.plugin.network.class']($container['devaloka.plugin.network.file']);

                if ($plugin instanceof ContainerAwareInterface) {
                    $plugin->setContainer($container['container']);
                }

                if ($plugin instanceof TranslatorAwareInterface) {
                    $plugin->setTranslator($container['translator']);
                }

                return $plugin;
            }
        );

        // Event Listener
        $container->add(
            'devaloka.plugin.network.network_listener.class',
            'Devaloka\\Plugin\\Network\\EventListener\\NetworkListener'
        );
        $container->add(
            'devaloka.plugin.network.network_listener',
            function (Container $container) {
                $plugin   = $container['devaloka.plugin.network'];
                $listener = new $container['devaloka.plugin.network.network_listener.class']($plugin);

                if ($listener instanceof EventDispatcherAwareInterface) {
                    $listener->setEventDispatcher($container['event_dispatcher']);
                }

                return $listener;
            }
        );
    }

    public function boot(Devaloka $devaloka, ContainerInterface $container)
    {
        $plugin = $container->get('devaloka.plugin.network');

        if ($plugin instanceof ActivatablePluginInterface) {
            $plugin->register();
        }

        if ($plugin instanceof TranslatablePluginInterface) {
            $plugin->loadTextDomain();
            $plugin->loadLocaleFile();
        }

        $plugin->boot();
    }

    public function subscribe(Devaloka $devaloka, ContainerInterface $container, EventDispatcherInterface $dispatcher)
    {
        $listener = $container->get('devaloka.plugin.network.network_listener');

        $dispatcher->addSubscriber($listener);
    }
}

<?php
/**
 * Network Listener
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

namespace Devaloka\Plugin\Network\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Devaloka\EventDispatcher\EventDispatcherAwareInterface;
use Devaloka\EventDispatcher\EventDispatcherAwareTrait;
use Devaloka\Plugin\PluginInterface;

/**
 * Class NetworkListener
 *
 * @package Devaloka\Plugin\Network\EventListener
 */
class NetworkListener implements EventSubscriberInterface, EventDispatcherAwareInterface
{
    use EventDispatcherAwareTrait;

    /**
     * @var PluginInterface
     */
    protected $plugin;

    /**
     * @param PluginInterface $plugin
     */
    public function __construct(PluginInterface $plugin)
    {
        /** @var \Devaloka\Plugin\Network\Network $plugin */
        $this->plugin = $plugin;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [];
    }
}

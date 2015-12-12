<?php
/**
 * Network
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

namespace Devaloka\Plugin\Network;

use Devaloka\Plugin\AbstractPlugin;
use Devaloka\DependencyInjection\ContainerAwareTrait;
use Devaloka\DependencyInjection\ContainerAwareInterface;
use Devaloka\Plugin\TranslatablePluginInterface;
use Devaloka\Plugin\TranslatablePluginTrait;

/**
 * Class Network
 *
 * @package Devaloka\Plugin\Network
 */
class Network extends AbstractPlugin implements ContainerAwareInterface, TranslatablePluginInterface
{
    use ContainerAwareTrait;
    use TranslatablePluginTrait;
}

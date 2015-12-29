<?php
/*
Plugin Name: Devaloka Network
Description: Provides Network-specific things
Version: 0.1.2
Author: Whizark
Author URI: http://whizark.com
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: devaloka-network
Domain Path: /languages
Network: true
*/

if (!defined('ABSPATH')) {
    exit;
}

use Devaloka\Plugin\Network\Provider\NetworkProvider;

/** @var Devaloka\Devaloka $devaloka */
call_user_func(
    function () use ($devaloka) {
        $container = $devaloka->getContainer();

        /** @var Composer\Autoload\ClassLoader $loader */
        $loader = $container->get('loader');

        $loader->addPsr4('Devaloka\\Plugin\\Network\\', __DIR__ . '/src/', true);

        $devaloka->register(new NetworkProvider(__FILE__));
    }
);

require 'includes/api.php';

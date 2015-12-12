<?php
/**
 * Devaloka Network Template API.
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2015 Whizark.
 * @license MIT
 */

if (!function_exists('devaloka_network')) {
    /**
     * @return \Devaloka\Plugin\Network\Network|\Devaloka\Common\NullObject
     */
    function devaloka_network()
    {
        return devaloka_get('devaloka.plugin.network');
    }
}

if (!function_exists('deva_network')) {
    /**
     * @see devaloka_network() :alias:
     *
     * @return \Devaloka\Plugin\Network\Network|\Devaloka\Common\NullObject
     */
    function deva_network()
    {
        return devaloka_network();
    }
}

if (!function_exists('dl_network')) {
    /**
     * @see devaloka_network() :alias:
     *
     * @return \Devaloka\Plugin\Network\Network|\Devaloka\Common\NullObject
     */
    function dl_network()
    {
        return devaloka_network();
    }
}

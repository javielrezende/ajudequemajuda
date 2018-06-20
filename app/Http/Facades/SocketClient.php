<?php
/**
 * Created by PhpStorm.
 * User: Roger
 * Date: 19/06/2018
 * Time: 20:59
 */

namespace App\Facades;

use Config;
use Ratchet\Client;

class SocketClient
{
    /**
     * Get the registered name of the component.
     *
     * @param string $route
     * @param array  $arg
     */
    public static function send($route, array $arg)
    {
        $config = config('socket');
        Client\connect('ws://' . $config['httpHost'] . ':' . $config['port'] . '/' . $route)->then(function ($conn) use (
            $arg
        ) {
            $conn->send(json_encode($arg));
            $conn->close();
        });
    }
}
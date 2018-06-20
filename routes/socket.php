<?php
/**
 * Created by PhpStorm.
 * User: Roger
 * Date: 19/06/2018
 * Time: 21:04
 */

$socket->route('/entidadesocket', new \App\Http\Sockets\EntidadeSocket(), ['*']);
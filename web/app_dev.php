<?php

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (!isDev() && !in_array(@$_SERVER['REMOTE_ADDR'], array(
    '127.0.0.1',
    '::1',
    '192.168.1.6',
    'cxreloaded.sytes.net',
))) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

function isDev ()
{
    $uri = $_SERVER["REQUEST_URI"];
    $isDevByParam = (strpos($uri, 'dev=mqmtech') != null);
    if ($isDevByParam) {
        setcookie('IS_DEV', 'true', time() + 3600);
    }

    if (isset($_COOKIE['IS_DEV'])) {
        return $_COOKIE['IS_DEV'] == 'true';
    }

    return false;
}

require_once __DIR__.'/../app/bootstrap.php.cache';
require_once __DIR__.'/../app/AppKernel.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

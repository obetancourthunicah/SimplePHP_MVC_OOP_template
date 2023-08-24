<?php

/**
 * PHP Version 7.2
 *
 * @category Router
 * @package  SimplePHPOOPMvc
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @version  CVS:1.0.0
 * @link     http://
 */

use Utilities\Context;
use Utilities\Site;

require __DIR__ . '/vendor/autoload.php';
session_start();

try {
    Site::configure();
    $pageRequest = Site::getPageRequest();
    $instance = new $pageRequest();
    $instance->run();
    die();
} catch (\Controllers\PrivateNoAuthException $ex) {
    $instance = new \Controllers\NoAuth();
    $instance->run();
    die();
} catch (\Controllers\PrivateNoLoggedException $ex) {
    $redirTo = urlencode(Context::getContextByKey("request_uri"));
    Site::redirectTo("index.php?page=sec.login&redirto=" . $redirTo);
    die();
} catch (Exception $ex) {
    Site::logError($ex, 500);
    $instance = new \Controllers\Error();
    $instance->run();
    die();
} catch (Error $ex) {
    Site::logError($ex, 500);
    $instance = new \Controllers\Error();
    $instance->run();
    die();
}

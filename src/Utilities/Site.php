<?php

namespace Utilities;

class Site
{
    public static function configure()
    {
        $donenv = new \Utilities\DotEnv("parameters.env");
        \Utilities\Context::setArrayToContext($donenv->load());
        date_default_timezone_set(\Utilities\Context::getContextByKey("TIMEZONE"));
        \Utilities\Context::setContext('CURRENT_YEAR', date("Y"));
    }
    public static function getPageRequest()
    {
        $pageRequest = Context::getContextByKey("PUBLIC_DEFAULT_CONTROLLER");
        if (\Utilities\Security::isLogged()) {
            $pageRequest = Context::getContextByKey("PRIVATE_DEFAULT_CONTROLLER");
        }
        if (isset($_GET["page"])) {
            $pageRequest = str_replace(array("_", "-", "."), "\\", $_GET["page"]);
        }
        Context::setArrayToContext($_GET);
        Context::setContext("request_uri", $_SERVER["REQUEST_URI"]);
        return "Controllers\\" . $pageRequest;
        //  \\Controllers\\rpts\\reportusers 
    }
    public static function redirectTo($url)
    {
        if (Context::getContextByKey("USE_URLREWRITE") == "1") {
            header("Location:" . \Views\Renderer::rewriteUrl($url));
        } else {
            header("Location:" . $url);
        }

        die();
    }
    public static function redirectToWithMsg($url, $msg)
    {
        echo '<script>alert("' . $msg . '");';
        echo ' window.location.assign("' . $url . '");</script>';
        die();
    }
    public static function addLink($href)
    {
        $tmpLinks = \Utilities\Context::getContextByKey("SiteLinks");
        if ($tmpLinks === "") {
            $tmpLinks = array($href);
        } else {
            $tmpLinks[] = $href;
        }
        \Utilities\Context::setContext("SiteLinks", $tmpLinks);
    }
    public static function addBeginScript($src)
    {
        $tmpSrcs = \Utilities\Context::getContextByKey("BeginScripts");
        if ($tmpSrcs === "") {
            $tmpSrcs = array($src);
        } else {
            $tmpSrcs[] = $src;
        }
        \Utilities\Context::setContext("BeginScripts", $tmpSrcs);
    }
    public static function addEndScript($src)
    {
        $tmpSrcs = \Utilities\Context::getContextByKey("EndScripts");
        if ($tmpSrcs === "") {
            $tmpSrcs = array($src);
        } else {
            $tmpSrcs[] = $src;
        }
        \Utilities\Context::setContext("EndScripts", $tmpSrcs);
    }
    public static function logError($ex, $errorCode)
    {
        error_log($ex);
        \Utilities\Context::setContext("ERROR_CODE", $errorCode);
        \Utilities\Context::setContext("ERROR_MSG", $ex);
    }
}

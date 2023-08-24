<?php

namespace Utilities;

class Context
{
    static $_context = array();
    public static function getContext()
    {
        return self::$_context;
    }
    public static function setContext($key, $value, $saveToSession = false)
    {
        self::$_context[$key] = $value;
        if ($saveToSession) {
            $_SESSION[$key] = $value;
        }
    }
    public static function getContextByKey($key)
    {
        $value = "";
        if (isset(self::$_context[$key])) {
            $value = self::$_context[$key];
        } else {
            if (isset($_SESSION[$key])) {
                $value = $_SESSION[$key];
            }
        }
        return $value;
    }
    public static function setArrayToContext(array $contextValues, $saveToSession = false)
    {
        foreach ($contextValues as $name => $value) {
            self::$_context[$name] = $value;
            if ($saveToSession) {
                $_SESSION[$name] = $value;
            }
        }
    }
    public static function removeContextByKey($key)
    {
        if (isset(self::$_context[$key])) {
            unset(self::$_context[$key]);
        }
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    private function __construct()
    {
    }
}

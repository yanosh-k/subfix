<?php

    define('ROOT_PATH', str_replace('\\', '/', dirname(dirname(__FILE__))) . '/');
    define('LIB_PATH', ROOT_PATH . 'lib' . '/');
    define('VENDOR_PATH', ROOT_PATH . 'vendor' . '/');
    define('BASE_URL', rtrim(dirname($_SERVER['PHP_SELF']), '/') . '/');
    define('PHP_FILE', basename($_SERVER['PHP_SELF']));
    define('DS', '/');

    class IncHelper
    {

        /**
         *  Gets the current hostname, protocol and port (if different from 80)
         *
         * @return string
         */
        public static function getHost()
        {
            $s        = $_SERVER;
            $ssl      = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true : false;
            $sp       = strtolower($s['SERVER_PROTOCOL']);
            $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
            $port     = $s['SERVER_PORT'];
            $port     = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
            $host     = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : $s['SERVER_NAME']);

            return $protocol . '://' . $host . $port;
        }


        public static function getRoot()
        {
            $root = IncHelper::getHost() . BASE_URL;

            return $root;
        }
        public static function getLocation()
        {
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

            return $actual_link;
        }

    }

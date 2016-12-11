<?php
/**
 * This file is part of the SlackRandomWord project
 * By: omolara
 * Date: 12/10/16
 * Time: 1:56 PM
 */

namespace Larikraun;



use Dotenv\Dotenv;

class Util
{
    static function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    static function contains($haystack, $needle)
    {
        return (strpos($haystack, $needle));
    }

    static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

    static function loadEnv()
    {
        if (!getenv('APP_ENV')) {
            $dotenv = new Dotenv(__DIR__ . "/../");
            $dotenv->load();
            $dotenv->required(['WORD_API_KEY']);
        }
    }
}
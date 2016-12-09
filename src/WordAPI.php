<?php

/**
 * Created by PhpStorm.
 * User: omolara
 * Date: 12/9/16
 * Time: 1:07 PM
 */
namespace Larikraun;
class WordAPI
{
    const  KEY = "PhjsDMbgOzmshGlyaWVMkrtgKLQXp1aKgqFjsnG6pK32yzK19c";

    /**
     * @return Word
     */
    public static function getRandom()
    {
        $url = "https://wordsapiv1.p.mashape.com/words/?random=true&hasDetails=definitions";
        $result = self::callAPI($url);
        return new Word($result["word"], $result["results"][0]["definition"]);
    }

    /**
     * @param $word
     * @return Word
     */
    public static function getDefinition($word)
    {
        $url = "";
        $result = self::callAPI($url);
        return new Word($result["word"], $result["results"][0]["definition"]);
    }

    /**
     * @param $url
     * @return array
     */
    private static function callAPI($url)
    {
        $header = array("X-Mashape-Key:" . WordAPI::KEY);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $result = json_decode($result, true);
        return $result;
    }
}
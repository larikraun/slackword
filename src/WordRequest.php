<?php

/**
 * Created by PhpStorm.
 * User: omolara
 * Date: 12/9/16
 * Time: 1:07 PM
 */
namespace Larikraun;
class WordRequest
{
    private $url;
    private $header;

    /**
     * WordRequest constructor.
     * @param $url
     * @param $header
     */
    public function __construct($url, $header)
    {
        $this->url = $url;
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return Word
     */
    public static function getRandom()
    {
        Util::loadEnv();
        $url = "https://wordsapiv1.p.mashape.com/words/?random=true&hasDetails=definitions";

        $headers = array("X-Mashape-Key:" . getenv('WORD_API_KEY'));
        $wordReq = new WordRequest($url, $headers);

        $result = CurlHandler::callAPI($wordReq);
        return new Word($result["word"], $result["results"][0]["definition"]);
    }

    /**
     * @param $word
     * @return Word
     */
    public static function getDefinition($word)
    {
        Util::loadEnv();
        $url = "https://wordsapiv1.p.mashape.com/words/{$word}/definitions";
        $headers = array("X-Mashape-Key:" . getenv('WORD_API_KEY'));
        $wordReq = new WordRequest($url, $headers);

        $result = CurlHandler::callAPI($wordReq);
        if ($result) {
            return new Word($result["word"], $result["definitions"][0]["definition"]);
        } else {
            return false;
        }
    }
}
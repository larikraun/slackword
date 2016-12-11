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
    const  KEY = "PhjsDMbgOzmshGlyaWVMkrtgKLQXp1aKgqFjsnG6pK32yzK19c";

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
        $url = "https://wordsapiv1.p.mashape.com/words/?random=true&hasDetails=definitions";

        $headers = array("X-Mashape-Key:" . WordRequest::KEY);
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
        $url = "https://wordsapiv1.p.mashape.com/words/{$word}/definitions";
        $headers = array("X-Mashape-Key:" . WordRequest::KEY);
        $wordReq = new WordRequest($url, $headers);

        $result = CurlHandler::callAPI($wordReq);
        return new Word($result["word"], $result["definitions"][0]["definition"]);
    }

}
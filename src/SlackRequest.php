<?php
/**
 * Created by PhpStorm.
 * User: omolara
 * Date: 12/9/16
 * Time: 5:26 PM
 */

namespace Larikraun;


class SlackRequest
{
    private $url;
    private $body;

    /**
     * SlackRequest constructor.
     * @param $url
     * @param $body
     */
    public function __construct($url, $body)
    {
        $this->url = $url;
        $this->body = $body;
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
    public function getBody()
    {
        return $this->body;
    }

}
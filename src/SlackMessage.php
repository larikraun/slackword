<?php

/**
 * Created by PhpStorm.
 * User: omolara
 * Date: 12/9/16
 * Time: 1:27 PM
 */
namespace Larikraun;
class SlackMessage
{
    private $text;
    private $attachment;

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param mixed $attachment
     */
    public function setAttachment($attachment = array())
    {
        $this->attachment = $attachment;
    }

    public function toString()
    {
        echo "Text: " . $this->text . " and attachment " . json_encode($this->attachment);
    }
}
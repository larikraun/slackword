<?php

/**
 * Created by PhpStorm.
 * User: omolara
 * Date: 12/9/16
 * Time: 1:08 PM
 */
namespace Larikraun;
class Word
{
    private $word;
    private $defintion;

    /**
     * Word constructor.
     * @param $word
     * @param $defintion
     */
    public function __construct($word, $defintion)
    {
        $this->word = $word;
        $this->defintion = $defintion;
    }

    /**
     * @return mixed
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * @param mixed $word
     */
    public function setWord($word)
    {
        $this->word = $word;
    }

    /**
     * @return mixed
     */
    public function getDefintion()
    {
        return $this->defintion;
    }

    /**
     * @param mixed $defintion
     */
    public function setDefintion($defintion)
    {
        $this->defintion = $defintion;
    }
}
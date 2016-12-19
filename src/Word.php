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
    private $definition;

    /**
     * Word constructor.
     * @param $word
     * @param $definition
     */
    public function __construct($word, $definition)
    {
        $this->word = $word;
        $this->definition = $definition;
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
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * @param mixed $definition
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;
    }
}
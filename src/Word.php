<?php

/**
 * Created by PhpStorm.
 * User: omolara
 * Date: 12/9/16
 * Time: 1:08 PM
 */
namespace Larikraun;
use phpDocumentor\Reflection\Types\Array_;

class Word
{
    /**
     * @var String the word that was looked up
     */
    private $word;
    /**
     * @var Array_ Hold the results of a lookup
     */
    private $definitions;

    /**
     * Word constructor.
     * @param $word
     * @param $definition
     */
    public function __construct($word, $definition)
    {
        $this->word = $word;
        $this->definitions = $definition;
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
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * @param mixed $definitions
     */
    public function setDefinitions($definitions)
    {
        $this->definitions = $definitions;
    }
}
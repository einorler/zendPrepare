<?php

namespace AppBundle\Entity;

class Answer
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $answer;

    /**
     * @var bool
     */
    public $correct;

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * @param bool $correct
     * @return $this
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;

        return $this;
    }
}
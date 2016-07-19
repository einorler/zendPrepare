<?php

namespace AppBundle\Entity;

class QA
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $question;

    /**
     * @var string
     */
    public $explanation;

    /**
     * @var Answer[]
     */
    public $answers;
}
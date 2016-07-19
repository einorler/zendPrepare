<?php

namespace AppBundle\Service;

use AppBundle\Entity\Answer;
use AppBundle\Entity\QA;

class QABuilder
{
    /**
     * @var Database
     */
    private $db;

    /**
     * @param Database $db
     */
    public function __construct(Database $db)
    {
       $this->db = $db;
    }

    public function formQAs()
    {
        $qas = [];

        foreach ($questions = $this->db->getQuestions() as $question)
        {
            $qa = new QA();
            $answers = $this->db->getAnswer($question['id']);
            $qa->id = $question['id'];
            $qa->title = $question['title'];
            $qa->question = str_replace('?', '&#63', $question['content']);
            $qa->explanation = $question['explanation'];

            foreach ($answers as $answer)
            {
                $qa->answers[] = (new Answer())
                    ->setAnswer($answer['content'])
                    ->setId($answer['id'])
                    ->setCorrect($answer['correct']);
            }

            $qas[] = $qa;
        }

        return $qas;
    }
}
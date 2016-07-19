<?php

namespace AppBundle\Service;

class Database
{
    private $db;

    /**
     * Connects to a database
     */
    public function __construct()
    {
        $this->db = mysqli_connect('localhost', 'root', '', 'zend_prepare');
    }

    /**
     * @return array
     */
    public function getQuestions()
    {
        $questions = [];

        $result = $this->db->query(
            'SELECT * FROM questions;'
        );

        while ($a = $result->fetch_assoc()) {
            $questions[] = $a;
        }

        return $questions;
    }

    /**
     * @return array
     */
    public function getAnswers()
    {
        $answers = [];

        $result = $this->db->query(
            'SELECT * FROM answers;'
        );

        while ($a = $result->fetch_assoc()) {
            $answers[] = $a;
        }

        return $answers;
    }

    /**
     * @param string $qId
     * @return array
     */
    public function getAnswer($qId)
    {
        $answers = [];

        $result = $this->db->query(
            'SELECT * FROM answers WHERE question_id = \''.$qId.'\';'
        );

        while ($a = $result->fetch_assoc()) {
            $answers[] = $a;
        }

        return $answers;
    }
}
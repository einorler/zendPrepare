<?php

namespace AppBundle\Service;

use AppBundle\Entity\Answer;
use AppBundle\Entity\QA;

class AnswerChecker
{
    /**
     * Calculates the percentage of correct results for each question
     *
     * @param QA[] $qas
     * @param array $answers
     *
     * @return array
     */
    public function check(array $qas, array $answers)
    {
        $percentages = [];

        foreach ($qas as $id => $qa) {
            if (!$answers[$id]) {
                $percentages[$id] = 0;
                continue;
            }
            /** @var Answer $answer */
            foreach ($qa->answers as $answer) {
                if ($answer->correct && isset($answers[$id][$answer->id])) {
                    $percentages[$id]++;
                }
            }
            $percentages[$id] = $percentages[$id] / count($qa->answers) * 100;
        }

        $percentages['final'] = array_sum($percentages) / count($percentages);

        return $percentages;
    }
}

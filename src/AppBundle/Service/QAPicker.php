<?php

namespace AppBundle\Service;

use AppBundle\Entity\QA;

class QAPicker
{
    /**
     * @var QA[] a container of all QA objects
     */
    private $qas;

    /**
     * Constructs a question-answer container.
     * @param QABuilder $qaBuilder
     */
    public function __construct(QABuilder $qaBuilder)
    {
        $this->qas = $qaBuilder->formQAs();
    }

    /**
     * @param int $count amount of random questions to pick
     *
     * @return QA[]
     */
    public function pick($count = null)
    {
        $return = [];

        if (!$count) {
            $count = 10;
        }

        for ($i = 0; $i < $count; $i++) {
            $return[] = $this->qas[rand(0, 277)];
        }

        return $return;
    }

    /**
     * Returns a QA object by id
     *
     * @param string $id
     *
     * @returns QA|null
     */
    public function getQA($id)
    {
        if (isset($this->qas[$id])) {
            return $this->qas[$id];
        } else {
            return null;
        }
    }
}
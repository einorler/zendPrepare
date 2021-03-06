<?php

namespace AppBundle\Controller;

use AppBundle\Entity\QA;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/test", name="testpage")
     */
    public function testAction(Request $request)
    {
        $questions = $this->get('qa_picker')->pick();
        $ids = [];

        foreach ($questions as $question) {
            $ids[] = $question->id;
        }

        return $this->render('default/test.html.twig', [
            'questions' => $questions,
            'ids' => $ids
        ]);
    }

    /**
     * @Route("/result", name="resultpage")
     * @param Request $request
     *
     * @return Response
     */
    public function resultAction(Request $request)
    {
        $picker = $this->get('qa_picker');
        $qas = [];
        $answers = [];
        $ids = $this->getIdsArray($request->request->get('ids'));

        foreach ($ids as $key => $id) {
            $id = trim($id);
            $ids[$key] = trim($id);
            if ($picker->getQA($id)) {
                $qas[$id] = $picker->getQA($id);
                $answers[$id] = $request->request->get($id);
            }
        }

        return $this->render('default/result.html.twig', [
            'questions' => $qas,
            'answers' => $answers,
            'ids' => $ids,
            'eval' => $this->get('answer_checker')->check($qas, $answers)
        ]);
    }

    /**
     * Extracts an ids array from ids string
     * @param string $ids
     * @return array
     */
    private function getIdsArray($ids)
    {
        $ids = trim($ids, ',');
        return explode(',', $ids);
    }
}

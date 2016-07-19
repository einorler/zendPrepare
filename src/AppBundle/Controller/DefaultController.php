<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'questions' => $this->get('qa_picker')->pick()
        ]);
    }

    /**
     * @Route("/test", name="testpage")
     */
    public function testAction(Request $request)
    {
        return $this->render('default/test.html.twig', [
            'questions' => $this->get('qa_picker')->pick()
        ]);
    }
}

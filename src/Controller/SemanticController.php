<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/semantic")
 */
class SemanticController extends Controller
{
    /**
     * @Route("/index", name="semantic_index")
     */
    public function index()
    {
        return $this->render('semantic/index.html.twig', [
            'controller_name' => 'SemanticController',
        ]);
    }

    /**
     * @Route("/elements", name="semantic_elements")
     */
    public function uiElements()
    {
        return $this->render('semantic/elements.html.twig', [
        ]);
    }
    
    
    /**
     * @Route("/modules", name="semantic_modules")
     */
    public function modules()
    {
        return $this->render('semantic/modules.html.twig', [
            'controller_name' => 'SemanticController',
        ]);
    }
}

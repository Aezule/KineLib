<?php 
namespace App\Controller;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChoiceController extends AbstractController{
    #[Route('/choix', name: 'app_choice')]
    public function choix(): Response{
        return $this->render("choice.html.twig");
    }

}
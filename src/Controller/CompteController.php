<?php 
namespace App\Controller;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Prendre;

class CompteController extends AbstractController{
    #[Route('/compte/', name: 'index.html')]
    public function index(Security $security, EntityManagerInterface $doctrine){

        $user = $security->getUser();

        return $this->render('compte/index.html.twig',[
            'user' => $user
        ]);
    }

}

<?php

namespace App\Controller;


use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;	
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KineController extends AbstractController
{
    /**
     * Cette fonction affiche tout les kinés
     *
     * @param UserRepository $repo
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/kine', name: 'kine.index', methods: ['GET'])]
    public function index(UserRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $kines = $paginator->paginate(
            $repo->findBy(['roles' => 'KINE']),
            $request->query->getInt('page', 1),
            5 
        );

        return $this->render('kine/index.html.twig', [
            'kines' => $kines
        ]);
    }
}

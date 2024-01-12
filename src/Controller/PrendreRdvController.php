<?php

namespace App\Controller;


use DateTime;
use App\Entity\User;
use App\Entity\Prendre;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;
use Doctrine\Persistence\ManagerRegistry;


class PrendreRdvController extends AbstractController
{
    private $nombreDeJours =48;


    #[Route('/rdv', name: 'rdv.index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('prendre_rdv/index.html.twig');
    }

    /**
     * 
     */
    #[Route('/rdv/nouveau/conf/{IdKine}', name: 'rdv.conf', methods: ['GET', 'POST'])]
    public function new(User $kine, Request $request,  Security $security,ManagerRegistry $doctrine): Response
    {
       
$user = $security->getUser();
if ($user instanceof User) {
    $entityManager = $doctrine->getManager();

    $IdKine = $request->attributes->get('IdKine');
    $kine = $entityManager->getRepository(User::class)->find($IdKine);

    $rdv = new Prendre();
    $rdv->setKine($kine);
    $rdv->setClient($user);

    $dateString = $_GET['date'];
    $dateTime = new DateTime($dateString);
    $rdv->setDateRdv($dateTime);

    $entityManager->persist($rdv);
    $entityManager->flush();
            var_dump($rdv);
         }
         else{
            
         }
        

        return $this->render('prendre_rdv/conf.html.twig');
    }

    /**
     * Cette fonction récupère pour les 48 jours à venir les disponibilité du kiné
     * passé en paramètre
     */
    #[Route('/rdv/nouveau/{IdKine}', name: 'rdv.new')]
    public function getDatesSuivantesSansWeekend(User $kine, PaginatorInterface $paginator, Request $request, Security $security) {
        $resultat = array();
        $dateCourante = new DateTime();
        $IdKine = $request->attributes->get('IdKine');
        
        $dispo =array (
            '8:00',
            '9:00',
            '10:00',    
            '11:00',
            '14:00',
            '15:00',
            '16:00'
        );
        while (count($resultat) < $this->nombreDeJours) {
            // Ajoutez un jour à la date courante
            $dateCourante->modify('+1 day');
    
            // Si le jour n'est ni un samedi ni un dimanche, ajoutez-le aux résultats
            if ($dateCourante->format('N') < 6) {
                $resultat[] = array(
                    'jourC' => $dateCourante->format('l-d-F'), // Jour de la semaine (nom complet)
                    'abrege' => $dateCourante->format('Y-m-d'),
                    'dispo' => $dispo, 
                    'IdKine' => $IdKine,
                );
            }
        }
        $resultats= $paginator->paginate(
            $resultat,
            $request->query->getInt('page', 1),
            12 
        );
    
        return $this->render('prendre_rdv/new.html.twig',['resultats' => $resultats]);
    }
}

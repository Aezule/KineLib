<?php

namespace App\DataFixtures;

use App\Entity\Authentification;
use App\Entity\Client;
use App\Entity\Kine;
use App\Entity\Specialisation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $listeSpe =[];
        $listeAuth =[];
        for($ispe =1 ; $ispe <=10; $ispe++){
            $specialisation = new Specialisation();
            $specialisation->setLibelle('Spécialité '. $ispe);

            array_push($listeSpe, $specialisation);

            $manager->persist($specialisation);
        }

        for($iaut = 1; $iaut<=20; $iaut++){
            $verif =false;
            if($iaut % 5 === 0){
                $verif=true;
            }
            $auth = new Authentification();
            $auth->setLogin('log'. $iaut)
                ->setMdp(substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 8, 10))
                ->setEstadmin($verif);

            array_push($listeAuth, $auth);

            $manager->persist($auth);
        }

        for($icli =1 ; $icli <=10; $icli++){
            $cli =new Client();
            $cli->setNom('nom'. $icli)
                ->setPrenom('prenom'. $icli)
                ->setTel('06'.substr(str_shuffle('0123456789'),0,8))
                ->setMail(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),5,10).'@gmail.com')
                ->setIdAuth($listeAuth[$icli+9]);
        
            $manager->persist($cli);
        }

        for($iki =1 ; $iki <=10; $iki++){
            $kine =new Kine();
            $kine->setNom('nom'. $iki)
                ->setPrenom('prenom'. $iki)
                ->setTel('06'.substr(str_shuffle('0123456789'),0,8))
                ->setMail(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),5,10).'@gmail.com')
                ->setIdAuth($listeAuth[$iki-1])
                ->setidSpe($listeSpe[$iki-1]);
            
            $manager->persist($kine);
        }

        $manager->flush();
    }
}

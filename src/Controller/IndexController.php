<?php

namespace App\Controller;

use App\Entity\Equipe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends AbstractController
{

    private ManagerRegistry $doctrine;

    /**
     * @Route("/index", name="app_index")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $this->doctrine = $doctrine;
        $equipes = $this->getEquipes();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'equipes' => $equipes
        ]);
    }

    public function getEquipes(){
        $equipes = $this->doctrine->getRepository(Equipe::class)->findAll();
        $data = array();

        foreach($equipes as $equipe){
            $current = array();

            $current['id'] =$equipe->getId();
            $current["nomequipe"] = $equipe->getNOMEQUIPE();
            $current["createur"] = $equipe->getCREATEUR()->getUSERNAME();
            $current["date"] = $equipe->getDATE()->format('d-m-y');
            $current["downvote"] = $equipe->getDOWNVOTE();
            $current["upvote"] = $equipe->getUPVOTE();
            $current["j1"] = $equipe->getCAPITAINE()->getPERSONNAGE()->getIMAGE();
            $current["j2"] = $equipe->getMILLIEU1()->getPERSONNAGE()->getIMAGE();
            $current["j3"] = $equipe->getMILLIEU2()->getPERSONNAGE()->getIMAGE();
            $current["j4"] = $equipe->getDEFENSEUR()->getPERSONNAGE()->getIMAGE();

            array_push($data, $current);
        }

        return $data;
    }
}

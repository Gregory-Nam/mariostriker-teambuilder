<?php

namespace App\Controller;

use App\Entity\Equipe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VisualisationEquipeController extends AbstractController
{

    private ManagerRegistry $doctrine;
    /**
     * @Route("/visualisation/equipe", name="app_visualisation_equipe")
     */
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {

        $this->doctrine= $doctrine;
        $joueurs = $this->getTeamByID($request->get("teamid"));
        
        return $this->render('visualisation_equipe/index.html.twig', [
            'controller_name' => 'VisualisationEquipeController',
            'joueurs' => $joueurs,
        ]);
    }


    public function getTeamByID($id){
        $equipe = $this->doctrine->getRepository(Equipe::class)->findOneBy(['id' => $id]);
        $nom = $equipe->getNOMEQUIPE();

        
        $equipeArray = array("NOM_EQUIPE" => $nom, "CAPITAINE" => array(), "MILLIEU1" => array(), "MILLIEU2" => array(), "DEFENSEUR" => array());
  
        $equipeArray["CAPITAINE"]["NOM"] = $equipe->getCAPITAINE()->getPERSONNAGE()->getNom();
        $equipeArray["CAPITAINE"]["IMAGE"] = $equipe->getCAPITAINE()->getPERSONNAGE()->getImage();
        $equipeArray["CAPITAINE"]["STATS_BASE"] = $equipe->getCAPITAINE()->getPERSONNAGE()->getStatsBase();
        $equipeArray["CAPITAINE"]["DIFF_STAT"] = $equipe->getCAPITAINE()->getDiffStat();
        $equipeArray["CAPITAINE"]["EQUIPEMENTS"] = $equipe->getCAPITAINE()->getEquipementsNames();

        $equipeArray["MILLIEU1"]["NOM"] = $equipe->getMILLIEU1()->getPERSONNAGE()->getNom();
        $equipeArray["MILLIEU1"]["IMAGE"] = $equipe->getMILLIEU1()->getPERSONNAGE()->getImage();
        $equipeArray["MILLIEU1"]["STATS_BASE"] = $equipe->getMILLIEU1()->getPERSONNAGE()->getStatsBase();
        $equipeArray["MILLIEU1"]["DIFF_STAT"] = $equipe->getMILLIEU1()->getDiffStat();
        $equipeArray["MILLIEU1"]["EQUIPEMENTS"] = $equipe->getMILLIEU1()->getEquipementsNames();

        $equipeArray["MILLIEU2"]["NOM"] = $equipe->getMILLIEU2()->getPERSONNAGE()->getNom();
        $equipeArray["MILLIEU2"]["IMAGE"] = $equipe->getMILLIEU2()->getPERSONNAGE()->getImage();
        $equipeArray["MILLIEU2"]["STATS_BASE"] = $equipe->getMILLIEU2()->getPERSONNAGE()->getStatsBase();
        $equipeArray["MILLIEU2"]["DIFF_STAT"] = $equipe->getMILLIEU2()->getDiffStat();
        $equipeArray["MILLIEU2"]["EQUIPEMENTS"] = $equipe->getMILLIEU2()->getEquipementsNames();

        $equipeArray["DEFENSEUR"]["NOM"] = $equipe->getDEFENSEUR()->getPERSONNAGE()->getNom();
        $equipeArray["DEFENSEUR"]["IMAGE"] = $equipe->getDEFENSEUR()->getPERSONNAGE()->getImage();
        $equipeArray["DEFENSEUR"]["STATS_BASE"] = $equipe->getDEFENSEUR()->getPERSONNAGE()->getStatsBase();
        $equipeArray["DEFENSEUR"]["DIFF_STAT"] = $equipe->getDEFENSEUR()->getDiffStat();
        $equipeArray["DEFENSEUR"]["EQUIPEMENTS"] = $equipe->getDEFENSEUR()->getEquipementsNames();

        return $equipeArray;
        
        
    
    }
}

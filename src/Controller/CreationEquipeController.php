<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Entity\Equipement;
use App\Entity\Personnage;
use App\Entity\PersonnageEquipement;
use App\Repository\EquipementRepository;
use App\Repository\PersonnageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Expr\BinaryOp\Equal;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Serializer\SerializerInterface;

class CreationEquipeController extends AbstractController
{

    private $doctrine;
    /**
     * @Route("/creation/equipe", name="app_creation_equipe")
     * 
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $this->doctrine = $doctrine;
        $personnages = $this->recuperationPersonnages();
        $equipements = $this->recuperationEquipements();
        return $this->render('creation_equipe/index.html.twig', [
            'personnages' => $personnages,
            'equipements' => $equipements,
        ]);
    }

    public function recuperationPersonnages(){
        $personnages = $this->doctrine->getRepository(Personnage::class)->findAll();
        return $personnages;
    }

    public function recuperationEquipements(){
        $equipements = array("Casque" => [], "Plastron" => [], "Chaussure" => [], "Gants" => []);
        foreach($equipements as $categorie => &$data){
            $data = $this->doctrine->getRepository(Equipement::class)->findByCategorie($categorie);
        }
        return $equipements;
    }

    /**
     * @Route("personnages/{id}", name="get_personnage_id")
     */
    public function recuperationPersonnageById(PersonnageRepository $repo, SerializerInterface $serializer, $id) : Response{
        $personnage = $repo->findStatByID($id);
        return new JsonResponse($personnage);
    }

    /**
     * @Route("equipements/{id}", name="get_equipement_id")
     */
    public function recuperationEquipementById(EquipementRepository $repo, SerializerInterface $serializer, $id) : Response{
        $equipement = $repo->findStatByID($id);
        return new JsonResponse($equipement);
    }


    /**
     * @Route("equippedChar", name="set_equipped_char", methods={"POST", "GET"})
     */
    public function setEquippedChar(Request $request, ManagerRegistry $doctrine, EntityManagerInterface $em) : Response{
        $data = $request->toArray();
        $teamName = $data["teamName"];
        unset($data["teamName"]);
        $teamChar = [];
        foreach($data as $i => $equipement){
            dump($i);

            $equippedChar = new PersonnageEquipement();
            $character = $doctrine->getRepository(Personnage::class)->find($equipement[0]);
            $eq1 = $doctrine->getRepository(Equipement::class)->find($equipement[1]);
            $eq2 = $doctrine->getRepository(Equipement::class)->find($equipement[2]);
            $eq3 = $doctrine->getRepository(Equipement::class)->find($equipement[3]);
            $eq4 = $doctrine->getRepository(Equipement::class)->find($equipement[4]);

    
            $equippedChar->setPERSONNAGE($character);
            $equippedChar->setEQUIPEMENT1($eq1);
            $equippedChar->setEQUIPEMENT2($eq2);
            $equippedChar->setEQUIPEMENT3($eq3);
            $equippedChar->setEQUIPEMENT4($eq4);
    
            $em->persist($equippedChar);
            $em->flush();
            array_push($teamChar,$equippedChar);
        }

        $team = new Equipe();

        $team->setCAPITAINE($teamChar[0]);
        $team->setMILLIEU1($teamChar[1]);
        $team->setMILLIEU2($teamChar[2]);
        $team->setDEFENSEUR($teamChar[3]);
        $team->setCREATEUR($this->getUser());
        $team->setNOMEQUIPE($teamName == "" ? $this->getUser()->getUserIdentifier()."'s team" : $data['teamName']);
        $em->persist($team);
        $em->flush();

        return new JsonResponse(array("status"=>"OK", "message"=>"Votre equipe a bien été créé"), 200);

    }
}

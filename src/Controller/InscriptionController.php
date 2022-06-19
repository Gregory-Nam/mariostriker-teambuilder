<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_inscription")
     */
    public function inscription(Request $request) : Response
    {
        $user = new User();

        $form = $this->createForm(InscriptionType::class, $user, [
            'action'=> $this->generateUrl('app_inscription'),
            'attr'=>[
                'data-action' => 'submit->modal-handler#validation',
                'data-modal-handler-target' => "form"
            ],
        ]);

        $form->handleRequest($request);
        /**
         * ajax call from sign up form
         */
        if($request->isMethod("POST")){
            dd($form->getData());
            return new JsonResponse(array("status"=>"error", "message"=>"stop"), 400);
        }



        return $this->render('form/form.html.twig', array(
            'form' => $form->createView())
        );
    }
}

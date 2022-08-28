<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/login", name="app_connexion")
     */
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        /*dump($this->getUser());
        if (!$this->getUser()) {
            dump("bonjour");
            //return $this->redirectToRoute('target_path');
        }*/
        

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        if($error)
            return new JsonResponse(array("status"=>"error", "message"=>"Identifiants incorrects"), 401);

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}

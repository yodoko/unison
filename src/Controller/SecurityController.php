<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginFormType;
use App\Security\AppCustomAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;


class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login", methods={"GET"})
     * @return Response
     */
    public function login(): Response {
        return $this->render('account/connection.html.twig');
    }

    /**
     * @Route("/connect", name="app_connect", methods={"POST"})
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function connect(Request $request, AppCustomAuthenticator $authenticator, GuardAuthenticatorHandler $guardHandler): Response
    {        
        $user = new User();
        $form = $this->createForm(LoginFormType::class, $user);
        $form->handleRequest($request);

        return $guardHandler->authenticateUserAndHandleSuccess(
            $user,
            $request,
            $authenticator,
            'main' // firewall name in security.yaml
        );

        if ($this->getUser()) {
            return $this->redirectToRoute('home_index');
        }

        $options = [
            'authentified'=>false,
        ];

        return $this->render('cart/index.html.twig', $options);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}

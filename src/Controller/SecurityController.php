<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    
    
    /**
     * @Route("/inscription", name="security_controller")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $formRegistre = $this->createForm(RegistrationType::class, $user);

        $formRegistre->handleRequest($request);

        if($formRegistre->isSubmitted() && $formRegistre->isValid()){
            
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            
            
            $emRegistre = $this->getDoctrine()->getManager();
            $emRegistre->persist($user);
            $emRegistre->flush();
            
            // message flash après enregistrement
            $this->addFlash(
                'notice',
                'Votre inscription à bien été enregistré'
            );

            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/registration.html.twig', [
            'formRegistre' => $formRegistre->createView()
        ]);
    }



    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {


        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}

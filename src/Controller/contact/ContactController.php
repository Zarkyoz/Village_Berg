<?php

namespace App\Controller\contact;


use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer): Response
    {

        $contact = new Contact();
        $formContact = $this->createForm(ContactType::class, $contact);
        $formContact->handleRequest($request);
        if ($formContact->isSubmitted() && $formContact->isValid()){

            $message = (new \Swift_Message('Demande de renseignement'))
            ->setFrom('from@gmail.com')
            ->setTo($contact->getEmail())
            ->setBody($this->renderView('contact/notification.html.twig', [
                'contact' => $contact
                ]), 'text/html');

                $mailer->send($message); 
                return $this->render('index.html.twig');
        }

        return $this->render('contact/contact.html.twig', [
            "formContact" => $formContact->createView()
        ]);
    }
}
// public function createActu(Request $request): Response
// {
//     $articleActu = new ArticleActu();
//     $formActu = $this->createForm(ActualiteType::class, $articleActu);
//     $formActu->handleRequest($request);
//         if($formActu->isSubmitted() && $formActu->isValid()){
//             $emActu = $this->getDoctrine()->getManager();
//             $emActu->persist($articleActu);
//             $emActu->flush();
//         return $this->redirectToRoute('admin_village_index');
//         }
//         return $this->render('admin/createActu.html.twig', [
//             "formActu" => $formActu->createView()
//         ]);            
// }
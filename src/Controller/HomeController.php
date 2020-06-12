<?php 

namespace App\Controller;

use App\Entity\ArticleActu;
use App\Entity\ArticleEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleEventRepository;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */

    public function home()
    {
        return $this->render('index.html.twig', [
            "var" => "je suis ici"
        ]);
    }

    /**
     * @Route("/histoire" , name="histoire")
     */
    public function histoire()
    {
        return $this->render('histoire.html.twig');
    }

    /**
     * @Route("/evenements" , name="evenements")
     */
    public function evenements(ArticleEventRepository $repoEvent)
    {   
        // $repoEvent = $this->getDoctrine()->getRepository(ArticleEvent::class);
        $articleEvents = $repoEvent->findAll();

        return $this->render('evenements.html.twig', [
            "articleEvents" => $articleEvents
        ]);
    }

    /**
     *  @Route("/evenements/{id}", name="event_Show")
     */

     public function event_show(ArticleEventRepository $repoEvent, $id)
     {
        //  $repoEvent = $this->getDoctrine()->getRepository(ArticleEvent::class);

         $articleEvent = $repoEvent->find($id);

         return $this->render('eventShow.html.twig', [ 
             'articleEvent' => $articleEvent
         ]);
     }


        /**
     * @Route("/actualites" , name="actualites")
     */
    public function actualites()
    {
        $repoActu = $this->getDoctrine()->getRepository(ArticleActu::class);
        $articleActus = $repoActu->findAll();

        return $this->render('actualites.html.twig', [
            "articleActus" => $articleActus
        ]);
    }

    /**
     * @Route("/actualites/{id}" , name="actu_Show")
     */
    public function actu_Show($id)
    {
        $repoActu = $this->getDoctrine()->getRepository(ArticleActu::class);
        $articleActu = $repoActu->find($id);

        return $this->render('actuShow.html.twig', [
            "articleActu" => $articleActu
        ]);
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('contact.html.twig');
    }


}
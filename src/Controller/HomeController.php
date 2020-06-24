<?php 

namespace App\Controller;

use App\Entity\ArticleActu;
use App\Entity\ArticleEvent;
use App\Repository\ArticleEventRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */

    public function home(): Response
    {
        $reposActus = $this->getDoctrine()->getRepository(ArticleActu::class);
        $articleActus = $reposActus->findLastActu();

        $reposEvents = $this->getDoctrine()->getRepository(ArticleEvent::class);
        $articleEvents = $reposEvents->findLastEvent();

        return $this->render('index.html.twig',[
            'actus' => $articleActus,
            'events'=> $articleEvents
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
    public function evenements(ArticleEventRepository $repoEvent, PaginatorInterface $paginator, Request $request)
    {   
        $repoEvent = $this->getDoctrine()->getRepository(ArticleEvent::class);
        $articleEvents = $repoEvent->findAllQuery();

        $pagination = $paginator->paginate(
            $articleEvents, /* query NOT result */
            $request->query->getInt('page', 1),
            2
        );

    

        return $this->render('evenements.html.twig', [
            "pagination" => $pagination
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




    // public function recentEvent($max = 3 )
    // {
    //     $articleEvents = ['...', '...', '...'];

    //     return $this->render('_recent.html.twig', [
    //         'articleEvents' => $articleEvents
    //     ]);
    // }




    // /**
    //  * @Route("/redirection", name="redi")
    //  */
    // public function redi()
    // {
    //     return $this->redirectToRoute('contact');
    // }

}
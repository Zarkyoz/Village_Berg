<?php 

namespace App\Controller\Admin;

use App\Entity\ArticleActu;
use App\Form\ActualiteType;
use App\Form\EvenementType;
use App\Entity\ArticleEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminVillageController extends AbstractController
{
 /**
     * @Route ("/admin", name="admin_village_index")
     */
    public function index()
    {
        $repoAdminEvents = $this->getDoctrine()->getRepository(ArticleEvent::class);
        $adminEvents = $repoAdminEvents->findAll();

        $repoAdminActus = $this->getDoctrine()->getRepository(ArticleActu::class);
        $adminActus = $repoAdminActus->findAll();

        return $this->render('admin/admin.html.twig', [
            "adminEvents" => $adminEvents,
            "adminActus" => $adminActus
        ]);
    }

    // Partie création d'article

    /**
     * @Route ("/admin/createEvent", name="admin_village_createEvent")
     */
    public function createEvent(Request $request): Response
    {
        $articleEvent = new ArticleEvent();
        $formEvent = $this->createForm(EvenementType::class, $articleEvent);
        $formEvent->handleRequest($request);
            if($formEvent->isSubmitted() && $formEvent->isValid()){
                $emEvent = $this->getDoctrine()->getManager();
                $emEvent->persist($articleEvent);
                $emEvent->flush();
            return $this->redirectToRoute('admin_village_index');
        }
            return $this->render('admin/createEvent.html.twig',[
                "formEvent" => $formEvent->createView() 
        ]);
    }

    /**
     * @Route ("/admin/createActu", name="admin_village_createActu")
     */
    public function createActu(Request $request): Response
    {
        $articleActu = new ArticleActu();
        $formActu = $this->createForm(ActualiteType::class, $articleActu);
        $formActu->handleRequest($request);
            if($formActu->isSubmitted() && $formActu->isValid()){
                $emActu = $this->getDoctrine()->getManager();
                $emActu->persist($articleActu);
                $emActu->flush();
            return $this->redirectToRoute('admin_village_index');
            }
            return $this->render('admin/createActu.html.twig', [
                "formActu" => $formActu->createView()
            ]);            
    }

    // Partie Edition d'un Article

    /**
     * @Route("/admin/{id}/editEvent", name="admin_village_editEvent")
     * @param ArticleEvent $articleEvent
     * @param Request $request
     * @return Response
     */
    public function editEvent(ArticleEvent $articleEvent, Request $request): Response 
    {
        $formEvent = $this->createForm(EvenementType::class, $articleEvent);
        $formEvent->handleRequest($request);
            if($formEvent->isSubmitted() && $formEvent->isValid()){
                $emEvent = $this->getDoctrine()->getManager();
                $emEvent->flush();
            return $this->redirectToRoute('admin_village_index');
            }

        return $this->render('admin/editEvent.html.twig', [
            "formEvent" => $formEvent->createView()
        ]);
    }

    /**
     * @Route("/admin/{id}/editActu", name="admin_village_editActu")
     * @param ArticleActu $articleActu
     * @param Request $request
     * @return Response
     */
    public function editActu(ArticleActu $articleActu, Request $request): Response
    {
        $formActu = $this->createForm(ActualiteType::class, $articleActu);
        $formActu->handleRequest($request);
            if($formActu->isSubmitted() && $formActu->isVAlid()){
                $emActu = $this->getDoctrine()->getManager();
                $emActu->flush();
            return $this->redirectToRoute('admin_village_index');
            }
        return $this->render('admin/editActu.html.twig', [
            "formActu" => $formActu->createView()
        ]);
    }

    /**
     * @Route("/admin/{id}/deleteEvent", name="admin_village_deleteEvent")
     * @param ArticleEvent $articleEvent
     * @return RedirectResponse
     */
    public function deleteEvent(ArticleEvent $articleEvent): RedirectResponse
    {
        $emEvent = $this->getDoctrine()->getManager();
        $emEvent->remove($articleEvent);
        $emEvent->flush();

        return $this->redirectToRoute('admin_village_index');
    }

    /**
     * @Route("/admin/{id}/deleteActu", name="admin_village_deleteActu")
    //  * @param ArticleActu $articleActu
     * @return RedirectResponse 
     */
    public function deleteActu(ArticleActu $articleActu): RedirectResponse
    {
        $emActu = $this->getDoctrine()->getManager();
        $emActu->remove($articleActu);
        $emActu->flush();

        return $this->redirectToRoute('admin_village_index');
    }

}
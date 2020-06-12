<?php 

namespace App\Controller\Admin;

use App\Entity\ArticleActu;
use App\Form\EvenementType;
use App\Entity\ArticleEvent;
use Symfony\Component\Routing\Annotation\Route;
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

    /**
     * @Route ("/admin/createEvent", name="admin_village_createEvent")
     */
    public function createEvent()
    {
        $formEvent = $this->createForm(EvenementType::class);

        return $this->render('admin/createEvent.html.twig',[
            "formEvent" => $formEvent->createView() 
        ]);
    }

}
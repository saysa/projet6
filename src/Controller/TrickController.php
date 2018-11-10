<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 09/11/2018
 * Time: 11:51
 */

namespace App\Controller;


use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    /**
     * @Route("/trick/{slug}", name="trick_view")
     * @param TrickRepository $repository
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function trickView(TrickRepository $repository, $slug)
    {
        $trick = $repository->findOneBy(['slug' => $slug]);

        return $this->render('pages/trick_view.html.twig', [
            'trick' => $trick
        ]);
    }

    /**
     * @Route("/trick/edit/{slug}", name="trick_details")
     */
    public function trickDetails(TrickRepository $repository, $slug)
    {
        $trick = $repository->findOneBy(['slug' => $slug]);
        return $this->render('pages/trick_details.html.twig');
    }

    /**
     * @Route("/trick/delete/{slug}", name="trick_delete")
     */
    public function trickDelete(Request $request, $slug)
    {
        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('info', 'Annonce supprimée.');

            return $this->redirectToRoute('trick_view', array('slug' => $slug));
        }
    }

    /**
     * @Route("/trick/edit/{slug}", name="trick_edit")
     */
    public function trickEdit()
    {

    }

}
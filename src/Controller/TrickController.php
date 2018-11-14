<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 09/11/2018
 * Time: 11:51
 */

namespace App\Controller;


use App\Entity\Trick;
use App\Form\TrickEditType;
use App\Form\TrickType;
use App\Repository\TrickRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    /**
     * @var TrickRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(TrickRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/trick/view/{slug}", name="trick_view")
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function trickView($slug)
    {
        $trick = $this->getDoctrine()
            ->getRepository(Trick::class)
            ->findTrick($slug);

        $category = $trick->getCategory()->getName();

        return $this->render('pages/trick_view.html.twig', [
            'trick' => $trick,
            'category' =>$category
        ]);
    }

    /**
     * @Route("/trick/edit/{slug}", name="trick_details")
     * @param Trick $trick
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function trickDetails(Trick $trick, Request $request)
    {
        $form = $this->createForm(TrickEditType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Le trick à bien été modifié');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('pages/trick_details.html.twig', [
            'trick' => $trick,
            'form' => $form->createView()
            ]);
    }

    /**
     * @Route("/trick/new", name="trick_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createTrick(Request $request)
    {
        $trick = new Trick();
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->em->persist($trick);
            $this->em->flush();
            $this->addFlash('success', 'Le trick à bien été ajouté');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('pages/trick_create.html.twig', [
            'trick' => $trick,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/trick/delete/{slug}", name="trick_delete")
     * @param Trick $trick
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function trickDelete(Trick $trick)
    {
        $this->em->remove($trick);
        $this->em->flush();
        $this->addFlash('success', 'Le trick à bien été supprimé');
        return $this->redirectToRoute('app_homepage');
    }
}
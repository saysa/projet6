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
use App\Service\SlugCreator;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TrickDetailscontroller extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/trick/edit/{slug}", name="trick_details")
     * @param Trick $trick
     * @param Request $request
     * @param SlugCreator $slugCreator
     * @return \Symfony\Component\HttpFoundation\Response
     * @IsGranted("ROLE_USER")
     */
    public function trickDetails(Trick $trick, Request $request, SlugCreator $slugCreator)
    {
        $form = $this->createForm(TrickEditType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $trick->setSlug($slugCreator->createSlug($trick));

            $this->entityManager->flush();
            $this->addFlash('success', 'Le trick à bien été modifié');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('pages/trick_details.html.twig', [
            'trick' => $trick,
            'form' => $form->createView()
        ]);
    }
}

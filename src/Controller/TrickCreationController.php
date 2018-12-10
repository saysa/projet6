<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 09/11/2018
 * Time: 11:51
 */

namespace App\Controller;


use App\Entity\Trick;
use App\Form\TrickType;
use App\Service\SlugCreator;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TrickCreationController extends AbstractController
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
     * @Route("/trick/new", name="trick_create")
     * @param Request $request
     * @param SlugCreator $slugCreator
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @IsGranted("ROLE_USER")
     */
    public function createTrick(Request $request, SlugCreator $slugCreator)
    {
        $trick = new Trick();
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $trick->setSlug($slugCreator->createSlug($trick));

            $this->entityManager->persist($trick);
            $this->entityManager->flush();
            $this->addFlash('success', 'Le trick à bien été ajouté');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('pages/trick_create.html.twig', [
            'trick' => $trick,
            'form' => $form->createView()
        ]);
    }
}

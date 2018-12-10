<?php

namespace App\Controller;



use App\Entity\ImageCollection;
use App\Form\ImageCollectionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ImageCollectionFormController extends AbstractController
{
    /**
     * @Route("/add/image", name="image_add")
     * @IsGranted("ROLE_USER")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function AddVideo(Request $request, EntityManagerInterface $entityManager)
    {
        $image = new ImageCollection();
        $form = $this->createForm(ImageCollectionType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($image);
            $entityManager->flush();
            $this->addFlash('success', 'L\'image a bien été ajouté');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('pages/imageCollection_create.html.twig', [
            'image' => $image,
            'form' => $form->createView()
        ]);
    }
}
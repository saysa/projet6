<?php

namespace App\Controller;



use App\Entity\Video;
use App\Form\VideoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class VideoFormController extends AbstractController
{
    /**
     * @Route("/add/video", name="video_add")
     * @IsGranted("ROLE_USER")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function AddVideo(Request $request, EntityManagerInterface $entityManager)
    {
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($video);
            $entityManager->flush();
            $this->addFlash('success', 'La video a bien été ajouté');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('pages/video_create.html.twig', [
            'video' => $video,
            'form' => $form->createView()
        ]);
    }
}
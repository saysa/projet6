<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 09/11/2018
 * Time: 11:51
 */

namespace App\Controller;


use App\Entity\Video;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VideoDeleteController extends AbstractController
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
     * @Route("/video/delete/{id}", name="video_delete")
     * @param Video $video
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @IsGranted("ROLE_USER")
     */
    public function trickDelete(Video $video, Request $request)
    {
        if ($this->isCsrfTokenValid('delete', $request->get('_token'))) {
            $this->entityManager->remove($video);
            $this->entityManager->flush();
        }

        $this->addFlash('success', 'La vidéo a bien été supprimé');
        return $this->redirectToRoute('app_homepage');
    }
}

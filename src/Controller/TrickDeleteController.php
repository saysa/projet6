<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 09/11/2018
 * Time: 11:51
 */

namespace App\Controller;


use App\Entity\Trick;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TrickDeleteController extends AbstractController
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
     * @Route("/trick/delete/{slug}", name="trick_delete")
     * @param Trick $trick
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @IsGranted("ROLE_USER")
     */
    public function trickDelete(Trick $trick, Request $request)
    {
        if ($this->isCsrfTokenValid('delete', $request->get('_token'))) {
            $this->entityManager->remove($trick);
            $this->entityManager->flush();
        }

        $this->addFlash('success', 'Le trick à bien été supprimé');
        return $this->redirectToRoute('app_homepage');
    }
}

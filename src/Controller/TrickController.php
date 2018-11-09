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

}
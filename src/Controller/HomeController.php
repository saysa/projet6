<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 09/11/2018
 * Time: 08:04
 */

namespace App\Controller;


use App\Repository\TrickRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @param TrickRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homepage(TrickRepository $repository)
    {
        $tricks = $repository->findAll();

        return $this->render('pages/homepage.html.twig', [
            'tricks' => $tricks
        ]);
    }
}

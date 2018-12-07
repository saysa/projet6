<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 09/11/2018
 * Time: 08:04
 */

namespace App\Controller;


use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/{page<\d+>?1}", name="app_homepage")
     * @param TrickRepository $repository
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homepage(TrickRepository $repository, $page)
    {
        $tricks = $repository->findTrickForPagination($page, 6);
        $nbPages = ceil(count($tricks) / 6);

        return $this->render('pages/homepage.html.twig', [
            'tricks' => $tricks,
            'nbPages'     => $nbPages,
            'page'        => $page,
        ]);
    }
}

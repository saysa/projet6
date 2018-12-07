<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 09/11/2018
 * Time: 11:51
 */

namespace App\Controller;


use App\Repository\CommentRepository;
use App\Repository\TrickRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    /**
     * @var TrickRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(TrickRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/trick/view/{page<\d+>?1}/{slug}", name="trick_view")
     * @param $slug
     * @param CommentRepository $commentRepository
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function trickView($slug, CommentRepository $commentRepository, $page)
    {
        $trick = $this->repository->findTricK($slug);

        $category = $trick->getCategory()->getName();
        $comments = $commentRepository->findCommentById($trick, $page, 10);
        $nbPages = ceil(count($comments) / 10);


        return $this->render('pages/trick_view.html.twig', [
            'trick' => $trick,
            'category' => $category,
            'comments' => $comments,
            'nbPages'     => $nbPages,
            'page'        => $page,
        ]);
    }
}

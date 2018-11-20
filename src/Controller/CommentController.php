<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 15/11/2018
 * Time: 03:09
 */

namespace App\Controller;


use App\Entity\Comment;
use App\Factory\CommentFactory;
use App\Form\CommentType;
use App\Repository\TrickRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_USER")
 */
class CommentController extends AbstractController
{
    /**
     * @Route("/create/comment/{slug}", name="create_comment")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param $slug
     * @param TrickRepository $repository
     * @param CommentFactory $commentFactory
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createComment(Request $request, EntityManagerInterface $entityManager, $slug, TrickRepository $repository, CommentFactory $commentFactory)
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        $trick = $repository->findTrick($slug);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $commentFactory->linkTrickAndUserToComment($comment, $trick, $this->getUser());
            $entityManager->persist($comment);
            $entityManager->flush();
            $this->addFlash('success', 'Votre commentaire à été posté !');
            return $this->redirectToRoute('trick_view', array('slug' => $slug));
        }

        return $this->render('pages/comment_create.html.twig', [
            'trick' => $trick,
            'comment' => $comment,
            'form' => $form->createView()
        ]);
    }
}

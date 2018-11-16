<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 15/11/2018
 * Time: 03:09
 */

namespace App\Controller;


use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\TrickRepository;
use Doctrine\Common\Persistence\ObjectManager;
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
     * @param ObjectManager $objectManager
     * @param $slug
     * @param TrickRepository $repository
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createComment(Request $request, ObjectManager $objectManager, $slug, TrickRepository $repository)
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        $trick = $repository->findTrick($slug);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setUser($this->getUser());
            $comment->setTrick($trick);
            $objectManager->persist($comment);
            $objectManager->flush();
            $this->addFlash('success', 'Votre commentaire à été posté !');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('pages/comment_create.html.twig', [
            'trick' => $trick,
            'comment' => $comment,
            'form' => $form->createView()
        ]);
    }
}

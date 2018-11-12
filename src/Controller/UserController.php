<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 12/11/2018
 * Time: 14:43
 */

namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use App\Service\FileUploader;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/register", name="register_user")
     * @param Request $request
     * @param ObjectManager $em
     * @param FileUploader $fileUploader
     * @return mixed
     */
    public function newUser(Request $request, ObjectManager $em, FileUploader $fileUploader)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $user->getAvatar();
            $fileName = $fileUploader->upload($file);

            $user->setAvatar($fileName);
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Vous êtes bien enregistré');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('Security/register.html.twig', [
            'trick' => $user,
            'form' => $form->createView()
        ]);
    }
}
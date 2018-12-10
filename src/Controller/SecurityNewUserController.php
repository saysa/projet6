<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Service\FileUploader;
use App\Service\PasswordHash;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityNewUserController extends AbstractController
{
    /**
     * @Route("/register", name="register_user")
     * @param FileUploader $fileUploader
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param PasswordHash $passwordHash
     * @return mixed
     */
    public function newUser(FileUploader $fileUploader, Request $request, EntityManagerInterface $entityManager, PasswordHash $passwordHash)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $user->getAvatar();
            $fileName = $fileUploader->upload($file);

            $user->setAvatar($fileName);
            $user->setPassword($passwordHash->passwordHash($user));
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success', 'Vous êtes bien enregistré');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('Security/register.html.twig', [
            'trick' => $user,
            'form' => $form->createView()
        ]);
    }
}

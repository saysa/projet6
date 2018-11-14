<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Service\FileUploader;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, ObjectManager $em)
    {

        $this->passwordEncoder = $passwordEncoder;
        $this->em = $em;
    }

    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/register", name="register_user")
     * @param Request $request
     * @param FileUploader $fileUploader
     * @return mixed
     */
    public function newUser(FileUploader $fileUploader, Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $user->getAvatar();
            $fileName = $fileUploader->upload($file);

            $user->setAvatar($fileName);
            $this->em->persist($user);
            $this->em->flush();
            $this->addFlash('success', 'Vous êtes bien enregistré');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('Security/register.html.twig', [
            'trick' => $user,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }
}

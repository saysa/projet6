<?php

namespace App\Controller;

use App\Entity\User;
use App\Event\CreateUserEvent;
use App\Form\UserType;
use App\Service\FileUploader;
use App\Service\PasswordHash;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityNewUserController extends AbstractController
{
    /**
     * @Route("/register", name="register_user")
     * @param Request $request
     * @param EventDispatcherInterface $event_dispatcher
     *
     * @return mixed
     */
    public function newUser(Request $request, EventDispatcherInterface $event_dispatcher)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $event = new CreateUserEvent($user);
            $event_dispatcher->dispatch(CreateUserEvent::NAME, $event);

            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('Security/register.html.twig', [
            'trick' => $user,
            'form' => $form->createView()
        ]);
    }
}

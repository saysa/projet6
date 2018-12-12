<?php

namespace App\EventSubscriber;

use App\Event\CreateUserEvent;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserSubscriber implements EventSubscriberInterface
{
    /**
     * @var FileUploader
     */
    private $fileUploader;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * CreateUserSubscriber constructor.
     *
     * @param FileUploader $fileUploader
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param EntityManagerInterface $entityManager
     * @param SessionInterface $session
     */
    public function __construct(
        FileUploader $fileUploader,
        UserPasswordEncoderInterface $passwordEncoder,
        EntityManagerInterface $entityManager,
        SessionInterface $session
    ) {
        $this->fileUploader = $fileUploader;
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager = $entityManager;
        $this->session = $session;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            CreateUserEvent::NAME => [
                ['userRegister', 0]
            ],
        ];
    }

    public function userRegister(CreateUserEvent $event)
    {
        $user = $event->getUser();
        $file = $user->getAvatar();
        $fileName = $this->fileUploader->upload($file);

        $user->setAvatar($fileName);


        $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $this->session->getFlashBag()->add('success', 'Vous êtes bien enregistré');
    }
}
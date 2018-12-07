<?php

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class, array(
                'label' => 'Choisissez votre fichier',
                'constraints' => new File([
                'maxSize' => '5M',
                'mimeTypes' => [
                    'image/jpg',
                    'image/jpeg',
                    'image/png',
                ],
                    'mimeTypesMessage' => 'Fichier JPG, JPEG ou PNG autorisés',
                ])
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Image;
use App\Entity\Trick;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('content')
            ->add('category', EntityType::class, array(
                'class' => Category::class,
                'choice_label'=> 'name'
            ))
            ->add('image', ImageType::class, array(
                'label' => false,
                'data_class' => Image::class,
                'required' => false
            ))
            ->add('video', VideoType::class, array(
                'label' => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
            'translation_domain' => 'forms'
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\ArticleEvent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleEvent', TextType::class, [
                "attr" => [
                    // 'placeholder' => 'titre'
                ],

            ])
            ->add('descriptionEvent')
            ->add('imageEvent')
            ->add('createdAdEvent', DateTimeType::class, [
               'widget' => 'choice'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArticleEvent::class,
        ]);
    }
}

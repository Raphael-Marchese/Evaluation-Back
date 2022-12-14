<?php

namespace App\Form;

use App\Entity\Movie;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'label'=> 'Titre',
            ])
            ->add('release_at', null, [
                'widget'=> 'single_text',
                'label'=> 'Date de sortie',
            ])
            ->add('poster', null, [
                'row_attr'=>['class'=>'form-element'],
                'label'=> 'Nom de l\'image',
            ])
            ->add('genre')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}

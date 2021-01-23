<?php

namespace App\Form;

use App\Entity\Armee;
use App\Entity\Grade;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArmeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule')
            ->add('epreuves')
            ->add('grades', EntityType::class, [
                'class'=> Grade::class,
                'multiple'=>true,
                'expanded' =>true,

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Armee::class,
        ]);
    }
}

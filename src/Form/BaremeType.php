<?php

namespace App\Form;

use App\Entity\Bareme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BaremeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('age_max')
            ->add('sexe', ChoiceType::class,[
                'placeholder' => 'Sexe...',
                'choices' => [
                    'Masculin' => 'M',
                    'Feminin' => 'F',
                ],
            ])
            ->add('resultat_min')
            ->add('note')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bareme::class,
        ]);
    }
}

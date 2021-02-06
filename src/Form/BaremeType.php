<?php

namespace App\Form;

use App\Entity\Bareme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BaremeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('age_max', IntegerType::class, [
                'attr'=>['placeholder' => 'Age Maximum...',],
                'label' => false,
            ])
            ->add('sexe', ChoiceType::class, [
                'label' => false,
                'placeholder' => 'Sexe...',
                'choices' => [
                    'Masculin' => 'M',
                    'Feminin' => 'F',
                ],

            ])
            ->add('resultat', IntegerType::class, [
                'attr'=>['placeholder' => 'Résultat...'],
                'label' => false,
            ])
            ->add('note', IntegerType::class, [
                'attr'=>['placeholder' => 'Note...'],
                'label' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bareme::class,
        ]);
    }
}

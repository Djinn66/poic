<?php

namespace App\Form;

use App\Entity\Armee;
use App\Entity\Grade;
use App\Entity\Personnel;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('armee', EntityType::class, [
                'class' => Armee::class,
                'placeholder' => 'Armée...'
            ])
            ->add('grade', EntityType::class, [
                'placeholder' => $options['data']->getArmee() ? 'Grade...' : 'Sélectionnez une Armée...' ,
                'class' => Grade::class,
                'choices'=> $options['data']->getArmee() ? $options['data']->getArmee()->getGrades() : [],
            ])
            ->add('nom', TextType::class, [
                'attr' => ['placeholder' => 'Nom...'],
            ])
            ->add('prenom', TextType::class, ['attr' => ['placeholder' => 'Prénom...']])
            ->add('sexe', ChoiceType::class, [
                'placeholder' => 'Sexe...',
                'choices' => [
                    'Masculin' => 'M',
                    'Feminin' => 'F',
                ],
            ])
            ->add('nia', TextType::class, [
                'attr' => [
                    'placeholder' => 'Numéro d\'Identifiant Air...',
                ],

            ])
            ->add('nid', TextType::class, ['attr' => ['placeholder' => 'Numéro d\'Identifiant Défense...']])
            ->add('nni', TextType::class, ['attr' => ['placeholder' => 'Numéro National d\'Identification...']])
            ->add('nsap', TextType::class, ['attr' => ['placeholder' => 'Numéro Service Administratif du Personnel...']])
            ->add('date_de_naissance', BirthdayType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'min' => (date('Y') - 70) . '-01-01',
                    'max' => (date('Y') - 17) . '-01-01'
                ]
                //'input' => date("d/m/Y",1307276100)


            ])
            ->add('lieu_naissance', TextType::class, ['attr' => ['placeholder' => 'Lieu de naissance...']])
            ->add('email', TextType::class);

    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personnel::class,
        ]);
    }
}

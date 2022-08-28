<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConnexionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Username', TextType::class, [
                'label' => "Pseudo",
                'label_attr' => [
                    'class' => "w-100 text-center"
                ],
                'attr'=> [
                    'placeholder' => 'Inserez votre pseudo',
                    'class' => "text-center"
                ]
            ])
            ->add('Password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => "Les mots de passe doivent être les même.",
                'required'=>true,
                'first_options' => [
                    'label' => "Mot de passe",
                    'label_attr' => [
                        'class' => "w-100 text-center "
                    ],
                    'attr'=> [
                        'placeholder' => 'Inserez votre mot de passe',
                        'class' => "text-center "
                    ]
                ],
                'second_options' => [
                    'label' => "Vérification mot de passe",
                    'label_attr' => [
                        'class' => "w-100 text-center "
                    ],
                    'attr'=> [
                        'placeholder' => 'Inserez votre mot de passe',
                        'class' => "text-center "
                    ]
                ],

                

            ])
            ->add('Connexion', SubmitType::class, [
                
                'label' => "Connexion",
                'attr'=> [
                    'class' => 'd-block mx-auto btn-warning fw-bold mt-4'
                    
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

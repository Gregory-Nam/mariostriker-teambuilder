<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
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
            ->add('Mail', EmailType::class, [
                'label' => "Adresse mail",
                'label_attr' => [
                    'class' => "w-100 text-center"
                ],
                'attr'=> [
                    'placeholder' => 'Inserez votre mail',
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
            ->add('Code_ami_switch', TextType::class, [
                'required'=>false,
                'label' => "Code ami (optionnel)",
                'label_attr' => [
                    'class' => "w-100 text-center "
                ],
                'attr'=> [
                    'placeholder' => 'Inserez votre code ami switch',
                    'class' => "text-center ",
                    'pattern'=>"SW(-\d{4}){4}"
                ]
            ])
            ->add('Discord', TextType::class, [
                'required'=>false,
                'label' => "Discord du club ou perso (optionnel)",
                'label_attr' => [
                    'class' => "w-100 text-center "
                ],
                'attr'=> [
                    'placeholder' => 'Inserez votre discord ou celui de votre club',
                    'class' => "text-center "
                ]
            ])
            ->add('Nom_club', TextType::class, [
                'required'=>false,
                'label' => "Nom du club (optionnel)",
                'label_attr' => [
                    'class' => "w-100 text-center "
                ],
                'attr'=> [
                    'placeholder' => 'Inserez le nom de votre club',
                    'class' => "text-center "
                ]
            ])
            ->add('Code_club', TextType::class, [
                'required'=>false,
                'label' => "Code du club (optionnel)",
                'label_attr' => [
                    'class' => "w-100 text-center "
                ],
                'attr'=> [
                    'placeholder' => 'Inserez le code de votre club',
                    'class' => "text-center ",
                    'size'=>'7'
                ]

            ])
            ->add('Inscription', SubmitType::class, [
                
                'label' => "Inscription",
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

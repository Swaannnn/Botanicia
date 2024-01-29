<?php

namespace App\Form;

use App\Entity\ShoppingCart;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Classe de formulaire pour la modification d'utilisateur
 */

class EditUserType extends AbstractType
{
    /**
     * Construit le formulaire de modification d'utilisateur.
     *
     * @param FormBuilderInterface $builder Constructeur du formulaire
     * @param array $options Options du formulaire
     *
     * @return void
     */

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci d\'entrer un e-mail',
                    ]),
                ],
                'required' => true,
                'attr' => ['class' =>'form-control'],
            ])
            ->add('password')
            ->add('lastName')
            ->add('firstName')
            ->add('phoneNumber')
            ->add('valider', SubmitType::class)
        ;
    }


    /**
     * Configure les options du formulaire
     *
     * @param OptionsResolver $resolver Résolveur d'options
     */

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

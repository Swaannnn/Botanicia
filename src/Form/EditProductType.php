<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Classe de formulaire pour la modification de produit.
 */

class EditProductType extends AbstractType
{
    /**
     * Construit le formulaire de modification de produit.
     *
     * @param FormBuilderInterface $builder Constructeur du formulaire
     * @param array $options Options du formulaire
     *
     * @return void
     */

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('quantity')
            ->add('price')
            ->add('brand')
            ->add('photo',FileType::class,['required' => false, 'mapped' => false])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name'
            ])
            ->add('valider', SubmitType::class)
        ;
    }


    /**
     * Configure les options du formulaire
     *
     * @param OptionsResolver $resolver Résolveur d'options
     *
     * @return void
     */

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}

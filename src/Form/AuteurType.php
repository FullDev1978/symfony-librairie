<?php

namespace App\Form;

use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, ["label"=>"Nom:"])
            ->add('prenom',TextType::class, ["label"=>"Prenom:"])
            ->add('peseudo',TextType::class, ["label"=>"Pseudo:", "required"=>false])
            ->add('biographie', CKEditorType::class, ["label"=>"Biographie:", "required"=>false])
            ->add('imageFile', FileType::class, ["label"=>"Image:", "required"=>false])
            ->remove('upddatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Auteur::class,
        ]);
    }
}

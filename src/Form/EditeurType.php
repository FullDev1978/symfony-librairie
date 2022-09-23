<?php

namespace App\Form;

use App\Entity\Editeur;

use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EditeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ["label"=>"Nom:"] )
            ->add('description', CKEditorType::class, ["label"=>"Description:"])
            ->add('logoFile',FileType::class, ["label"=>"Logo:", "required"=>false])
            ->add('imageFile',FileType::class, ["label"=>"Image:", "required"=>false])
            ->remove('logoName')
            ->remove('imageName')
            ->remove('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Editeur::class,
        ]);
    }
}

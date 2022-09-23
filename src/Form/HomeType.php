<?php

namespace App\Form;

use App\Entity\Home;
use App\Entity\Carousel;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive')
            ->add('titre', TextType::class, ["label"=>"Titre:"])
            ->add('texte', CKEditorType::class, ["label"=>"Texte:", "required"=>false])
            ->add('carousels', EntityType::class, ['class'=>Carousel::class, 'label'=>"Carousel :", "multiple"=>true])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}

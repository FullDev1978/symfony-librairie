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

class CarouselType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('titre', TextType::class, ["label"=>"Titre:"])
        ->add('texte', CKEditorType::class, ["label"=>"Texte:", "required"=>false])
        ->add('imageFile', FileType::class, ["label"=>"Image:", "required"=>true])
        ->add('homes', EntityType::class, ['class'=>Home::class, 'label'=>"Homes :", "multiple"=>true, "attr"=>["class"=>"select2"], "required"=>false])
        ->remove('imageName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carousel::class,
        ]);
    }
}

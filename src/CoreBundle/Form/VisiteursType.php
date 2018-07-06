<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisiteursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom', TextType::class, array(
            'label' => false,
            'attr' => [ "class" => "form-control", "placeholder" => 'Nom']
        ))
        ->add('prenom', TextType::class, array(
            'label' => false,
            'attr' => [ "class" => "form-control", "placeholder" => 'Prenom']
        ))
        ->add('reduit', CheckboxType::class, array(
            "label" => 'Je dispose d\'une reduction',
            "required" => false,
            'attr' => ["class" => "form-control"]
        ))
        ->add('dateNaissance', DateType::class, array(
            'widget' => 'single_text',
            'html5' => false,
            "label" => false,
            'attr' => ["class" => "naissance form-control", "placeholder" => "Date de naissance"]
        ))
        ->add('tarif', HiddenType::class, array(
                "data" => 0
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Visiteurs'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'corebundle_visiteurs';
    }


}

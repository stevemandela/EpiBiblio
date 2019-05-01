<?php

namespace EPI\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
//use Symfony\Component\Form\Extension\Core\Type\ImageType;
use EPI\UserBundle\Entity\livres;
use Symfony\Component\OptionsResolver\OptionsResolver;

class livresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('image', FileType::class, array('label' => 'Image (PNG image)'))
        ->add('dateCreation')->add('nombreVue')
        ->add('nombreTelechargement')->add('sous_categorie')
        ->add('brochure', FileType::class, array('label' => 'Brochure (PDF file)'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EPI\UserBundle\Entity\livres'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'epi_userbundle_livres';
    }


}

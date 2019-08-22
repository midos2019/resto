<?php

namespace App\Referentiel\Form;

use App\Referentiel\Entity\Etablissement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('nomMinistere')
            ->add('nomDir')
            ->add('magasinier')
            ->add('econome')
            ->add('adresse')
            ->add('ville')
            ->add('tel')
            ->add('fax')
            ->add('anneeScol')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etablissement::class,
        ]);
    }
}

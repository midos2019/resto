<?php

namespace App\GestionPlat\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlatType extends AbstractType {

	public function buildForm( FormBuilderInterface $builder, array $options )
	{
		parent::buildForm( $builder, $options );
	}

	public function configureOptions( OptionsResolver $resolver )
	{
		parent::configureOptions( $resolver );
	}
}
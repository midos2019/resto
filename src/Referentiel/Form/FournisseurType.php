<?php

namespace App\Referentiel\Form;

use App\Referentiel\Entity\Fournisseur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FournisseurType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('nomPrenom')
			->add('activite')
			->add('adresse')
			->add('matriculeFisc')
			->add('tel')
			->add('fax')
			->add('ville')
			->add('codePost')

		;
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => Fournisseur::class,
		]);
	}
}

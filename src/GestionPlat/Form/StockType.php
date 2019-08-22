<?php

namespace App\GestionPlat\Form;


use App\GestionPlat\Entity\Stock;
use App\Referentiel\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StockType extends AbstractType {

	public function buildForm( FormBuilderInterface $builder, array $options )
	{
		$builder
			->add('nom')
			->add('qteCritique')
			->add('categories')
		;
	}

	public function configureOptions( OptionsResolver $resolver )
	{
		$resolver->setDefaults([
			'data_class' => Stock::class
		]);
	}

}
<?php

namespace App\GestionPlat\Form;


use App\GestionPlat\Entity\Achat;
use App\GestionPlat\Entity\LigneAchat;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AchatType extends AbstractType {

	public function buildForm( FormBuilderInterface $builder, array $options )
	{
		$builder
			->add('date')
			->add('fournisseur')
			->add('personnel')
//			->add('ligneAchat', EntityType::class, [
//				'class' => LigneAchat::class,
//				'multiple' => true
//			])
		;
	}

	public function configureOptions( OptionsResolver $resolver )
	{
		$resolver->setDefaults([
			'data_class' => Achat::class
		]);
	}
}
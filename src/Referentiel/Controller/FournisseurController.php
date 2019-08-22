<?php
namespace App\Referentiel\Controller;

use App\Referentiel\Entity\Fournisseur;
use App\Referentiel\Form\FournisseurType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FournisseurController extends AbstractController {
	/**
	 * @Route("/ajout/fournisseur", name="ajout-fournisseur")
	 * @Route("/modifier/fournisseur/{id}", name="modifier-fournisseur")
	 *
	 */
	public function fournisseur($id = null, Request $request)
	{

		$em = $this->getDoctrine()->getManager();
		if (is_null($id))
			$fournisseur = new Fournisseur();
		else
			$fournisseur = $em->find(Fournisseur::class, $id);

		$form = $this->createForm(FournisseurType::class, $fournisseur);
		if ($request->isMethod('POST')) {
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em->persist($fournisseur);
				$em->flush();
				$this->addFlash('success', "??? ??????? ?????");
				return $this->redirectToRoute("ajout-fournisseur");
			}
		}
		$fournisseurs = $em->getRepository(Fournisseur::class)->findAll();

		return $this->render('@Referentiel/fournisseur.html.twig', array(
			'form' => $form->createView(),
			'fournisseurs' => $fournisseurs,
			'sousMenu' => array(['nom' => '????????', 'url' => 'ajout-fournisseur'])
		));
	}
	/**
	 * @Route("/delete/fournisseur/{id}", name="delete-fournisseur")
	 *
	 */
	public function delete(Fournisseur $id)
	{
		$em = $this->getDoctrine()->getManager();
		$em->remove($id);
		$em->flush();
		return new Response(1);
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: MohamedAli
 * Date: 07/08/2019
 * Time: 13:55
 */

namespace App\GestionPlat\Controller;

use App\GestionPlat\Entity\Achat;
use App\GestionPlat\Form\AchatType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AchatController extends AbstractController
{
	/**
	 * @Route("/ajout/achat", name="ajout-achat")
	 * @Route("/modifier/achat/{id}", name="modifier-achat")
	 *
	 */
	public function achat($id = null, Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		if (is_null($id))
			$achat = new Achat();
		else
			$achat = $em->find(Achat::class, $id);

		$form = $this->createForm(AchatType::class, $achat);
		if ($request->isMethod('POST')) {
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em->persist($achat);
				$em->flush();
				$this->addFlash('success', "تمت العملية بنجاح");
				return $this->redirectToRoute("ajout-achat");
			}
		}
		$achats = $em->getRepository(Achat::class)->findAll();
		return $this->render('@GestionPlat/achat.html.twig', array(
			'form' => $form->createView(),
			'achats' => $achats,
			'sousMenu' => array(['nom' => 'المشتريات', 'url' => 'ajout-categorie'])

		));
	}

	/**
	 * @Route("/delete/achat/{id}", name="delete-achat")
	 *
	 */
	public function delete(Achat $id)
	{
		$em = $this->getDoctrine()->getManager();
		$em->remove($id);
		$em->flush();
		return new Response(1);
	}
}
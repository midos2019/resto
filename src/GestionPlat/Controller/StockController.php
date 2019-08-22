<?php
/**
 * Created by PhpStorm.
 * User: MohamedAli
 * Date: 07/08/2019
 * Time: 13:55
 */

namespace App\GestionPlat\Controller;

use App\GestionPlat\Entity\Stock;
use App\GestionPlat\Form\StockType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StockController extends AbstractController
{

	/**
	 * @Route("/ajout/stock", name="ajout-stock")
	 * @Route("/modifier/stock/{id}", name="modifier-stock")
	 *
	 */
	public function achat($id = null, Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		if (is_null($id))
			$stock = new Stock();
		else
			$stock = $em->find(Stock::class, $id);

		$form = $this->createForm(StockType::class, $stock);
		if ($request->isMethod('POST')) {
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em->persist($stock);
				$em->flush();
				$this->addFlash('success', "تمت العملية بنجاح");
				return $this->redirectToRoute("ajout-stock");
			}
		}
		$stocks = $em->getRepository(Stock::class)->findAll();
		return $this->render('@GestionPlat/stock.html.twig', array(
			'form' => $form->createView(),
			'stocks' => $stocks,
			'sousMenu' => array(['nom' => 'المخزون', 'url' => 'ajout-stock'])

		));
	}

	/**
	 * @Route("/delete/stock/{id}", name="delete-stock")
	 *
	 */
	public function delete(Stock $id)
	{
		$em = $this->getDoctrine()->getManager();
		$em->remove($id);
		$em->flush();
		return new Response(1);
	}
}
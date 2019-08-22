<?php
/**
 * Created by PhpStorm.
 * User: MohamedAli
 * Date: 07/08/2019
 * Time: 13:55
 */

namespace App\Referentiel\Controller;

use App\Referentiel\Entity\Etablissement;
use App\Referentiel\Form\EtablissementType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class EtablissementController extends AbstractController
{
	/**
	 * @Route("/ajout/etablissement", name="ajout-etablissement")
	 * @Route("/modifier/etablissement/{id}", name="modifier-etablissement")
	 *
	 */
	public function etablissement($id = null, Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		if (is_null($id))
			$etablissement = new Etablissement();
		else
			$etablissement = $em->find(Etablissement::class, $id);

		$form = $this->createForm(EtablissementType::class, $etablissement);
		if ($request->isMethod('POST')) {
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em->persist($etablissement);
				$em->flush();
				$this->addFlash('success', "تمت العملية بنجاح");
				return $this->redirectToRoute("ajout-etablissement");
			}
        }
        $etablissements = $em->getRepository(Etablissement::class)->findAll();

		return $this->render('@Referentiel/etablissement.html.twig', array(
            'form' => $form->createView(),
            'etablissements' => $etablissements,
			'sousMenu' => array(['nom' => 'المؤسسة', 'url' => 'ajout-etablissement'])
		));
	}
    /**
     * @Route("/delete/etablissement/{id}", name="delete-etablissement")
     * @
     */
    public function delete(Etablissement $id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        return new Response(1);
    }
}
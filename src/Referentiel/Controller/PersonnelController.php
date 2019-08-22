<?php
/**
 * Created by PhpStorm.
 * User: MohamedAli
 * Date: 07/08/2019
 * Time: 13:55
 */

namespace App\Referentiel\Controller;

use App\Referentiel\Entity\Fonction;
use App\Referentiel\Entity\Personnel;
use App\Referentiel\Form\FonctionType;
use App\Referentiel\Form\FournisseurType;
use App\Referentiel\Form\PersonnelType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnelController extends AbstractController
{
    /**
	 * @Route("/ajout/personnel", name="ajout-personnel")
	 * @Route("/modifier/personnel/{id}", name="modifier-personnel")
	 *
	 */
	public function personnel($id = null, Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		if (is_null($id))
			$personnel = new Personnel();
		else
			$personnel = $em->find(Personnel::class, $id);

		$fonction = new Fonction();
		$form_fonction = $this->createForm(FonctionType::class, $fonction);
		$form = $this->createForm(PersonnelType::class, $personnel);

		if ($request->isMethod('POST') && $request->request->has($form->getName())) {
			$form->handleRequest($request);
			if ($form->isValid() && $form->isSubmitted()) {
				$em->persist($personnel);
				$em->flush();
				$this->addFlash('success', "تمت العملية بنجاح");
				return $this->redirectToRoute("ajout-personnel");
			}
        }

		if ($request->isMethod('POST') && $request->request->has($form_fonction->getName())) {
			$form_fonction->handleRequest($request);
			if ($form_fonction->isValid() && $form_fonction->isSubmitted()) {
				$em->persist($fonction);
				$em->flush();
				$this->addFlash('success', "تمت العملية بنجاح");
				return $this->redirectToRoute("ajout-personnel");
			}
		}

        $personnels = $em->getRepository(Personnel::class)->findAll();

		return $this->render('@Referentiel/personnel.html.twig', array(
            'form' => $form->createView(),
            'form_fonction' => $form_fonction->createView(),
            'personnels' => $personnels,
			'sousMenu' => array(['nom' => 'الموظفون', 'url' => 'ajout-personnel'])
		));
	}


    /**
     * @Route("/delete/personnel/{id}", name="delete-personnel")
     *
     */
    public function delete(Personnel $id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        return new Response(1);
    }
}
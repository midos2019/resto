<?php


namespace App\Referentiel\Controller;

use App\Referentiel\Entity\Article;
use App\Referentiel\Entity\Categorie;
use App\Referentiel\Form\ArticleType;
use App\Referentiel\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/ajout/categorie", name="ajout-categorie")
     * @Route("/modifier/categorie/{id}", name="modifier-categorie")
     *
     */
    public function categorie($id = null, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if (is_null($id))
            $categorie = new Categorie();
        else
            $categorie = $em->find(Categorie::class, $id);

        $form = $this->createForm(CategorieType::class, $categorie);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->persist($categorie);
                $em->flush();
                $this->addFlash('success', "تمت العملية بنجاح");
                return $this->redirectToRoute("ajout-categorie");
            }
        }
        $categories = $em->getRepository(Categorie::class)->findAll();
        return $this->render('@Referentiel/categorie.html.twig', array(
            'form' => $form->createView(),
            'categories' => $categories,
            'sousMenu' => array(['nom' => 'الاصناف', 'url' => 'ajout-categorie'])

        ));
    }

    /**
     * @Route("/delete/categorie/{id}", name="delete-categorie")
     *
     */
    public function delete(Categorie $id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        return new Response(1);
    }


	/**
	 * @Route("/ajout/article", name="ajout-article")
	 * @Route("/modifier/article/{id}", name="modifier-article")
	 *
	 */
	public function article($id = null, Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		if (is_null($id))
			$article = new Article();
		else
			$article = $em->find(Article::class, $id);

		$form = $this->createForm(ArticleType::class, $article);
		if ($request->isMethod('POST')) {
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em->persist($article);
				$em->flush();
				$this->addFlash('success', "تمت العملية بنجاح");
				return $this->redirectToRoute("ajout-article");
			}
		}
		$articles = $em->getRepository(Article::class)->findAll();
		return $this->render('@Referentiel/article.html.twig', array(
			'form' => $form->createView(),
			'articles' => $articles,
			'sousMenu' => array(['nom' => 'المواد', 'url' => 'ajout-article'])

		));
	}

	/**
	 * @Route("/delete/article/{id}", name="delete-article")
	 *
	 */
	public function deleteArticle(Article $id)
	{
		$em = $this->getDoctrine()->getManager();
		$em->remove($id);
		$em->flush();
		return new Response(1);
	}


}
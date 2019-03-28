<?php

namespace AppBundle\Controller;

use AppBundle\Form\ArticleType;
use AppBundle\Manager\ArticleManager;
use AppBundle\Manager\RateManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("article")
 */
class ArticleController extends Controller
{
    /**
     * @Route("/", name="article_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        /** @var ArticleManager $articleManager */
        $articleManager = $this->container->get('article_manager');

        /** @var RateManager $rateManager */
        $rateManager = $this->container->get('rate_manager');

        $rate = $rateManager->get((int) $request->get('filter'), false);
        $articles = $articleManager->getFilteredList($rate);

        return $this->render('article/index.html.twig', array(
            'articles' => $articles,
            'rates' => $rateManager->getList(),
            'selectedRate' => $rate
        ));
    }

    /**
     * Creates a new article entity.
     *
     * @Route("/new", name="article_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        /** @var ArticleManager $manager */
        $manager = $this->container->get('article_manager');

        $article = $manager->getNew();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->save($article);

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }
}

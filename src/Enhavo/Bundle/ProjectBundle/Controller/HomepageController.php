<?php

namespace Enhavo\Bundle\ProjectBundle\Controller;

use Enhavo\Bundle\PageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function indexAction()
    {
        $articles = $this->get('enhavo_article.repository.article')->findPublished();

        $setCategories = [];

        // look for all articles
        foreach ($articles as $article) {
            // get category of article with a function defined in the article entity
            $currentCategories = $article->getCategories();
            // convert variable into array
            $currentCategories = $currentCategories->toArray();
            // iterate over array
            foreach ($currentCategories as $currentCategory) {
                // if currentCategory is not in array write in setCategories
                if (!in_array($currentCategory, $setCategories )) {
                    $setCategories[] = $currentCategory;
                }
            }
        }

        return $this->render('EnhavoProjectBundle:Theme:Homepage/index.html.twig', [
            'articles' => $articles,
            'categories' => $setCategories
        ]);
    }

    public function filterArticlesAction($id)
    {
        $articles = $this->get('enhavo_article.repository.article')->findPublished();

        $filteredArticles = [];

        foreach ($articles as $article) {
            if($id == '0') {
                $filteredArticles[] = $article;
                continue;
            }

            // get category of article with a function defined in the article entity
            $categories = $article->getCategories();
            // convert variable into array
            $categories = $categories->toArray();

            foreach($categories as $category) {
                if($category->getId() == $id) {
                    $filteredArticles[] = $article;
                    continue;
                }
            }
        }

        return $this->render('EnhavoProjectBundle:Theme:Homepage/articles.html.twig', [
            'articles' => $filteredArticles
        ]);
    }

}

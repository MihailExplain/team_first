<?php


namespace controllers;

use core\AbstractController;
use core\Route;
use core\View;
use models\Store;

class NewsController extends AbstractController
{
    /**
     * chose page index and take array from DB
     */
    public function index()
    {
        $news = new Store();
        $newsAll = $news->allNews();
        $view = new View('news_index');
        $view->render($newsAll);
    }

    /**
     * chose page for create news
     */
    public function news_create()
    {
        $view = new View('news_create');
        $view->render();
    }
    /**
     * make mass  news and save in DB
     */
    public function store()
    {
        $newsNew = [];
        $newsNew['title'] = $_REQUEST['title'];
        $newsNew['text'] = $_REQUEST['text'];
        $newsNew['author'] = $_REQUEST['author'];
        $news = new Store();
        $news->addNews($newsNew);
        Route::redirect('/NewsController/news_index');
    }

    /**
     * chose page for edit news
     */
    public function edit()
    {
        $id= $_REQUEST['id'];
        $newsItem = $this->store->getNews($id);
        $view = new View('news_edit');
        $view->render(['news'=>$newsItem]);
    }

    /**
     * make mass changes news and save in DB
     */
    public function update()
    {
        $newsNew = [];
        $newsNew['id'] = $_REQUEST['id'];
        $newsNew['title'] = $_REQUEST['title'];
        $newsNew['text'] = $_REQUEST['text'];
        $news = new Store();
        $news->saveNews($newsNew);
        Route::redirect();
    }
}
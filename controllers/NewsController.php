<?php
class NewsController {
    public function actionGetAll(){
        $items = News::getAll();
        include ROOT . '/views/news/all.php';
    }
    
    public function actionGetOne(){
        $id = $_GET['id'];
        $item = News::getOne($id);
        include ROOT . '/views/news/one.php';
    }
}

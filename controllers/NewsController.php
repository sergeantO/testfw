<?php
class NewsController {
    public function actionGetAll(){
        $db = new NewsModel;
        $news = NewsModel::findAll();
        $view = new View();
        $view->items = $news;
        $view->display('news/all.php');
    }
    
    public function actionGetOne(){
        $id = $_GET['id'];
        
        try {
            $item = NewsModel::findById($id);
        } catch  (Exception $e) {
            $view = new View();
            $view->error = $e->getMessage();
            $view->display('error.php');
            die();
        }
        
        $view = new View();
        $view->assign('item', $item);
        $view->display('news/one.php');
    }
    
    public function actionAddNews(){
        $db = new NewsModel;
        $db->title = 'Новость 4';
        $db->text = 'ОООООчень важная новость';
        $db->save();
    }
}

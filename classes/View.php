<?php

class View {
    
    protected $data = [];

    public function assign($name, $value){
        $this->data[$name] = $value;
    }
    
    public function __set($k, $v) {
         $this->data[$k] = $v;
    }

    public function render($template){
        //$this->data['items'] --> $items
        foreach ($this->data as $key => $val){
            $$key = $val;
        }
        ob_start();
        include ROOT . '/views/' . $template ;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    
    public function display($template) {
        echo $this->render($template);
    }
}

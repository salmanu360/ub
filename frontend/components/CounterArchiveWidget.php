<?php 
   namespace frontend\components;

   use yii\base\Widget;

    class CounterArchiveWidget extends Widget { 
        public $mes; 
        
        public function init() { 
            parent::init();
        }  
    
        public function run() { 
            return $this->render('counter_archive_content');
        } 
   } 
?>
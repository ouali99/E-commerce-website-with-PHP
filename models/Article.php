<?php 
class Article extends Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'articles';
    }
}

?>
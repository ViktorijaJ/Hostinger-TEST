<?php

namespace App\Tree;

class Node
{
    public $id;
    public $name;
    public $parentId;
    public $children;
    
    function __construct($id, $name, $parentId) {
      
        $this->id=$id;
        $this->name=$name;
        $this->parentId= $parentId;
        $this->children=array();
    }
    
    function addChildNode ($child) {
        array_push ($this->children, $child);
    }
    function toHtml(){
        echo "<b>$this->name";
        if(count($this->children)>0){
                echo "<ul>";
                foreach($this->children as $node){
                    echo "<li>";
                    $node->toHtml();
                    echo "</li>";
                }
                echo "</ul>";
        }
        echo "</b>";
    }
}
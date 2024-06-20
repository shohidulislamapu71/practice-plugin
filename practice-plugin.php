<?php
/**
 * Plugin Name: Practice Plugin
 * Plugin URI: http://softbdit.com/
 * Description: This is Basic Post Qr Code plugin
 * Version: 1.0.0
 * Author: Sohidul Islam Apu
 * Author URI: http://softbdit.com/
 */

 class Practice_plugin{

    public function __construct(){

        add_action("init", array($this,"initialize"));

    }

    function initialize(){
        add_filter("the_excerpt", array($this,"readmore"));
        add_filter("the_content", array($this,"timecount"));
    }

    function readmore($the_content){
        return "{$the_content} Read More";
    }

    function timecount($the_content){

        $content = strip_tags($the_content);
        $totalwordcount = str_word_count($content);
        $totalreadtime = ceil($totalwordcount/200);
        
        return $the_content."<p>Total Read time : {$totalreadtime} and Total Post word {$totalwordcount}</p>" ;
    }



}

new Practice_plugin();
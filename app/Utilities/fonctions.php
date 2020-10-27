<?php

if(!function_exists('page_title')){
    function page_title($title){
        return "| ".$title;
    }
}

if(!function_exists('set_route_active')){
    function set_route_active($route){
        return Route::is($route) ? 'actived' : '';
    }
};

// public
 function getTypeFile($file){
        $fileExtension = (new \SplFileInfo($file))->getExtension();

        if(in_array($fileExtension, ['png','PNG','jpg','jpeg','gif'])){
          return 'Image';
        } else if(in_array($fileExtension, ['txt','docx','doc','pdf',''])){
          return 'Fichier';
        } else if(in_array($fileExtension, ['mp4','avi','3gp','mpeg','ogg'])){
          return 'Video';
        }
}

<?php

//=====================
if (! function_exists('my_min')){
  function my_min($array){
      $min = $array[0]->price;
      foreach($array as $value){
        if ($value->price < $min)
            $min = $value->price;
      }
    return $min;
  }
}

if (! function_exists('book_code')){
  function book_code(){
    return chr(mt_rand(65,90)).chr(mt_rand(65,90)).substr(uniqid(mt_rand(15, 10000000), TRUE),0,6);
  }
}

if (! function_exists('group_code')){
  function group_code($from, $route, $date){
    return strtoupper($from).$route.date('Ymd', strtotime($date));
  }
}

<?php
  if (! function_exists('load_view') ){

     function load_view($head, $body, $foot, $data=NULL){
      $instance = &get_instance();
        if ($head != NULL)
          $instance->load->view($head, $data);
          $instance->load->view($body);
        if ($foot != NULL)
          $instance->load->view($foot);
    }
  }

  if (! function_exists('get_per_cent')){
    function get_per_cent($value, $total){
      return round($value/$total*100, 0, PHP_ROUND_HALF_UP);
    }
  }

  if (! function_exists('gen_orgid')){
    function gen_orgid(){
      return 'ORG'.substr(uniqid(mt_rand(100000,999999),TRUE),0,6);
    }
  }

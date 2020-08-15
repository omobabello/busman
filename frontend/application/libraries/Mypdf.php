<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mypdf
 *
 * @author Omoba
 */

require_once(dirname(__FILE__) . '/dompdf/dompdf_config.inc.php');
class Mypdf extends DOMPDF{
        protected function ci(){
		return get_instance();
	}
	
	public function load_view($view, $data = array()){
		$html = $this->ci()->load->view($view, $data, TRUE);
		$this->load_html($html);
	}
}

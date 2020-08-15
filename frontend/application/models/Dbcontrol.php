<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dbcontrol
 *
 * @author Omoba
 */
class Dbcontrol extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('array');
    }

    public function get_agents(){
      return $this->db->get('_organisation')->result();
    }

    public function get_agent_info($org_id){
      return $this->db->where('org_id', $org_id)->get('_organisation')->row();
    }

    public function register(){
        $name = $this->input->post('name');
        $name = strtoupper(substr($name, 0, 1).substr($name, strlen($name)/2,1).substr($name, -1)."_".str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT));;
        $array = array(
                    'org_id' => $name,
                    'email' => $this->input->post('email'),
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone'),
                    'activated' => 0,
                    'address' => $this->input->post('address'),
                    'region' => $this->input->post('region').' Region',
                    'city' => $this->input->post('city'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                );
       $result =  $this->db->insert('_organisations', $array);
       return $result;
    }

    public function get_booking_by_token($pay_token){
      $query = "SELECT _organisation.name as org_name, _bookings.*, _routes.dept_term, _routes.arr_term, _routes.hours _buses.num_plate
                FROM _organisation,_buses,_routes
                WHERE _routes.id = _bookings.route
                AND _buses.bus_id = _bookings.bus_id
                AND _organisation.org_id = _bookings.org_id
                AND _bookings.pay_token = '{$pay_token}'"
      return $this->db->query($query);
    }

    public function findbus(){
        $route = $this->input->post('cityfrom')." <> ".$this->input->post('cityto');
        $to = $this->input->post('cityto');
        $from = $this->input->post('cityfrom');
        $date = date('j F Y', strtotime($this->input->post('date')));
        $day  = date('D', strtotime($this->input->post('date')));
        $route1 = $this->input->post('cityto')." <> ".$this->input->post('cityfrom');
        $day = substr(date("l", strtotime($this->input->post('date'))), 0, 3);

        $query = "SELECT _routes.hours,_buses.bus_id,_organisation.org_id, _routes.dept_term, _routes.arr_term, _routes.price, _routes.id as route, _routes.take_off, _organisation.name, _routes.take_time, _routes.return_time, _buses.bus_id, _buses.num_seat,
                 _routes.org_id FROM _organisation, _routes, _buses
                 WHERE (_routes.name = '{$route}' OR _routes.name='{$route1}')
                 AND _routes.days_active LIKE '%{$day}%'
                 AND _buses.bus_id = _routes.bus_id
                 AND _organisation.org_id = _routes.org_id
                 AND _buses.num_seat > (SELECT COUNT(*) FROM _bookings where _bookings.travel_date = '$date' AND _bookings.travel_from = '$from' AND _bookings.travel_to = '$to' AND _bookings.has_paid = TRUE)
            ";
        $result = $this->db->query($query);
        return $result->result();
    }

    public function enter_bookings($variables){
      return $this->db->insert('_bookings',
                                            array(
                                              'org_id' => $variables['org_id'],
                                              'bus_id' => $variables['bus_id'],
                                              'name' => $variables['full_name'],
                                              'phone' => $variables['mobile'],
                                              'email' => $variables['email'],
                                              'travel_to' => $variables['to'],
                                              'travel_from' => $variables['from'],
                                              'route' => $variables['route'],
                                              'travel_date' => $variables['date'],
                                              'book_date' =>"NOW()",
                                              'group_code' => group_code($variables['from'],$variables['route'],$variables['date']),
                                              'book_code' => book_code(),
                                              'price' => $variables['fullprice'],
                                              'departure' => $variables['deptime'],
                                               'pay_token' => $variables['token'],
                                              'has_paid' => FALSE
                                            )
                              );
    }

    public function confirm_booking($token){
      return $this->db->set('has_paid', TRUE)->where('pay_token', $token)->update('_bookings');
    }

    public function store_account($org_id, $route){
      //  $amount = ;
        return $this->db->insert('_accounts',
                                             array(
                                               'date' => "NOW()",
                                               'org_id' => $org_id,
                                               'amount' =>$this->db->where('id', $route)->get('_routes')->row()->price
                                             )
                                );
    }

    public function get_name($id){
      return $this->db->where('org_id', $id)->get('_organisation')->row()->name;
    }
    public function username_exists(){
        return $this->db->where('email', $this->input->post('email'))->select('email')->get('_organisations')->num_rows() > 0;
    }

    public function password_match($email, $password){
        $check = $this->db->where('email', $email)->select('password')->get('_organisations')->row();
        return password_verify($password, $check->password);
    }
}

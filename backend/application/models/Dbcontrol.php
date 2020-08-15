<?php
defined('BASEPATH') or exit('No direct access allowed');

class Dbcontrol extends CI_Model{

  public function __construct(){
    parent :: __construct();
    $this->load->database();
    $this->load->library('session');
  }

  public function get_profile(){
    return $this->db->where('org_id', $this->session->serial)->get('_organisation')->row();
  }

  public function get_user(){
    return $this->db->where('org_id', $this->session->serial)->get('_organisation')->row();
  }

  public function get_user_by_email($email){
    return $this->db->where('email', $email)->get('_organisation')->row();
  }

  public function email_exists($email){
    return $this->db->where('email', $email)->get('_organisation')->num_rows() > 0;
  }

  public function pass_match($email, $password){
    $hash = $this->get_user_by_email($email)->password;
    return password_verify($password, $hash);
  }

  public function register(){
    return $this->db->insert('_organisation', array(
                                                'org_id' => gen_orgid(),
                                                'email' => $this->input->post('email'),
                                                'phone' => $this->input->post('phone'),
                                                'name' => $this->input->post('name'),
                                                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                                                'address' => $this->input->post('address'),
                                                'is_activated' => FALSE

                            ));
  }

  public function get_amount_made_today(){
    return $this->db->where('org_id', $this->session->serial)
                    ->select_sum('amount')
                    ->where("DATE(date) = CURDATE()")
                    ->get('_accounts')->row()->amount;
  }

  public function generate_code($generate){
    if ($generate){
      $code = md5(strtotime('now'));
      return ($this->db->set('hash_code', $code)->where('org_id', $this->session->serial)->update('_organisation')) ? $code : FALSE;
    }else{
      return $this->db->where('org_id', $this->session->serial)->get('_organisation')->row()->hash_code;
    }
  }

  public function activate_account($hash){
    return $this->db->set('is_activated', TRUE)->where('hash_code', $hash)->update('_organisation');
  }

  public function get_today_bookings($count = FALSE){
    if ($count)
      return $this->db->group_by(array('route','travel_from', 'travel_date'))
                        ->where('org_id', $this->session->serial)
                        ->where("DATE(book_date) = CURDATE()")->get('_bookings')
                        ->num_rows();
    else
      return $this->db->limit(10, $this->uri->segment(3))
                        ->group_by(array('route','travel_from', 'travel_date'))
                        ->select('count(*) as count,serial,departure,travel_from,travel_to,travel_date,route,bus_id')
                        ->where('org_id', $this->session->serial)
                        ->where("DATE(book_date) = CURDATE()")->get('_bookings')
                        ->result();
  }

  public function get_month_bookings($count = FALSE){
    if ($count)
      return $this->db->group_by(array('route','travel_from', 'travel_date'))
                        ->where("MONTH(book_date) = MONTH(CURRENT_DATE)")
                        ->where('org_id', $this->session->serial)
                        ->get('_bookings')
                        ->num_rows();
    else
      return $this->db->limit(10, $this->uri->segment(3))
                        ->group_by(array('route','travel_from', 'travel_date'))
                        ->select('count(*) as count,serial,departure,travel_from,travel_to,travel_date,route,bus_id')
                        ->where("MONTH(book_date) = MONTH(CURRENT_DATE)")
                        ->where('org_id', $this->session->serial)
                        ->get('_bookings')
                        ->result();
    }

  public function get_travelling_today($count = FALSE){
    if ($count)
    return $this->db->group_by(array('route','travel_from', 'travel_date'))
                      ->where("DATE(book_date) = DATE(CURRENT_DATE)")
                      ->where('org_id', $this->session->serial)
                      ->get('_bookings')
                      ->num_rows();
    else
      return $this->db->limit(10, $this->uri->segment(3))
                        ->group_by(array('route','travel_from', 'travel_date'))
                        ->select('count(*) as count,departure,serial,travel_to,travel_from,travel_date,route,bus_id')
                        ->where("DATE(book_date) = DATE(CURRENT_DATE)")
                        ->where('org_id', $this->session->serial)
                        ->get('_bookings')
                        ->result();
  }
  public function get_bookings(){
    return $this->db->where('DATE(book_date) = DATE(CURRENT_DATE)')
                    ->where('org_id', $this->session->serial)
                    ->get('_bookings')
                    ->num_rows();
  }

  public function get_routes_bookings(){
    $serial = $this->session->serial;
    $today = date('F jS, Y', strtotime('today'));
    $query = "SELECT SUM(route) as routes, bus_id,num_seats, route, take_time FROM _buses,_bookings, _routes WHERE
        _bookings.bus_id = _routes.bus_id AND _bookings.bus_id = _routes.bus_id AND date='$today' AND _bookings.org_id = '$serial'";
    return $this->db->query($query)->result();
  }

  public function get_buses(){
   return $this->db->select("_buses.bus_id, (SELECT _routes.name FROM _routes WHERE _routes.bus_id = _buses.bus_id) as name, _buses.identity, _buses.num_seat")
                    ->where('_buses.org_id', $this->session->serial)
                    ->get('_buses')
                    ->result();
  }

  public function unassigned_buses(){
    return $this->db->query("SELECT `_buses`.`bus_id`, `_buses`.`identity`
                      FROM `_buses`
                      WHERE `_buses`.`org_id` = '{$this->session->serial}'
                      AND `_buses`.`bus_id` NOT IN (SELECT bus_id FROM _routes WHERE org_id = '{$this->session->serial}')")
              ->result();
  }

  public function get_bus($serial){
    return $this->db->where('bus_id', $serial)->get('_buses')->row();
  }

  public function update_bus(){
    return $this->db->set('identity', $this->input->post('identity'))
              ->set('num_seat', $this->input->post('no_seats'))
              ->set('num_plate', $this->input->post('num_plate'))
              ->where('bus_id', $this->input->post('serial'))
              ->update('_buses');
  }

  public function delete_bus($serial){
    return $this->db->where('bus_id', $serial)->delete('_buses');
  }

  public function add_bus(){
    $data = array(
              'org_id' => $this->session->serial,
              'num_seat' => $this->input->post('no_seats'),
              'identity' => $this->input->post('identity'),
              'num_plate' => $this->input->post('num_plate'),
              'has_ac' =>( (bool)$this->input->post('ac') )
            );
      return $this->db->insert('_buses',$data);
  }

  public function add_route(){
    $data = array(
              'name' => $this->input->post('from')." <> ".$this->input->post('to'),
              'days_active' => implode(',',$this->input->post('days')),
              'hours' => $this->input->post('hours'),
              'bus_id' => $this->input->post('bus'),
              'price' => $this->input->post('price'),
              'org_id' => $this->session->serial,
              'take_off' => $this->input->post('from'),
              'take_time' => $this->input->post('take_time'),
              'dept_term' => $this->input->post('dept_term'),
              'arr_term' => $this->input->post('arr_term'),
              'return_time' => $this->input->post('ret_time')
            );

    return $this->db->insert('_routes', $data);
  }


  public function delete_route($serial){
    return $this->db->where('id', $serial)->delete('_routes');
  }

  public function get_routes(){
    return  $this->db->where('org_id', $this->session->serial)->get('_routes')->result();
  }

  public function get_route($serial){
    return $this->db->where('id', $serial)->get('_routes')->row();
  }

  public function update_route(){
    $this->db->set('bus_id', $this->input->post('bus'));
    $this->db->set('hours', $this->input->post('hours'));
    $this->db->set('days_active', implode(',',$this->input->post('days')));
    $this->db->set('price', $this->input->post('price'));
    $this->db->set('take_time', $this->input->post('take_time'));
    $this->db->set('return_time', $this->input->post('ret_time'));
    return  $this->db->where('id', $this->input->post('id'))->update('_routes');
  }

  public function get_booked_passengers($list){
    return  $this->db->order_by('has_paid', 'DESC')
                    ->where("route = (SELECT _bookings.route FROM _bookings  WHERE _bookings.serial = {$list})")
                    ->where("travel_from = (SELECT _bookings.travel_from FROM _bookings  WHERE _bookings.serial = {$list})")
                    ->where("travel_date = (SELECT _bookings.travel_date FROM _bookings  WHERE _bookings.serial = {$list})")
                    ->get('_bookings')
                    ->result();
  }

  public function get_today_accounts(){
    return $this->db->where('org_id', $this->session->serial)
                    ->where('date', date('j F Y'))
                    ->get('_accounts')->result();
  }

  public function get_month_accounts(){
    return $this->db->group_by("MONTH(date)")
                    ->order_by('date DESC')
                    ->select('date as period, sum(amount) as amount, EXTRACT(YEAR_MONTH FROM date) as time')
                    ->where('org_id', $this->session->serial)
                    ->get('_accounts')
                    ->result();
  }

  public function get_account_details($type, $time){
    switch ($type) {
      case 'month':
          //  $time = substr_replace($time, ',', 4,0);
            return $this->db->limit(10, $this->uri->segment(5))
                            ->order_by('date DESC')
                            ->select('date as period, amount')
                            ->where("MONTH(date) = ".substr($time,4,2))
                            ->where("YEAR(date) = ".substr($time,0,4))
                            ->where('org_id', $this->session->serial)
                            ->get('_accounts')
                            ->result();
        break;
      case 'year':
        return $this->db->limit(10, $this->uri->segment(5))
                        ->order_by('date DESC')
                        ->select('date as period, amount')
                        ->where("YEAR(date) = {$time}")
                        ->where('org_id', $this->session->serial)
                        ->get('_accounts')
                        ->result();
    }
  }

  public function get_total_details($type, $time){
    switch ($type) {
      case 'month':
          //  $time = substr_replace($time, ',', 4,0);
            return $this->db->order_by('date DESC')
                            ->select('date as period, amount')
                            ->where("MONTH(date) = MONTH($time)")
                            ->where("YEAR(date) = YEAR($time)")
                            ->where('org_id', $this->session->serial)
                            ->get('_accounts')
                            ->num_rows();
        break;
      case 'year':
        return $this->db->order_by('date DESC')
                      ->select('date as period, amount')
                      ->where("YEAR(date) = {$time}")
                      ->where('org_id', $this->session->serial)
                      ->get('_accounts')
                      ->num_rows();
    }
  }

  public function get_year_accounts(){
    return $this->db->group_by("YEAR(date)")
                    ->order_by('date DESC')
                    ->select('date as period, sum(amount) as amount, EXTRACT(YEAR FROM date) as time')
                    ->where('org_id', $this->session->serial)
                    ->get('_accounts')
                    ->result();
  }

  public function get_receivers($type, $code){
    switch ($type) {
      case 'group':
            return $this->db->where('group_code', $code)->get('_bookings')->result();
        break;
      case 'individual':
            return $this->db->where('book_code', $code)->get('_bookings')->row();
        break;
    }
  }

  

}

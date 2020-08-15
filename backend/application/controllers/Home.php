<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $cities =  array(
                    '0' => 'Select City',
                    'Aboso' => 'Aboso','Aburi' => 'Aburi',  'Accra' => 'Accra',
                    'Adenta East' => 'Adenta East', 'Aflao' => 'Aflao',
                    'Agogo' => 'Agogo','Akim Oda' => 'Akin Oda',
                    'Akim Swedru' => 'Akim Swedru',   'Akosombo' => 'Akosombo',
                    'Akropong' => 'Akropong','Akwatia' => 'Akwatia',
                    'Anloga' => 'Anloga', 'Anomabu' => 'Anomabu','Apam' => 'Apam',
                    'Asamankese' => 'Asamankese','Ashiaman' => 'Ashiaman',
                    'Axim' => 'Axim','Banda Ahenkro' => 'Banda Ahenkro',
                    'Bawku' => 'Bawku', 'Bechem' => 'Bechem','Begoro' => 'Begoro',
                    'Bekwai' => 'Bekwai','Berekum' => 'Berekum','Bibiani' => 'Bibiani',
                    'Bolgatanga' => 'Bolgatanga','Cape Coast' => 'Cape Coast',
                    'Dome' => 'Dome','Effiakuma' => 'Tarkwa',
                    'Ejura' => 'Ejura','Elmina' => 'Elmina',  'Foso' => 'Foso',
                    'Gbawe' => 'Gbawe','Ho' => 'Ho', 'Hohoe' => 'Hohoe',
                    'Japekrom' => 'Japekrom','Kade' => 'Kade','Keta' => 'Keta',
                    'Kete-Krachi' => 'Kete-Krachi','Kibi' => 'Kibi',
                    'Kintampo' => 'Kintampo','Kintampo' => 'Kintampo',
                    'Koforidua' => 'Koforidua','Konongo' => 'Konogo','Kpandae' => 'Kpandae',
                    'Kpandu' => 'Kpandu','Kumasi' => 'Kumasi','Lashibi' => 'Lashibi',
                    'Madina' => 'Madina','Mampong' => 'Mampong','Mpraeso' => 'Mpraeso',
                    'Mumford' => 'Mumford','Navrongo' => 'Navrongo','New Town' => 'New Town',
                    'Nkawkaw' => 'Nkawkaw','Nkwanta' => 'Nkwanta',
                    'Nsawam' => 'Nsawam','Nungua' => 'Nungua',
                    'Nyakrom' => 'Nyakrom','Obuasi' => 'Obuasi',
                    'Odunponkpehe' => 'Odunponkpehe','Offin' => 'Offin',
                    'Prestea' => 'Prestea','Salaga' => 'Salaga',
                    'Saltpond' => 'Saltpond','Savelugu' => 'Savelugu','Shama' => 'Shama',
                    'Somanya' => 'Somanya','Suhum' => 'Suhum','Sunyani' => 'Sunyani',
                    'Swendru' => 'Swendru','Tafo' => 'Tafo','Taifa' => 'Taifa',
                    'Takoradi' => 'Takoradi','Tamale' => 'Tamale','Techiman' => 'Techiman',
                    'Tema' => 'Tema','Teshie' => 'Teshie','Wa' => 'Wa',
                    'Wenchi' => 'Wenchi','Winneba' => 'Winneba','Yendi' => 'Yendi'
        );
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
		public function __construct(){
			 parent :: __construct();
			 $this->load->model('dbcontrol');
			 $this->load->library('session');
		 }
		public function index()
		{
			$serial = get_cookie('serial');
			if ($serial != NULL)
				redirect(site_url('home/home'));
			elseif($this->session->has_userdata('serial'))
				redirect(site_url('home/home'));
			else
				redirect(site_url('home/login'));
		}



		public function home(){
			if ($this->is_alive()){
				$config['base_url'] = site_url("home/home");
				$config['total_rows'] = $this->dbcontrol->get_travelling_today(TRUE);
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
				$data['booked'] = $this->dbcontrol->get_bookings();
				$data['amount'] = $this->dbcontrol->get_amount_made_today();
				$data['title']  = 'Busman | Dashboard';
				$data['bookings'] = $this->dbcontrol->get_travelling_today();
				load_view('head','base1','foot', $data);
			}
		}

		public function today_bookings(){
			if ($this->is_alive()){
				$config['base_url'] = site_url("home/today_bookings");
				$config['total_rows'] = $this->dbcontrol->get_today_bookings(TRUE);
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
				$data['title']  = 'Busman | Today bookings';
				$data['bookings'] = $this->dbcontrol->get_today_bookings();
				load_view('head','bookings','foot', $data);
			}
		}

		public function month_bookings(){
			if ($this->is_alive()){
				$config['base_url'] = site_url("home/month_bookings");
				$config['total_rows'] = $this->dbcontrol->get_month_bookings(TRUE);
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
				$data['title']  = 'Busman | Month Bookings';
				$data['bookings'] = $this->dbcontrol->get_month_bookings();
				load_view('head','bookings','foot', $data);
			}
		}

		public function finetune(){
			$this->load->database();
			$notes = $this->db->where('serial > 1986')->get('_bookings')->result();
//			$notes = $this->db->select('book_date, CAST(price as INT) as price,org_id')->where('has_paid', TRUE)->get('_bookings')->result();

			$count = NULL;
			foreach ($notes as $note){
				 $route = $this->db->select('name,take_time,return_time')->where('_routes.id', $note->route)->get('_routes')->row();
				 $routes = preg_split('/ <> /', $route->name);

				 $from_index = mt_rand(0,1);
				 $to_index = $from_index == 1 ? 0 : 1;

				 $dept = $to_index == 0 ? $route->take_time : $route->return_time;
				 $this->db->set('travel_to', $routes[$to_index])
				 					->set('travel_from', $routes[$from_index])
									->set('departure', $dept)
									->set('pay_token', $this->GUID())
									->where('serial', $note->serial)
									->update('_bookings');
				// $this->db->insert('_accounts', array('amount' => $note->price, 'date' => $note->book_date, 'org_id' => $note->org_id));
				echo ++$count.'<br/>';
			}
		}

//===========================================ENTRY AND EXIT============================================================
		public function login(){
			load_view(NULL,'login', NULL);
		}

		public function signup(){
			$this->load->view('signup');
		}

		public function register(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('name', 'Name', "required|regex_match[/^([a-zA-Z'-\.]+\s)*[\sa-zA-Z'-.]+$/]");
			$this->form_validation->set_rules('password', 'Passwords', 'required');
			$this->form_validation->set_rules('passconf', 'Passwords', 'required|matches[password]');
			$this->form_validation->set_rules('phone', 'Phone', "required|regex_match[/\d{10}/]");
			$this->form_validation->set_message('matches', '{field} do not match');

			if ($this->form_validation->run() === FALSE){
				$this->load->view('signup');
			}else{
				if ($this->dbcontrol->register()){
					$this->send_activation(TRUE);
					$this->try_login("<p class='alert alert-info'>Registration Complete");
				}else{
					$this->signup();
				}
			}
		}

		public function try_login($message = 'Invalid Username'){
			if ($this->dbcontrol->email_exists($this->input->post('email'))){
				if ($this->dbcontrol->pass_match($this->input->post('email'),$this->input->post('password'))){
					$user = $this->dbcontrol->get_user_by_email($this->input->post('email'));
					if ($this->input->post('checkbox'))
							set_cookie('serial', $user->org_id);

					$this->session->set_userdata('serial', $user->org_id);

					if ($user->is_activated){
						redirect('home/home');
					}else{
						$data['linked'] = FALSE;
						$data['title'] = 'Inactivated Account';
						$data['class'] = 'alert alert-info';
						$data['message'] = "You have not activated your account yet. Please check <strong><u>{$user->email}</u></strong> for activation link
																or click the <a class='btn btn-success' href='".site_url('home/send-activation')."'>Resend</a>
																button to resend link to your email address";
						$this->load->view('alert', $data);
					}
				}else{
					$data['message'] = "<p class='alert alert-danger'>Invalid Password</p>";
					$this->load->view('login',$data);
				}
			}else{
				$data['message'] = "<p class='alert alert-danger'>$message</p>";
				$this->load->view('login', $data);
			}
		}


		public function logout(){
			$this->session->unset_userdata('serial');
			delete_cookie('serial');
			redirect(site_url('home/login'));
		}
//=========================================END ENTRY AND EXIT=======================================================

//========================================ACTIVATION================================================================

		public function send_activation($generate = FALSE){
			$code = $this->dbcontrol->generate_code($generate);
	 		$email = $generate ? $this->input->post('email') : $this->dbcontrol->get_user()->email;
			if ($code){
					$data['title'] = 'Activation link sent';
					$data['linked'] = FALSE;
					$data['class'] = 'class class-primary';
					$message="Hello customer, click the button <a class='btn btn-default' href='".site_url("home/activate/{$code}")."'>
														Activate</a> visit link to activated your account";
					$data['message'] = "Activation code sent to your email , <strong>{$email}</strong>. Check to activate your account";

					$this->load->library('email');
					$this->email->from('admin@busmangh.com')
											->to($email)
											->subject('ACTIVATE ACCOUNT')
											->message($message);
											->send();
					$data['linked'] = FALSE;
					$generate ? NULL : $this->load->view('alert', $data);
			}else{
				$this->send_activation();
			}
		}

		public function activate($hash){
			$this->dbcontrol->activate_account($hash) ? $this->try_login('Account Activated, Login') : $this->try_login('Account Activation Failed');
		}
//==============================================END ACTIVATION===================================================================================

//========================================BUSES=================================================================
		public function buses(){
			if ($this->is_alive()){
				$data['title'] = 'Busman | My Buses';
				$data['buses'] = $this->dbcontrol->get_buses();
				load_view('head','buses','foot', $data);
			}
		}
		public function new_bus(){
			if ($this->is_alive()){
				$data['title'] = 'Busman | New Bus';
				load_view('head','new_bus','foot', $data);
			}
		}

		public function remove_bus($serial){
			if ($this->dbcontrol->delete_bus($serial)){
				$data['message'] = "<p class='alert alert-warning'>Bus has been deleted from your list</p>";
				$data['title'] = 'Busman | My Buses';
				$data['buses'] = $this->dbcontrol->get_buses();
				load_view('head','buses','foot', $data);
			}else{
				$data['message'] = "<p class='alert alert-info'>Bus could not be deleted from your list</p>";
				$data['title'] = 'Busman | My Buses';
				$data['buses'] = $this->dbcontrol->get_buses();
				load_view('head','buses','foot', $data);
			}
		}

		public function delete_bus($serial){
			if ($this->is_alive()){
				$data['class'] = "alert alert-danger";
				$data['title'] = "Delete Bus ?";
				$data['linked'] = TRUE;
				$data['message'] = "Are you sure you want to delete this bus ? <br/> <a href='".site_url('home/remove_bus/'.$serial)."'
				 										class='btn btn-danger'>Yes</a>| <a href='".site_url('home/buses')."' class='btn btn-default'>No</a>";
				$this->load->view('alert', $data);
			}
		}

		public function add_bus(){
			if ($this->dbcontrol->add_bus()){
				$data['message'] = "<p class='alert alert-success'>New Bus has been added to your list</p>";
				$data['title'] = 'Busman | My Buses';
				$data['buses'] = $this->dbcontrol->get_buses();
				load_view('head','buses','foot', $data);
			}else{
				$data['message'] = "<p class='alert alert-danger'>Oops ! Error adding bus to the list</p>";
				$data['title'] = 'Busman | My Buses';
				$data['buses'] = $this->dbcontrol->get_buses();
				load_view('head','buses','foot', $data);
			}
		}

		public function edit_bus($serial){
			if ($this->is_alive()){
				$data['title'] = 'Busman | Edit Bus';
				$data['bus'] = $this->dbcontrol->get_bus($serial);
				load_view('head','edit_bus','foot', $data);
			}
		}

		public function update_bus(){
			if ($this->dbcontrol->update_bus()){
				$data['message'] = "<p class='alert alert-success'>Changes have been made</p>";
				$data['title'] = 'Busman | My Buses';
				$data['buses'] = $this->dbcontrol->get_buses();
				$data['serial'] = $this->session->serial;
				load_view('head','buses','foot', $data);
			}else{
				$data['message'] = "<p class='alert alert-danger'>Oops ! Could not make changes</p>";
				$data['title'] = 'Busman | My Buses';
				$data['buses'] = $this->dbcontrol->get_buses();
				$data['serial'] = $this->session->serial;
				load_view('head','buses','foot', $data);
			}
		}
//========================================END BUSES=============================================


//=====================================ROUTES=================================================
		public function routes(){
				if ($this->is_alive()){
					$data['title'] = 'Busman | Routes';
					$data['routes'] = $this->dbcontrol->get_routes();
					load_view('head','routes','foot',$data);
				}
		}

		public function new_route(){
			if ($this->is_alive()){
				$data['title'] = 'Busman | New Routes';
				$data['cities'] = $this->cities;
				$data['buses'] = $this->dbcontrol->unassigned_buses();
				load_view('head','new_route','foot',$data);
			}
		}

		public function add_route(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('from', 'Cities','callback_required|callback_is_different');
			$this->form_validation->set_message('required', 'Please select  %s');
			$this->form_validation->set_message('is_different', 'Please select differenct %s');
			$this->form_validation->set_rules('days', 'Days','callback_is_empty');
			$this->form_validation->set_message('is_empty', 'Please choose at least one day');
			$this->form_validation->set_rules('hours', 'Hours', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			$this->form_validation->set_rules('take_time', 'Take off time', 'required');
			$this->form_validation->set_rules('ret_time', 'Return time', 'required');

			if ($this->form_validation->run() === FALSE){
				$data['title'] = 'Busman | New Routes';
				$data['cities'] = $this->cities;
				$data['buses'] = $this->dbcontrol->get_buses();
				load_view('head','new_route','foot',$data);
			}else{
				if ($this->dbcontrol->add_route()){
					$data['message'] = "<div class='alert alert-success'>Route added Successfully</div>";
					$data['title'] = 'Busman | Routes';
					$data['routes'] = $this->dbcontrol->get_routes();
					load_view('head','routes','foot',$data);
				}else{
					$data['message'] = "<div class='alert alert-danger'>Oops ! Route could not be added to database</div>";
					$data['title'] = 'Busman | Routes';
					$data['routes'] = $this->dbcontrol->get_routes();
					load_view('head','routes','foot',$data);
				}
			}
		}

		public function delete_route($serial){
			$data['class'] = "alert alert-danger";
			$data['title'] = "Delete Route ?";
			$data['linked'] = TRUE;
			$data['message'] = "Are you sure you want to delete this route ? <br/>
												<a href='".site_url('home/remove_route/'.$serial)."' class='btn btn-danger'>Yes</a>| <a href='".site_url('home/routes')."
												' class='btn btn-default'>No</a>";
			$this->load->view('alert',$data);
		}

		public function remove_route($serial){
			if ($this->dbcontrol->delete_route($serial)){
				$data['message'] = "<p class='alert alert-warning'>Route has been deleted from your list</p>";
				$data['title'] = 'Busman | My Routes';
				$data['routes'] = $this->dbcontrol->get_routes();
				load_view('head','routes','foot', $data);
			}else{
				$data['message'] = "<p class='alert alert-info'>Route could not be deleted from your list</p>";
				$data['title'] = 'Busman | My Routes';
				$data['routes'] = $this->dbcontrol->get_routes();
				load_view('head','routes','buses','foot', $data);
			}
		}

		public function edit_route($serial){
			if ($this->is_alive()){
				$data['route'] = $this->dbcontrol->get_route($serial);
				$data['buses'] = $this->dbcontrol->get_buses();
				$data['title'] = 'Busman | Edit Route';
				load_view('head','edit_route','foot',$data);
			}
		}

		public function update_route(){
			if($this->dbcontrol->update_route()){
				$data['message'] = "<div class='alert alert-success'>Route Updated Successfully</div>";
				$data['title'] = 'Busman | Routes';
				$data['routes'] = $this->dbcontrol->get_routes();
				load_view('head','routes','foot',$data);
			}else{
				$data['message'] = "<div class='alert alert-danger'>Oops ! Route could not be updated</div>";
				$data['title'] = 'Busman | Routes';
				$data['routes'] = $this->dbcontrol->get_routes();
				load_view('head','routes','foot',$data);
			}
		}

//====================================END ROUTES===============================================================

//=====================================PASSENGERS==============================================================

		public function passengers($list){
			if($this->is_alive()){
				$data['title'] = 'Busman | Passengers';
				$data['passengers'] = $this->dbcontrol->get_booked_passengers($list);
				load_view('head','passengers','foot',$data);
			}
		}

		public function message($type, $code){
			if ($this->is_alive()){
				$data['title'] = 'Busman | Send Message';
				$data['list'] = $this->dbcontrol->get_receivers($type, $code);
				load_view('head', 'email', 'foot', $data);
			}
		}

		public function mail(){
			if($this->is_alive()){
				$list = $this->input->post('list');
				$this->load->library('email');
				$this->email->from('admin@busmangh.com', 'Busman Admin')
										->to(array_column($list, 'email'))
										->subject($this->input->post('subject'))
										->message($this->input->post('message'))
										->send();

				$data['title'] = "Busman | Passengers";
				$data['message'] = "<span class='alert alert-success'>Message Sent</span>";
				load_view('head','passengers', 'foot', $data);
			}
		}

//=============================================ACCOUNTS==================================================================
		public function account_mon(){
			if($this->is_alive()){
				$data['title'] = 'Monthly Account';
				$data['case'] = 'month';
				$data['accounts'] = $this->dbcontrol->get_month_accounts();
				load_view('head', 'accounts','foot', $data);
			}
		}

		public function account_year(){
			if($this->is_alive()){
				$data['title'] = 'Yearly Account';
				$data['case'] = 'year';
				$data['accounts'] = $this->dbcontrol->get_year_accounts();
				load_view('head', 'accounts','foot', $data);
			}
		}

		public function account_details($type, $time){
			if ($this->is_alive()){
				$config['base_url'] = site_url("home/account_details/{$type}/{$time}");
				$config['total_rows'] = $this->dbcontrol->get_total_details($type, $time);
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$data['pagination'] = $this->pagination->create_links();
				$data['title'] = 'Account Details';
				$data['accounts'] = $this->dbcontrol->get_account_details($type, $time);
				load_view('head', 'acc_details', 'foot', $data);
			}
		}

//==================================================END ACCOUNTS========================================


		function is_alive(){
			if ($this->session->has_userdata('serial')){
				return TRUE;
			}else{
				$this->try_login('Login session Expired');
			}
		}

		function required(){
			return ! ($this->input->post('from') == '0' OR $this->input->post('to') == '0');
		}

		function is_different(){
			return $this->input->post('from') != $this->input->post('to');
		}

		function is_empty(){
			return ! empty($this->input->post('days'));
		}

		function GUID(){
			 if (function_exists('com_create_guid') === true)
			 {
					 return trim(com_create_guid(), '{}');
			 }

			 return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	 }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $cities = array(
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
		}

		public function index()
		{
			$data['title'] = 'Busman | Home';
			$data['cities'] = $this->cities;
			load_view('head','home','foot', $data);
		}

		public function signup(){
			$data['title'] ='Busman | Signup';
			load_view('head_1','signup','foot', $data);
		}

		public function sign_up(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', "trim|required|regex_match[/^([a-zA-Z'-\.]+\s)*[\sa-zA-Z'-.]+$/]");
			$this->form_validation->set_rules('email', 'Email', "trim|required|valid_email");
			$this->form_validation->set_rules('mobile', 'Phone number', "trim|required|numeric|exact_length[10]");
			$this->form_validation->set_rules('password','Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('repass', 'Confirm Password','trim|required|callback_matches_pass');
			$this->form_validation->set_message('matches_pass', 'Passswords do not match');
			$this->form_validation->set_message('matches', 'Please enter a valid %s');


			if ($this->form_validation->run() === FALSE){
				$data['title'] ='Busman | Signup';
				load_view('head_1','signup','foot', $data);
			}else{
					$hash = generate_hash();
			/*		$e_link = site_url('home/confirm/?email='.$this->input->post('email').'&hash='.$hash);
					$message = "<!DOCTYPE html><html><body>
											<p>Please click the link below to comlete your registration</p>
											<p>{unwrap}$link{/unwrap}</p></body></html>
											";
					$config = array('type' => 'html');
					$this->load->library('email');
					$this->email->initialize($config);
					$this->from('orv.guson@gmail.com', 'Admin')->to($this->input->post('email'))->subject('Activation Link');
					$this->message($message);
					if ($this->email->send()){

					}*/
					if ($this->dbcontrol->save_org($hash)){
						$data['title'] = 'Busman | Feedback';
						$data['message'] = 'Registration complete click below to login';
						$data['url'] = 'http://localhost/busman';
						$data['word'] = 'Login';
						load_view('head','feedback','foot',$data);
					}else{
						$data['title'] = 'Busman | Feedback';
						$data['message'] = 'OOps! Registration could not be completed.';
						$data['url'] = site('home/signup');
						$data['word'] = 'Try again';
						load_view('head_1','feedback','foot',$data);
					}
			}
		}

		public function search(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('city_from','Cities', 'callback_chosen');
			$this->form_validation->set_rules('date', 'Date', 'required');
			$this->form_validation->set_message('chosen', 'Please select your location and destination');
			if ($this->form_validation->run() === FALSE){
				$data['title'] = 'Busman | Home';
				$data['cities'] = $this->cities;
				load_view('head','home','foot', $data);
			}else{
				$data['variables'] = array(
					'from' => $this->input->post('city_from'),
					'to' => $this->input->post('city_to'),
					'date' => $this->input->post('date')
				);
				$data['title'] = 'Busman | Search Result';
				$data['routes'] = $this->dbcontrol->find_buses();
				load_view('head_1', 'search', 'foot',$data);
			}
		}

		public function book(){
			$data['variables'] = $this->input->post('variables');
			$data['title'] = 'Busman | Book';
			load_view('head_1','book','foot', $data);
		}

		public function make_payment(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', "trim|required|regex_match[/^([a-zA-Z'-\.]+\s)*[\sa-zA-Z'-.]+$/]");
			$this->form_validation->set_message('regex_match', 'Please Enter a valid %s');
			$this->form_validation->set_rules('email', 'Email', "trim|required|valid_email");
			$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|numeric|exact_length[10]');

			if ($this->form_validation->run() === FALSE){
				$data['variables'] = $this->input->post('variables');
				$data['title'] = 'Busman | Book';
				load_view('head_1','book','foot', $data);
			}else{
					$variables = $this->input->post('variables');
					$variables['full_name'] = $this->input->post('name');
					$variables['email'] =$this->input->post('email');
					$variables['phone'] = $this->input->post('phone');
					$data['variables'] =  $variables;
					load_view(NULL,'pay',NULL,$data);
			}
		}
		public function pay_by_slyde(){
				$variables = $this->input->post('variables');
				$params = array(
					'email' => 'thisisobt@gmail.com',
					'key' => '1482277768375',
					'price' => $variables['price'],
					'desc' => 'Online Bus Ticket',
					'cust_name' => $variables['full_name'],
					'cust_mail' => $variables['email'],
					'cust_mobile' => $this->input->post('mobile'),
				);
				$this->load->library('slydepay');
				$result = $this->slydepay
					->create_token('thisisobt@gmail.com','1482277768375',$variables['price'],$this->GUID(),'Online Bus Ticket',$variables['full_name'],$variables['email'],$this->input->post('mobile'));
				$token = $result->result->payToken;
				$code = $result->result->paymentCode;
				$results = $this->slydepay
							->send_user_bill('thisisobt@gmail.com','1482277768375',$variables['price'],$token,$code,'sLYDE PAY',$variables['full_name'],$variables['email'],$this->input->post('mobile'));
				print_r($results);
		}
		public function pay_by_mobile(){
			$variables = $this->input->post('variables');
			$params = array(
				'email' => 'thisisobt@gmail.com',
				'key' => '1482277768375',
				'price' => $variables['price'],
				'desc' => 'Online Bus Ticket',
				'cust_name' => $variables['full_name'],
				'cust_mail' => $variables['email'],
				'cust_mobile' => $this->input->post('mobile'),
			);
			$this->load->library('slydepay');
			$result = $this->slydepay
				->create_token('thisisobt@gmail.com','1482277768375',$variables['price'],$this->GUID(),'Online Bus Ticket',$variables['full_name'],$variables['email'],$this->input->post('mobile'));
				$result = json_decode($result);
			$token = $result->result->payToken;
			$code = $result->result->paymentCode;
			$results = $this->slydepay
						->send_user_bill('thisisobt@gmail.com','1482277768375',$variables['price'],$token,$code,'MTN Mobile Money',$variables['full_name'],$variables['email'],$this->input->post('mobile'));
			print_r($results);
			//print "Paytoken :".$result->result ;EW 
		}

		function matches_pass(){
			return $this->input->post('password') === $this->input->post('repass');
		}

		function chosen(){
				return ( $this->input->post('city_to') !== '0' && $this->input->post('city_from') !== '0' &&
								$this->input->post('city_from') !==  $this->input->post('city_to') );

		}

		function GUID()
			 {
					 if (function_exists('com_create_guid') === true)
					 {
							 return trim(com_create_guid(), '{}');
					 }

					 return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
			 }
}

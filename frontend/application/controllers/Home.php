<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


				public function __construct(){
					parent :: __construct();
					$this->load->model('dbcontrol');
				}
				public function index(){
			                $this->load->model('regions');
			                $data['cities'] = $this->regions->get_cities();
			                $this->load->view('head');
											$this->load->view('home', $data);
			                $this->load->view('foot');
				}

        public function signup(){
            $this->load->model('regions');
            $data['regions'] = $this->regions->get_regions();
            $this->load->view('head_1', $data);
            $this->load->view('signup');
            $this->load->view('foot');
        }

				public function fix(){
					$this->load->database();
					$count =NULL;
					$users  =  $this->db->get('_accounts')->result();
					$orgs = array('ORG_101', 'ORG_102', 'ORG_103', 'ORG_104', 'ORG_105', 'ORG_106', 'ORG_107', 'ORG_108', 'ORG_109');
					foreach ($users as $user){
						$id = random_element($orgs);
						//$password = password_hash('Password', PASSWORD_DEFAULT);
						//$org = mt_rand(1478840400,1510376400);
						$this->db->query("UPDATE _accounts SET `org_id` =  '{$id}' WHERE id = $user->id");
						echo " ++$count <BR/>";
					}
				}

        public function register(){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<p class="error">','</p>');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('city', 'City', 'required|alpha');
            $this->form_validation->set_rules('name', 'Name', 'required|callback_isName');
            $this->form_validation->set_rules('password', 'Passwords', 'required');
            $this->form_validation->set_rules('repass', 'Passwords', 'required|matches[password]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|callback_isNumber');
            $this->form_validation->set_rules('region', 'Region', 'callback_isSelected');
            $this->form_validation->set_message('isSelected', 'Please select from {field}');
            $this->form_validation->set_message('isName', 'Please enter a valid name');
            $this->form_validation->set_message('isNumber', 'Please enter a valid phone number');
            $this->form_validation->set_message('alpha', '{param} is not a valid city');
            $this->form_validation->set_message('matches', '{field} do not match');

            if ($this->form_validation->run() === FALSE){
                $this->load->model('regions');
                $data['regions'] = $this->regions->get_regions();
                $this->load->view('head_1');
                $this->load->view('signup',$data);
                $this->load->view('foot');
            }else{
                $this->load->model('dbcontrol');
                if ($this->dbcontrol->register()){
                    $this->signin();
                }else{
                    $this->load->model('regions');
                    $data['regions'] = $this->regions->get_regions();
                    $this->load->view('head_1');
                    $this->load->view('signup',$data);
                    $this->load->view('foot');
                }
            }

        }

        public function signin(){
            $this->load->view('login');
        }

        public function login(){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<p class="error">','</p>');
            $this->form_validation->set_rules('password', 'Password', 'callback_verify');
            $this->form_validation->set_message('verify', 'Invalid Login Credentials');
            if ($this->form_validation->run() === FALSE){
                $this->load->view('login');
            }else{
                $this->index();
            }
        }

        public function search(){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
            $this->form_validation->set_rules('cityto', 'Cities', 'required|callback_chosen');
            $this->form_validation->set_rules('cityfrom', 'Cities', 'required|callback_chosen');
            $this->form_validation->set_rules('date', 'Date', 'required|callback_chosenDate');
            $this->form_validation->set_message('chosen', 'Please Select Your Departure and Arrival cities');
            $this->form_validation->set_message('chosenDate', 'Please select a valid travel');

            if ($this->form_validation->run() === FALSE){
                $this->load->model('regions');
                $data['cities'] = $this->regions->get_cities();
                $this->load->view('head');
								$this->load->view('home', $data);
                $this->load->view('foot');
            }else{
                $this->load->model('dbcontrol');
                $data['variables'] = array(
                                    'from' => $this->input->post('cityfrom'),
                                    'to' => $this->input->post('cityto'),
                                    'date' => date('Y-m-d', strtotime($this->input->post('date')))
                                    );
                $data['routes'] = $this->dbcontrol->findbus();
                $this->load->view('head_1');
                $this->load->view('search', $data);
                $this->load->view('foot');
            }


        }

        public function book(){

            $data['variables'] = $this->input->post('variables');

            $this->load->view('head_1');
            $this->load->view('book', $data);
            $this->load->view('foot');
        }

				public function agents(){
					$data['agents'] = $this->dbcontrol->get_agents();
					$this->load->view('head');
					$this->load->view('agents', $data);
					$this->load->view('foot');
				}

				public function contact($org_id){
					$data['agent'] = $this->dbcontrol->get_agent_info($org_id);
					$this->load->view('head');
					$this->load->view('contact', $data);
					$this->load->view('foot');
				}

				public function send_mail(){
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<p class="error">','</p>');
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
					$this->form_validation->set_rules('name', 'Name', 'required|callback_isName');
					$this->form_validation->set_message('isName', 'Please enter a valid name');

					if($this->form_validation->run() === FALSE){
						$data['agent'] = $this->dbcontrol->get_agent_info($this->input->post('org_id'));
						$this->load->view('head');
						$this->load->view('contact', $data);
						$this->load->view('foot');
					}else{
						$agent_email = $this->input->post('agent_email');
						$complaint_email = $this->input->post('email');
						$name = $this->input->post('name');
						$message = $this->input->post('message');
						$this->load->library('email');
						$this->email->from($complaint_email, $name)->to($agent_email)->message($message);
						if ($this->email->send()){
							$data['message'] = 'Your message has been sent to the agent';
							$data['url'] = site_url('home/agents');
							$data['link'] = 'GO BACK';
							$this->load->view('head_1');
							$this->load->view('feedback', $data);
							$this->load->view('foot');
						}else{
							$data['message'] = 'We could not relay your message, please try again later.';
							$data['url'] = site_url('home/contact/').$this->input->post('org_id');
							$data['link'] = 'TRY AGAIN';
							$this->load->view('head_1');
							$this->load->view('feedback', $data);
							$this->load->view('foot');
						}
					}
				}

        public function book_info($variables){
                $data['variables'] = $variables;
                $this->load->view('head_1');
                $this->load->view('book_info', $data);
                $this->load->view('foot');
        }


        public function make_payment(){
					$this->load->library('form_validation');
					$this->form_validation->set_rules('name', 'Name', "trim|required|regex_match[/^([a-zA-Z'-\.]+\s)*[\sa-zA-Z'-.]+$/]");
					$this->form_validation->set_message('regex_match', 'Please Enter a valid %s');
					$this->form_validation->set_rules('email', 'Email', "trim|required|valid_email");
					$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|numeric|exact_length[10]');

					if ($this->form_validation->run() === FALSE){
						$data['variables'] = $this->input->post('variables');
						$this->load->view('head_1');
						$this->load->view('book', $data);
						$this->load->view('foot');
					}else{
							$variables = $this->input->post('variables');
							$variables['full_name'] = $this->input->post('name');
							$variables['email'] = $this->input->post('email');
							$variables['mobile'] = $this->input->post('phone');
							$this->load->library('slydepay');
						  $result =	$this->slydepay->create_token('opybee07@gmail.com','1494475170008',$variables['fullprice'],$this->GUID(),'Online Bus Ticket',$variables['full_name'],$variables['email'],$this->input->post('mobile'));
							$result = json_decode($result);
							$token = $result->result->payToken;
							$variables['token'] = $token;
							$link = "https://app.slydepay.com.gh/payLIVE/detailsnew.aspx?pay_token=".$token;

							$this->dbcontrol->enter_bookings($variables) ? redirect($link) : $this->book();
							redirect($link);
					}
				}

					public function confirm_payment(){
						$trans_id = $this->input->get('transac_id');
						$pay_token = $this->input->get('pay_token');
						$customer = $this->input->get('cust_ref');
						$variables = $this->dbcontrol->get_booking_by_token($pay_token);
						$this->load->library('slydepay');
						$result = $this->slydepay->confim_trasaction('opybee07@gmail.com','1494475170008',$variables->price,$customer,$pay_token);
						$result = json_decode($result);
						//print_r($result);
						if ($result->success){
								$this->dbcontrol->confirm_booking($pay_token) ? $this->book_info($variables) : $this->confrim_payment();
						}elseif($result->errorCode === 'ORDER_NOT_PAID'){
								if($this->dbcontrol->confirm_booking($pay_token) ){
										$this->dbcontrol->store_account($variables->org_id, $variables->route);
										$this->book_info($variables);
								}else{
									 $this->confrim_payment();
								}
						}else{
								$this->load->view('head_1');
								$this->load->view('payment_failed');
								$this->load->view('foot');
						}
					}



        public function print_ticket(){
          	$variables = $this->input->post('variables');
						$this->load->library('email');
						$this->email->set_mailtype('html');
						$this->email->from('opybee07@gmail.com', 'Busman')->to($variables['email']);
						$orgname = $this->dbcontrol->get_name($variables->org_id);
						$message = "
												<html>
													<body>
															<p>
																	You have successfully booked your bus with :".$orgname.
																	"Below is your information incase of missing ticket.
																	<ul>
																			<li> Full Name : ".$variables['name']. "</li>
																			<li> Route : ".$variables['travel_from']." to ".$variables['travel_to']." </li>
																			<li> Travelling Date: ".$variables['travel_date'] ." </li>
																			<li> Travel time ".$variables['departure'] ."</li>
																	</ul>
															</p>
													</body>
												</html>
												";
						$this->email->message($message);
						$this->email->send();
            $data['variables'] = $variables ;

						$this->load->library('mypdf');
            $this->mypdf->load_view('ticket', $data);
            $this->mypdf->render();
            $this->mypdf->stream("your_ticket.pdf");

						$this->load->view('head_1');
						$this->load->view('redirect');
						$this->load->view('foot');
        }

				public function redirect(){
					$this->load->view('head_1');
					$this->load->view('redirect');
					$this->load->view('foot');
				}

        // function to check if any dropdown is selected;
        function isSelected(){
            return ($this->input->post('region') !== '0');
        }

        //function to check if is a valid number;
        function isNumber(){
            return is_numeric($this->input->post('phone')) && strlen($this->input->post('phone')) === 10;
        }

        function isName(){
           if( preg_match("/^([a-zA-Z'-\.]+\s)*[\sa-zA-Z'-.]+$/", $this->input->post('name')) )
               return TRUE;
           else
               return FALSE;
        }

        function matches(){
            return ( $this->input->post('password') === $this->input->post('repass') );
        }

        function verify(){
            $this->load->model('dbcontrol');
            if ($this->dbcontrol->username_exists()){
               return $this->dbcontrol->password_match($this->input->post('email'), $this->input->post('password'));
            }else{
                return FALSE;
            }
        }

        function chosenDate(){
            return ($this->input->post('date') !== "dd-mm-yyyy");
        }

        function chosen(){
            return ( $this->input->post('cityto') !== '0' && $this->input->post('cityfrom') !== '0' &&
                    $this->input->post('cityfrom') !==  $this->input->post('cityto') );
        }

				function GUID(){
					 if (function_exists('com_create_guid') === true)
					 {
							 return trim(com_create_guid(), '{}');
					 }

					 return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
			 }
}

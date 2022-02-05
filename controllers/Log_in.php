<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_in extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('email') || $this->session->userdata('level')) {
			redirect('a','refresh');
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('index/head');
			$this->load->view('index/navbar');
			$this->load->view('login/login');
			$this->load->view('index/footer');
			
		} else {
			$email = htmlspecialchars($this->input->post('email', true));
			$password = htmlspecialchars($this->input->post('password', true));

			// check user by email
			$user = $this->db->get_where('account', ['email' => $email])->row_array();

			if ($user) {
				if ($user['status'] == 'active') {
					if (password_verify($password, $user['password'])) {
						$data_sess = [
							'email' => $user['email'],
							'level' => $user['level']
						];
						$this->session->set_userdata($data_sess);
						if ($user['level'] == 'user') {
							redirect('a','refresh');
						} elseif ($user['level'] == 'great_user_admin') {
							redirect('great_admin','refresh'); exit();
						}
					} else {
						echo "<script>
							alert('Password wrong!');
							window.location='".site_url('log_in')."';
						</script>";
						exit(); 
					}
				} else {
					echo "<script>
							alert('your account was not active!');
							window.location='".site_url('log_in')."';
						</script>";
						exit();
				}
			} else {
				echo "<script>
					alert('your account was not found!');
					window.location='".site_url('log_in')."';
				</script>";
				exit();
			}
		}
	}

	public function register()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[account.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('index/head');
			$this->load->view('index/navbar');
			$this->load->view('login/register');
			$this->load->view('index/footer');
			
		} else {
			$email = htmlspecialchars($this->input->post('email', true));
			$password = htmlspecialchars(password_hash($this->input->post('password', true), PASSWORD_DEFAULT));
			
			// data for account
			$data_register = [
				'email' => $email,
				'password' => $password,
				'custom' => 'un_custom',
				'level' => 'user',
				'status' => 'un_active',
				'time' => time() 
			];

			//generate token
			$token = base64_encode(random_bytes(32));

			// data for users_token
			$data_users_token = [
				'email' => $email,
				'token' => $token,
				'status' => 'register',
				'time' => time()
			];

			// insert data to database
			// insert to account
			$this->db->insert('account', $data_register);
			// insert to users_token
			$this->db->insert('users_token', $data_users_token);

			// send veryficaton mail
			$this->_send_mail($data_register, $token);

			// give alert to users
			echo "<script>
					alert('Your account has been register, please check your email for verification!');
					window.location='".site_url('a')."';
				</script>";
			exit();
		}
	}

	private function _send_mail($data_register, $token)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'email.com',
			'smtp_pass' => 'pw',
			'smtp_port' =>  465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from('RShort@verification.com', 'Rshort verification mail');
		$this->email->to($data_register['email']);
		$this->email->subject('Account verification');
		$this->email->message('
			<h1> Veryfication </h1>
			<br><p>Click this link for verification </p><a href="'. base_url() . 'log_in/token_verification?email=' . $data_register['email'] . '&token=' .urlencode($token). '">Activated now!</a></br>
			<br><b><p>This link will expire in 5 minutes</br></b></p>');

		if ($this->email->send()) {
			return true;
		} else {
			// echo $this->email->print_debugger();
			$this->db->delete('account', ['email' => $data_register['email']]);
			$this->db->delete('users_token', ['email' => $data_register['email']]);
			echo "<script> 
					alert('Fail to send verification mail, please try again!');
					window.location='".site_url('log_in/register')."';
				</script>";
			exit();
		}  
	}

	public function token_verification()
	{
		$email = htmlspecialchars($_GET['email']);
		$token = htmlspecialchars($_GET['token']);

		$users = $this->db->get_where('users_token', ['email' => $email])->row_array();


		if ($users) {
			if ($email == $users['email']) {
				if ($token == $users['token']) {
					if (time() - $users['time'] < (60 * 5)) {
						
						$this->db->set('status', 'active');
						$this->db->where('email', $email);
						$this->db->update('account');

						$this->db->delete('users_token', ['email' => $email ]);
						echo "<script>
							alert('Your account has been active, please login!');
							window.location='".site_url('log_in')."';
						</script>";
					} else {
						$this->db->delete('users_token', ['email' => $email]);
						echo "<script> 
								alert('Token expire!');
								window.location='".site_url('a')."';
							</script>";
							exit();
					}
				} else {
					echo "<script> 
							alert('Token failure!');
							window.location='".site_url('a')."';
						</script>";
					exit();
				}
			} else {
				echo "<script> 
					alert('Email not found!');
					window.location='".site_url('a')."';
				</script>";
			exit();
			}
		} else {
			echo "<script> 
					alert('User not found!');
					window.location='".site_url('a')."';
				</script>";
			exit();
		}
	}

	public function forget_password()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if ($this->form_validation->run() == false) {
			
			$this->load->view('index/head');
			$this->load->view('index/navbar');
			$this->load->view('login/forget_password');
			$this->load->view('index/footer');

		} else {

			$email = htmlspecialchars($this->input->post('email', true));
			$check_email = $this->db->get_where('account', ['email' => $email])->row_array();

			if ($check_email) {
				// generate token
				$token = base64_encode(random_bytes(32));

				// data for user token
				$data_users_token = [
					'email' => $email,
					'token' => $token,
					'status' => 'forget password',
					'time' => time()
				];
				// insert data to users_token
				$this->db->insert('users_token', $data_users_token);

				$config = [
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_user' => 'email@gmail.com',
				'smtp_pass' => 'pw',
				'smtp_port' =>  465,
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
				];

				$this->load->library('email', $config);

				$this->email->from('RShort@resetPassword.com', 'Rshort reset password');
				$this->email->to($email);
				$this->email->subject('Reset password');
				$this->email->message('
					<h1> Reset Password </h1>
					<br><p>Click this link for reset your password </p><a href="'. base_url() . 'log_in/reset_password?email=' . $email . '&token=' .urlencode($token). '">Reset now!</a></br>
					<br><b><p>This link will expire in 5 minutes</br></b></p>');

				if ($this->email->send()) {
					echo "<script> 
							alert('Email to reset the password has been sent, check your email!');
							window.location='".site_url('log_in/forget_password')."';
						</script>";
					exit();
				} else {
					echo $this->email->print_debugger();
					$this->db->delete('users_token', ['email' => $data_register['email']]);
					echo "<script> 
							alert('Fail to send verification mail, please try again!');
							window.location='".site_url('log_in/forget_password')."';
						</script>";
					exit();
				}
			} else {
				echo "<script> 
							alert('Your Email Not Registered!');
							window.location='".site_url('log_in/forget_password')."';
						</script>";
					exit();
			}
			  
		}
	}

	public function reset_password()
	{
		$email = htmlspecialchars($_GET['email']);
		$token = htmlspecialchars($_GET['token']);
		$users = $this->db->get_where('users_token', ['email' => $email])->row_array();
		// var_dump($users['token']);
		// echo '<br>';
		// var_dump($token); die;

		if ($token == $users['token']) {
			if ($email == $users['email']) {
				$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
				$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

				if ($this->form_validation->run() == false) {
					$this->load->view('index/head');
					$this->load->view('index/navbar');
					$this->load->view('login/reset_password', $users);
					$this->load->view('index/footer');
				} else {
					$email = htmlspecialchars($this->input->post('email', true));
					$password = htmlspecialchars(password_hash($this->input->post('password', true), PASSWORD_DEFAULT));
					
					// update data
					$this->db->set('password', $password);
					$this->db->where('email', $email);
					$this->db->update('account');
					
					// delete token from users_token
					$this->db->delete('users_token', ['email' => $email ]);

					// set alert to say client 
					echo "<script> 
								alert('Success reset password!');
								window.location='".site_url('log_in')."';
							</script>";
						exit();
				}
			} else {
				redirect('log_in/forget_password','refresh');
			}
		} else {
			redirect('log_in/forget_password','refresh');
		}
	}
}

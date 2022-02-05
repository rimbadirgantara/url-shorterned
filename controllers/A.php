<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A extends CI_Controller {

	public function index() 
	{
		$data['week'] = 'https://api.whatsapp.com/send?phone=0895603196568&text=hi, i want but 1 week package! so... how to pay that?';
		$data['month'] = 'https://api.whatsapp.com/send?phone=0895603196568&text=hi, i want but 1 month package! so... how to pay that?';
		$data['trii_month'] = 'https://api.whatsapp.com/send?phone=0895603196568&text=hi, i want but 3 month package! so... how to pay that?';
		$this->load->view('index/head');
		$this->load->view('index/navbar');
		$this->load->view('index/body', $data);
		$this->load->view('index/footer');
	}	

	public function z()
	{

		$url = $this->uri->segment(3);
		$t = $this->db->get_where('link_free', ['short_link' => $url])->row_array(); 
		
		if ($t['pkg'] == '1_week') {
			// 1 week
			if (time() - $t['waktu'] < (604800 * 1)) // 604800 => 1 week
			{
				if ($t) {
					echo "<script>
							window.location.replace('https://".$t['link']."');
						</script>";
					exit();
				} else {
					echo "<script>
						alert('Link Not Found');
						window.location='".site_url('a')."';
					</script>";
				}
			}  else {
				$this->db->delete('link_free', ['short_link' => $url]);
				echo "<script>
						alert('Link Expired');
						window.location='".site_url('a')."';
					</script>";
			}

		} elseif ($t['pkg'] == '1_month') {
			// 1 month

			if (time() - $t['waktu'] < (604800 * 4)) // 604800 => 1 week
			{
				if ($t) {
					echo "<script>
							window.location.replace('https://".$t['link']."');
						</script>";
					exit();
				} else {
					echo "<script>
						alert('Link Not Found');
						window.location='".site_url('a')."';
					</script>";
				}
			}  else {
				$this->db->delete('link_free', ['short_link' => $url]);
				echo "<script>
						alert('Link Expired');
						window.location='".site_url('a')."';
					</script>";
			}

		} elseif ($t['pkg'] == '3_months') {
			// 3 months

			if (time() - $t['waktu'] < (604800 * 12)) // 604800 => 1 week
			{
				if ($t) {
					echo "<script>
							window.location.replace('https://".$t['link']."');
						</script>";
					exit();
				} else {
					echo "<script>
						alert('Link Not Found');
						window.location='".site_url('a')."';
					</script>";
				}
			}  else {
				$this->db->delete('link_free', ['short_link' => $url]);
				echo "<script>
						alert('Link Expired');
						window.location='".site_url('a')."';
					</script>";
			}


		/// ads on here
		} elseif ($t['status'] == 'un_custom') {
			
			if (time() - $t['waktu'] < (604800 * 1)) // 604800 => 1 minggu
			{
				if ($t) {
					$data['g'] = $t['link'];
					$this->ads($data['g']);
				} else {
					echo "<script>
						alert('Link Not Found');
						window.location='".site_url('a')."';
					</script>";
				}
			}  else {
				$this->db->delete('link_free', ['short_link' => $url]);
				echo "<script>
						alert('Link Expired');
						window.location='".site_url('a')."';
					</script>";
			}
		}

	}
	
	public function ads($g)
	{
		$data['link'] = $g;
		$data['ads'] = $this->db->get('ads')->result_array();
		$data['order_ad'] = 'https://api.whatsapp.com/send?phone=0895603196568&text=hi, i want add my ad on your site';
		$this->load->view('index/head');
		$this->load->view('ads/ads', $data); 
		$this->load->view('index/footer');
	}	

	public function c()
	{

		$link_input = htmlspecialchars($this->input->post('link', true));
		$random_bites = base64_encode(random_bytes(3));
		$data['link'] = $_SERVER['SERVER_NAME']."/short/a/z/".$random_bites;

		// replace string
		$find = ['https://', 'http://'];
		$replace = '';
		$link_input_process = str_replace($find, $replace, $link_input);

		$this->form_validation->set_rules('link', 'Link', 'trim|required|min_length[2]|valid_url');

		if ($this->form_validation->run() == false){
			$this->load->view('index/head');
			$this->load->view('index/navbar');
			$this->load->view('index/body', $data);
			$this->load->view('index/footer'); 
		} else {

			if ($link_input == '') {
				redirect('a','refresh');
				exit();
			} else {
				echo "<script>
						alert('Link Valid A Week');
					</script>";
				
				if ($this->session->userdata('email')) {
					$asdf = [
						'nama' => $this->session->userdata('email'),
						'link' => $link_input_process,
						'short_link' => urlencode($random_bites),
						'status' => 'un_custom',
						'waktu' => time()
					];
					$this->db->insert('link_free', $asdf);
				} else {
					$asdf = [
						'nama' => 'free',
						'link' => $link_input_process,
						'short_link' => urlencode($random_bites),
						'status' => 'un_custom',
						'waktu' => time()
					];
					$this->db->insert('link_free', $asdf);
				}

				$this->load->view('index/head');
				$this->load->view('index/navbar');
				$this->load->view('index/body_links', $data);
				$this->load->view('index/footer');
			}

		}

	}


	public function about()
	{
		$this->load->view('index/head');
		$this->load->view('about/about');
		$this->load->view('index/footer');
	}

	public function contact()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		if ($this->form_validation->run() == false){

		$this->load->view('index/head');
		$this->load->view('index/navbar');
		$this->load->view('contact/contact');
		$this->load->view('index/footer');

		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'subject' => htmlspecialchars($this->input->post('subject', true)),
				'message' => htmlspecialchars($this->input->post('message', true)),
				'waktu' => time()
			];

			$this->db->insert('feedback', $data);
			echo "<script>
					alert('Your Feedback Accept');
					window.location='".site_url('a/contact')."';
				</script>";
		}
	}

	public function customlink_page_user()
	{
		$data['week'] = 'https://api.whatsapp.com/send?phone=0895603196568&text=hi, i want but 1 week package! so... how to pay that?';
		$data['month'] = 'https://api.whatsapp.com/send?phone=0895603196568&text=hi, i want but 1 month package! so... how to pay that?';
		$data['trii_month'] = 'https://api.whatsapp.com/send?phone=0895603196568&text=hi, i want but 3 month package! so... how to pay that?';
		$data['data_user'] = $this->db->get_where('link_free', ['nama' => $this->session->userdata('email')])->result_array();

		// $query = "SELECT * FROM link_free WHERE nama == .$this->session->userdata('email'.";
		// var_dump($data['data_user']); die;

		$this->load->view('index/head');
		$this->load->view('index/navbar');
		$this->load->view('index/body_customlink_page_user', $data);
		$this->load->view('index/footer');
	}

	public function out()
	{
		$data_sess = ['email', 'level'];
		$this->session->unset_userdata($data_sess);
		redirect('a','refresh');
		exit();
	}
}

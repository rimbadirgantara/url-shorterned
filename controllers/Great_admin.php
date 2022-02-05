<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Great_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 'great_user_admin') {
			redirect('a','refresh'); exit();
		}
		$this->load->model('admin_model');
	}

	public function index() 
	{
		// data for side bar
		$data['title']  = 'Rshort Admin';
		$data['sidebar_title'] = 'RShort';
		$data['a'] = $this->uri->segment(1).'/'.$this->uri->segment(2);

		// var_dump($data['sub_menu']); dide;

		$data['email'] = $this->session->userdata('email'); 
		$this->load->view('admin_page/link_source/up_link', $data);
		$this->load->view('admin_page/link_source/navbar');
		$this->load->view('admin_page/link_source/sidebar', $data);
		$this->load->view('admin_page/link_source/blank_page');
		$this->load->view('admin_page/link_source/down_link');
	} 

	public function uncustom() 
	{
		// data for side bar
		$data['title']  = 'Rshort uncustom';
		$data['sidebar_title'] = 'RShort';
		$data['a'] = $this->uri->segment(1).'/'.$this->uri->segment(2);
		$data['uncostum_link'] = $this->db->get_where('link_free', ['status' => 'un_custom'])->result_array();

		$data['email'] = $this->session->userdata('email');
		$this->load->view('admin_page/link_source/up_link', $data);
		$this->load->view('admin_page/link_source/navbar');
		$this->load->view('admin_page/link_source/sidebar', $data); 
		$this->load->view('admin_page/links/uncustom/uncustom');
		$this->load->view('admin_page/link_source/down_link');
	}

	public function uncustom_search()
	{
		if ($this->input->post('submit')) {
			$data['keyword'] = htmlspecialchars($this->input->post('keyword', true));
		} else {
			$data['keyword'] = null;
		}

		// data for side bar
		$data['title']  = 'Rshort uncustom';
		$data['sidebar_title'] = 'RShort';
		$data['a'] = $this->uri->segment(1).'/'.$this->uri->segment(2);
		$data['uncostum_link'] = $this->admin_model->uncustom_search($data['keyword']);

		$data['email'] = $this->session->userdata('email');
		$this->load->view('admin_page/link_source/up_link', $data);
		$this->load->view('admin_page/link_source/navbar');
		$this->load->view('admin_page/link_source/sidebar', $data); 
		$this->load->view('admin_page/links/uncustom/uncustom');
		$this->load->view('admin_page/link_source/down_link');
	}

	public function uncustom_delete_links($id)
	{
		$this->db->delete('link_free', ['id' => $id]);
		echo "<script>
					alert('Delete success');
					window.location='".site_url('great_admin/uncustom')."';
				</script>";
	}

	public function custom_delete_links($id)
	{
		$this->db->delete('link_free', ['id' => $id]);
		echo "<script>
					alert('Delete success');
					window.location='".site_url('great_admin/customlink')."';
				</script>";
	}

	public function customlink() 
	{
		// data for side bar
		$data['title']  = 'Rshort uncustom';
		$data['sidebar_title'] = 'RShort';
		$data['a'] = $this->uri->segment(1).'/'.$this->uri->segment(2);

		// get data from link_free
		$data['custom_link'] = $this->db->get_where('link_free', ['status' => 'custom_link'])->result_array();

		$data['email'] = $this->session->userdata('email');
		$this->load->view('admin_page/link_source/up_link', $data);
		$this->load->view('admin_page/link_source/navbar');
		$this->load->view('admin_page/link_source/sidebar', $data);
		$this->load->view('admin_page/links/customlinks/customlinks');
		$this->load->view('admin_page/link_source/down_link');
	}

	public function custom_search()
	{
		if ($this->input->post('submit')) {
			$data['keyword'] = htmlspecialchars($this->input->post('keyword', true));
		} else {
			$data['keyword'] = null;
		}

		// data for side bar
		$data['title']  = 'Rshort uncustom';
		$data['sidebar_title'] = 'RShort';
		$data['a'] = $this->uri->segment(1).'/'.$this->uri->segment(2);

		// get data from link_free
		$data['custom_link'] = $this->admin_model->custom_search($data['keyword']);

		$data['email'] = $this->session->userdata('email');
		$this->load->view('admin_page/link_source/up_link', $data);
		$this->load->view('admin_page/link_source/navbar');
		$this->load->view('admin_page/link_source/sidebar', $data);
		$this->load->view('admin_page/links/customlinks/customlinks');
		$this->load->view('admin_page/link_source/down_link');
	}

	public function custom_edit_links($id)
	{
		$data['title']  = 'Rshort Admin';
		$data['sidebar_title'] = 'RShort';
		$data['a'] = $this->uri->segment(1).'/'.$this->uri->segment(2);

		// get data from link_free
		$data['link_data'] = $this->db->get_where('link_free', ['id' => $id])->row_array();

		$data['email'] = $this->session->userdata('email');

		// validation rules
		$this->form_validation->set_rules('link_direction', 'Link Direction', 'required|trim');
		$this->form_validation->set_rules('link_short', 'Short Link', 'required|trim');
		$this->form_validation->set_rules('pkg', 'Package Trial', 'required|trim');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('admin_page/link_source/up_link', $data);
			$this->load->view('admin_page/link_source/navbar');
			$this->load->view('admin_page/link_source/sidebar', $data);
			$this->load->view('admin_page/links/customlinks/custom_edit_links');
			$this->load->view('admin_page/link_source/down_link');
		
		} else {
			$package_trial = htmlspecialchars($this->input->post('pkg', true));
			if ($package_trial == '1 Week') {
				$pkg = '1_week';
			} elseif ($package_trial == '1 Month') {
				$pkg = '1_month';
			} elseif ($package_trial == '3 Months') {
				$pkg = '3_months';
			}

			$data = [
				'link'  => htmlspecialchars($this->input->post('link_direction', true)),
				'short_link' => htmlspecialchars($this->input->post('link_short', true)),
				'pkg' => $pkg
			];

			$this->db->where('id', $id);
			$this->db->update('link_free', $data);
			echo "<script>
						alert('Success Update Data');
						window.location='".site_url('great_admin/customlink')."';
					</script>";

		}
	}

	public function custom_add_links()
	{
		$data['title']  = 'Rshort Admin';
		$data['sidebar_title'] = 'RShort';
		$data['a'] = $this->uri->segment(1).'/'.$this->uri->segment(2);

		$data['email'] = $this->session->userdata('email');

		// validation rules
		$this->form_validation->set_rules('nama', 'Name', 'required|trim');
		$this->form_validation->set_rules('link_direction', 'Link Direction', 'required|trim');
		$this->form_validation->set_rules('link_short', 'Short Link', 'required|trim');
		$this->form_validation->set_rules('pkg', 'Package Trial', 'required|trim');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('admin_page/link_source/up_link', $data);
			$this->load->view('admin_page/link_source/navbar');
			$this->load->view('admin_page/link_source/sidebar', $data);
			$this->load->view('admin_page/links/customlinks/custom_add_links');
			$this->load->view('admin_page/link_source/down_link');
		
		} else {
			$package_trial = htmlspecialchars($this->input->post('pkg', true));
			if ($package_trial == '1 Week') {
				$pkg = '1_week';
			} elseif ($package_trial == '1 Month') {
				$pkg = '1_month';
			} elseif ($package_trial == '3 Months') {
				$pkg = '3_months';
			}

			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'link'  => htmlspecialchars($this->input->post('link_direction', true)),
				'short_link' => htmlspecialchars($this->input->post('link_short', true)),
				'status' => 'custom_link',
				'pkg' => $pkg,
				'waktu' => time()
			];

			$this->db->insert('link_free', $data);
			echo "<script>
					alert('Success Add Link');
					window.location='".site_url('great_admin/customlink')."';
				</script>";
		}
	}

	public function user_list()
	{
		// data for side bar
		$data['title']  = 'Rshort User Lists';
		$data['sidebar_title'] = 'RShort';

		// get data from link_free
		$data['user_list'] = $this->db->get_where('account', ['level' => 'user'])->result_array();

		$data['email'] = $this->session->userdata('email');
		$this->load->view('admin_page/link_source/up_link', $data);
		$this->load->view('admin_page/link_source/navbar');
		$this->load->view('admin_page/link_source/sidebar', $data);
		$this->load->view('admin_page/links/user_list/user_list');
		$this->load->view('admin_page/link_source/down_link');
	}

	public function user_list_search()
	{
		if ($this->input->post('submit')) {
			$data['keyword'] = htmlspecialchars($this->input->post('keyword', true));
		} else {
			$data['keyword'] = null;
		}

		// data for side bar
		$data['title']  = 'Rshort User Lists';
		$data['sidebar_title'] = 'RShort';

		// get data from search keyword
		$data['user_list'] = $this->admin_model->data_search_user_list($data['keyword']);

		$data['email'] = $this->session->userdata('email');
		$this->load->view('admin_page/link_source/up_link', $data);
		$this->load->view('admin_page/link_source/navbar');
		$this->load->view('admin_page/link_source/sidebar', $data);
		$this->load->view('admin_page/links/user_list/user_list');
		$this->load->view('admin_page/link_source/down_link');
	}

	public function add_user()
	{
		// data for side bar
		$data['title']  = 'Rshort User Add';
		$data['sidebar_title'] = 'RShort';
		$data['email'] = $this->session->userdata('email');

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[account.email]');
		$this->form_validation->set_rules('link_status', 'link Status', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[8]|matches[password]');

		if ($this->form_validation->run() == false) {

			$this->load->view('admin_page/link_source/up_link', $data);
			$this->load->view('admin_page/link_source/navbar');
			$this->load->view('admin_page/link_source/sidebar', $data);
			$this->load->view('admin_page/links/user_list/user_list_add');
			$this->load->view('admin_page/link_source/down_link');
		
		} else {
			$email = htmlspecialchars($this->input->post('email', true));
			$link_status = htmlspecialchars($this->input->post('link_status', true));
			$status = htmlspecialchars($this->input->post('status', true));
			$password = htmlspecialchars($this->input->post('password', true));
			$password2 = htmlspecialchars($this->input->post('password2', true));

			if ($link_status == 'Un Custom') {
				$link_s = 'un_custom';
			} elseif ($link_status == 'Custom') {
				$link_s = 'custom';
			}

			if ($status == 'Active') {
				$stat = 'active';
			} elseif ($status == 'Un Active') {
				$stat = 'un_active';
			}

			$data = [
				'email' => $email,
				'custom' => $link_s,
				'level' => 'user',
				'status' => $stat,
				'password' =>  htmlspecialchars(password_hash($password2, PASSWORD_DEFAULT)),
				'time' => time()
			];

			$this->db->insert('account', $data);
			echo "<script>
						alert('Success Add User');
						window.location='".site_url('great_admin/user_list')."';
					</script>";
		}
	}

	public function user_edit($id)
	{
		// data for side bar
		$data['title']  = 'Rshort uncustom';
		$data['sidebar_title'] = 'RShort';
		$data['email'] = $this->session->userdata('email');
		$data['data_user'] = $this->db->get_where('account', ['id' => $id])->row_array();

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('link_status', 'link Status', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('admin_page/link_source/up_link', $data);
			$this->load->view('admin_page/link_source/navbar');
			$this->load->view('admin_page/link_source/sidebar', $data);
			$this->load->view('admin_page/links/user_list/user_list_edit');
			$this->load->view('admin_page/link_source/down_link');
		
		} else {
			$email = htmlspecialchars($this->input->post('email', true));
			$link_status = htmlspecialchars($this->input->post('link_status', true));
			$status = htmlspecialchars($this->input->post('status', true));
			$password = htmlspecialchars($this->input->post('password', true));
			$password2 = htmlspecialchars($this->input->post('password2', true));

			if ($link_status == 'Un Custom') {
				$link_s = 'un_custom';
			} elseif ($link_status == 'Custom') {
				$link_s = 'custom';
			}

			if ($status == 'Active') {
				$stat = 'active';
			} elseif ($status == 'Un Active') {
				$stat = 'un_active';
			}

			$data = [
				'email' => $email,
				'custom' => $link_s,
				'status' => $stat,
			];

			$this->db->where('id', $id);
			$this->db->update('account', $data);
			echo "<script>
						alert('Success Edit User');
						window.location='".site_url('great_admin/user_list')."';
					</script>";
		}
	}

	public function user_delete($id)
	{
		$this->db->delete('account', ['id' => $id]);
		echo "<script>
					alert('Delete success');
					window.location='".site_url('great_admin/user_list')."';
				</script>";
	}

	public function ads()
	{
		// data for side bar
		$data['sidebar_title'] = 'RShort';
		$data['title']  = 'Rshort Ads';
		$data['data_ads'] = $this->db->get('ads')->result_array();
		$data['email'] = $this->session->userdata('email'); 
		
		$this->load->view('admin_page/link_source/up_link', $data);
		$this->load->view('admin_page/link_source/navbar');
		$this->load->view('admin_page/link_source/sidebar', $data);
		$this->load->view('admin_page/ads/ads');
		$this->load->view('admin_page/link_source/down_link');
	}

	public function ads_search()
	{
		if ($this->input->post('submit')) {
			$data['keyword'] = htmlspecialchars($this->input->post('keyword', true));
		} else {
			$data['keyword'] = null;
		}

		// data for side bar
		$data['sidebar_title'] = 'RShort';
		$data['title']  = 'Rshort Ads';
		$data['data_ads'] = $this->admin_model->ads_search($data['keyword']);
		$data['email'] = $this->session->userdata('email'); 
		
		$this->load->view('admin_page/link_source/up_link', $data);
		$this->load->view('admin_page/link_source/navbar');
		$this->load->view('admin_page/link_source/sidebar', $data);
		$this->load->view('admin_page/ads/ads');
		$this->load->view('admin_page/link_source/down_link');
	}

	public function add_ads()
	{
		// data for side bar
		$data['sidebar_title'] = 'RShort';
		$data['title']  = 'Rshort Add Ads';
		$data['data_ads'] = $this->db->get('ads')->result_array();
		$data['data_owner'] = $this->db->get('account')->result_array();
		$data['email'] = $this->session->userdata('email'); 

		$this->form_validation->set_rules('owner', 'Owner', 'required|trim');
		$this->form_validation->set_rules('title_ad', 'Title Ad', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$this->form_validation->set_rules('picture_ads', 'Picture Ads', 'trim');
		$this->form_validation->set_rules('time_session', 'Time Sessions', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('admin_page/link_source/up_link', $data);
			$this->load->view('admin_page/link_source/navbar');
			$this->load->view('admin_page/link_source/sidebar', $data);
			$this->load->view('admin_page/ads/add_ads');
			$this->load->view('admin_page/link_source/down_link'); 
		
		} else {
			$owner = htmlspecialchars($this->input->post('owner', true));
			$title_ad = htmlspecialchars($this->input->post('title_ad', true));
			$description = htmlspecialchars($this->input->post('description', true));
			$status = htmlspecialchars($this->input->post('status', true));
			$time_session = htmlspecialchars($this->input->post('time_session', true));
			$file_ad = $_FILES['picture_ads'];
			if ($file_ad = '') {
				echo "<script>
						alert('Please add ad file');
						window.location='".site_url('great_admin/add_ads')."';
					</script>";
			} else {
				// config for library upload
				$config['upload_path'] = './assets/ads';
				$config['allowed_types'] = 'jpg|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('picture_ads')) {
					echo $this->upload->display_errors(); die();
				} else {
					$photo = $this->upload->data('file_name');
					$data = [
						'owner_ad' => $owner,
						'title_ad' => $title_ad,
						'decsription' => $description,
						'status' => $status,
						'pict' => $photo,
						'time_session' => $time_session,
						'time' => time()
					];

					$this->db->insert('ads', $data);
					echo "<script>
								alert('Success Add Ad');
								window.location='".site_url('great_admin/ads')."';
							</script>";
				}
			}
		}
	}

	public function edit_ads($id)
	{
		// data for side bar
		$data['sidebar_title'] = 'RShort';
		$data['title']  = 'Rshort Edit Ads';
		$data['data_ads'] = $this->db->get('ads')->result_array();
		$data['data_owner'] = $this->db->get_where('ads', ['id' => $id])->row_array();
		$data['email'] = $this->session->userdata('email'); 

		$this->form_validation->set_rules('owner', 'Owner', 'required|trim');
		$this->form_validation->set_rules('title_ad', 'Title Ad', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$this->form_validation->set_rules('time_session', 'Time Sessions', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('admin_page/link_source/up_link', $data);
			$this->load->view('admin_page/link_source/navbar');
			$this->load->view('admin_page/link_source/sidebar', $data);
			$this->load->view('admin_page/ads/edit_ads');
			$this->load->view('admin_page/link_source/down_link'); 
		
		} else {
			$owner = htmlspecialchars($this->input->post('owner', true));
			$title_ad = htmlspecialchars($this->input->post('title_ad', true));
			$description = htmlspecialchars($this->input->post('description', true));
			$status = htmlspecialchars($this->input->post('status', true));
			$time_session = htmlspecialchars($this->input->post('time_session', true));
			$file_ad = $_FILES['picture_ads']['name'];

			if (!$file_ad) {

				$this->db->set('owner_ad', $owner);
				$this->db->set('title_ad', $title_ad);
				$this->db->set('decsription', $description);
				$this->db->set('status', $status);
				$this->db->set('time_session', $time_session);
				$this->db->where('id', $id);
				$this->db->update('ads');
				echo "<script>
						alert('Success Edit Ad');
						window.location='".site_url('great_admin/ads')."';
					</script>";
			} else {
				// config for library upload
				$config['upload_path'] = './assets/ads';
				$config['allowed_types'] = 'jpg|jpeg';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('picture_ads')) {
					echo $this->upload->display_errors(); die();
				} else {
					$photo = $this->upload->data('file_name');

					$this->db->set('owner_ad', $owner);
					$this->db->set('title_ad', $title_ad);
					$this->db->set('decsription', $description);
					$this->db->set('status', $status);
					$this->db->set('pict', $photo);
					$this->db->set('time_session', $time_session);
					$this->db->where('id', $id);
					$this->db->update('ads');
					echo "<script>
								alert('Success Edit Ad');
								window.location='".site_url('great_admin/ads')."';
							</script>";
				}
			}
		}
	}

	public function ads_delete($id) 
	{
		$this->db->delete('ads', ['id' => $id]);
		echo "<script>
						alert('Success Delete Ad');
						window.location='".site_url('great_admin/ads')."';
					</script>";
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function data_search_user_list($keyword = null)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->like('email', $keyword);
		$this->db->or_like('custom', $keyword);
		$this->db->or_like('level', $keyword);
		$this->db->or_like('status', $keyword);
		return $this->db->get()->result_array();
	}

	public function uncustom_search($keyword = null)
	{
		$this->db->select('*');
		$this->db->from('link_free');
		$this->db->where('status', 'un_custom');
		$this->db->like('nama', $keyword);
		$this->db->or_like('link', $keyword);
		$this->db->or_like('short_link', $keyword);
		$this->db->or_like('pkg', $keyword);
		return $this->db->get()->result_array();
	}

	public function custom_search($keyword = null)
	{
		$this->db->select('*');
		$this->db->from('link_free');
		$this->db->where('status', 'custom_link');
		$this->db->like('nama', $keyword);
		$this->db->or_like('link', $keyword);
		$this->db->or_like('short_link', $keyword);
		$this->db->or_like('pkg', $keyword);
		return $this->db->get()->result_array();
	}

	public function ads_search($keyword = null)
	{
		$this->db->select('*');
		$this->db->from('ads');
		$this->db->like('owner_ad', $keyword);
		$this->db->or_like('title_ad', $keyword);
		$this->db->or_like('decsription', $keyword);
		$this->db->or_like('status', $keyword);
		$this->db->or_like('pict', $keyword);
		$this->db->or_like('time_session', $keyword);
		return $this->db->get()->result_array();
	}
}
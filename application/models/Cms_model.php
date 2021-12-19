<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}

	function getRow($d)
	{
		if ( $d['where'] ) {
			$this->db->where($d['where']);
		}
		$table = $this->db->get($d['table']);
		return $table->num_rows();
	}

	function getAll($d)
	{
		if ( $d['select'] ) {
			$this->db->select($d['select']);
		}

		if ( $d['where'] ) {
			$this->db->where($d['where']);
		}

		if ( $d['order'] ) {
			$this->db->order_by($d['order']);
		}

		if ( $d['limit'] ) {
			if ( $d['start'] ) {
				$this->db->limit($d['limit'], $d['start']);
			}
			else {
				$this->db->limit($d['limit']);
			}
		}

		$table = $this->db->get($d['table']);
		return $table->result_array();
	}

	function getDetail($d)
	{
		if ( $d['select'] ) {
			$this->db->select($d['select']);
		}
		if ( $d['where'] ) {
			$this->db->where($d['where']);
		}
		if ( !$d['limit']) {
			$d['limit'] = 1;
		}
		$this->db->limit($d['limit']);
		$table = $this->db->get($d['table']);
		return $table->result_array();
	}

	function add($d)
	{
		return $this->db->insert($d['table'], $d['data']);
	}

	function update($d)
	{
		$this->db->where($d['where']);
		return $this->db->update($d['table'], $d['data']);
	}

	function delete($d)
	{
		$this->db->where($d['where']);
		return $this->db->delete($d['table']);
	}

	function search($d)
	{
		if (!$d['key'] | !$d['field'] | !$d['table']) {
			return false;
		}
		//jika data wajib terpenuhi
		if ( $d['select'] ) {
			$this->db->select($d['select']);
		}
		$no_one_quote = str_replace("'","",$d['key']);
		$no_double_quote = str_replace('"','',$no_one_quote);
    $clear = strip_tags($no_double_quote);

		$search = explode(' ', $clear);
		$row = count($search);

		$field = $d['field'];
		//jika 1 kata dan data tidak kosong
		if ($search[0] != '') {
			$this->db->like($field, $search[0]);
			$this->db->or_like($field, $search[0], 'before');
			$this->db->or_like($field, $search[0], 'after');
		}
		//jika lebih dari 1 kata dan data tidak kosong
		if ($row > 1) {
			for ($i=1; $i < $row; $i++) {
				if ($search[$i] != '') {
				$this->db->or_like($field, $search[$i]);
				$this->db->or_like($field, $search[$i], 'before');
				$this->db->or_like($field, $search[$i], 'after');
				}
			}
		}

		if ( $d['order'] ) {
			$this->db->order_by($d['order']);
		}
		if ( $d['limit'] ) {
			if ( $d['start'] ) {
				$this->db->limit($d['limit'], $d['start']);
			}
			else {
				$this->db->limit($d['limit']);
			}
		}
		return $table = $this->db->get($d['table'])->result_array();
	}

}

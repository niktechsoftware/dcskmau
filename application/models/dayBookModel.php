<?php
	class dayBookModel extends CI_Model{
		public function showStudent(){
			$data = $this->db->get('student_info');
			return $data->result();
		}
	}
?>
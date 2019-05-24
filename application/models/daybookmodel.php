<?php
	class dayBookModel extends CI_Model{
		public function showStudent($yearID,$courseID,$radioValue,$sessionID){
			$data = $this->db->get('student_info');
			if('roll_number' == '$sessionID%' && 'course' '$courseID' && $yearID == 'year' && $radioValue == 'all')
			{
				return $data->result();
			}
		}
	}
?>
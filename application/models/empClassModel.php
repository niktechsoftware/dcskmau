<?php
	class EmpClassModel extends CI_Model{
		public function addcourseAcc($empUser,$course){
		$db = array(
			"course_id" => $course,
			"emp_user" => $empUser
		);
		if(strlen($course) > 1){
			$this->db->insert("employee_class",$db);
		}
		$query = $this->db->get("employee_class");
		return $query;
	}

	public function addscourseAcc(){
		$query = $this->db->get("employee_class");
		return $query;
	}
	}
?>
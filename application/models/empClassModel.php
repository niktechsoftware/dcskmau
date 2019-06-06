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

	public function updateCourseModel($empId,$empuname){
		$val = array(
				"course_id" => $empuname
		);
		$this->db->where("emp_user",$empId);
		$query = $this->db->update("employee_class",$val);
		return true;
	}
	public function deleteCourseModel($empId){
		//$this->db->where("school_code",$this->session->userdata("school_code"));
		  $course=$this->db->get('employee_class')->result();
		foreach ($course as $value) {
		   	  if($value->course_id==$empId){
                echo "<script>alert('you can not delete this exam because this exam is already used in class');</script>";
                return false;
		   	  }
		   }
		   	  	$this->db->where("emp_user",$empId);
		    $query = $this->db->delete("employee_class");
		    return $query;
		}
	}
?>
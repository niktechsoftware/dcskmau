<?php
	class EmpClassModel extends CI_Model{
		public function addcourseAcc($course,$empUser){
		$db = array(
			"course_id" => $course,
			"emp_user" => $empUser
		);
		if($course){
			$this->db->insert("employee_class",$db);
			//print_r($dbb);
		}
		$query = $this->db->get("employee_class");
		return $query;
	}

	public function addscourseAcc(){
		$query = $this->db->get("employee_class");
		return $query;
	}

	public function updateCourseModel($empId,$empuname){
			$this->db->where('title',$empuname);
			$cnm = $this->db->get('course')->row()->id;
		$val = array(
				"course_id" => $cnm
		);
		$this->db->where("id",$empId);
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
		   	  	$this->db->where("id",$empId);
		    $query = $this->db->delete("employee_class");
		    return $query;
		}
	}
?>
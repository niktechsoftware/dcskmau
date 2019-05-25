<?php
	class daybookController extends CI_Controller{
			public function showCourse(){
				$courseNM = $this->input->post('Coursenm');
				 $var = $this->db->query("select DISTINCT course from student_info where year='$courseNM'");
          		  if($var->num_rows() > 0){
               		 echo '<option value="">-Select Course Name-</option>';
               		 foreach ($var->result() as $row){
                     echo '<option value="'.$row->course.'">'.$row->course.'</option>';
               		 }
               		 // echo '<option value="all">All</option>';
            	}
			}

		public function showInfo(){
			
			$yearID = $this->input->post('yearId');
			$courseID = $this->input->post('courseId');
			$radioValue = $this->input->post('radioValue');
			$sessionID = $this->input->post('sessionID');
			if($radioValue=='all'){
			//$school_code = $this->session->userdata("school_code");
			$data['view'] =$this->db->query("select * from student_info where year = '$yearID' AND course = '$courseID' and roll_number like '$sessionID%'");
			$this->load->view("ajax/showStudDetail",$data);
		}else
		if($radioValue=='GEN MALE'){
			//$school_code = $this->session->userdata("school_code");
			$data['view'] =$this->db->query("select * from student_info where year = '$yearID' AND course = '$courseID' and roll_number like '$sessionID%' AND gender = 'MALE' AND category = 'GEN' ");
			$this->load->view("ajax/showStudDetail",$data);
		
		}
		else
		if($radioValue=='GEN FEMALE'){
			//$school_code = $this->session->userdata("school_code");
			$data['view'] =$this->db->query("select * from student_info where year = '$yearID' AND course = '$courseID' and roll_number like '$sessionID%' AND gender = 'FEMALE' AND category = 'GEN' ");
			$this->load->view("ajax/showStudDetail",$data);
		
		}
		else
		if($radioValue=='GEN BOTH'){
			//$school_code = $this->session->userdata("school_code");
			$data['view'] =$this->db->query("select * from student_info where year = '$yearID' AND course = '$courseID' and roll_number like '$sessionID%'  AND category = 'GEN' ");
			$this->load->view("ajax/showStudDetail",$data);
		
		}
		else
		if($radioValue=='OBC MALE'){
			//$school_code = $this->session->userdata("school_code");
			$data['view'] =$this->db->query("select * from student_info where year = '$yearID' AND course = '$courseID' and roll_number like '$sessionID%' AND gender = 'MALE' AND category = 'OBC' ");
			$this->load->view("ajax/showStudDetail",$data);
		
		}
		else
		if($radioValue=='OBC FEMALE'){
			//$school_code = $this->session->userdata("school_code");
			$data['view'] =$this->db->query("select * from student_info where year = '$yearID' AND course = '$courseID' and roll_number like '$sessionID%' AND gender = 'FEMALE' AND category = 'OBC' ");
			$this->load->view("ajax/showStudDetail",$data);
		
		}
		else
		if($radioValue=='OBC BOTH'){
			//$school_code = $this->session->userdata("school_code");
			$data['view'] =$this->db->query("select * from student_info where year = '$yearID' AND course = '$courseID' and roll_number like '$sessionID%' AND category = 'OBC' ");
			$this->load->view("ajax/showStudDetail",$data);
		
		}
		else
		if($radioValue=='SC MALE'){
			//$school_code = $this->session->userdata("school_code");
			$data['view'] =$this->db->query("select * from student_info where year = '$yearID' AND course = '$courseID' and roll_number like '$sessionID%' AND gender = 'MALE' AND category = 'SC' ");
			$this->load->view("ajax/showStudDetail",$data);
		
		}
		else
		if($radioValue=='SC FEMALE'){
			//$school_code = $this->session->userdata("school_code");
			$data['view'] =$this->db->query("select * from student_info where year = '$yearID' AND course = '$courseID' and roll_number like '$sessionID%' AND gender = 'FEMALE' AND category = 'SC' ");
			$this->load->view("ajax/showStudDetail",$data);
		
		}
		else
		if($radioValue=='SC BOTH'){
			//$school_code = $this->session->userdata("school_code");
			$data['view'] =$this->db->query("select * from student_info where year = '$yearID' AND course = '$courseID' and roll_number like '$sessionID%' AND category = 'SC' ");
			$this->load->view("ajax/showStudDetail",$data);
		
		}
		else{
			echo 'correct';
			$this->load->view("ajax/showStudDetail");
		}
		
			
		}
	}
?>
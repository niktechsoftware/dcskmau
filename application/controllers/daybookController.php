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
               		 echo '<option value="all">All</option>';
            	}
			}

		public function showInfo(){
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$yearID = $this->input->post('yearId');
			$courseID = $this->input->post('courseId');
			$radioValue = $this->input->post('radioValue');
			$this->load->model('dayBookModel');
			$data['view'] = $this->dayBookModel->showStudent();
			$this->load->view("ajax/showStudDetail",$data);
			
		}
	}
?>
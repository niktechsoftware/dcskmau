<?php
	class daybookController extends CI_Controller{
			public function showCourse(){
				$courseNM = $this->input->post('Coursenm');
				//print_r($courseNM);exit;
				//$this->db->select("DISTINCT 'course'");
	 $var = $this->db->query("select DISTINCT course from student_info where year='$courseNM'");

				// $this->db->where('year',$courseNM);
				// $this->db->distinct('course');
				// $var = $this->db->get('student_info');
				 //$this->db->from("student_info");
				//$ss = $this->db->where('year','$courseNM');
				 // print_r($var->row()->course);
				 //  exit;
				// $query = $this->db->get();
				// $this->db->where('exam_head_id',$em);
       			 //$var = $this->db->get("student_info");
          		  if($var->num_rows() > 0){
               		 echo '<option value="">-Select Course Name-</option>';
               		 foreach ($var->result() as $row){
               		 	//echo $row->course;

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
			$this->load->model('dayBookModel');
			$data['view'] = $this->dayBookModel->showStudent();

  //       $data['pageTitle'] = 'DayBook Section';
		// $data['smallTitle'] = 'DayBook';
		// $data['mainPage'] = 'dayBook';
		// $data['subPage'] = 'Credit/Debit';
		// $data['title'] = 'DayBook';
		// $data['headerCss'] = 'headerCss/daybookCss';
		// $data['footerJs'] = 'footerJs/daybookJs';
		//$data['mainContent'] = 'ajax/showStudDetail';
		$this->load->view("ajax/showStudDetail",$data);


			//$data = $this->load->view('ajax/showStudDetail',$data);
		}
	}
?>
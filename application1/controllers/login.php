<?php

class Login extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model("teacherModel");
                $this->load->model("allFormModel");
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if($is_login != "admin"){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_login){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_lock){
			redirect("index.php/homeController/lockPage");
		}
	}
function getRecord(){
$bstNumber = $this->input->post("bstnumber");
		$this->db->where("roll_number",$bstNumber);
		$val = $this->db->get("student_info");
		if($val->num_rows()>0){
			$val1=$val->row();
			redirect("index.php/login/updateStudent/$val1->roll_number");
		}
		else{
			redirect("index.php/login/updateStudent");
		}

}
	
	function index(){
		$data['pageTitle'] = 'Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Dashboard';
		$data['subPage'] = 'dashboard';
		$data['title'] = 'Gfinch Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'dashboard';
		$this->load->view("includes/mainContent", $data);
	}	
	function updateStudent(){
		$bst=0;
		 $data['bst']=$bst;
		 if($this->uri->segment(3)){
		 	$bst = $this->uri->segment(3);
		 	$data['bst']=$bst;
		 }
		 else{
		 	$bst=0;
		 	$data['bst']=$bst;
		 }
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Student List';
		$data['mainPage'] = 'Student Section';
		$data['subPage'] = 'Simple Student updation Area';
		$data['title'] = 'DCSK MAU';
		$data['headerCss'] = 'headerCss/entryCss';
		$data['footerJs'] = 'footerJs/entryJs';
		$data['mainContent'] = 'updateStudent';
		$this->load->view("includes/mainContent", $data);
	}
	
	function collectFee(){
		$data['pageTitle'] = 'Student Fee';
		$data['smallTitle'] = 'Search Fee';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Fee Student';
		
		$data['title'] = 'Fee Student';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/simpleStudentListJs';
		
		$data['mainContent'] = 'collectfee';
		$this->load->view("includes/mainContent", $data);
	}
function saveUpdate(){
		$student_id= $this->input->post("student_id");
		$name= $this->input->post("patientName");
			$father_name= $this->input->post("fatherName");
				$sub1= $this->input->post("sub1");
		$sub2= $this->input->post("sub2");
		$sub3= $this->input->post("sub3");
			$adhaarNo= $this->input->post("adhaarNo");
			$addmissionDate = $this->input->post("addmissionDate");
		$fee= $this->input->post("addfee");
$lesorNo= $this->input->post("lesorNo");
$stuImage= $this->input->post("stuImage");
		echo $student_id;
$this->db->where("roll_number",$student_id);
			$val = $this->db->get("student_info")->row();
		$photo_name = time().trim($_FILES['stuImage']['name']);
		$new_img = array(
				"photo"=> $photo_name
		);
		
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			echo "<br>".$photo_name;
			if (!empty($_FILES['stuImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('stuImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$data = array(
 							'leaser_no'=>$lesorNo,
							'name'=>$name,
							'father_name'=>$father_name,
							'adhaarNo'=>$adhaarNo,
							'addmissionDate'=>$addmissionDate,
							'subject1'=>$sub1,
							'subject2'=>$sub2,
							'subject3'=>$sub3,
							'fee'=>$fee,
							'student_image'=>$photo_name,
							'fee_status'=> "submitted",
							'fee_date'  =>  date("Y-m-d")
							);
        
						$old_img = $val->student_image;
						@chmod("assets/images/stuImage/" . $old_img, 0777);
						@unlink("assets/images/stuImage/" . $old_img);
						$this->db->where("roll_number",$student_id);
						$vat = $this->db->update("student_info",$data);
					redirect("index.php/login/updateStudent/true");
				}
			
			
		}else{
		$data = array(
			'leaser_no'=>$lesorNo,
							'name'=>$name,
							'father_name'=>$father_name,
							'adhaarNo'=>$adhaarNo,
							'addmissionDate'=>$addmissionDate,
							'subject1'=>$sub1,
							'subject2'=>$sub2,
							'subject3'=>$sub3,
							'fee'=>$fee
);

$this->db->where("roll_number",$student_id);
		$vat = $this->db->update("student_info",$data);
					redirect("index.php/login/updateStudent/true");
		}
	} 
	function newAdmission1(){
		$data['isvalue']='null';
		$studentId = $this->input->post("rollNo");
		if(strlen($this->input->post("rollNo")) > 0){
			$this->db->where("roll_number",$studentId);
			$num = $this->db->get("student_info")->num_rows();
			if($num <= 0)
			{
			$b = $this->db->query("select * from tbl_enrollment where roll_number = '$studentId'");
			$data['stud_id']=$studentId;
		     if($b->num_rows()>0){
		     	$data['rollarray']=$b;
		     	$data['isvalue']=1;
				}
				else{
					$data['rollarray']="null";
					$data['isvalue']="haha";
				}
			}
			else{
				$msg=9;
				redirect("login/newAdmission1/$msg");
			}
				
		}	
				$data['pageTitle'] = 'Student Section';
				$data['smallTitle'] = 'New Admission';
				$data['mainPage'] = 'Students';
				$data['subPage'] = 'New Admission1';
				$data['title'] = 'New Admission';
				$data['headerCss'] = 'headerCss/newAdmissionCss';
				$data['footerJs'] = 'footerJs/newAdmission';
				$data['mainContent'] = 'newAdmission1';
				$this->load->view("includes/mainContent", $data);
	}
	
	function simpleSearchStudent(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Search Student';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Search Student';
		$data['title'] = 'Search Student';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/simpleStudentListJs';
		$data['mainContent'] = 'simpleSearchStudent';
		$this->load->view("includes/mainContent", $data);
	}
	function search(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Search Student';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Search Student';
		$data['title'] = 'Search Student';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/simpleStudentListJs';
		$data['mainContent'] = 'search';
		$this->load->view("includes/mainContent", $data);
	}
	function searchStudent(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Search Student';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Search Student';
		$this->load->model("searchStudentModel");
		$query = $this->db->select('*')
		->from('student_info')
		->join('guardian_info', 'guardian_info.student_id = student_info.student_id')
		->get();
		$req=$this->searchStudentModel->getValue();
		$data['request']=$query->result();
		$data['title'] = 'Search Student';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/studentListJs';
		$data['mainContent'] = 'searchStudent';
		$this->load->view("includes/mainContent", $data);
	}
	
		function searchByCourse(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Search Student';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Search Student';
		$this->db->distinct();
		$this->db->select("course");
		$val = $this->db->get("student_info")->result();
		$data['course']=$val;
		//$this->load->model("searchStudentModel");
		$data['title'] = 'Search Student';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/studentListJs';
		$data['mainContent'] = 'searchbyCourse';
		$this->load->view("includes/mainContent", $data);
	}
	function admissionSuccess(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Student Profile';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Profile';
		$data['title'] = 'Student Profile';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/studentListJs';
		$data['mainContent'] = 'success';
		$this->load->view("includes/mainContent", $data);
	}
	function updatefee(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Student Profile';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Profile';
		$data['title'] = 'Student Profile';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/studentListJs';
		$data['mainContent'] = 'updatefee';
		$this->load->view("includes/mainContent", $data);
	}
	function updateStudentProfile(){
		$sno = $this->uri->segment(3);
			$b = $this->db->query("select * from student_info where sno = '$sno'");
			$data['stud_id']=$sno;
			if($b->num_rows()>0){
				$data['rollarray']=$b;
		}
		$data['pageTitle'] = 'Student Update Profile';
		$data['smallTitle'] = 'New Admission';
		$data['mainPage'] = 'Students';
		$data['subPage'] = 'Student Update Profile';
		$data['title'] = 'Student Update Profile';
		$data['headerCss'] = 'headerCss/newAdmissionCss';
		$data['footerJs'] = 'footerJs/newAdmission';
		$data['mainContent'] = 'updateStudentProfile';
		$this->load->view("includes/mainContent", $data);
	}
	
		public function dayBook(){
		$data['pageTitle'] = 'Student Information Section';
		$data['smallTitle'] = 'Student Infomation';
		$data['mainPage'] = 'Student';
		$data['subPage'] = ' All Infomation';
		$data['title'] = 'Student Information Section';
		$data['headerCss'] = 'headerCss/daybookCss';
		$data['footerJs'] = 'footerJs/daybookJs';
		$data['mainContent'] = 'daybookk';
		$this->load->view("includes/mainContent", $data);
	}


		public function creditDebit(){
		$data['pageTitle'] = 'DayBook Section';
		$data['smallTitle'] = ' DayBook Detail';
		$data['mainPage'] = 'Credit/Dedit';
		$data['subPage'] = ' All Infomation';
		$data['title'] = 'Day Book';
		$data['headerCss'] = 'headerCss/trancationCss';
		$data['footerJs'] = 'footerJs/trancationJs';
		$data['mainContent'] = 'trancation';
		$this->load->view("includes/mainContent", $data);
	}
	public function showStud(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Student Detail';
		$data['mainPage'] = 'Student';
		$data['subPage'] = ' All Infomation';
		$data['title'] = 'Student Detail';
		$data['headerCss'] = 'headerCss/trancationCss';
		$data['footerJs'] = 'footerJs/trancationJs';
		$data['mainContent'] = 'showStud';
		$this->load->view("includes/mainContent", $data);
	}
}
?>

<?php
class newAdmissionController extends CI_Controller
{
public function getProgramName(){
		$programName = $this->input->post("className");
		$this->load->model('configureClassModel');
		$query = $this->configureClassModel->getStreamByClassName($className);
		echo '<option value="" >Select Subject Stream</option>';
			foreach ($query->result() as $row){
				?>
					<option value="<?php echo $row->streem; ?>" ><?php echo $row->streem; ?></option>
				<?php 
			}
	}
	

	function calculate_fee(){
		
		$cate1=	$this->input->post("cate1");
		$programm_name=	$this->input->post("programm_name");
	$subject3=$this->input->post("subject3");
	$subject2=$this->input->post("subject2");
	$subject1=$this->input->post("subject1");
	$year=$this->input->post("year");
	$gender=$this->input->post("gender");
	
		$this->db->where("programm_name",$programm_name);
		$this->db->where("progrmm_cate",$cate1);
		$this->db->where("gender",$gender);
		$this->db->where("program_code",$year);
		$gfee = $this->db->get("program_details")->row();
		$studentfee = $gfee->program_fee;
		
	$totsum = 	$this->db->query("select sum(fee_amount) as totfee from program_subjects where program_name='$programm_name' and program_code='$year' and (subject_name = '$subject1' or subject_name = '$subject2' or subject_name='$subject3')")->row();
	
	$totalfee = $studentfee+$totsum->totfee;
	echo $totalfee;
	} 

function showSubject(){
   $program_name = $this->input->post("programm_name");
  
       $this->db->distinct();
       $this->db->select("subject_name");
       $this->db->where("program_name",$program_name);
       
      $query= $this->db->get("program_subjects");?>
            <option value="">Select Subject</option>
		                                      <?php 
		                                            foreach ($query->result() as $row):														
													?>
														<option value="<?php echo $row->subject_name;?>"><?php echo $row->subject_name;?> </option>
													<?php endforeach;?>
<?php	
}	
	function addStudent(){
	  
	   	$code = rand(1000,100000);
		$roll = $this->input->post("stud_id");
		if(strlen($this->input->post("leaserNo")) > 0){
		   $fee_status="submitted";
		}
		else{
		    
		     $fee_status="pending";
		}
		
		$data['roll_number']	=	$this->input->post("stud_id");
		$data['name']	=	$this->input->post("name");
		$data['father_name']	=	$this->input->post("fatherName");
		$data['mother_name']	=	$this->input->post("motherName");
		$data['mobile_number']	=	$this->input->post("mobile");
		$data['address']	=	$this->input->post("address");
        $data['leaser_no']	=	$this->input->post("leaserNo");
        $data['adhaarNo']	=	$this->input->post("adhar_number");
         
        $data['dob']	=	$this->input->post("dob");
        $data['student_image']  = $this->input->post("stuImage");
		$data['course']	=	$this->input->post("programm_name");
		$data['year']	=	$this->input->post("year");
		$data['subject1']	=		$this->input->post("subject1");
		$data['subject2']	=	$this->input->post("subject2");
		$data['subject3']	=		$this->input->post("subject3");
		$data['gender']	=	$this->input->post("gender");
		$data['category']	=	$this->input->post("category");
		$data['fee']	=	$this->input->post("payblamount");
		$data['reciept_no'] = 'Inv'.$this->input->post("stud_id");
		$data['scode']	=	$code;
		$data['fee_status']	= $fee_status;
		$data['date']           = date("Y-m-d");
		$data['fee_date']           = date("Y-m-d");
		$data['addmissionDate'] = date("Y-m-d");
	     $data['status']	= "confirmation";
		///opening closing code start
	     $this->db->where("opening_date",date("Y-m-d"));
	  $table =  $this->db->get("opening_closing_balance");
	  		
	     if($table->num_rows()>0){

          $a = $table->row()->closing_balance;
				$close= $a + $this->input->post("payblamount");
	     	$cr_date = date('Y-m-d');
				$balance = array(
						"closing_balance" => $close,
						"closing_date" => $cr_date
				);
				//$this->db->where("school_code",$school_code);
				$this->db->where("opening_date",date("Y-m-d"));
				$this->db->update('opening_closing_balance',$balance);
		}
		 else{
		 	 $clo =  $this->db->query("select * from opening_closing_balance")->row();
//print_r($clo);
            $cl_date = $clo->closing_date;
			$cl_balance = $clo->closing_balance;
			$cr_date = date('Y-m-d');

			if($cl_date != $cr_date)
			{
				$balance = array(
						"opening_balance" => $cl_balance,
						"closing_balance" => $cl_balance + $this->input->post("payblamount"),
						"opening_date" => $cr_date,
						"closing_date" => $cr_date
						//"school_code"=>$school_code
				);
				$this->db->insert('opening_closing_balance',$balance);
				
			}

}
			////opening closing code end
		
		if($this->db->insert("student_info",$data) )

		{
			$smstext = "Dear ".$this->input->post("name")." Your selected subjects for Program Fee of ".$this->input->post("programm_name")." is =".$this->input->post("payblamount")." please Pay it by Cash or Netbanking/Debit/Creadit card. Your securty code for pay netbanking is = ".$code." .For more Details please Contact at office.DCSK MAU";
			sms($this->input->post("mobile"),$smstext);
		}
		
		redirect("index.php/login/admissionSuccess/$roll");
		
	}
	
	function deleteStudent(){
		$sno = $this->uri->segment(3);
		$this->db->where('sno', $sno);
		$this->db->where('fee_status',"pending");
		$this->db->delete('student_info');
		
		redirect(base_url()."index.php/login/simpleSearchStudent/true/askjasdvjas");
	}
	
	function updateStudentProfile(){
		$code = rand(1000,100000);
		$sno = $this->input->post("sno");
		$roll = $this->input->post("stud_id");
		$data['name']	=	$this->input->post("name");
		$data['father_name']	=	$this->input->post("fatherName");
		$data['mother_name']	=	$this->input->post("motherName");
		$data['mobile_number']	=	$this->input->post("mobile");
		$data['address']	=	$this->input->post("address");
		
		$this->db->where("sno",$sno);
		$this->db->where("roll_number",$roll);
		$this->db->update("student_info",$data);
			$smstext = "Dear ".$this->input->post("name")." Your Profile is Updated .For more Details please Contact at office.DCSK MAU";
			sms($this->input->post("mobile"),$smstext);
		
		redirect("index.php/login/admissionSuccess/$roll");
	
	}
	
	function updateStudentFeeStatus(){
		$roll_number    =  $this->input->post("rollNo");
		$scode          =  $this->input->post("scode");
		
		if((strlen($this->input->post("rollNo")) && strlen($this->input->post("scode") )) > 0){
			$this->db->where("roll_number",$roll_number);
		    $this->db->where("scode",$scode);
			$num = $this->db->get("student_info")->num_rows();
			if($num > 0)
			{
	$i = false;
	$photo_name = time().trim($_FILES['stuImage']['name']);
		$this->load->library('upload');
		// Set configuration array for uploaded photo.
		$image_path = realpath(APPPATH . '../assets/images/stuImage');
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '600';
		$config['file_name'] = $photo_name;
		// Upload first photo and create a thumbnail of it.
		if (!empty($_FILES['stuImage']['name'])) {
			$this->upload->initialize($config);
			if ($this->upload->do_upload('stuImage')) {
				// ---------------------------------- Redirect Success Page ----------------------
				$i = true;
			}
			else{
				echo $this->upload->display_errors();
			}
		}
		$photo_sig = time().trim($_FILES['signature']['name']);
		$this->load->library('upload');
		// Set configuration array for uploaded photo.
		$image_path = realpath(APPPATH . '../assets/images/stuSignature');
		$config['upload_path'] = $image_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '120';
		$config['file_name'] = $photo_sig;
		// Upload first photo and create a thumbnail of it.
		if (!empty($_FILES['signature']['name'])) {
			$this->upload->initialize($config);
			if ($this->upload->do_upload('signature')) {
				// ---------------------------------- Redirect Success Page ----------------------
				$i = true;
			}
			else{
				echo $this->upload->display_errors();
			}
		}
		if($i){
				
				$data['leaser_no']  =  $this->input->post("leaserNo");
				$data['fee_date']  =  $this->input->post("feeSubmitDate");
				$data['student_image']      =  $photo_name;
				$data['signature']      =  $photo_sig;
				$data['fee_status']	=	"submitted";
		
		$this->db->where("roll_number",$roll_number);
		$this->db->where("scode",$scode);
		$this->db->update("student_info",$data);
		$msg =7;
		redirect("index.php/login/collectfee/$msg");
		
		}
		
		
	}
	else{
		$msg=9;
		redirect("index.php/login/collectfee/$msg");
	
	}
	}
	
	
	}
	
	}
?>

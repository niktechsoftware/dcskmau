<?php
class LibraryCard extends CI_Controller{
	
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
    
	function generateLibraryCard(){
		$data['pageTitle'] = 'Library Card';
			$data['smallTitle'] = 'Student Panel';
			$data['mainPage'] = 'Student Panel';
			$data['subPage'] = 'Student Panel';
			$data['title'] = 'Library Card';
		//	$this->load->model("configureClassModel");
		//	$this->load->model("allFormModel");
		//	$data['request'] = $this->allFormModel->getClass()->result();
			$data['headerCss'] = 'headerCss/newAdmissionCss';
			$data['footerJs'] = 'footerJs/admitCardJs';
			$data['mainContent'] = 'generateLibraryCard';
			$this->load->view("includes/mainContent", $data);
		
	}
	
	
	function libraryCardReport(){
		$data['pageTitle'] = 'Library Card';
			$data['smallTitle'] = 'Student Panel';
			$data['mainPage'] = 'Student Panel';
			$data['subPage'] = 'Student Panel';
			$data['title'] = 'Library Card';
			$data['headerCss'] = 'headerCss/newAdmissionCss';
			$data['footerJs'] = 'footerJs/admitCardJs';
			$data['mainContent'] = 'libraryCardReport';
			$this->load->view("includes/mainContent", $data);
	}
	
	function libraryCardDownload(){
		$id = $this->uri->segment(3);
		$data['id']=$id;
		$data['title']="Library Card";
		$this->load->view("invoice/printlibraryCard",$data);
		
	}
		function librarytest(){
		    $data['title']="Library Card";
	    	$data['mainContent'] = 'librarytest';
		    $this->load->view("invoice/librarytest");
		
	}
}
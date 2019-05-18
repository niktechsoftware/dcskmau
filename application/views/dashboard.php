<!-- start: PAGE CONTENT -->
<?php 
$is_login = $this->session->userdata('is_login');
$is_lock = $this->session->userdata('is_lock');
$logtype = $this->session->userdata('login_type');
if(($is_login == "admin") || ($is_login == "accountent")){
	$vd = date('m-Y');
	$this->db->where("send_date",$vd);
	$t = $this->db->get("sms_reminder");
	if($t->num_rows() < 1)
	{
		$date_of_post = date('d-m-Y');
		$date = $date_of_post;
		$stamp = strtotime($date);
		$v = date("d", $stamp);
		if(( $v == 1 ) || ($v == 2)|| ($v == 3) || ($v == 4)|| ($v == 5)|| ($v == 7))
		{
			$val = $this->db->get("sms_setting")->row();
			
			$school_info = mysql_query("select * from general_settings");
			$info = mysql_fetch_object($school_info);
			$isSMS = $this->db->get("sms")->row()->parent_message;
			$i=0;
			$fmobile=$this->session->userdata("mobile_number");
			if($isSMS=="yes")
			{
				$this->db->where("status","Active");
				$std = $this->db->get("student_info");
				$i=0;
				if($std->num_rows() > 0)
				{
					foreach($std->result() as $s):
					$this->db->where("student_id",$s->student_id);
					$m=$this->db->get("guardian_info")->row();
					if($m->f_mobile){
					$fmobile = $fmobile.",".$m->f_mobile;
					$i++;}
					endforeach;
				}
					$msg =	"Dear Parent your Ward's school fee is remain to deposit. Please deposit.Ignore message if already deposited ".$info->your_school_name;
					if($fmobile){
						
						$data1 = array(
								'send_date'	=> date('m-Y'),
								'last_reminder' => "NO",
								'total_sms' => $i,
						);
						$v = $this->db->insert("sms_reminder",$data1);
						if($v){
						//	sms($fmobile,$msg);
						}
				}
			}
			
		}
	}

}

?>

<?php if($this->uri->segment("3") == "noteTrue"){?>
<div class="row">
    <div class="col-md-6 col-lg-12 col-sm-6">
        <div class="panel panel-default panel-white core-box">
			<div class="alert alert-success">
				<button data-dismiss="alert" class="close">
					&times;
				</button>
				<strong>Done!</strong> Your new Note successfully added <a class="alert-link" href="#">
					into database.</a>
			</div>
		</div>
	</div>
</div>
<?php } elseif($this->uri->segment("3") == "noteFalse"){?>
<div class="row">
    <div class="col-md-6 col-lg-12 col-sm-6">
        <div class="panel panel-default panel-white core-box">
			<div class="alert alert-danger">
				<button data-dismiss="alert" class="close">
					&times;
				</button>
				<strong>Oh my god! sorry....</strong>
					Something going wrong contect to <strong>Gfinch Technologies</strong> for this.... :(
			</div>
		</div>
	</div>
</div>
<?php }?>

<?php if($this->uri->segment("3") == "noteDelTrue"){?>
<div class="row">
    <div class="col-md-6 col-lg-12 col-sm-6">
        <div class="panel panel-default panel-white core-box">
			<div class="alert alert-success">
				<button data-dismiss="alert" class="close">
					&times;
				</button>
				<strong>Done!</strong> Your Note successfully Deleted from database.
			</div>
		</div>
	</div>
</div>
<?php } elseif($this->uri->segment("3") == "noteDelFalse"){?>
<div class="row">
    <div class="col-md-6 col-lg-12 col-sm-6">
        <div class="panel panel-default panel-white core-box">
			<div class="alert alert-danger">
				<button data-dismiss="alert" class="close">
					&times;
				</button>
				<strong>Oh my god! sorry....</strong>
					Something going wrong contect to <strong>Gfinch Technologies</strong> for this.... :(
			</div>
		</div>
	</div>
</div>
<?php }?>

<!-- ------------------------------------------ All alert codeing end -------------------------------------------- -->

<div class="row">
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-green padding-20 text-center core-icon">
                    <i class="fa fa-inr fa-2x icon-big"></i>
                </div>
                <a href="#">
	                <div class="padding-20 core-content">
	                	<h3 class="title block no-margin">Todays Fee collect</h3>
	                	<br/>
	                	<span class="subtitle"> Find out detailed fee Reports  </span>
	                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-blue padding-20 text-center core-icon">
                    <i class="fa fa-users fa-2x icon-big"></i>
                </div>
                <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Student Registration</h4>
                    <?php $t = $this->db->get("student_info");
                   $t =  $t->num_rows();?>
                    <span class="subtitle"> <?php echo $t;?>. </span>
                </div>
                </a>
            </div>
        </div>
    </div>
    
   
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-red padding-20 text-center core-icon">
                    <i class="fa fa-tasks fa-2x icon-big"></i>
                </div>
                <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Cash Fee Report</h4>
                    <br/>
                    <span class="subtitle"> . </span>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white core-box">
            <div class="panel-body no-padding">
                <div class="partition-azure padding-20 text-center core-icon">
                    <i class="fa fa-book fa-2x icon-big"></i>
                </div>
                <a href="#">
                <div class="padding-20 core-content">
                    <h4 class="title block no-margin">Day Book</h4>
                    <br/>
                    <span class="subtitle"> Access the Day Book. </span>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-7 col-lg-4">
    <div class="panel panel-dark">
        <div class="panel-heading">
            <h4 class="panel-title">Cash Transcation</h4>
            <div class="panel-tools">
                <div class="dropdown">
                    <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-white">
                        <i class="fa fa-cog"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                        <li>
                            <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                        </li>
                        <li>
                            <a class="panel-refresh" href="#">
                                <i class="fa fa-refresh"></i> <span>Refresh</span>
                            </a>
                        </li>
                        <li>
                            <a class="panel-config" href="#panel-config" data-toggle="modal">
                                <i class="fa fa-wrench"></i> <span>Configurations</span>
                            </a>
                        </li>
                        <li>
                            <a class="panel-expand" href="#">
                                <i class="fa fa-expand"></i> <span>Fullscreen</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-xs btn-link panel-close" href="#">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        
    </div>
</div>


 <div class="col-md-6 col-lg-3 col-sm-6">
        <div class="panel panel-default panel-white ">
            <div class="panel-body no-padding">
              <a href="#">
                <div class="partition-green padding-20 text-center">
                  
                </div>
               </a>
	                <div class="padding-20 core-content">
	                	<h2 class="title block no-margin">SMS Left in Your Account</h2>
	                	<br/>
	                	<span class="subtitle"><strong><h3><?php echo checkBalSms();?> </h3> </strong>  </span>
	                </div>
               
            </div>
        </div>
    </div>

</div>


<!-- end: PAGE CONTENT-->
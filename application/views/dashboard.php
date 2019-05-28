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
		        <div class="col-md-6 col-lg-4 col-sm-6">
		          <div class="panel panel-blue core-box">
		            <div class="e-slider owl-carousel owl-theme">
		              <div class="item">
		                <div class="panel-body">
		                  <div class="core-box">
		                    <div class="text-dark text-bold">
		                      Working on
		                    </div>
		                    <div class="text-white space15">
		                      Navigation Illustration (<i>corporate website redesign</i>)
		                    </div>
		                    <div class="progress progress-xs transparent-black no-radius space5">
		                      <div aria-valuetransitiongoal="88"
		                        class="progress-bar progress-bar-success partition-white animate-progress-bar"></div>
		                    </div>
		                    <div class="text-light">
		                      Leave Time
		                    </div>
		                    <div class="text-white text-extra-large pull-left">
		                      2h 38m
		                    </div>
		                    <div class="text-white text-large pull-right">
		                      <a href="#" class="btn btn-xs btn-light-blue"><i class="fa fa-pause"></i> Pause</a>
		                      <a href="#" class="btn btn-xs btn-light-blue"><i class="fa fa-check"></i> Complete</a>
		                    </div>
		                  </div>
		                </div>
		                <div class="padding-10">
		                  <span class="bold-text">1527</span><span class="text-light"> people share this goal </span>
		                  <a href="#" class="view-more pull-right text-dark text-bold">
		                    View More <i class="fa fa-angle-right text-light"></i>
		                  </a>
		                </div>
		              </div>
		              <div class="item">
		                <div class="panel-body">
		                  <div class="core-box">
		                    <div class="text-dark text-bold">
		                      Working on
		                    </div>
		                    <div class="text-white space15">
		                      Prepare Commercial Offer For Mobile App
		                    </div>
		                    <div class="progress progress-xs transparent-black no-radius space5">
		                      <div aria-valuetransitiongoal="59"
		                        class="progress-bar progress-bar-success partition-white animate-progress-bar"></div>
		                    </div>
		                    <div class="text-light">
		                      Leave Time
		                    </div>
		                    <div class="text-white text-extra-large pull-left">
		                      8h 56m
		                    </div>
		                    <div class="text-white text-large pull-right">
		                      <a href="#" class="btn btn-xs btn-light-blue"><i class="fa fa-pause"></i> Pause</a>
		                      <a href="#" class="btn btn-xs btn-light-blue"><i class="fa fa-check"></i> Complete</a>
		                    </div>
		                  </div>
		                </div>
		                <div class="padding-10">
		                  <span class="bold-text">1527</span><span class="text-light"> people share this goal </span>
		                  <a href="#" class="view-more pull-right text-dark text-bold">
		                    View More <i class="fa fa-angle-right text-light"></i>
		                  </a>
		                </div>
		              </div>
		              <div class="item">
		                <div class="panel-body">
		                  <div class="core-box">
		                    <div class="text-dark text-bold">
		                      Working on
		                    </div>
		                    <div class="text-white space15">
		                      Release iPhone Update
		                    </div>
		                    <div class="progress progress-xs transparent-black no-radius space5">
		                      <div aria-valuetransitiongoal="78"
		                        class="progress-bar progress-bar-success partition-white animate-progress-bar"></div>
		                    </div>
		                    <div class="text-light">
		                      Leave Time
		                    </div>
		                    <div class="text-white text-extra-large pull-left">
		                      48h 32m
		                    </div>
		                    <div class="text-white text-large pull-right">
		                      <a href="#" class="btn btn-xs btn-light-blue"><i class="fa fa-pause"></i> Pause</a>
		                      <a href="#" class="btn btn-xs btn-light-blue"><i class="fa fa-check"></i> Complete</a>
		                    </div>
		                  </div>
		                </div>
		                <div class="padding-10">
		                  <span class="bold-text">1527</span><span class="text-light"> people share this goal </span>
		                  <a href="#" class="view-more pull-right text-dark text-bold">
		                    View More <i class="fa fa-angle-right text-light"></i>
		                  </a>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-6 col-lg-4 col-sm-6">
		          <div class="panel panel-green">
		            <div class="e-slider owl-carousel owl-theme">
		              <div class="item">
		                <div class="panel-body">
		                  <div class="core-box">
		                    <div class="text-dark text-bold space15">
		                      SOCIAL
		                    </div>
		                    <div class="space5">
		                      <i class="fa fa-github fa-4x pull-left"></i>
		                      Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.
		                      <br />
		                      Ut enim ad minim veniam...
		                    </div>
		                    <span class="text-light text-small block pull-right"> <i class="fa fa-clock-o"></i> 11 min ago
		                    </span>
		                  </div>
		                </div>
		                <div class="padding-10">
		                  <span class="bold-text">1527</span><span class="text-light"> people share this goal </span>
		                  <a href="#" class="view-more pull-right text-dark text-bold">
		                    View More <i class="fa fa-angle-right text-light"></i>
		                  </a>
		                </div>
		              </div>
		              <div class="item">
		                <div class="panel-body">
		                  <div class="core-box">
		                    <div class="text-dark text-bold space15">
		                      SOCIAL
		                    </div>
		                    <div class="space5">
		                      <i class="fa fa-facebook fa-4x pull-left"></i>
		                      Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy ibh euismod
		                      tincidunt.
		                    </div>
		                    <span class="text-light text-small block pull-right"> <i class="fa fa-clock-o"></i> 27 min ago
		                    </span>
		                  </div>
		                </div>
		                <div class="padding-10">
		                  <span class="bold-text">1527</span><span class="text-light"> people share this goal </span>
		                  <a href="#" class="view-more pull-right text-dark text-bold">
		                    View More <i class="fa fa-angle-right text-light"></i>
		                  </a>
		                </div>
		              </div>
		              <div class="item">
		                <div class="panel-body">
		                  <div class="core-box">
		                    <div class="text-dark text-bold space15">
		                      SOCIAL
		                    </div>
		                    <div class="space5">
		                      <i class="fa fa-twitter fa-4x pull-left"></i>
		                      Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy ibh euismod
		                      tincidunt.
		                    </div>
		                    <span class="text-light text-small block pull-right"> <i class="fa fa-clock-o"></i> 56 min ago
		                    </span>
		                  </div>
		                </div>
		                <div class="padding-10">
		                  <span class="bold-text">1527</span><span class="text-light"> people share this goal </span>
		                  <a href="#" class="view-more pull-right text-dark text-bold">
		                    View More <i class="fa fa-angle-right text-light"></i>
		                  </a>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-12 col-lg-4 col-sm-12">
		          <div id="notes">
		            <div class="panel panel-note">
		              <div class="e-slider owl-carousel owl-theme">
		                <div class="item">
		                  <div class="panel-heading">
		                    <h4 class="no-margin">This is a Note</h4>
		                  </div>
		                  <div class="panel-body space10">
		                    <div class="note-short-content">
		                      Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore
		                      et dolore magna aliqua. Ut enim ad minim veniam...
		                    </div>
		                    <div class="note-content">
		                      Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore
		                      et dolore magna aliqua.
		                      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea
		                      commodi consequat.
		                      Quis aute iure reprehenderit in <strong>voluptate velit</strong> esse cillum dolore eu fugiat
		                      nulla pariatur.
		                      <br>
		                      Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim
		                      id est laborum.
		                      <br>
		                      Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia
		                      consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam
		                      est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci v'elit, sed quia non
		                      numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem.
		                      <br>
		                      Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi
		                      ut <strong>aliquid ex ea commodi consequatur?</strong>
		                      <br>
		                      Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae
		                      consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?
		                      <br>
		                      At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium
		                      voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati
		                      cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est
		                      laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.
		                      <br>
		                      Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id,
		                      quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
		                      Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut
		                      et voluptates repudiandae sint et molestiae non recusandae.
		                      <br>
		                      Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores
		                      alias consequatur aut perferendis doloribus asperiores repellat.
		                    </div>
		                  </div>
		                  <div class="panel-footer">
		                    <div class="avatar-note"><img src="<?php echo base_url();?>assets/images/avatar-2-small.jpg"
		                        alt="">
		                    </div>
		                    <span class="author-note">Nicole</span>
		                    <time class="timestamp" title="2014-02-18T00:00:00-05:00">
		                      2014-02-18T00:00:00-05:00
		                    </time>
		                    <div class="note-options pull-right">
		                      <a href="#readNote" class="read-note"
		                        data-subviews-options='{"startFrom": "right", "onShow": "readNote(subViewElement)", "onHide": "hideNote()"}'><i
		                          class="fa fa-chevron-circle-right"></i> Read</a><a href="#" class="delete-note"><i
		                          class="fa fa-times"></i> Delete</a>
		                    </div>
		                  </div>
		                </div>
		                <div class="item">
		                  <div class="panel-heading">
		                    <h4 class="no-margin">This is the second Note</h4>
		                  </div>
		                  <div class="panel-body space10">
		                    <div class="note-short-content">
		                      Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim
		                      id est laborum. Nemo enim ipsam voluptatem, quia voluptas sit...
		                    </div>
		                    <div class="note-content">
		                      Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim
		                      id est laborum.
		                      <br>
		                      Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia
		                      consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam
		                      est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci v'elit, sed quia non
		                      numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem.
		                      <br>
		                      Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi
		                      ut <strong>aliquid ex ea commodi consequatur?</strong>
		                      <br>
		                      Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae
		                      consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?
		                      <br>
		                      Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id,
		                      quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
		                      Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut
		                      et voluptates repudiandae sint et molestiae non recusandae.
		                      <br>
		                      Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores
		                      alias consequatur aut perferendis doloribus asperiores repellat.
		                    </div>
		                  </div>
		                  <div class="panel-footer">
		                    <div class="note-options pull-right">
		                      <a href="#readNote" class="show-subviews read-note"
		                        data-subviews-options='{"startFrom": "right", "onShow": "readNote(subViewElement)", "onHide": "hideNote()"}'><i
		                          class="fa fa-chevron-circle-right"></i> Read</a><a href="#" class="delete-note"><i
		                          class="fa fa-times"></i> Delete</a>
		                    </div>
		                    <div class="avatar-note"><img src="<?php echo base_url();?>assets/images/avatar-3-small.jpg"
		                        alt="">
		                    </div>
		                    <span class="author-note">Steven</span>
		                    <time class="timestamp" title="2014-02-18T00:00:00-05:00">
		                      2014-02-18T00:00:00-05:00
		                    </time>
		                  </div>
		                </div>
		                <div class="item">
		                  <div class="panel-heading">
		                    <h4 class="no-margin">This is yet another Note</h4>
		                  </div>
		                  <div class="panel-body space10">
		                    <div class="note-short-content">
		                      At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium
		                      voluptatum deleniti atque corrupti, quos dolores...
		                    </div>
		                    <div class="note-content">
		                      At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium
		                      voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati
		                      cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est
		                      laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.
		                      <br>
		                      Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim
		                      id est laborum.
		                      <br>
		                      Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia
		                      consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam
		                      est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci v'elit, sed quia non
		                      numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem.
		                      <br>
		                      Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi
		                      ut <strong>aliquid ex ea commodi consequatur?</strong>
		                    </div>
		                  </div>
		                  <div class="panel-footer">
		                    <div class="note-options pull-right">
		                      <a href="#readNote" class="show-subviews read-note"
		                        data-subviews-options='{"startFrom": "right", "onShow": "readNote(subViewElement)", "onHide": "hideNote()"}'><i
		                          class="fa fa-chevron-circle-right"></i> Read</a><a href="#" class="delete-note"><i
		                          class="fa fa-times"></i> Delete</a>
		                    </div>
		                    <div class="avatar-note"><img src="<?php echo base_url();?>assets/images/avatar-4-small.jpg"
		                        alt="">
		                    </div>
		                    <span class="author-note">Ella</span>
		                    <time class="timestamp" title="2014-02-18T00:00:00-05:00">
		                      2014-02-18T00:00:00-05:00
		                    </time>
		                  </div>
		                </div>
		              </div>
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

    <div class="col-md-7 col-lg-4">
		          <div class="panel panel-dark">
		            <div class="panel-heading">
		              <h4 class="panel-title">Browser</h4>
		              <div class="panel-tools">
		                <div class="dropdown">
		                  <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-white">
		                    <i class="fa fa-cog"></i>
		                  </a>
		                  <ul class="dropdown-menu dropdown-light pull-right" role="menu">
		                    <li>
		                      <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i>
		                        <span>Collapse</span> </a>
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
		            <div class="panel-body no-padding">
		              <div class="partition-green padding-15 text-center">
		                <h4 class="no-margin">Monthly Statistics</h4>
		                <span class="text-light">based on the major browsers</span>
		              </div>
		              <div id="accordion" class="panel-group accordion accordion-white no-margin">
		                <div class="panel no-radius">
		                  <div class="panel-heading">
		                    <h4 class="panel-title">
		                      <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse"
		                        class="accordion-toggle padding-15">
		                        <i class="icon-arrow"></i>
		                        This Month <span class="label label-danger pull-right">3</span>
		                      </a></h4>
		                  </div>
		                  <div class="panel-collapse collapse in" id="collapseOne">
		                    <div class="panel-body no-padding partition-light-grey">
		                      <table class="table">
		                        <tbody>
		                          <tr>
		                            <td class="center">1</td>
		                            <td>Google Chrome</td>
		                            <td class="center">4909</td>
		                            <td><i class="fa fa-caret-down text-red"></i></td>
		                          </tr>
		                          <tr>
		                            <td class="center">2</td>
		                            <td>Mozilla Firefox</td>
		                            <td class="center">3857</td>
		                            <td><i class="fa fa-caret-up text-green"></i></td>
		                          </tr>
		                          <tr>
		                            <td class="center">3</td>
		                            <td>Safari</td>
		                            <td class="center">1789</td>
		                            <td><i class="fa fa-caret-up text-green"></i></td>
		                          </tr>
		                          <tr>
		                            <td class="center">4</td>
		                            <td>Internet Explorer</td>
		                            <td class="center">612</td>
		                            <td><i class="fa fa-caret-down text-red"></i></td>
		                          </tr>
		                        </tbody>
		                      </table>
		                    </div>
		                  </div>
		                </div>
		                <div class="panel no-radius">
		                  <div class="panel-heading">
		                    <h4 class="panel-title">
		                      <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse"
		                        class="accordion-toggle padding-15 collapsed">
		                        <i class="icon-arrow"></i>
		                        Last Month
		                      </a></h4>
		                  </div>
		                  <div class="panel-collapse collapse" id="collapseTwo">
		                    <div class="panel-body no-padding partition-light-grey">
		                      <table class="table">
		                        <tbody>
		                          <tr>
		                            <td class="center">1</td>
		                            <td>Google Chrome</td>
		                            <td class="center">5228</td>
		                            <td><i class="fa fa-caret-up text-green"></i></td>
		                          </tr>
		                          <tr>
		                            <td class="center">2</td>
		                            <td>Mozilla Firefox</td>
		                            <td class="center">2853</td>
		                            <td><i class="fa fa-caret-up text-green"></i></td>
		                          </tr>
		                          <tr>
		                            <td class="center">3</td>
		                            <td>Safari</td>
		                            <td class="center">1948</td>
		                            <td><i class="fa fa-caret-up text-green"></i></td>
		                          </tr>
		                          <tr>
		                            <td class="center">4</td>
		                            <td>Internet Explorer</td>
		                            <td class="center">456</td>
		                            <td><i class="fa fa-caret-down text-red"></i></td>
		                          </tr>
		                        </tbody>
		                      </table>
		                    </div>
		                  </div>
		                </div>
		                <div class="panel no-radius">
		                  <div class="panel-heading">
		                    <h4 class="panel-title">
		                      <a href="#collapseThree" data-parent="#accordion" data-toggle="collapse"
		                        class="accordion-toggle padding-15 collapsed">
		                        <i class="icon-arrow"></i>
		                        Two Months Ago
		                      </a></h4>
		                  </div>
		                  <div class="panel-collapse collapse" id="collapseThree">
		                    <div class="panel-body no-padding partition-light-grey">
		                      <table class="table">
		                        <tbody>
		                          <tr>
		                            <td class="center">1</td>
		                            <td>Google Chrome</td>
		                            <td class="center">4256</td>
		                            <td><i class="fa fa-caret-down text-red"></i></td>
		                          </tr>
		                          <tr>
		                            <td class="center">2</td>
		                            <td>Mozilla Firefox</td>
		                            <td class="center">3557</td>
		                            <td><i class="fa fa-caret-up text-green"></i></td>
		                          </tr>
		                          <tr>
		                            <td class="center">3</td>
		                            <td>Safari</td>
		                            <td class="center">1435</td>
		                            <td><i class="fa fa-caret-up text-green"></i></td>
		                          </tr>
		                          <tr>
		                            <td class="center">4</td>
		                            <td>Internet Explorer</td>
		                            <td class="center">423</td>
		                            <td><i class="fa fa-caret-down text-red"></i></td>
		                          </tr>
		                        </tbody>
		                      </table>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>

</div>


<!-- end: PAGE CONTENT-->
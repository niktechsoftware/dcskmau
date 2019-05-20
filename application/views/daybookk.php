<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading panel-blue border-light">
                <h4 class="panel-title">Day Book Record </h4>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url();?>daybookController/daybook"  method ="post" role="form" id="form">
                    <div class="row"> 
                     <div class="col-md-12 space20">
                        <div class="col-md-6">
                            <div class="col-md-3">Start Date</div>
                                 <div class="col-md-3">
                                 <input type="Date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="st_date" style="width:180px; height:30px;" required/>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-3">End Date</div>
                            <div class="col-md-3">
                                <input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="end_date" id="edate" style="width:180px; height:30px;" required/>
                            </div>
                        </div>               
                    </div>   
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                              <div class="panel-heading panel-pink border-light">
                                   <h6 class="panel-title"> Select Year </h6>
                                </div>
                                <div class="panel-body">
                                    <select class="form-control" id="yearId">
                                        <option value="0">-Select Year-</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                    </select>
                                </div> 
                            </div>
                           </div>
                           <div class="col-md-6">
                            <div class="panel">
                              <div class="panel-heading panel-pink border-light">
                                   <h6 class="panel-title"> Select Course </h6>
                                </div>
                                <div class="panel-body">
                                    <select class="form-control" id="courseId">
                                        <option vlaue="o">-Select Course-</option> 
                                         <?php 
                                       $course= $this->db->get("course")->result();
                                        foreach($course as $view){
                                        ?>
                                        <option <?php echo $view->id;?>><?php echo $view->title;?></option>
                                        <?php } ?>
                                    </select>
                                </div> 
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                     <div class="col-md-12 space20">
                        <div class="col-md-2">
                            <input type="radio" name="check_list" value="all" required="required">All
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="check_list" value="Fee Deposit" required="required">General Male
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="check_list" value="From sale Stock" required="required">General Female
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="check_list" value="Recieve From Bank" required="required">General Both
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="check_list" value="Admission Fee + 1 Month Fee" required="required">Backword Male
                        </div>
                    </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12 space20" >
                        <div class="col-md-3">
                            <input type="radio" name="check_list" value="Recieve From Director" required="required">Backword Female
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="check_list" value="Cash Payment" required="required">Backword Both
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="check_list" value="By Salary" required="required">SC/ST Male
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="check_list" value="Diposit in Bank" required="required">SC/ST Female
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="check_list" value="Diposit to Director" required="required">SC/ST Both
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-md-12 space20" >
                            <div style="color: red;"><!-- <?php echo $msg;?> --></div> 
                         </div>
                    </div>
                </div> 
                
                <div class="row" style="padding-bottom: 20px;">
                     <div class="col-md-6">
                        <div class="col-md-4">
                            <input type="submit" name="dbd" value="Get Detail" class="submit btn btn-blue">
                        </div>
                    </div>
                 </div>  
                </form>
            </div>    
        </div> 
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading panel-blue border-light">
                         <h4 class="panel-title">Show All Details</h4>
                     </div>
                     <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="showList" class="table table-bordered">
                                    <thead>
                                         <tr>
                                        <th>Sno</th>
                                        <th>Roll Number</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Course</th>
                                        <th>Year</th>
                                        <th>Gender</th>
                                        <th>Category</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                       <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                         <tr>
                                        <th>Sno</th>
                                        <th>Roll Number</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Course</th>
                                        <th>Year</th>
                                        <th>Gender</th>
                                        <th>Category</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
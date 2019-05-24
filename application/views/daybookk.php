<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading panel-blue border-light">
                <h4 class="panel-title">Day Book Record </h4>
            </div>
            <div class="panel-body">
               
                    <div class="row"> 
                     <div class="col-md-12 space20">
                        
                            <div class="col-md-3">
                                <h5 class="text-center">Select Session</h5>
                            </div>
                              <div class="col-md-9">
                                  <select name="session_nm" id="session_nm" class="form-control">
                                       <option value="0">-Select Session-</option>
                                       <option value="17">2017</option> 
                                       <option value="18">2018</option>
                                       <option value="19">2019</option>
                                                                     
                                     </select> 
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
                                        <option value="all">ALL</option>
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
                                       
                                    </select>
                                </div> 
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                     <div class="col-md-12 space20">
                        <div class="col-md-2">
                            <input type="radio"  name="check_list" value="all"  required="required">All
                        </div>
                        <div class="col-md-2">
                            <input type="radio"   name="check_list" value="GEN MALE" required="required">General Male
                        </div>
                        <div class="col-md-2">
                            <input type="radio"  name="check_list" value="GEN FEMALE" required="required">General Female
                        </div>
                        <div class="col-md-2">
                            <input type="radio"  name="check_list" value="GEN BOTH" required="required">General Both
                        </div>
                        <div class="col-md-3">
                            <input type="radio"  name="check_list" value="OBC MALE" required="required">Backword Male
                        </div>
                    </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12 space20" >
                        <div class="col-md-3">
                            <input type="radio"  name="check_list" value="OBC FEMALE" required="required">Backword Female
                        </div>
                        <div class="col-md-2">
                            <input type="radio"  name="check_list" value="OBC BOTH" required="required">Backword Both
                        </div>
                        <div class="col-md-2">
                            <input type="radio"  name="check_list" value="SC MALE" required="required">SC/ST Male
                        </div>
                        <div class="col-md-2">
                            <input type="radio"  name="check_list" value="SC FEMALE" required="required">SC/ST Female
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="check_list" value="SC BOTH" required="required">SC/ST Both
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
                            <input type="submit" name="dbd" id="getDetailButton" value="Get Detail" class="submit btn btn-blue">
                        </div>
                    </div>
                 </div>  
               
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
                            <div class="col-md-12" id="showStudList">
                               
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
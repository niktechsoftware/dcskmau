
 <table id="showList" class="table table-bordered">
                                    <thead>
                                         <tr>
                                        <th>Sno</th>
                                        <th>Roll Number</th>
                                        <th>Leaser No</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Year</th>
                                        <th>Course</th>
                                        <th>Fees</th>
                                        <th>Fees Status</th>
                                        <th>Gender</th>
                                        <th>Category</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         $i = 1;
                                            if($view->num_rows()>0){
                                            foreach($view->result() as $row){
                                        ?>
                                       <tr>
                                        <th><?php echo $i;?></th>
                                        <th><?php echo $row->roll_number;?></th>
                                        <th><?php echo $row->leaser_no;?></th>
                                        <th> <?php echo $row->name;?></th>
                                        <th><?php echo $row->mobile_number;?></th>
                                        <th><?php echo $row->year; ?></th>
                                        <th><?php echo $row->course;?></th>
                                        <th><?php echo $row->fee;?></th>
                                         <th><?php echo $row->fee_status;?></th>
                                        <th><?php echo $row->gender;?></th>
                                        <th><?php echo $row->category;?></th>
                                    </tr>
                                    <?php
                                     $i++;
                                        }
                                   }
                                    else{?>
                                       <tr> <th colspan="11" style="text-align: center; color: red;">
                                           <?php echo "Data not found ";?>
                                       </th></tr>
                                  <?php  }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr style="color: black;">
                                        <th>Sno</th>
                                        <th>Roll Number</th>
                                        <th>Leaser No</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Year</th>
                                        <th>Course</th>
                                        <th>Fees</th>
                                        <th>Fees Status</th>
                                        <th>Gender</th>
                                        <th>Category</th>
                                    </tr>
                                    </tfoot>
                                </table>
                               
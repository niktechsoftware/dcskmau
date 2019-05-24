<?php
    $i = 1;
if(isset($view)):
?>
 <table id="showList" class="table table-bordered">
                                    <thead>
                                         <tr>
                                        <th>Sno</th>
                                        <th>Roll Number</th>
                                        <th>Leaser No</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Year</th>
                                        <th>Fees</th>
                                        <th>Fees Status</th>
                                        <th>Gender</th>
                                        <th>Category</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach($view->result() as $row){
                                        ?>
                                       <tr>
                                        <th><?php echo $i;?></th>
                                        <th><?php echo $row->roll_number;?></th>
                                        <th><?php echo $row->leaser_no;?></th>
                                        <th> <?php echo $row->name;?></th>
                                        <th><?php echo $row->mobile_number;?></th>
                                        <th><?php echo $row->year; ?></th>
                                        <th><?php echo $row->fee;?></th>
                                         <th><?php echo $row->fee_status;?></th>
                                        <th><?php echo $row->gender;?></th>
                                        <th><?php echo $row->category;?></th>
                                    </tr>
                                    <?php
                                     $i++;
                                        }
                                       
                                    endif;
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>Sno</th>
                                        <th>Roll Number</th>
                                        <th>Leaser No</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Year</th>
                                        <th>Fees</th>
                                        <th>Fees Status</th>
                                        <th>Gender</th>
                                        <th>Category</th>
                                    </tr>
                                    </tfoot>
                                </table>
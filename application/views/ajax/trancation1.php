
<?php

    $i = 1;
if(isset($view)):
?>
 <table id="showdayList" class="table table-bordered table-striped">
                                    <thead>
                                         <tr>
                                        <th>Sno</th>
                                        <th>Roll Number</th>
                                        <th>Leaser No</th>
                                        <th>Name</th>
                                        <th>Fees</th>
                                        <th>Fees Status</th>
                                        <th>Reciept No</th>
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
                                        <th><?php echo $row->fee;?></th>
                                         <th><?php echo $row->fee_status;?></th>
                                         <th><a href="<?php echo base_url()?>daybookController/recieptNo/<?php echo $row->roll_number;?>" class="btn btn-primary">Print Reciept </a></th>
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
                                        <th>Fees</th>
                                        <th>Fees Status</th>
                                        <th>Reciept No</th>
                                    </tr>
                                    </tfoot>
                                </table>
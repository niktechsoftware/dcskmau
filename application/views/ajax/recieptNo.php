<?php 
    //print_r($view);
?>

<div class="row">
    <div class="col-sm-12">
        <!-- start: INLINE TABS PANEL -->
        <div class="panel panel-white">
            <div class="panel-heading">
                <div class="panel-tools">                                        
                    <div class="dropdown">
                    <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
                        <i class="fa fa-cog"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                        <li>
                            <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                        </li>
                        <li>
                            <a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
                        </li>
                        <li>
                            <a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
                        </li>                                        
                    </ul>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            $invoiceNo = $this->uri->segment(3);
                        ?>
                       <!--  <IFRAME SRC="<?php echo base_url(); ?>invoiceController/invoiceCashDueFee/<?php echo $invoiceNo; ?>" width="100%" height="200px" id="iframe1" style="border: 0px;" onLoad="autoResize('iframe1');">

                        </iframe> -->
                           <table class="table table-borered">
                            <?php 
                                $row = $view->row();
                            ?> 
                            <tr>
                                <td width="10%" style="border: none;">
                                    <img src="<?php echo base_url()?>/assets/images/invoice_logo.jpg" alt="" width="100" />
                                </td>
                                <td style="border: none;">
                                    <h1 align="center" style="text-transform:uppercase;"></h1>
                                    <h3 align="center" style="font-variant:small-caps;">
                                        
                                    </h3>
                                    <h3 align="center" style="font-variant:small-caps;">
                                        दुर्गादत्त चुन्नीलाल सागरमल खण्डेलवाल महाविद्यालय
                                    </h3>
                                    <h3 align="center" style="font-variant:small-caps;">
                                        मऊनाथ भंजन, मऊ
                                    </h3>
                                </td>
                            </tr>

                               <tr>
                                    <th colspan=4>
                                        <?php echo base_url()?>/assets/images/2018studentImages/<?php echo $row->student_image;?>
                                    </th>

                               </tr>
                               <tr>
                                   <th class="text-center">
                                        <tr>
                                            <td colspan=4 class="text-center">Student Detail</td>
                                        </tr>
                                        <tr>
                                            <th class="text-center" >Student Name</th>
                                            <td class="text-left" colspan="3"><?php echo $row->name;?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Student Roll No.</th>
                                            <td colspan="3"><?php echo $row->roll_number;?></td>
                                        </tr>
                                   </th>
                                   <th class="text-center">
                                     <tr>
                                        <td class="text-center">cash Payment</td>
                                    </tr>
                                        <tr>
                                            <th>Reciept No</th>
                                            <td><?php echo $row->reciept_no;?></td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td><?php echo $row->addmissionDate;?></td>
                                        </tr>
                                   </th>
                               </tr>
                               <tr class="bg-primary">
                                   <th class="text-center">No.</th>
                                   <th class="text-center">Fees Description</th>
                                   <th class="text-center">Fees Amount</th>
                                   <th class="text-center">Date</th>
                               </tr>
                               <tr>
                                   <th class="text-center">1</th>
                                   <th class="text-center">Admission Fees</th>
                                   <td class="text-center"><?php echo $row->fee;?></td>
                                   <td class="text-center"><?php echo $row->addmissionDate;?></td>
                               </tr>
                           
                           </table>
       
        
                    </div>
                </div>
            </div>
            <!-- end: INLINE TABS PANEL -->
        </div>
    </div>
    <!-- end: PAGE CONTENT-->
</div>
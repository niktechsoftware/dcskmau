<div class="row table">
        <div class="col-md-12" style="background-color: #f5f5f5; border: 1px solid;">
            <div class="row">
                <table class="table">
                    <tr>
                        <td rowspan="2">  <img src="<?php echo base_url()?>/assets/images/invoice_logo.jpg" alt="" width="100" /></td>
                        <th >
                            <h3  class="text-center" style="font-variant:small-caps;">
                             दुर्गादत्त चुन्नीलाल सागरमल खण्डेलवाल महाविद्यालय</h3>
                        </th>
                    </tr>
                    <tr>
                        <td><h3 class="text-center"  style="font-variant:small-caps;">
                             मऊनाथ भंजन, मऊ </h3></td>
                    </tr>
                    
                </table>
            </div>
            <hr>
                         <?php 
                                $row = $view->row();
                            ?> 
            <div class="row" style="margin: 20px;">
               <table class="table-bordered table">
                    <tr>
                        <td rowspan="3" class="text-center"> <img alt="<?= $row->name; ?>" height="115" width="110" src="<?= base_url(); ?>assets/images/stuImage/<?= $row->student_image;; ?>" /></td>
                        <th colspan="2" class="text-center">
                            Student Detail
                        </th>
                        <th colspan="2" class="text-center">Cash Payment</th>
                    </tr>
                    <tr>
                        <td>Student Name</td>
                        <td><?php echo $row->name;?></td>
                        <td>Reciept No</td>
                        <td><?php echo $row->reciept_no;?></td>
                    </tr>
                    <tr>
                        <td>Roll No.</td>
                        <td><?php echo $row->roll_number;?></td>
                        <td>Date</td>
                        <td><?php echo $row->addmissionDate;?></td>
                    </tr>
                </table>
            </div>
            <div class="row " style="margin: 20px;">
                <div class="col-md-12">
                    <table class="table table-bordered">
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
            
             <div class="row">
                <div class="col-md-12">
                    <button onclick="myFunction()">Print </button>

                    <script>
                    function myFunction() {
                      window.print();
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>

<div class="row table">
        <div class="col-md-12" style="background-color: #f5f5f5; border: 1px solid;">
            <div class="row">
                <div class="col-md-2" width="10%" style="border: none;padding: 50px;">
                     <img src="<?php echo base_url()?>/assets/images/invoice_logo.jpg" alt="" width="100" />
                </div>
                <div class="col-md-10">
                    <h1 align="center" style="text-transform:uppercase;"></h1>
                                    <h3 align="center" style="font-variant:small-caps;">
                                        
                                    </h3>
                                    <h3 align="center" style="font-variant:small-caps;">
                                        दुर्गादत्त चुन्नीलाल सागरमल खण्डेलवाल महाविद्यालय
                                    </h3>
                                    <h3 align="center" style="font-variant:small-caps;">
                                        मऊनाथ भंजन, मऊ
                                    </h3>
                </div>
            </div>
            <hr>
                         <?php 
                                $row = $view->row();
                            ?> 
            <div class="row" style="margin: 20px;">
                <div class="col-md-3">
                     <!-- <img src="<?php echo base_url()?>/assets/images/2018studentImages/<?php echo $row->student_image;?>"> -->
                      <img alt="<?= $row->name; ?>" height="115" width="110" src="<?= base_url(); ?>assets/images/stuImage/<?= $row->student_image;; ?>" />
                </div>
                <div class="col-md-9"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                   <h3 style="color: black;" class="text-center">Student Detail</h3>
                    <div class="row " style="margin: 20px;padding: 10px;">
                        <div class="col-md-6" style="color: black;">Student Name</div>
                        <div class="col-md-6" style="color: black;"><?php echo $row->name;?></div>
                    </div>
                    <div class="row" style="margin: 20px;padding: 10px;">
                        <div class="col-md-6" style="color: black;">Roll No.</div>
                         <div class="col-md-6" style="color: black;"><?php echo $row->roll_number;?></div>
                     </div>
                </div>
                <div class="col-md-6">
                     <h3 style="color: black;" class="text-center">Cash Payment</h3>
                      <div class="row " style="margin: 20px;padding: 10px;">
                          <div class="col-md-3" style="color: black;">Reciept No</div>
                        <div class="col-md-3" style="color: black;"><?php echo $row->reciept_no;?></div>
                    </div>
                    <div class="row" style="margin: 20px;padding: 10px;">
                         <div class="col-md-3" style="color: black;">Date</div>
                         <div class="col-md-3" style="color: black;"><?php echo $row->addmissionDate;?></div>
                     </div>
                </div>
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

<title><?php echo $title; ?></title>

	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/prin_result.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
	
	<style type="text/css">

	@media print
	{
			body * { visibility: hidden; }
			#printcontent * { visibility: visible; }
			#printcontent { position: absolute; top: 0px; left: 75px; }
	    }
    .nob{
    	border: none;
    }
	</style>
	<style type="text/css">
table tr td {
    border:1px solid black;
    text-align:center;
    line-height:32px;
}
table th{
    border:1px solid black;
    line-height:32px;
}
	</style>
    <script>
        function convert_number(number)
        {
            if ((number < 0) || (number > 999999999))
            {
                return "Number is out of range";
            }
            var Gn = Math.floor(number / 10000000);  /* Crore */
            number -= Gn * 10000000;
            var kn = Math.floor(number / 100000);     /* lakhs */
            number -= kn * 100000;
            var Hn = Math.floor(number / 1000);      /* thousand */
            number -= Hn * 1000;
            var Dn = Math.floor(number / 100);       /* Tens (deca) */
            number = number % 100;               /* Ones */
            var tn= Math.floor(number / 10);
            var one=Math.floor(number % 10);
            var res = "";

            if (Gn>0){
                res += (convert_number(Gn) + " Crore");
            }
            if (kn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(kn) + " Lakhs");
            }
            if (Hn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(Hn) + " Thousand");
            }

            if (Dn){
                res += (((res=="") ? "" : " ") +
                    convert_number(Dn) + " hundred");
            }


            var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
            var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

            if (tn>0 || one>0)
            {
                if (!(res==""))
                {
                    res += " and ";
                }
                if (tn < 2)
                {
                    res += ones[tn * 10 + one];
                }
                else
                {

                    res += tens[tn];
                    if (one>0)
                    {
                        res += ("-" + ones[one]);
                    }
                }
            }

            if (res=="")
            {
                res = "zero";
            }
            return res;
        }

    </script>
</head>

<body>
	<div id="printcontent" align="center">
	<br/><br/><br/>
	<div id="page-wrap" style="width:730px; border: 1px solid black; outline: 1px solid black; solid #333;">
<?php

	 $this->db->where("roll_number",$id);
	$rowc = $this->db->get("student_info")->row();

?>		

		<table style="width: 95%">
			<tr>
				<td width="6%" style="border: none;" rowspan="2">
					<img src="http://dcskmau.com/dcs/assets/images/invoice_logo.jpg" alt="" width="100" />
				</td>
				<td style="border: none;">
					<h2 style="margin-left:10px;" ><b>दुर्गादत्त चुन्नीलाल सागरमल खण्डेलवाल स्नाकोत्तर महाविद्यालय</b></h2>
			        <h3  style="margin-left:10px;margin-top:8px;">
						मऊनाथ भंजन, मऊ
			        </h3>
			       
				</td>
			</tr>
			<tr>
				<td style="border: none;">
					
						<h2  style="border: 0px solid #000; padding: 5px; width: 250px; margin-left:125px;">
							&nbsp;&nbsp;&nbsp;&nbsp;पुस्तकालय कार्ड (2018-19)<br>
						</h2>
					
				</td>
			</tr>
		</table>
        <hr/>
		<div style="clear:both"></div>
		
		<div id="customer">
        	<div style="display:inline-block; float:left; margin-left:5px;">
            <table> 
          
                     <tr>
                    	<td style="border:none; line-height: 15px;text-align:left;">
                        	
				  		<h4>Roll Number : <strong><?php echo $rowc->roll_number ; ?></strong>	</h4>
				  		
                        </td>
                        <td style="border:none; line-height: 15px;text-align:left; padding-left:60px;">
                    		<h4>Leaser Number : <strong><?php echo $rowc->leaser_no; ?></strong></h4>
                        </td>
                       
                    </tr>
                    <tr>
                    	<td style="border:none;  line-height: 15px;text-align:left;">
                    		<h4>Student Name : <strong><?php echo $rowc->name; ?></strong></h4>
                        </td>
                        <td style="border:none; line-height: 15px;text-align:left;padding-left:60px;">
                    		<h4>Father Name : <strong><?php echo $rowc->father_name; ?></strong></h4>
                        </td>
                    </tr>
                    
                     
                     <tr>
                    	<td style="border:none; line-height: 15px;text-align:left;">
                    		<h4>Class : <strong><?php echo $rowc->course.' '.$rowc->year; ?></strong></h4>
                        </td>
                        <td style="border:none; line-height: 15px;text-align:left; padding-left:60px;">
                    		<h4>Mobile Number : <strong><?php echo $rowc->mobile_number; ?></strong></h4>
                        </td>
                    </tr>
                   
                     <tr>
                    	<td style="border:none; line-height: 15px;text-align:left;" colspan="2">
                    		<h4>Address : <strong><?php echo $rowc->address; ?></strong></h4>
                        </td>
                    </tr>
                 
            </table>
			</div>
			
			
			<div style="display:inline-block; float:right; margin-right:5px;">
            <table>
                <tr>
                    	<td style="border:none; line-height: 20px;">
                    	    <?php if(($rowc->year)=="1st") {?>
                    		<img src="<?php echo base_url();?>/assets/images/2018studentImages/<?php echo $rowc->student_image; ?>"  alt="" width="75" />
                        <?php }
                        else{
                            ?>
                            <img src="<?php echo base_url();?>/assets/images/stuImage/<?php echo $rowc->student_image; ?>"  alt="" width="75" />
                       <?php } ?>
                        </td>
                    </tr>
                   
            </table>
            </div>
          
		</div>
		
			<table id="items" align="center"  style="border:1px solid black; width:100%; margin-top:0px; alignment-adjust:central;">
					<thead>
						<th>क्रमांक</th>
						<th> निर्गत तिथि </th>
						<th> पुस्तक संख्या</th>
						<th style="width:30%;"> पुस्तक का नाम</th>
						<th>वापसी तिथि</th>
						<th >हस्ताक्षर लिपिक</th>
						<th>छात्र हस्ताक्षर</th>
						
					</thead>
					<body>
					<tr>
						<td> 01</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
							<tr>
						<td> 02</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
							<tr>
						<td> 03</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						</tr>
							<tr>
						<td> 04</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						</tr>
							<tr>
						<td> 05</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						</tr>
						<tr>
						<td> 06</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						</tr>
							<tr>
						<td> 07</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						</tr>
						<tr>
						<td> 08</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						
						</tr>
						</tr>
						<tr>
						<td> 09</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						</tr>
						</tr>
						<tr>
						<td> 10</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						</tr>
						</tr>
						<tr>
						<td> 11</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						</tr>
						</tr>
						<tr>
						<td> 12</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						</tr>
						</tr>
						<tr>
						<td> 13</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
						</tr>
						</tr>
						<tr>
						<td> 14</td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td> </td> 
						<td></td>
						<td></td>
				
						</tr>
				
					</body>
			
			</table>
		
		<div align="left">
		 <h3> नोट: -</h3>  
<h4 style="border:none; line-height: 25px;"> <strong>.</strong>बिलम्ब की स्थिति मे RS 10 प्रतिमाह की दर से अर्थ दण्ड लगेगा पुस्तक न जमा करने पर Rs 50 बिलम्ब शुल्क के साथ पुस्तक का
मूल्य देय होगा।</h4>
<h4 style="border:none; line-height: 25px;"><strong>.</strong>पुस्तक को सम्भाल कर अध्ययन करें।</h4>
<h4 style="border:none; line-height: 25px;"><strong>.</strong>पुस्तकालय के नियम काे भली-भाँति पुस्तकालय मे अंकित नियमावली को पढ़ ले।</h4>
		</div>
		
		<div>
		</div>
		<div> </div>
	</div>
	
	</div>
	
	
	<br/><br/>
	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
        </button>
    </div>
</body>

</html>
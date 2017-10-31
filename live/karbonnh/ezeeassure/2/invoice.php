<?phpfunction getIndianCurrency( $number){    $decimal = round($number - ($no = floor($number)), 2) * 100;    $hundred = null;    $digits_length = strlen($no);    $i = 0;    $str = array();    $words = array(0 => '', 1 => 'one', 2 => 'two',        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',        7 => 'seven', 8 => 'eight', 9 => 'nine',        10 => 'ten', 11 => 'eleven', 12 => 'twelve',        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',        40 => 'forty', 50 => 'fifty', 60 => 'sixty',        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');    $digits = array('', 'hundred','thousand','lakh', 'crore');    while( $i < $digits_length ) {        $divider = ($i == 2) ? 10 : 100;        $number = floor($no % $divider);        $no = floor($no / $divider);        $i += $divider == 10 ? 1 : 2;        if ($number) {            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;        } else $str[] = null;    }    $Rupees = implode('', array_reverse($str));    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise ;} //$amount_invoice = number_format((float)$_SESSION['amount'], 2, '.', ''); $amount_invoice = floatval($_SESSION['amount']);  $sub_total = round(($amount_invoice*100)/118,2);  $sub_total_tax = round($amount_invoice-$sub_total,2);  $sgst = round(($sub_total_tax/2),2);  $CGST = $sgst;  ?><style>.pdf_invoice_heading_table {	width: 50%;}.pdf_invoice_addr_table {	width: 50%;}.pdf_invoice_heading_table2{width: 95%;;color:#fff;}.pdf_invoice_body_table2{width: 95%;;}.pdf_invoice_seller_buyer_table th {	font-weight: bold;}/* pdf_invoice_items_table */.pdf_invoice_items_table {	padding: 5px;}.pdf_invoice_items_table th {	font-weight: bold;	border: 1px solid #F0F0F0;}.pdf_invoice_items_table td {	border: 1px solid #F0F0F0;}.pdf_invoice_totals_table {	padding: 5px;}.pdf_invoice_totals_table th {	width: 85%;	text-align: right;}.pdf_invoice_totals_table td {	width: 15%;	text-align: right;	border: 1px solid #F0F0F0;}.pdf_invoice_space{width:5%;} .pdf_invoice_body_table_2{ Border-top: 1px  solid  #000000;  Border-bottom: 1px  solid  #000000; }</style><h1>Invoice</h1><p><table class="pdf_invoice_heading_table"><tbody>	<tr><th>Invoice No.</th><td><?php echo str_pad((string)$order_no, 6, "0", STR_PAD_LEFT)?></td></tr>	<tr><th>Invoice Date</th><td><?php echo $invoice_date;?></td></tr>	<tr><th>Order No.</th><td><?php echo str_pad((string)$order_no, 6, "0", STR_PAD_LEFT)?></td></tr></tbody></table></p><p><table class="pdf_invoice_seller_buyer_table"><tbody>	<tr><th>Seller</th><th>Buyer</th></tr>	<tr><td>PICKME ESOLUTIONS PVT LTD<br>Unit No.210, Second Floor, Quantum Tower, OFF S.V Road,<br>Near Chincholi Pathak, Malad West, Mumbai - 400064.<br></td><td>-</td></tr></tbody></table></p><p><table style="width:88%;border:1px solid #ccc" border="1" cellspacing="0" cellpadding="7"><tbody>	<tr>        <th style="width:55%"><b>Product</b></th>        <th style="width:20%"><b>HSN/SAC</b></th>        <th style="width:15%"><b>Qty</b></th>        <th style="text-align:right"><b>Total(Rs)</b></th></tr>	<tr>        <td style="width:55%">EAZEEASSURE 650</td>        <td style="width:20%">9985</td>        <td style="width:15%">1</td>        <td style="text-align:right"><?php echo $sub_total;?></td></tr></tbody></table><table class="pdf_invoice_totals_table"><tbody>		<tr><th>CGST @ 9%</th><td><?php echo $CGST?> </td></tr>        <tr><th>SGST @ 9%</th><td><?php echo $sgst?></td></tr>	<tr><th>Order Total</th><td><?php echo $amount_invoice;?></td></tr></tbody></table></p><p>	<b>Amount Chargeable (in words)</b>	<br> 	INR <?php echo getIndianCurrency($amount_invoice);?> Only<br></p><br><p><b>Tax Amount (in words) :</b>	<br>INR <?php echo getIndianCurrency($sub_total_tax);?> Only</p><table><tr><td style="width:50%"><p><b>GSTIN/UIN:</b> 27AAGCP5587N1ZK</b></p><p><b>CIN:</b> U27310MH2012PTC228275</p><p><b>PAN:</b> AAGCP5587N</p><p>Payment method: Online Payment</p></td><td style="width:50%"><p>	Company's Bank Details	<br>	  	<b>Bank Name :</b>	 	 	Dena Bank	<br> 	  	<b>A/c No. :</b>	 	 	000111024054	 	 <br> 	<b>Branch &amp; IFS Code :</b> Mumbai Main Office &amp; BKDN0451507 <br></p></td></tr></table><table><tr><td align="right">Authorised Signatory</td></tr><tr><td><hr /></td></tr><tr><td align="center">This is a Computer Generated Invoice</td></tr></table>
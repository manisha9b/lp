<?php
ob_start(); 
session_start();
include_once 'includes/define.php';
include_once('includes/connectdb.php');
/** Include PHPExcel */
require_once 'phpexcel/Classes/PHPExcel.php';
$brandArray['smarantee1'] = 'SMARANTEE 499';
$brandArray['smarantee2'] = 'SMARANTEE 899';
$brandArray['ezeeassure1'] = 'EZEEASSURE 400';
$brandArray['ezeeassure2'] = 'EZEEASSURE 650';
$brandArray['ezeewarranty1'] = 'EZEEWARRANTY 449';
$brandArray['ezeewarranty2'] = 'EZEEWARRANTY 729';
$brandArray['smaranteeh1'] = 'SMARANTEE H 499';
$brandArray['smaranteeh2'] = 'SMARANTEE H 899';
$brandArray['ezeeassureh1'] = 'EZEEASSURE H 400';
$brandArray['ezeeassureh2'] = 'EZEEASSURE H 650';
$brandArray['ezeewarrantyh1'] = 'EZEEWARRANTY H 449';
$brandArray['ezeewarrantyh2'] = 'EZEEWARRANTY H 729';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
$excel_name = 'list';
$objPHPExcel->getProperties()->setCreator("Karbonn")
							 ->setLastModifiedBy("Karbonn")
							 ->setTitle($excel_name."User List")
							 ->setSubject($excel_name." User List")
							 ->setDescription($excel_name." User List")
							 ->setKeywords($excel_name." User List")
							 ->setCategory($excel_name." User List");
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Sr. No.')
            ->setCellValue('B1', 'Brand')
            ->setCellValue('C1', 'Name')
			->setCellValue('D1', 'Phone')
			->setCellValue('E1', 'Email')
			->setCellValue('F1', 'City')
			->setCellValue('G1', 'Model')
			->setCellValue('H1', 'IMEI No.')
			->setCellValue('I1', 'Amount')
			->setCellValue('J1', 'Payment')
			->setCellValue('K1', 'Trasaction No.')
			->setCellValue('L1', 'Payment Mode')
			->setCellValue('M1', 'Status');
			$where = $_SESSION['where_export'];
$select_query = "SELECT u.user_id,DATE_FORMAT(u.cdate,'%d/%m/%Y') as date,o.transaction_id,o.udate,u.name,u.contact,u.Brand,u.email,u.city,m.model,u.imei_no,u.amount,o.ord_id,o.`status`,o.payment_mode ,u.status as user_status 
			FROM user u
			LEFT JOIN orders o ON o.user_id=u.user_id left join tbl_model m on m.model_id=u.model $where order by u.cdate desc 
			";
		/*	 $select_query = "SELECT u.user_id,DATE_FORMAT(u.cdate,'%d/%m/%Y') as date,o.transaction_id,o.udate,u.name,u.contact,u.Brand,u.email,u.city,u.model,u.imei_no,u.amount,o.ord_id,o.`status FROM user u LEFT JOIN orders o ON o.user_id=u.user_id left join tbl_model m on m.model_id=u.model $where order by u.cdate desc
			";*/
			$query = mysql_query($select_query);
						$query = mysql_query($select_query);
				if ($query) {
					$r=0;
							while($row = mysql_fetch_assoc($query))
							{
									if($row['user_id']>0){
										$user_id = $row['user_id'];
										$date	 = $row['date'];
										$brand	 = isset($brandArray[$row['Brand']])?$brandArray[$row['Brand']]:'';
										$name 	 = $row['name'];
										$phone 	 = $row['contact'];
										$payment = ($row['status']==1)?'Paid':'Unpaid';
										$amount  = $row['amount'];
										$model   = $row['model'];
										$imei_no = $row['imei_no'];
										$city 	 = $row['city'];
										$email 	 = $row['email'];
										$user_status 	 = $row['user_status'];
										$payment_mode 	 = $row['payment_mode'];
										$transaction_id 	 = $row['transaction_id'];
										$col_no=2;
										$a= "A".($col_no+$r);
										$b= "B".($col_no+$r);
										$c= "C".($col_no+$r);
										$d= "D".($col_no+$r);
										$e= "E".($col_no+$r);
										$f= "F".($col_no+$r);
										$g= "G".($col_no+$r);
										$h= "H".($col_no+$r);
										$i= "I".($col_no+$r);
										$j= "J".($col_no+$r);
										$k= "K".($col_no+$r);
										$l= "L".($col_no+$r);
										$m= "M".($col_no+$r);
										$objPHPExcel->setActiveSheetIndex(0)
													->setCellValue($a, ($r+1))
													->setCellValue($b, $brand)
													->setCellValue($c, $name)
													->setCellValue($d, $phone)
													->setCellValue($e, $email)
													->setCellValue($f, $city)
													->setCellValue($g, $model)
													->setCellValue($h, $imei_no)
													->setCellValue($i, $amount)
													->setCellValue($j, $payment)
													->setCellValue($k, $transaction_id)
														->setCellValue($l, $payment_mode)
														->setCellValue($m, $user_status)
													;
													
										$r++;	
									}
							}
							}
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$excel_name.'_'.date('Ymdhis').'.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0 


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
ob_end_clean();
$objWriter->save('php://output');
exit;	
?>
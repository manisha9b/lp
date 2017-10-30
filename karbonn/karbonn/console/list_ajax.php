<?php
include_once('includes/define.php');
include_once('includes/connectdb.php'); 
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
$statusArr['Declined'] = 'Declined';
$statusArr['In-Process'] = 'In Process';
$statusArr['Closed'] = 'Closed';
if(isset($_POST['action']) && $_POST['action']!=''){
	switch($_POST['action']){
		case "submit_kform":
				
				 $status 		= isset($_POST['status'])?$_POST['status']:''; 
				 if($status!=''){
					 foreach($_POST['user_id'] as $key=>$user){
						 $update_query="update `user` set status =  '$status' where user_id = '".$user."'";		
		
						$query = mysql_query($update_query);
					 }
					 echo '<div class="alert alert-success ">
  <strong>Successfully Updated.</strong>
</div>';
				 }
		break;
	}
}
?>
<div> <button type="button" id="export_data" onClick="window.open('<?php echo ADMIN_WEBSITE_URL?>/export.php');" class="btn btn-danger pull-right">Export</button></div>
 <form action="" method="post" id="k_form" >
 <input type="hidden" name="action" value="submit_kform" />
 <?php if(isset($_POST['brand'])){ ?>
 <input type="hidden" name="brand" value="<?php echo $_POST['brand']?>" />
 <?php } if(isset($_POST['date_range'])){ ?>
 <input type="hidden" name="date_range" value="<?php echo $_POST['date_range']?>" />
 <?php } ?>
<table class="table table-hover" id="tabledata">
			  <thead>
				<tr>
				<th id="check_all"><input type="checkbox" id="user_id_all" name="user_id_all" /></th>
				  <th style="width:5px;" class="visible-lg">#</th>
				  <th width="23%" class="text-center">Registartion Date </th>
				  <th class="text-center">Brand</th>
				  <th class="text-center">Model</th>
				  <th class="text-center">Name</th>
				  <th class="text-center visible-lg">Phone</th>
				  
				  <th class="text-center" >Payment</th>
				  <th class="text-center visible-lg">Payment Mode</th>
				  <th class="text-center visible-lg">Amount</th>
				  <th class="text-center visible-lg">Status</th>
				  <th class="text-center"></th>
				  </tr>
			  <thead>
			  <tbody>
			<?php
			$where= '';
			if(isset($_POST['brand']) && trim($_POST['brand'])!=''){
				$where_arr[] = ' u.brand = "'.$_POST['brand'].'"';
			}
			if(isset($_POST['date_range']) && trim($_POST['date_range'])!=''){
				$date_range_arr = explode(' - ',$_POST['date_range']);
				//$date_range_arr = explode(' - ',$_POST['date_range']);
				$date_range1_arr = explode('/',$date_range_arr[0]);
				$date_range2_arr = explode('/',$date_range_arr[1]);
			
				$date_range1 =   $date_range1_arr['2'].'-'.$date_range1_arr['1'].'-'.$date_range1_arr['0'].' 00:00:00';
				$date_range2 =   $date_range2_arr['2'].'-'.$date_range2_arr['1'].'-'.$date_range2_arr['0'].' 23:59:50';

				$where_arr[] = "u.cdate between '$date_range1' and '$date_range2'" ;
				
			}
			if(isset($where_arr)){
				$where = implode(' and ',$where_arr);
				$where = ' where '.$where;
			}
			session_start();
$_SESSION['where_export'] = $where;
		 	 $select_query = "SELECT u.user_id,DATE_FORMAT(u.cdate,'%d/%m/%Y') as date,u.name,u.contact,u.Brand,u.email,u.city,m.model,u.imei_no,u.amount,o.ord_id,o.`status`,o.payment_mode,u.status as user_status FROM user u LEFT JOIN orders o ON o.user_id=u.user_id left join tbl_model m on m.model_id=u.model $where order by u.cdate desc
			";
			$query = mysql_query($select_query);
				if ($query) {
					$i=0;
							while($row = mysql_fetch_assoc($query))
							{
								//print_R($row);

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
									$payment_mode = $row['payment_mode'];
									?>
									<tr>
										<td id="check_<?php echo $user_id?>"><input class="user_check" type="checkbox" id="user_id_<?php echo $user_id?>" name="user_id[]" value="<?php echo $user_id?>" /></td>
										<td class="visible-lg"><?php echo ($i+1)?></td>
										<td class="text-center" id="date_<?php echo $user_id?>"><?php echo $date;?></td>
										<td class="text-center" id="brand_<?php echo $user_id?>"><?php echo $brand;?></td>
										<td class="text-center  visible-lg" id="model_nm_<?php echo $user_id?>"><?php echo $model;?></td>
										<td class="text-center" id="name_<?php echo $user_id?>"><?php echo $name;?></td>
										<td class="text-center visible-lg" id="phone_<?php echo $user_id?>"><?php echo $phone;?></td>
										<td class="text-center" id="payment_<?php echo $user_id?>"><?php echo $payment;?></td>
										<td class="text-center visible-lg" id="payment_mode_<?php echo $user_id?>"><?php echo $payment_mode;?></td>
										<td class="text-center visible-lg" id="amount_<?php echo $user_id?>"><?php echo $amount;?></td>
										<td class="text-center visible-lg" id="user_status_<?php echo $user_id?>"><?php echo $user_status;?></td>
										<td class="text-center" id="date_<?php echo $user_id?>">
										<a href="javascript:void(0);" onClick="viewDetail(<?php echo $user_id?>);">view</a>
										<input type="hidden" name="model" id="model_<?php echo $user_id?>" value="<?php echo $model;?>" />
										<input type="hidden" name="imei_no" id="imei_no_<?php echo $user_id?>" value="<?php echo $imei_no;?>" /></td>
										<input type="hidden" name="city" id="city_<?php echo $user_id?>" value="<?php echo $city;?>" /></td>
										<input type="hidden" name="email" id="email_<?php echo $user_id?>" value="<?php echo $email;?>" /></td>
									</tr>
									<?php
								$i++;	
								}
							}
							if($i==0){
								echo "<td colspan='8' align='center' >No Records</td>";
							}
						}else{
							echo "<td colspan='8' align='center' >No Records</td>";
						}				
			?>
				</tbody>
			</table>
			 <div class="col-md-12">
		    <div class="row">
			<div class="col-md-4">
              <div class="form-group">
              
                <select class="form-control select2" name="status" id="status" style="width: 100%;">
                  <option value="" selected="">Select Status</option>
				  <?php foreach($statusArr as $key=>$val){
					  echo "<option value='$key'>$val</option>";
				  }?>

                </select>
              </div>
              </div>
				 <div class="col-md-2">
                <button type="button" id="submit_data" onClick="submitData();" class="btn btn-info pull-right">Submit</button>
				</div>
			 <!-- <div class="col-md-6">
					<button type="button" id="clear_btn" class="btn btn-default ">Clear</button>
				</div> -->
		   </div>
		   </div>
		</form>

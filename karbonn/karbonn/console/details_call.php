<?php 

include_once('includes/define.php');
include_once('includes/connectdb.php');
session_start();

include_once('partials/main_header.php');
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include_once('partials/header.php')?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include_once('partials/sidebar.php')?>
  <!-- Content Wrapper. Contains page content -->
  
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Call Details List
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo ADMIN_WEBSITE_URL;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Call Details List</li>
      </ol>
    </section>
	<section class="content">
		<div class="row">
		<div class="col-sm-12">
	<div class="box">
		 <div class="box-header" id="table_list_filter">
		 <!--   <form action="" method="post" id="search-form" >
			<div class="col-md-4">
             <div class="form-group">
              
               <select class="form-control select2" name="brand" id="brand" style="width: 100%;">
                  <option value="" selected="">All Brands</option>
				  <?php //foreach($brandArray as $kBrand=>$vBrand){
					 // echo "<option value='$kBrand'>$vBrand</option>";
				 // }?>

                </select>
              </div>
              </div>
		  <div class="col-md-4">
			<div class="form-group">
             

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date_range" class="form-control pull-right" id="date_range">
                </div>-->
                <!-- /.input group -->
            <!--  </div>
		  </div>
		   <div class="col-md-4">
		    <div class="row">
				 <div class="col-md-4">
                <button type="button" id="search_data" onClick="searchData();" class="btn btn-info pull-right">Search</button>
				</div>
			 <!-- <div class="col-md-6">
					<button type="button" id="clear_btn" class="btn btn-default ">Clear</button>
				</div> -->
		  <!-- </div>
		   </div>
		   </form>-->
		   
		</div>
	
		<div class="box-body" id="table_list">
			<table class="table table-hover" id="tabledata">
			  <thead>
				<tr>
				  <th style="width:5px;" class="visible-lg">#</th>
				  <th width="23%" class="text-center">Mobile Number </th>
				  <th class="text-center">Date</th>
				  <th class="text-center">Status</th>
				 <!-- <th class="text-center">Name</th>
				  <th class="text-center visible-lg">Phone</th>
				  
				  <th class="text-center" >Payment</th>
				  <th class="text-center visible-lg">Payment Mode</th>
				  <th class="text-center visible-lg">Amount</th>
				  <th class="text-center"></th>-->
				  </tr>
			  <thead>
			  <tbody>
		<?php
		
		$select_query = "SELECT a.id,DATE_FORMAT(a.created_on,'%d/%m/%Y') as date,a.To as to,a.From as from,a.Status as status";
			$query = mysql_query($select_query);		if ($query) {
					$i=0;
							while($row = mysql_fetch_assoc($query))
							{
								//print_R($row);
$from= $row['from'];
$status=$row['status'];
$date=$row['date'];
								
									
			?>	
<tr>			
		<td class='visible-lg'>
		<?php echo ($i+1)?>
		</td>
		<td class='text-center  visible-lg'>
		<?php echo $from; ?>
		</td>";
			<td class='text-center  visible-lg'>
		<?php echo $status; ?>
</td>
			<td class='text-center  visible-lg'>
		<?php echo $date; ?>
	</td>
					<?php			
						
						}
							$i++;
		} 
			
			?>
			</tr>
				</tbody>
			</table>
		</div>
	</div>
		</div>
	</section>

    
  </div>
  </div>
  </div>
  <!-- /.content-wrapper -->
 <?php include_once('partials/footer.php')?>
<!-- AdminLTE for demo purposes -->

<script type="text/javascript">
function viewDetail(id){
	var brand = $('#brand_'+id).text();
	brand  = (brand=='')?'Karbonn':brand;
		$('#brand_text').text(brand);
		$('#name_text').text($('#name_'+id).text());
		$('#phone_text').text($('#phone_'+id).text());
		$('#email_text').text($('#email_'+id).val());
		$('#city_text').text($('#city_'+id).val());
		$('#model_text').text($('#model_'+id).val());
		$('#imei_text').text($('#imei_no_'+id).val());
		$('#amount_text').text($('#amount_'+id).text());
		$('#payment_text').text($('#payment_'+id).text());
	$('#view_detail').modal('show');
}
function searchData(){

	$.ajax({				
		url: 'list_ajax.php',				
		type: 'POST',				
		dataType: 'html',				
		async: false,				
		data: $('#search-form').serialize(),				
		success: function(response) {	
//alert("t");
			$("#table_list").html(response);
			onLoadFunctions();
		}
	});
}
	  function onLoadFunctions(){
			 $('#tabledata').DataTable({
				  'paging'      : true,
				  'lengthChange': false,
				  'searching'   : false,
				  'ordering'    : false,
				  'info'        : true,
				  'autoWidth'   : true
				})
				
				 $('#date_range').daterangepicker({
				  autoUpdateInput: false,
				  locale: {
					  cancelLabel: 'Clear'
				  }
			  });
			  $('#date_range').on('apply.daterangepicker', function(ev, picker) {
				  $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
			  });

			 $('#date_range').on('cancel.daterangepicker', function(ev, picker) {
				  $(this).val('');
			  });
	  }
</script>
</body>
</html>

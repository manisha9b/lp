<?php 
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
/*$select_query = "SELECT count(1) as count FROM USER u";
$query = mysql_query($select_query);
$total = 0;
$limit = 20;
	if ($query) {
		$row = mysql_fetch_assoc($query);
		$total = $row['count'];
	}
$page = (isset($_GET['p']) && $_GET['p']>0)?$_GET['p']:1
$offset = $pageNo*$limit-$limit;
$limit_sql = " LIMIT ". $offset . "," . (int)$limit;
$start = $offset;
$end = $start+$limit-1;*/
?>
<div class="col-sm-12">
	<div class="box">
		 <div class="box-header" id="table_list_filter">
		  <form action="" method="post" id="search-form" >
			<div class="col-md-4">
              <div class="form-group">
              
                <select class="form-control select2" name="brand" id="brand" style="width: 100%;">
                  <option value="" selected="">All Brands</option>
				  <?php foreach($brandArray as $kBrand=>$vBrand){
					  echo "<option value='$kBrand'>$vBrand</option>";
				  }?>

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
                </div>
                <!-- /.input group -->
              </div>
		  </div>
		   <div class="col-md-4">
		    <div class="row">
				 <div class="col-md-4">
                <button type="button" id="search_data" onClick="searchData();" class="btn btn-info pull-right">Search</button>
				</div>
			 <!-- <div class="col-md-6">
					<button type="button" id="clear_btn" class="btn btn-default ">Clear</button>
				</div> -->
		   </div>
		   </div>
		   </form>
		</div>
		<div class="box-body" id="table_list">
			<?php include_once('list_ajax.php');?>
		</div>
	</div>
	<div class="modal fade" id="view_detail">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span id="brand_text"></span></h4>
              </div>
              <div class="modal-body">
                <div class="row">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4"><b>Name</b></div>
							<div class="col-sm-8" id="name_text"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4"><b>phone</b></div>
							<div class="col-sm-8" id="phone_text"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4"><b>Email</b></div>
							<div class="col-sm-8" id="email_text"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4"><b>City</b></div>
							<div class="col-sm-8" id="city_text"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4"><b>Model</b></div>
							<div class="col-sm-8" id="model_text"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4"><b>IMEI No.</b></div>
							<div class="col-sm-8" id="imei_text"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4"><b>Amount</b></div>
							<div class="col-sm-8" id="amount_text"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4"><b>Payment</b></div>
							<div class="col-sm-8" id="payment_text"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4"><b>Status</b></div>
							<div class="col-sm-8" id="user_status"></div>
						</div>
					</div>
				</div>
              </div>
              <div class="modal-footer">
               <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</div>

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
		$('#user_status').text($('#user_status_'+id).text());
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
function submitData(){

	$.ajax({				
		url: 'list_ajax.php',				
		type: 'POST',				
		dataType: 'html',				
		async: false,				
		data: $('#k_form').serialize(),				
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
				  'lengthChange': true,
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
			$("#user_id_all").click(function(){
			//alert("hi"+$("#user_id_all").is(':checked'));
			if($("#user_id_all").is(':checked')){
				$('.user_check').prop("checked", true);
			}else{
				$('.user_check').prop("checked", false);
			}
			
			$(".user_check").click(function(){
 //alert("hi--"+$(".user_check").length+" -- "+$(".user_check:checked").length);
					if($(".user_check").length == $(".user_check:checked").length) {
						$('#user_id_all').prop("checked", true);
					} else {
						$("#user_id_all").prop("checked", false);
					}
			  });
			  $('select[name="tabledata_length"]').change(function() {
				   // alert("hi--"+$(".user_check").length+" -- "+$(".user_check:checked").length);
					if($(".user_check").length == $(".user_check:checked").length) {
						$('#user_id_all').prop("checked", true);
					} else {
						$("#user_id_all").prop("checked", false);
					}
});
		});
	  }
</script>
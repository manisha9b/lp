<?php
//define("WEBSITE_URL","http://www.sspadvantage.com/karbonn/ezeewarranty/2");
define("WEBSITE_URL","http://localhost/lp/karbonn/karbonn/smarantee/2");
define("SUCCESS_URL",WEBSITE_URL.'/payu/success.php');
define("FAILURE_URL",WEBSITE_URL.'/payu/failure.php');
define("PAYU_SALT","e5iIg1jwi8");
define("PAYU_KEY","rjQUPktU");
define("PAYU_URL","https://test.payu.in");
define("BRAND_PRICE",899);
define("BRAND_NAME",'smaranteeh2');
/*define("PAYU_SALT","qL2jVYYrvL");
define("PAYU_KEY","llRZqSU5");
define("PAYU_URL","https://secure.payu.in");*/
function getModelLess($range = 5000){
	$result = array();
	$sql = "select model_id,model from tbl_model where price_range<=".$range;
	$html = '';
	$query = mysql_query($sql);
	$i = 1;
				if ($query) {
					while($r = mysql_fetch_assoc($query)){
						$result['data'][$i] = $r;
						$html .= "<option value='".$r['model_id']."'>".$r['model']."</option>";
					}
				}
	$result['html'] = $html;
	return $result;
}
function getModelMore($range = 5000){
	$result = array();
	$sql = "select model_id,model from tbl_model where price_range>=".$range;
	$html = '';
	$query = mysql_query($sql);
	$i = 1;
				if ($query) {
					while($r = mysql_fetch_assoc($query)){
						$result['data'][$i] = $r;
						$html .= "<option value='".$r['model_id']."'>".$r['model']."</option>";
					}
				}
	$result['html'] = $html;
	return $result;
}
?>
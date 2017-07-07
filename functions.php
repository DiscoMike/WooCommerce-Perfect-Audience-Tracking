<?php
//----------------------------------------------------------------- Tracking ---------------------------------------------
function tracking(){
wp_register_script( 'perfect-audience', get_stylesheet_directory_uri() . '/js/pa.js', array( 'jquery' ), null, true );

$wNumber = $wTotal = '';
// Check if on order recieve page
if( is_page(*****Insert YOUR PAGE ORDER RECEIVED PAGE ID*****) ){
	//Grab Order ID
	$url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$template_name = strpos($url,'/order-received/') === false ? '/view-order/' : '/order-received/';
		if (strpos($url,$template_name) !== false) {
			$start = strpos($url,$template_name);
			$first_part = substr($url, $start+strlen($template_name));
			$order_id = substr($first_part, 0, strpos($first_part, '/'));
		}

	//Set Values for conversion	
	$wOrder     = new WC_Order($order_id);
	$wNumber    = $wOrder->get_order_number();
	$wTotal    = $wOrder->get_total();
	$wTAX    = $wOrder->get_total_tax();
	$wTotal	= $wTotal - $wTAX ;
}

//
$wooConv_array = array(
	'wooID' => $wNumber,
	'wooRev' => $wTotal
);

//Perfect Audience
wp_localize_script( 'perfect-audience', 'wooOrder', $wooConv_array );
wp_enqueue_script('perfect-audience');
}

add_action('wp_footer','tracking');

?>

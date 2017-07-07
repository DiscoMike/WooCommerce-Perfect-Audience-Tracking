//check if on view-order page and get parameter is available
if(isset($_GET['view-order'])) {
    $order_id = $_GET['view-order'];
}
//check if on view order-received page and get parameter is available
else if(isset($_GET['order-received'])) {
    $order_id = $_GET['order-received'];
}
//no more get parameters in the url
else {
    $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $template_name = strpos($url,'/order-received/') === false ? '/view-order/' : '/order-received/';
    if (strpos($url,$template_name) !== false) {
        $start = strpos($url,$template_name);
        $first_part = substr($url, $start+strlen($template_name));
        $order_id = substr($first_part, 0, strpos($first_part, '/'));
    }
}

  (function() {
    window._pa = window._pa || {};
    _pa.orderId = wooOrder.wooID; 
    _pa.revenue = "$" + wooOrder.wooRev; 
 // _pa.productId = "myProductId"; // OPTIONAL: Include product ID for use with dynamic ads
    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
    pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.marinsm.com/serve/***INSERT YOUR ADVERTISER ID ***.js";
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
 
  })();
  

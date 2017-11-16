<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pooja Essentials</title>
<link href="css/pooja-essentials.css" rel="stylesheet" type="text/css" />

<link href="1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="1/js-image-slider.js" type="text/javascript"></script>
    <link href="1/generic.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color:#787876;
}

-->
</style>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('images/home_over.jpg','images/about_over.jpg','images/services_over.jpg','images/testimonials_over.jpg','images/blog_over.jpg','images/contact_over.jpg')">
<div class="container">
<div id="header">
<div class="topbar"></div>
<div class="logo"><img src="images/logo.jpg" width="300" height="100" /></div><div class="logo2"><div class="links">
<div class="links2"></div>
<div class="links-home"><a href="index.html">Home</a></div>
<div class="links1"><a href="about-us.html">About us</a></div>
<div class="links1"><a href="products.html">Products</a></div>
<div class="links1"><a href="contact-us.html">Contact us</a></div>
<div class="links1"><a href="enquiry.html">Enquiry</a></div>
</div></div>
</div>

<div class="banner"><div id="sliderFrame">
        <div id="slider">
            <img src="images/banners/pooja-kit.jpg"/>
            <img src="images/banners/chamundeshwari-delux.jpg"/>
            <img src="images/banners/loban-cup.jpg"/>
            <img src="images/banners/maha-maruthi-sandal.jpg"/>
            <img src="images/banners/maha-maruthi-dasangam.jpg"/>
            <img src="images/banners/sudangha-vahini.jpg"/>
            <img src="images/banners/Namasankeertana.jpg"/>
            <img src="images/banners/dasangam.jpg"/>            </div>
        <div id="htmlcaption" style="display: none;">
            <em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>.        </div>
    </div></div>
<div class="body">

<div class="bod-row-bodypage">
  <div class="newsdiv">

  <div class="body-heading">Product Enquiry</div>
  <div class="bodytext">
<?php	
    $name=trim($_POST['name']);
	$product=$_POST['products'];
	$mobile=trim($_POST['mobile']);
	$email=trim($_POST['email']);
	$address=trim($_POST['address']);
	$suggestions=trim($_POST['suggestions']);

	$products = rtrim(implode(', ', $product), ', ');
	
	$email_message .= "Name: ".$name."\n";
	$email_message .= "Product: ".$products."\n";
	$email_message .= "Email: ".$email."\n";
	$email_message .= "Mobile No: ".$mobile."\n";
	$email_message .= "Address: ".$address."\n";
	$email_message .= "Suggestions: ".$suggestions."\n";
	
	$from = "Enquiry <".stripslashes($email).">";
	$to = "poojaessentials@gmail.com";
	//$to = "rraavishankar@gmail.com";
	$subject = "Pooja Essentials Enquiry";
	$headers = 'From: '.$email."\r\n".
	'Reply-To: '.$email."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
	$k = @mail($to, $subject, $email_message, $headers);	

    if ($k)
    {
    echo '<div><center><h4>Enquiry Sent Successfully !!</h4></center></div>';
    }else
    {
    echo '<div><center><h4>Error !! Please try again..</h4></center></div>';
    }


	?>
    <p><br />
      </p>
    </div>
</div>
</div>
</div>



<div class="bottom-links">
<div class="copyright">Copyright &copy; 2014 Poojaessentials.com</div>
<div class="footer">
<div class="address">  
<b>Pooja Essentials</b> <br />
3/1 VSR Castle, 2/104 Pillayar Koil street, Thoraipakkam, OMR, Chennai - 600097.<br />
Mobile : 9791772220, E-mail : <a href="mailto:poojaessentials@gmail.com">poojaessentials@gmail.com</a><br />
  </div>  
<div class="socialmedia"><a href="https://www.facebook.com/PoojaEssentials"><img src="images/fb.png" width="35" height="35" border="0" /></a></div>
<div class="socialmedia"><a href="https://plus.google.com/113644708632225670131/about"><img src="images/gplus.png" width="35" height="35" border="0" /></a></div>
</div>
</div>
</div>
</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59104656-1', 'auto');
  ga('send', 'pageview');

</script>
</html>

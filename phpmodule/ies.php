<script>
var ua = window.navigator.userAgent.toLowerCase();
if (ua.indexOf("msie 10") != -1){
	
}
else if (ua.indexOf("linux; u;") >0){
	
}
else if (ua.indexOf("chrome") != -1){
	document.write('<link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri());?>/css/chrome.css" />');
}
</script>

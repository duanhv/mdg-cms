<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>igolf_cms</title>
<link href="<?php bloginfo('template_url')?>/style.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url')?>/tls.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_url')?>/widget.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url')?>/js/selectnav.js" type="text/javascript"></script>
<?php 
	detectmobile();
	$mobile = detectmobile();
	if($mobile==true){?>
		<link href="<?php bloginfo('template_url')?>/mobile.css" rel="stylesheet" type="text/css" />		
<?php 	}
?>
<script type="text/javascript">
	$(document).ready(function(e) {
		//more services
		var flag = false;
        $('.more-services').click(function(e) {
			if(flag==false){
            	$(this).addClass('active');
				$('.services').slideDown(500);
				flag = true;
			}else{
					
				$('.services').slideUp(300);
				$(this).removeClass('active');
				flag = false;
			}
        });

        selectnav('nav', {
        	  label: 'Main Menu ',
        	  nested: true,
        	  indent: '-',
        	  activeclass: 'actived'
        	});
		
		//show menu
		//$('#nav>li').hover(function(){
		//	$(this).find('.sub-menu').stop().slideDown(400);
		//},function(){
		//	$(this).find('.sub-menu').stop().slideUp(400);
		//});
		
		
		//login form
		var login = false;
        $('.login').click(function(e) {
			if(login==false){
            	$('#login-block').show(400);
				login = true;
			}else{
					
				$('#login-block').hide(400);
				login = false;
			}
			return false;
        });
		
		$('.close').click(function(){
			$('#login-block').hide(400);
		});
		
		//add custom style
		var i = 0;
		var lClass = ['blue','iris','red','green','orange'];
		$('#main-content').find('.block').each(function() {
            $(this).find('h2').addClass(lClass[i]);
			i++;
        });
    });
</script>
</head>
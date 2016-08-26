<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico">
 	<meta name="theme-color" content="#16627a">
 	<link rel="stylesheet" href="reg.css" />
 	<link rel="stylesheet" media="only screen and (min-width: 995px)" href="d.css" />
 	<link rel="stylesheet" media="only screen and (max-width: 994px)" href="m.css" />
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
    
  } );
  </script>

	<script type="text/javascript">
	var nr=0;
	 function validateEmail($email) {
  		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  		return emailReg.test( $email );
	}
	function genchk(){
					if($("#gender").val()=='n' || $("#gender").val()==null){
	  					$("#gender").removeClass("coolk");$("#gender").addClass("cooll");
	  				}else{
	  					$("#gender").addClass("coolk");$("#gender").removeClass("cooll");
	  				}
	}
		$(document).ready(function(){ 
			$("#submit").click(function(){
				$(".inputbabe").removeClass("cooll");
	  				$(".inputbabe").addClass("coolk");
				var name=$("#name").val();
				var email=$("#email").val();				
				var college=$("#college").val();
				var mobile=$("#mobile").val();
				var dob=$("#datepicker").val();
				var sex=$("#gender").val();
				var city=$("#city").val();
				var refid=$("#refid").val();
				if(name=='' || name== null || name==$("#name").attr('data')){nr=1;
					$("#name").removeClass("coolk");
	  				$("#name").addClass("cooll");}
	  			if(email=='' || email== null || email==$("#email").attr('data')){nr=1;
					$("#email").removeClass("coolk");
	  				$("#email").addClass("cooll");}	
	  			if(college=='' || college== null || college==$("#college").attr('data')){nr=1;
					$("#college").removeClass("coolk");
	  				$("#college").addClass("cooll");}
	  			if(mobile=='' || mobile== null || mobile.length!=13){nr=1;
					$("#mobile").removeClass("coolk");
	  				$("#mobile").addClass("cooll");}	
	  			if(dob=='' || dob== null || dob==$("#datepicker").attr('data')){nr=1;
					$("#datepicker").removeClass("coolk");
	  				$("#datepicker").addClass("cooll");}
	  			if(sex=='' || sex== null || sex=='n'){nr=1;
					$("#gender").removeClass("coolk");
	  				$("#gender").addClass("cooll");}
	  			if(city=='' || city== null || city==$("#city").attr('data')){nr=1;
					$("#city").removeClass("coolk");
	  				$("#city").addClass("cooll");}	

				//ajax send
				if(nr!=1){$("#myloader").fadeIn();
				$.post("userRegistration.php",
    						{        						
       						name: name,
        					email: email,
        					college: college,
        					sex:sex,
        					mobile:mobile,
        					email:email,
        					dob:dob,
        					city:city
    						},
    						function(data, status){
        					//alert("Data: " + data + "\nStatus: " + status);
        					if(status=='success'){
        						$("#myloader").fadeOut();
        						$("#mainForm").css('background','#5FAB22');
        						$("#mainForm").html('<h1>[success message]</h1>'+ data);
         					
        					}
    			});}//end of if condition and post method
				nr=0;
			});
			$("#datepicker").val("DOB");
			$(".inputbabe").focus(function(){
	  						if($(this).attr('data')=='Phone no.'){$(this).val('+91');}
	  						else if($(this).val()==$(this).attr('data')){
	  							$(this).val('');
	  						}
	  		});
	  		$(".inputbabe").blur(function(){
	  						if($(this).val()=='' || $(this).val()=='+91'){
	  							$(this).val($(this).attr('data'));
	  						}
	  		});
	  		$("#email").blur(function(){
	  			if( !validateEmail($("#email").val())  && $("#email").val()!='email') {
	  				$("#email").removeClass("coolk");
	  				$("#email").addClass("cooll");
	  			}else{
	  				$("#email").addClass("coolk");
	  				$("#email").removeClass("cooll");
	  			}
	  		});
	  		$("#email").keydown(function(){
	  			if( !validateEmail($("#email").val()) && $("#email").val()!='email') {
	  				$("#email").removeClass("coolk");
	  				$("#email").addClass("cooll");
	  			}else{
	  				$("#email").addClass("coolk");
	  				$("#email").removeClass("cooll");
	  			}
	  		});
	  		$("#gender").blur(function(){
	  				genchk();
	  		});
	  		$("#gender").change(function(){
	  				genchk();
	  		});
	
		});
	</script>
<style>
    @import 'https://fonts.googleapis.com/css?family=Exo';
    @import 'https://fonts.googleapis.com/css?family=Coming+Soon';
    @import 'https://fonts.googleapis.com/css?family=Atma';

    	#mainForm{
    		width:90%;
    		left:5%;
    	}

</style>
</head>
<body>

<center>
<h1 id="header">Registration</h1><img src="ajax-loader.gif" width="30px" id="myloader">
		<div id="mainForm">
			
			<form   action="javascript:formsend()">
				<input type="text" class="inputbabe coolk" data="Full name" value="Full name" id="name" style="text-transform: capitalize">
				<input type="text" class="inputbabe coolk" data="College" value="College" id="college">
				<input type="text" class="inputbabe coolk" data="Phone no." value="Phone no." id="mobile">
				<input type="text" class="inputbabe coolk" data="email" value="email" id="email">
				<input type="text" data="DOB" value="DOB" id="datepicker" class="inputbabe coolk"><br><span class="inputbabe" id="genderLabel" style="border:0px">Gender:</span>
				<select id="gender" data="n" value="Gender" class="inputbabe coolk">
						<option value="n"  selected>Select</option>
    					<option value="m">Male</option>
    					<option value="f">Female</option>
    					<option value="o">Other</option>    
  				</select><br>
  				
				<input type="text" class="inputbabe coolk" data="City" value="City" id="city" style="text-transform: capitalize">
				<input type="text" class="inputbabe coolk" data="Reference Code"
				 value="<?PHP if(isset($_GET['refid'])){echo $_GET['refid'].'" disabled';}
				 		else{echo'Reference Code"';}?>
				  id="refid" >
				  <br>
				<button id="submit" class="inputbabe">Register!</button>
		</form>
		</div>
	
</center>
<img src="pirate.png" id="pirateboy">

<div id="biglogo"></div>
</body>
</html>
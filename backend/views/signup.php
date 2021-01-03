<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive Website Template | SignUp Page :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="style/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="style/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="style/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='style/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="style/js/jquery-1.11.1.min.js"></script>
<script src="style/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="style/js/metisMenu.min.js"></script>
<script src="style/js/custom.js"></script>
<link href="style/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<?php
     include "../controller/ManagerC.php";
	 include_once '../Model/Manager.php';
	

?>
<?php
extract($_POST);
$msg = ""; 
if(isset($_POST['SubmitBtn'])) {
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']);
  $email = trim($_POST['email']);
  $gender = trim($_POST['gender']);
  $password= trim($_POST['password']);
  $confirmpassword= trim($_POST['confirmpassword']);
  if($email != "" && $password != "" && $lastname != "" && $firstname != "" && $password== $confirmpassword ) {
    try {
        $manager = new Manager($firstname,$lastname,$gender, $email,$password,$confirmpassword);
        $managerC = new ManagerC();
        $managerC->ajouterManager($manager);
        header ("Location: login.php?status=success");
        
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
?>
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<?php 
		include ('leftnavigation.php');
		include ('header.php');
		?>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h2 class="title1">SignUp Here</h2>
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
				<form action="#" method="post">
					<div class="sign-u">
								<input type="text" name="firstname" id="firstname" placeholder="First Name" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="text" name="lastname" id="lastname" placeholder="Last Name" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="email" name="email" id="email" placeholder="Email Address" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Gender* :</h4>
						</div>
						<div class="sign-up2">
							<label>
								<input type="radio" name="gender" id ="gender" required="" value ="Male" >
								Male
							</label>
							<label>
								<input type="radio" name="gender" id ="gender" required="" value ="female" >
								Female
							</label>
						</div>
						<div class="clearfix"> </div>
					</div>
					<h6>Login Information :</h6>
					<div class="sign-u">
								<input type="password" name="password" id="password"  placeholder="Password" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required="">
						</div>
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" name="SubmitBtn" id="SubmitBtn" value="Submit">
						<div class="clearfix"> </div>
					</div>
					<div class="registration">
						Already Registered.
						<a class="" href="login.php">
							Login
						</a>
					</div>
				</form>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='style/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="style/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="style/js/jquery.nicescroll.js"></script>
	<script src="style/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
	<script src="style/js/bootstrap.js"> </script>
	
</body>
</html>
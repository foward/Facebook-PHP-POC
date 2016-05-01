<?php
include('facebook/fbmain.php');
if ($user){
	try{
	   $fql= "select username,email ,education, name,pic_big,birthday,sex,hometown_location,relationship_status,current_location FROM user WHERE uid =".$user;
		$param  =   array(
			'method'    => 'fql.query',
			'query'     => $fql,
			'callback'  => ''
		);
		$fqlResult   =   $facebook->api($param);
	}
	catch(Exception $o){
		d($o);
	}
}



$username= $fqlResult[0]['username'];
$name= $fqlResult[0]['name'];
$education= $fqlResult[0]['education'];
$arrlength=count($education);

$email = $fqlResult[0]['email'];
$pic_square= $fqlResult[0]['pic_big'];
$birthday= $fqlResult[0]['birthday'];
$sex= $fqlResult[0]['sex'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>How to Create Facebook Application Using PHP and Retrieve User Information | 91 Web Lessons</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="http://www.91weblessons.com/demo/google_analytics.js"></script>
</head>
<body>
<div id="container">
    <!--top section start-->
    <div id='top'>
         <a href="http://www.devcite.com" title="Tu Sueldo" target="blank">
             <img src="image/logo.png" alt="TuSueldo" title="TuSueldo" border="0"/>
         </a>
        
    </div>

    <div id='tutorialHead'>
         <div class="tutorialTitle"><h1>TuSueldo</h1></div>
         
    </div>

    <div id="wrapper">
         <div id="facebook_box">
             <div class="facebook_image"><img src="<?php echo $pic_square;?>"/></div>
             <div class="user_detail">
                  <table>
                    
                     
                      <tr>
                        <td class="bold">User Name :-</td>
                        <td><?php echo $username;?></td>
                     </tr>
   <tr>
                        <td class="bold">Education :-</td>                   
                     
             <?php      
for($x=0;$x<$arrlength;$x++)
{
	?>
	
	 <td><?php echo $education[$x];?></td>
 <?php 	 
}
?>
                     
                       
                     </tr>
                     
                     <tr>
                        <td class="bold">Full Name :-</td>
                        <td><?php echo $name;?></td>
                     </tr>
                     <tr>
                        <td class="bold">Email Id :-</td>
                        <td><?php echo $email;?></td>
                     </tr>
                     <tr>
                        <td class="bold">Birthday :-</td>
                        <td><?php echo $birthday;?></td>
                     </tr>
                     <tr>
                        <td class="bold">Gender :-</td>
                        <td><?php echo ucfirst($sex);?></td>
                     </tr>

                  </table>
             </div>
         </div>
    </div>

    <!--fotter section start-->
    <div id="fotter">
         <p>Copyright &copy; 2013 
              <a href="http://www.devcite.com" title="devcite.com" target="blank">Devcite.com</a>. 
              All rights reserved.
         </p>
    </div>
</div>

</body>
</html>
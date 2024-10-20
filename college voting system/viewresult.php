 <?php
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?> 
<!DOCTYPE HTML>
<html style="background: url('http://localhost/election/images/vo.jpg');" lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">

	<style>	table { 
		width: 100%; 
		border-collapse: collapse; 
	}
	
	tr:nth-of-type(odd) { 
		background: #eee; 
	}
	th { 
		background: #333; 
		color: white; 
		font-weight: bold; 
	}
	td, th { 
		padding: 6px; 
		border: 1px solid #ccc; 
		text-align: left; 
	}
	</style>
  <title>Online Election</title>
</head>
<body >
  
<header>
<div id="navigation">
<div class="arrows">
	<span class="ar-left"></span>
	<span class="ar-right"></span>
	<span class="ar-left2"></span>
	<span class="ar-right2"></span>
</div> 

<div class="dark-color">
<div class="light-color">
<a href="#" id="logo">ONLINE COLLEGE ELECTION PORTAL</a>
<nav>
	<ul>
		<li><a href="index.php" class="active-menu">Logout</a></li>

	</ul>
</nav>
</div>
</div>
</div>
</br>


<a href="newelection.php"  class="btn" >New Election</a>
<a href="viewelection.php" class="btn"  >View Election</a>
<a href="viewresult.php" style="background:red" class="btn" >View Result</a>
<a href="addcandidate.php" class="btn" >Add Candidate</a>
<a href="viewcandidatesadmin.php" class="btn" >View Candidate</a>
</br></br>



<form action="#" method="post">

<select class="inputtext" name="ename">
    <option value="">Select Election Name</option>
    <?php
	$result1 = $conn->query("SELECT ename FROM elections ") or die($conn->error);
    while ($row = mysqli_fetch_array($result1)) {
        echo "<option value='" . $row['ename'] . "'>" . $row['ename'] . "</option>";
    }
    ?>       
</select> <br> <br>
 <select class="inputtext" name="area">
    <option value="">Select Dept</option>
    <?php
	$result2 = $conn->query("SELECT area FROM elections ") or die($conn->error);
    while ($row2 = mysqli_fetch_array($result2)) {
        echo "<option value='" . $row2['area'] . "'>" . $row2['area'] . "</option>";
    }
    ?>       
</select>  <br>   <br>
 
<input type="submit" value="Submit" class="btn">
<input type="reset" value="Cancel" class="btn">
</form>
<?php 

if(isset($_POST["ename"]))
{
$en=$_POST["ename"];
$ar=$_POST["area"];


$sql33 = "SELECT (count((party))) as cnt,party FROM result where election='$en' GROUP BY party ORDER BY cnt DESC LIMIT 1";
$result33 = mysqli_query($conn, $sql33);
if (mysqli_num_rows($result33) > 0) {
    
    while($row33 = mysqli_fetch_assoc($result33)) {
		$b=$row33["party"];
		$c=$row33["cnt"];
}

echo $b. ' won the election with '.$c.' votes';
echo "</br>";
}


?>

						<table style="background:white" class="rwd-table">
  <tr>
  	<th >Candidate Name</th>
								<th >Candidate Age</th>
								
									
									
								<th >Election Name</th>
								<th >Dept</th>
								<th >Year</th>
								<th >Date</th>
									
									
									
								<th >Candidate Photo</th>
								
								<th >Voter</th>
							
  </tr>
  
  
  
										 <?php 
									 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";
$conn = new mysqli($servername, $username, $password, $dbname);
							
								
								
							 $sql="SELECT * FROM result where area='$ar' or election='$en' ";
$result = $conn->query($sql);
							 
							
					 ?>
					
    <?php while($row= $result->fetch_assoc()) { ?>
	 <form method="post" action="partynew.php">
<tr >
    <td ><?php echo $row['cname']?></td>		
	 		
 <td ><?php echo $row['cage']?></td>		
 	

<td ><?php echo $row['election']?></td>		
<td ><?php echo $row['area']?></td>	
<td ><?php echo $row['year']?></td>	
<td ><?php echo $row['date']?></td>	
 
 <td ><img height="50px" width="50px" src="uploads/<?php echo $row['cphoto']?>"></td>		 
 
 <td ><?php echo $row['username']?> </td>





</tr></form>
<?php }} ?>
							
								
				
								

</header>
  
</body>
</html>


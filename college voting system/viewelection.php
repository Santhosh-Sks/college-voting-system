


<!DOCTYPE HTML>
<html style="background: url('http://localhost/election/images/bg.jpg');" lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
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
<a href="viewelection.php" style="background:red" class="btn" >View Election</a>
<a href="viewresult.php" class="btn" >View Result</a>
<a href="addcandidate.php" class="btn" >Add Candidate</a>
<a href="viewcandidatesadmin.php" class="btn" >View Candidate</a>
</br></br>

<center> <h2> View Election Details</h2>  </center> <br> 
<form action="#" method="post">
<div class="table100 ver1 m-b-110">
    
    
    
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column4">Election Name</th>
									<th class="cell100 column4">Year</th>
									<th class="cell100 column4">Dept</th>
									<th class="cell100 column4">No of Candidates</th>
									<th class="cell100 column4">Date</th>
									
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								
										 <?php 
									 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "election";
$conn = new mysqli($servername, $username, $password, $dbname);
							
								
								
							 $sql="SELECT * FROM elections ";
$result = $conn->query($sql);
							 
							
					 ?>
    <?php while($row= $result->fetch_assoc()) { ?>
	<tr class="row100 body">
    <td class="cell100 column4"><?php echo $row['ename']?></td>		
	 <td class="cell100 column4"><?php echo $row['year']?></td>		
	 <td class="cell100 column4"><?php echo $row['area']?></td>
 <td class="cell100 column4"><?php echo $row['cno']?></td>		
 <td class="cell100 column4"><?php echo $row['date']?></td>	</tr>
	 
							 <?php } ?>
							
								
								

							




								
								
								
								
								
</form>
</header>
  
</body>
</html>


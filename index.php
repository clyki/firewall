<?php
session_start();
if(!file_exists('users/' . $_SESSION['username'] . '.xml')){
	header('Location: login.php');
	die;
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
}

html {
  font-family: "Lucida Sans", sans-serif;
}

.header {
  background-color: #003399;
  color: #ffffff;
  padding: 15px;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu li {
  padding: 8px;
  margin-bottom: 7px;
  background-color: #33b5e5;
  color: #ffffff;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.menu li:hover {
  background-color: #0099cc;
}

.aside {
  background-color: #33b5e5;
  padding: 15px;
  color: #ffffff;
  text-align: center;
  font-size: 14px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.footer {
  background-color: #0099cc;
  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding: 15px;
}

/* For mobile phones: */
[class*="col-"] {
  width: 100%;
}

@media only screen and (min-width: 600px) {
  /* For tablets: */
  .col-s-1 {width: 8.33%;}
  .col-s-2 {width: 16.66%;}
  .col-s-3 {width: 25%;}
  .col-s-4 {width: 33.33%;}
  .col-s-5 {width: 41.66%;}
  .col-s-6 {width: 50%;}
  .col-s-7 {width: 58.33%;}
  .col-s-8 {width: 66.66%;}
  .col-s-9 {width: 75%;}
  .col-s-10 {width: 83.33%;}
  .col-s-11 {width: 91.66%;}
  .col-s-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}
.Estilo1 {color: #000000}
</style>
</head>
<body>

<div class="header">
  <h1>Clyki Firewall </h1>
</div>

<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
      <li><a href="index.php" class="Estilo1">Pagina Inicial</a></li>
      <li><a href="changepassword.php" class="Estilo1">Alterar senha</a></li>
      <li><a href="#" class="Estilo1">Site 1 </a></li>
      <li><a href="#" class="Estilo1">Site 1 </a></li>


    </ul>
  </div>

  <div class="col-6 col-s-9">
	<h1>User Page</h1>
	<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
	<table>
		<tr>
			<th>Username</th>
			<th>Email</th>
		</tr>
		<?php
		$files = glob('users/*.xml');
		foreach($files as $file){
			$xml = new SimpleXMLElement($file, 0, true);
			echo '
			<tr>
				<td>'. basename($file, '.xml') .'</td>
				<td>'. $xml->email .'</td>
			</tr>';
		}
		?>
	</table>
	<hr />
	<a href="changepassword.php">Change Password</a>
	-
	<a href="logout.php">Logout</a>
	
	 </div>
	 
	 

  <div class="col-3 col-s-12">
    <div class="aside">
<h2>Visitas no firewall</h2>      <p><?php

 echo file_get_contents('http://clyki.com/contador.txt');
?></p>
    
    </div>
  </div>
</div>

<div class="footer">
  <div>&copy; Copyright Clyki firewall - 2020</div>
  <p>&nbsp;</p>
</div>

</body>
</html>


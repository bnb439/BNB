<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if(isset($_POST['Retirement']))
{
	header("Location: Retirement.php");	
}
if(isset($_POST['BMI']))
{
	header("Location: BMIcal.php");	
}
?>
<head>
  <meta charset="UTF-8">
  <title>Retirement and BMI Calculator</title>
  <style>
        .error {
          color: #FF0000;
        }
    </style>
</head>

<body>
  
  <h1> Main Menu </h1>
  
 <form method="post" action="menuBR.php">
 
 <input type="submit" name="BMI" value="BMI">
   <input type="submit" name="Retirement" value="Retirement">
 
 </form>
</body>

</html>



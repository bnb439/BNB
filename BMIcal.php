<!DOCTYPE html>
<html lang="en">

<head>
    <title>BMI Calculator</title>
    <style>
        .error {
          color: #FF0000;
        }
    </style>
</head>

<?php
session_start();

$weight = "";
$height = "";
$kg = "";
$sq = "";
$BMI = "???";
$m = "";
$weightErr = "";
$heightErr = "";
$errorfile = "";
$error = false;
$stat = "???";
$BMIErr = "";

//menu
if(isset($_POST['menu']))
{
	header("Location: menuBR.php");	
}
if(isset($_POST['submit']))
{

//weight
$weight = $_POST['weight'];
if ($weight === "") 
{
    $weightErr = "Weight is required";
	$error = true;
  } 
  else
	  {
    $weight = $_POST["weight"];
    // check if its a float
    if (filter_var($weight, FILTER_VALIDATE_FLOAT )=== false)
	{
      $weight = "Invalid format";
	  $error = true;
    }
	else
	{
	  if($weight <= 0)
	  {
		  $weightErr= "Needs to be in the range greater then zero";
		  $error = true;
	  }
	  else
	  {
		  $weightErr = "";
	  }
	}
  }


//height
$height = $_POST['height'];
if ($height === "") 
{
    $heightErr = "GPA is required";
	$error = true;
  } 
  else
	  {
    $height = $_POST["height"];
    // check if its a float
    if (filter_var($height, FILTER_VALIDATE_FLOAT )=== false)
	{
      $height = "Invalid format";
	  $error = true;
    }
	else
	{
	  if($height <= 0)
	  {
		  $heightErr= "Needs to be in the range greater then zero";
		  $error = true;
	  }
	  else
	  {
		  $heightErr = "";
	  }
	}
  }


// file is error free or not
if($error == True)
{
	$errorfile= "All form fields must be completed correctly for the BMI calculator to function.";
	
}
else
{
	$errorfile ="";
	
	$kg = $weight * 0.45;
	$m = $height * 0.025;
	$sq = $m * $m;
	$BMI = $kg / $sq;
	
	if ($BMI < 18.5)
		{
			$stat = "underweight";
		}
		else if ($BMI >= 18.5 && $BMI <= 24.9)
		{
			$stat = "Normal";
		}
		else if ($BMI >= 25 && $BMI <=29.9)
		{
			$stat = "Overweight";
		}
		else if ($BMI >= 30)
		{
			$stat = "obese";
		}
	
	
}
}
?>




<body>
    <h1>BMI Calculator</h1>

	<p><span class="error"><?php echo $errorfile;?></span></p>


  
    <form method="post" action="BMIcal.php">
	        
        Height-inches: <input type="text" size="35" name="height" value=<?php echo $height;?>>
        <span class="error"><?php echo $heightErr;?></span>
        <br><br>
		
		Weight-Pounds: <input type="text" size="35" name="weight" value=<?php echo $weight;?>>
        <span class="error"><?php echo $heightErr;?></span>
        <br><br>
       
		Your BMI is: 
        <span style="font-weight: bold;"><?php echo $BMI;?></span><br>
		Your body type is: 
        <span style="font-weight: bold;"><?php echo $stat;?></span> 
        <br><br>
		
		
        <input type="submit" name="submit" value="Calculate">
		<input type="submit" name="menu" value="menu">

    </form>

</body>

</html>
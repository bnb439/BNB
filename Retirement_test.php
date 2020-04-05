<!DOCTYPE html>
<html lang="en">

<head>
    <title>Retirement Calculator</title>
    <style>
        .error {
          color: #FF0000;
        }
    </style>
</head>

<?php
session_start();
$age = "";
$salary = "";
$saved = "";
$goal = "";

$percentage = 0;
$total = 0;
$Etotal = 0;

$ageErr = "";
$salaryErr = "";
$savedErr ="";
$goalErr = "";

$year = 0;
$done = 0;
$totalage = 0;

$test = "";

$errorfile = "";
$error = false;

if(isset($_POST['UnitTest']))
{
    $age = 21;
    $salary = 5000;
    $saved = 50;
    $goal = 20000;

    $percentage = $saved /100;
    $total = $salary * $percentage;
    $Etotal = ($total * 0.35) + $total;

    $done =0;
    $year = 0;

    while ($done <= $goal)
    {
        if ($year == 0)
        {
            $done = $Etotal;
        }
        if ($year > 0)
        {
            $done = $done + $Etotal;

        }

        $year++;
    }

    $totalage = $year + $age;
    if ($totalage >= 100)
    {
        $done = "Saving goal could not be meet";
        $year = "To Many";
        $totalage = "Dead";
        $test ="TEST FAILED";
    }
    else {

        $test = "TEST PASSED";

    }


}
//menu
if(isset($_POST['menu']))
{
	header("Location: menuBR.php");	
}
if(isset($_POST['submit']))
{

//age
$age = $_POST['age'];
if ($age === "") 
{
    $ageErr = "Age is required";
	$error = true;
  } 
  else
	  {
    $age = $_POST["age"];
    // check if its a float
    if (filter_var($age, FILTER_VALIDATE_INT )=== false)
	{
      $ageErr = "Invalid format";
	  $error = true;
    }
	else
	{
	  if($age <= 0)
	  {
		  $ageErr= "Needs to be in the range greater then zero";
		  $error = true;
	  }
	  else
	  {
		  $ageErr = "";
	  }
	}
  }


//salary
$salary = $_POST['salary'];
if ($salary === "") 
{
    $salaryErr = "Salary is required";
	$error = true;
  } 
  else
	  {
    $salary = $_POST["salary"];
    // check if its a float
    if (filter_var($salary, FILTER_VALIDATE_FLOAT )=== false)
	{
      $Salary = "Invalid format";
	  $error = true;
    }
	else
	{
	  if($salary <= 0)
	  {
		  $salaryErr= "Needs to be in the range greater then zero";
		  $error = true;
	  }
	  else
	  {
		  $salaryErr = "";
	  }
	}
  }

//Saved
$saved = $_POST['saved'];
if ($saved === "") 
{
    $savedErr = "Number is required";
	$error = true;
  } 
  else
	  {
    $saved = $_POST["saved"];
    // check if its a float
    if (filter_var($saved, FILTER_VALIDATE_FLOAT )=== false)
	{
      $savedErr = "Invalid format";
	  $error = true;
    }
	else
	{
	  if($saved <= 0 || $saved >= 101)
	  {
		  $savedErr= "Needs to be in the range greater then zero and less then 101";
		  $error = true;
	  }
	  else
	  {
		  $savedErr = "";
	  }
	}
  }
  
  
//goal
$goal = $_POST['goal'];
if ($goal === "") 
{
    $goalErr = "goal is required";
	$error = true;
  } 
  else
	  {
    $goal = $_POST["goal"];
    // check if its a float
    if (filter_var($goal, FILTER_VALIDATE_FLOAT )=== false)
	{
      $goal= "Invalid format";
	  $error = true;
    }
	else
	{
	  if($goal <= 0)
	  {
		  $goalErr= "Needs to be in the range greater then zero";
		  $error = true;
	  }
	  else
	  {
		  $goalErr = "";
	  }
	}
  }

// file is error free or not
if($error == True)
{
	$errorfile= "All form fields must be completed correctly for the Retirement calculator to function.";
	
}
else
{

	$percentage = $saved /100;
	$total = $salary * $percentage;
	$Etotal = ($total * 0.35) + $total;
	
	$done =0;
	$year = 0;
	
	while ($done <= $goal)
	{
		if ($year == 0)
		{
			$done = $Etotal;
		}
		if ($year > 0)
		{
			$done = $done + $Etotal;
			
		}
		
		$year++;
	}
	
	$totalage = $year + $age;
	if ($totalage >= 100)
	{
		$done = "Saving goal could not be meet";
		$year = "To Many"; 
		$totalage = "Dead"; 
	}
	
}
}
?>




<body>
    <h1>Retirement Calculator</h1>

	<p><span class="error"><?php echo $errorfile;?></span></p>


  
    <form method="post" action="Retirement.php">
	        
        Age: <input type="text" size="35" name="age" value=<?php echo $age;?>>
        <span class="error"><?php echo $ageErr;?></span>
        <br><br>
		
		Salary: <input type="text" size="35" name="salary" value=<?php echo $salary;?>>
        <span class="error"><?php echo $salaryErr;?></span>
        <br><br>
       
	    Percentage you want to save: <input type="text" size="35" name="saved" value=<?php echo $saved;?>>
        <span class="error"><?php echo $savedErr;?></span>
        <br><br>
	   
		Retirement Goal: <input type="text" size="35" name="goal" value=<?php echo $goal;?>>
        <span class="error"><?php echo $goalErr;?></span>
        <br><br>
		
		Goal value: 
		<span style="font-weight: bold;"><?php echo $done;?></span><br>
		After:
		<span style="font-weight: bold;"><?php echo $year;?></span> Years! <br>
		Age: 
		<span style="font-weight: bold;"><?php echo $totalage;?></span><br>

        <span style="font-weight: bold;"><?php echo $test;?></span><br><br>

        <input type="submit" name="submit" value="Calculate">
		<input type="submit" name="menu" value="menu">
        <input type="submit" name="UnitTest" value="UnitTest">


    </form>

</body>

</html>
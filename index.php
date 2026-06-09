<?php
include("config.php");

$step = 1;
$message = "";

if(isset($_POST['next']))
{
    $step = 2;
}

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO students
    (username,password,fullname,gender,age,course,email,phone)

    VALUES

    ('$username','$password','$fullname',
    '$gender','$age','$course','$email','$phone')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Student Registered Successfully!";
        $step = 3;
    }
    else
    {
        $message = "Registration Failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Management System</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: lightgreen;
}

.container{
    width:500px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}

h2{
    text-align:center;
}

input, select{
    width:100%;
    padding:10px;
    margin-top:8px;
    margin-bottom:15px;
}

button{
    width:100%;
    padding:12px;
    background:#007bff;
    color:white;
    border:none;
    cursor:pointer;
}

button:hover{
    background:#0056b3;
}

.success{
    text-align:center;
    color:green;
    font-size:20px;
}

</style>

</head>
<body>

<div class="container">

<?php if($step == 1){ ?>

<h2>Login Information</h2>

<form method="POST">

<input type="text"
name="username"
placeholder="Enter Username"
required>

<input type="password"
name="password"
placeholder="Enter Password"
required>

<button type="submit" name="next">
NEXT
</button>

</form>

<?php } ?>

<?php if($step == 2){ ?>

<h2>Student Details</h2>

<form method="POST">

<input type="hidden"
name="username"
value="<?php echo $_POST['username']; ?>">

<input type="hidden"
name="password"
value="<?php echo $_POST['password']; ?>">

<input type="text"
name="fullname"
placeholder="Full Name"
required>

<select name="gender">
<option>Male</option>
<option>Female</option>
</select>

<input type="number"
name="age"
placeholder="Age"
required>

<input type="text"
name="course"
placeholder="Course"
required>

<input type="email"
name="email"
placeholder="Email Address"
required>

<input type="text"
name="phone"
placeholder="Phone Number"
required>

<button type="submit" name="register">
REGISTER
</button>

</form>

<?php } ?>

<?php if($step == 3){ ?>

<div class="success">
<?php echo $message; ?>
<br><br>
<a href="index.php">Register Another Student</a>
</div>

<?php } ?>

</div>

</body>
</html>

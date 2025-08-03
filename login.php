<?php
session_start();
$password=$username="";

$errors = array("username"=>" ","password"=>" ");

if (isset($_POST["submit"])){
	
	$password = $_POST["password"];
    $username = $_POST["username"];
    
	if (empty($username)){
		$errors["username"] = "نام کاربری وارد نشده :(";
	} else{
		if (!preg_match("/^[a-zA-Z0-9#_-]{6,20}$/", $username)){
            $errors["username"] = "نام کاربری نامعتبر است.";
        } else {
        	echo "نام کاربری تایید شد!" ;
        } 
	}
	if (empty($password)){
		$errors["password"] = "رمز وارد نشده :(";
	} else{
		if (!preg_match("/[a-zA-Z0-9#_-]{6,20}/",$password)){
            $errors["password"] = "رمز عبور کوتاه یا نامعتبر است.";
        } else {
        	echo "رمز عبور تایید شد!" ;
        }
	}
	if (trim($errors["username"]) === "" && trim($errors["password"]) === "") {
		$_SESSION["valid"] = true;
		header("Location: /test.php");
        exit();
	}
	
}

?>
<html>
<head lang="fa" dir="rtl">
	<link rel="stylesheet" href="style.css?v=4">
		<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<form method="POST">
		<input value="<?php echo $username;?>" type="text" name="username" placeholder="نام کاربری">
		<div class="error"><?php echo $errors["username"]?></div>
		<input value="<?php echo $password;?>" type="password" name="password" placeholder="رمز عبور">
		<div class="error"><?php echo $errors["password"]?></div>
		<input type="submit" name="submit" value="ساخت صفحه">
	</form>
</body>
</html>
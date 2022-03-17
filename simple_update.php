<?php
$conn = new mysqli("localhost", "root", "", "mybase");

if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])){
    // https://www.php.net/manual/ru/reserved.variables.server
}
elseif (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["login"])) {
    // https://www.php.net/manual/ru/function.isset
    $userid = mysqli_real_escape_string($conn, $_POST["id"]);
    // https://www.php.net/manual/ru/mysqli.real-escape-string.php
    $username = mysqli_real_escape_string($conn, $_POST["name"]);
    $userage = mysqli_real_escape_string($conn, $_POST["login"]);
      
    $sql = "UPDATE Users SET name = '$username', login = '$userage' WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        // https://www.php.net/manual/ru/mysqli.query.php
        header("Location: select.php");
     } 
}
$result = $conn->query("SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>

<html>
<head>
<title>Update</title>
</head>
<body>

<form method="post" action="">
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/hidden -->
Name: <br>
<input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
<br>
Login :<br>
<input type="text" name="login" class="txtField" value="<?php echo $row['login']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">
</form>

</body>
</html>
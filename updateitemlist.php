<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mywebsites';

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_POST['id'];
$updatetodoitem = $_POST['newtodoitem'];

$sql = "UPDATE todolist SET todoitem='$updatetodoitem' WHERE id='$id'";
$result = $conn->query($sql);

if($result){
    header('location:index.php');
}else {
    echo "Error";
}
?>
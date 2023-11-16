<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mywebsites';

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];

$sql = "DELETE FROM todolist WHERE id='$id'";
$result = $conn->query($sql);

if($result){
    header('location:index.php');
}else{
    echo "Error deleting Item";
}
?>
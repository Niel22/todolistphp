<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mywebsites';

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];

$sql = "SELECT * FROM todolist WHERE id='$id'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $todoitem = $row['todoitem'];
    }
}else {
    echo "0 result";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="main">
        <form action="updateitemlist.php" method='post'>
            <input type="text" name="newtodoitem" value="<?php echo $todoitem;?> ">
            <input type="submit" name="add" value="Update">
            <input type="hidden" name='id' value='<?php echo $id; ?>'>
        </form>
        </div>
    </div>
</body>
</html>

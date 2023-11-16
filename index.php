<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mywebsites';

$conn = new mysqli($servername, $username, $password, $dbname);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['todo_item'])){
        echo "Input a todo item";
    }else {

        $todoitem = val($_POST['todo_item']);

        $sql = "INSERT INTO todolist (todoitem) VALUES ('$todoitem')";
        $result = $conn->query($sql);
        if($result){
        header('location:' . $_SERVER['PHP_SELF']);
        exit();
        }
}
}

function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class='main'>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
                <input type="text" name="todo_item">
                <input type="submit" name="add" value="Add">
            </form>

            <?php 
            $sql = 'SELECT id, todoitem FROM todolist';
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                echo "<ul>";
                while($row = $result->fetch_assoc()){
                    echo "<li>" . $row['todoitem'] . "
                    <span><a href='deleteitem.php?id=" . $row['id'] . "'> Delete </a>
                    <a style='background-color: blue;' href='updateitem.php?id=" . $row['id'] . "'> Update </a></span> </li>";
                }
                echo "</ul>";
            } else {
                echo "<p style='text-align:center; margin-top:20px;'>No todolist Added</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
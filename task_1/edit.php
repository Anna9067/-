<?php
    $connection = mysqli_connect('localhost', 'root', '', 'uni_project'); // підключення до mysql
    if($connection->connect_error) {
        die("Connection failed:". $connection->connect_error);
    }
    if(isset($_GET['id'])){
       // $delete=mysqli($connection, "");

    }
    $query="SELECT * FROM students";
    $result = mysqli_query($connection, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group list forming</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <h2>Редагування таблиці абітурієнтів</h2>
<div class="tab">
    <table cellpadding="0" border="1"> 
        <thead>
        <tr>
            <th>ID</th>
            <th>ПІБ</th>
            <th>Середній бал</th>
            <th>Форма навчання</th>
            <th>Група</th>
            <th>Операції</th>
        </tr>
        </thead>
    <tbody>
    <?php 
        
        $count = mysqli_num_rows($result);
        if($count > 0) {
            while($row = mysqli_fetch_assoc($result)){
                echo "
                    <tr>
                        <td>". $row['id'] ."</td>
                        <td>". $row['Name'] ."</td>
                        <td>". $row['Grade'] ."</td>
                        <td>". $row['Education'] ."</td>
                        <td>". $row['Study_group'] ."</td>
                        <td>
                            <a href='edit.php?id= ". $row['id'] ."' class='btn'>Видалити</a>
                        </td>
                        <td>
                            <a href='edit.php?' class='btn'>Додати</a>
                        </td>
                    </tr>
                ";
            }
        } else {
            echo "Нічого не знайдено";
        }
        mysqli_close($connection); 
    ?>
    </tbody>
    </table>
    </div>
</body>
</html>
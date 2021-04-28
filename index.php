<?php
    include_once "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Sign UP</h2>
    <form action="includes/signup.inc.php" method="POST">
        <input type="text" name="firstname" placeholder="Firstname"><br>
        <input type="text" name="lastname" placeholder="Lastname"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="uid" placeholder="Username"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <button type="submit" name="submit">Sign Up</button><br>

    </form>

    <?php
        // SELECT QUERY using MYSQLI
        // $sql = "SELECT * FROM users";
        // $result = mysqli_query($conn, $sql);
        // $resultCheck = mysqli_num_rows($result);

        // if($resultCheck > 0) {
        //     while($row = mysqli_fetch_assoc($result)) {
        //         echo $row['user_uid'] . "<br>";
        //     }
        // }

         // SELECT QUERY using Prepared Statements
         $data = "Admin";
         $sql = "SELECT * FROM users WHERE user_uid=?";
         $stmt = mysqli_stmt_init($conn); // Create a prepared statment
          
         if(!mysqli_stmt_prepare($stmt, $sql)) { // Prepare a prepared stamtement
            echo "SQL Statements Failed";
         } else {
            mysqli_stmt_bind_param($stmt, "s", $data); // Bind parameters to the placeholder
            mysqli_stmt_execute($stmt); // Run parameters inside the database
            $result = mysqli_stmt_get_result($stmt);
            
            while($row = mysqli_fetch_assoc($result)) {
                echo $row['user_uid'] . "<br>";
            }
         }
             
    ?>
</body>
</html>
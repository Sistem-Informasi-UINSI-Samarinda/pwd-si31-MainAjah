<?php 
session_start();
include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <?php
    if(isset($_POST['login'])){
        $input =$_POST['username'];
        $password =$_POST['password'];

        if(filter_var($input, FILTER_VALIDATE_EMAIL)){
            $query ="SELECT * FROM users WHERE email ='$input'";
        } else {
            $query ="SELECT * FROM users WHERE username ='$input'";
        }


        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])){
                $_SESSION ['user_id'] = $row['id'];
                $_SESSION ['nama_lengkap'] = $row['nama_lengkap'];
                $_SESSION['username'] = $row['username'];

                header("Location: dashboard.php");
                exit();

            }
            else {
              echo "<p style='color: red'>Password Salah</p>";
            }

        }
        else {
            echo "<P style='color: red'>Username/Email tidak sesuai</P>";
        }

    }
            
            
    ?>

    <form method="post" action="">
        <label>Username atau Email</label><br>
        <input type="text" name="username" placeholder="Masukkan Username Email"
        required> <br>

        <labe>Password</label><br>
        <input type="password" name="password" placeholder="Masukkan Password"><br>
        <br>

        <button type="submit" name='login'>Login</button>

    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN FORM</title>
    <link rel="stylesheet" href="./CSS.css">
</head>
<?php
include "./connetion.php";
if (isset($_POST['login'])) {
    $user_name = $_POST['user-name'];
    $password = $_POST['password'];
    $login_query = "SELECT id , name ,u_role FROM data WHERE name='{$user_name}' AND  password='{$password}'";

    $login = mysqli_query($conn, $login_query) or die("failed");

    if (mysqli_num_rows($login) > 0) {
        while ($row = mysqli_fetch_assoc($login)) {
            session_start();
            $_SESSION["username"] = $row['name'];
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["user_Role"] = $row['u_role'];
            header("location: $localhoat/Websit-post.php");
        }
    } else {
        header("location: $localhoat/index.php");
    }
}
?>

<body style="background-color: chocolate;">
    <div class="loginForm">

        <img src="" alt="" id="Lock-img">
        <!-- LOCK IMAGE END  -->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
            <div class="input-field">
                <label for="user-name" class="Login-label">Full Name</label><br />
                <input type="text" id="user-name" name="user-name" class="Login-input" /><br />
                <div class="underline-input"></div>
            </div>
            <div class="input-field">
                <label for="password" class="Login-label">Password</label><br />
                <input type="password" id="password" name="password" class="Login-input" /><br />
                <div class="underline-input"></div>
            </div>

            <button type="submit" name="login" class="login-btn">Log In</button><br>

        </form>
    </div>

    <script>
        let Input_Field = document.querySelectorAll("input");
        Input_Field.forEach(element => {
            element.addEventListener("focus", () => {
                let Under_Div = element.parentElement.lastElementChild;
                let label = element.parentElement.firstElementChild;
                label.style.top = -10 + "px";
                label.style.left = 0;
                Under_Div.style.width = 100 + "%";
            });
            element.addEventListener("blur", () => {

                if (element.value == "") {
                    let Under_Div = element.parentElement.lastElementChild;
                    let label = element.parentElement.firstElementChild;
                    label.style.top = 10 + "px";
                    label.style.left = 6 + "px";
                    Under_Div.style.width = 0 + "%";
                } else {
                    let Under_Div = element.parentElement.lastElementChild;
                    let label = element.parentElement.firstElementChild;
                    label.style.top = -10 + "px";
                    label.style.left = 0;
                    Under_Div.style.width = 100 + "%";
                }
            });
        });
    </script>
</body>

</html>
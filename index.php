<?php
include "config.php";


if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."' and name='admin'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];
        if($count > 0){
            $_SESSION['uname'] = "1";
            header('Location: users/words/');
        }

}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hebrew 2.0</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="./css/reset.css" rel="stylesheet" type="text/css">
        <link href="./css/style.css" rel="stylesheet" type="text/css">
        <link href="./css/adaptive.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="img/icon.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@700;900&family=Montserrat:wght@200;400;600;900&display=swap" rel="stylesheet">
    </head>
    <body>
      <main class="main_login">
      <a  class="nav_link_sun" id="toggleThemeBtn"><i class="material-icons" style="padding:0px;">brightness_4</i></a>
        <div class="login_block">
            <form method="post" action="" class="login_form">
                <div class="login_left">
                    <h1>LogIn</h1>
                </div>
                <div class="login_right">
                  <div class="center_login">
                    <h1 class="login_zag">Hebrew 2.0</h1>
                    <div class="form-field">
                        <input type="text" class="input-text js-input" autocomplete="off" spellcheck="false" id="txt_uname" name="txt_uname" required/>
                        <label class="label" for="message">Логин</label>
                    </div>
                    <div class="form-field">
                        <input type="password" class="input-text js-input" autocomplete="off" spellcheck="false" id="txt_uname" name="txt_pwd" required/>
                        <label class="label" for="message">Пароль</label>
                    </div>
                    <div>
                        <input type="submit" value="Войти" name="but_submit" id="but_submit" class="but_submit" />
                    </div>
                    </div>
                </div>
            </form>
        </div>

      </main>

    <script type="text/javascript">
    // RewriteCond %{THE_REQUEST} ^[A-Z]{3,9}\ /index\.php\ HTTP/
    // RewriteRule ^index\.php$ http://mai.vodka/ [R=301,L]
    </script>
    <script type="text/javascript" src="js/light.js"></script>
    <script type="text/javascript" src="js/text.js"></script>
    </body>
</html>

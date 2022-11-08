<?php
include "../../config.php";

// Check user login or not
// if(!isset($_SESSION['uname'])){
if($_SESSION['uname'] != "1"){
    header('Location: ../../');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: ../../');
}
?>
<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hebrew 2.0</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="../../css/reset.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
        <link href="../../css/adaptive.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="../../img/icon.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@700;900&family=Montserrat:wght@200;400;600;900&display=swap" rel="stylesheet">
        <style media="screen">
          body{
            background-color: #343434;
          }
          body.light{
            background-color: #bfbfbf;
          }
        </style>
    </head>
    <body>
      <!-- <a  class="nav_link_sun" id="toggleThemeBtn"><i class="material-icons" style="padding:0px;">brightness_4</i></a> -->
      <main class="main_panel">
      <header>
          <a alt="logo" class="logo"></a>
          <h1 class="panel_name">Hebrew 2.0</h1>

          <nav>
              <div class="menu">
                <div class="hi" id="hide">
                <div id="rotate"  class="hide"></div>
              </div>
              </div>
          </nav>


      </header>
      <div class="dropdown">
        <a href="#" class="menu_item_d active" id="links"><b>С</b>лова</a>
        <a href="../sentence" class="menu_item_d " id="links1"><b>П</b>редложения</a>
          <a class="menu_item_d" id="toggleThemeBtn"><b>С</b>мена Темы</a>
          <form method='post' action="">
              <input type="submit" value="Выйти" name="but_logout" class="menu_item_d"style="margin-left:0;">
          </form>
      </div>

      <div class="nft_menu zag_position" id="nft_menu">
        <h1>Новые слова</h1>
        <table>
          <!-- <colgroup>
            <col colspan="3" style="background:Khaki">
            <col style="background-color:LightCyan" >
          </colgroup> -->
          <tr>
            <th>Слово</th>
            <th>Транскрипция</th>
            <th>Иврит</th>
            <th>Род слова</th>
            <th>Часть речи</th>
          </tr>
          <?php
          $first_row = "Id";
          $second_row = "Russ";
          $third_row = "Transcr";
          $fourth_row = "Hebrew";
          $fifth_row = "maleorlo";
          $sixth_row = "chast";
          $base_name = "words";

          $page = 1;
          $sql_query = "select count(1) from $base_name";
          $_Q = mysqli_query($con, $sql_query);
          $len = mysqli_fetch_array($_Q);
          if (isset($_POST['done'])) {
	             $page = $_POST['page'];
          }
          if (isset($_POST['done+']) && $_POST['page'] < floor($len[0] / 10 + 1)) {
	             $page = $_POST['page'] + 1;
          }
          if (isset($_POST['done2'])) {
	             $id_val = $_POST['id_search'];
               $result = mysqli_query($con, "SELECT * FROM `$dbname`.`$base_name` WHERE $second_row LIKE '%$id_val%'");
               while($row = mysqli_fetch_array($result)){
                 $first_value = $row[$first_row];
                 $second_value = $row[$second_row];
                 $third_value = $row[$third_row];
                 $fourth_value = $row[$fourth_row];
                 $fifth_value = $row[$fifth_row];
                 $sixth_value = $row[$sixth_row];
                 switch ($sixth_value) {
                  case 'mest':
                    $sixth_value = 'Мест';
                  break;
                  case 'other':
                    $sixth_value = 'Другое';
                  break;
                  case 'predl':
                    $sixth_value = 'Предл';
                  break;
                  case 'sush':
                    $sixth_value = 'Сущ';
                  break;
                  case 'pril':
                    $sixth_value = 'Прил';
                  break;
                  case 'qu':
                    $sixth_value = 'Вопрос';
                  break;
                  case 'souz':
                    $sixth_value = 'Союз';
                  break;
                  case 'verb':
                    $sixth_value = 'Глагол';
                  break;
                 }

                 echo "<tr>
                   <td>$second_value</td>
                   <td>$third_value</td>
                   <td>$fourth_value</td>
                   <td>$fifth_value</td>
                   <td>$sixth_value</td>
                 </tr>";
               }
          }else if(isset($_POST['done3'])) {
	             $id_val = mb_strtolower($_POST['id_search3']);

               switch ($id_val) {
                case 'мест':
                  $id_val = 'mest';
                break;
                case 'другое':
                  $id_val = 'other';
                break;
                case 'предл':
                  $id_val = 'predl';
                break;
                case 'сущ':
                  $id_val = 'sush';
                break;
                case 'прил':
                  $id_val = 'pril';
                break;
                case 'вопрос':
                  $id_val = 'qu';
                break;
                case 'союз':
                  $id_val = 'souz';
                break;
                case 'глагол':
                  $id_val = 'verb';
                break;
                case 'все':
                  $id_val = 'vse';
                break;
               }
               if($id_val == 'vse')
                  $result = mysqli_query($con, "SELECT * FROM `$dbname`.`$base_name`");
              else
                  $result = mysqli_query($con, "SELECT * FROM `$dbname`.`$base_name` WHERE LOWER($sixth_row)='$id_val'");
               while($row = mysqli_fetch_array($result)){
                 $first_value = $row[$first_row];
                 $second_value = $row[$second_row];
                 $third_value = $row[$third_row];
                 $fourth_value = $row[$fourth_row];
                 $fifth_value = $row[$fifth_row];
                 $sixth_value = $row[$sixth_row];
                 switch ($sixth_value) {
                  case 'mest':
                    $sixth_value = 'Мест';
                  break;
                  case 'other':
                    $sixth_value = 'Другое';
                  break;
                  case 'predl':
                    $sixth_value = 'Предл';
                  break;
                  case 'sush':
                    $sixth_value = 'Сущ';
                  break;
                  case 'pril':
                    $sixth_value = 'Прил';
                  break;
                  case 'qu':
                    $sixth_value = 'Вопрос';
                  break;
                  case 'souz':
                    $sixth_value = 'Союз';
                  break;
                  case 'verb':
                    $sixth_value = 'Глагол';
                  break;
                 }

                 echo "<tr>
                   <td>$second_value</td>
                   <td>$third_value</td>
                   <td>$fourth_value</td>
                   <td>$fifth_value</td>
                   <td>$sixth_value</td>
                 </tr>";
               }
          }else{
          $ind = ($page - 1) * 10;
          $ind_end = $ind + 9;
          for(; $ind <= $ind_end; $ind++){
            $result = mysqli_query($con, "SELECT * FROM `$dbname`.`$base_name` WHERE $first_row='$ind'");
            while($row = mysqli_fetch_array($result)){
              $first_value = $row[$first_row];
              $second_value = $row[$second_row];
              $third_value = $row[$third_row];
              $fourth_value = $row[$fourth_row];
              $fifth_value = $row[$fifth_row];
              $sixth_value = $row[$sixth_row];
              switch ($sixth_value) {
               case 'mest':
                 $sixth_value = 'Мест';
               break;
               case 'other':
                 $sixth_value = 'Другое';
               break;
               case 'predl':
                 $sixth_value = 'Предл';
               break;
               case 'sush':
                 $sixth_value = 'Сущ';
               break;
               case 'pril':
                 $sixth_value = 'Прил';
               break;
               case 'qu':
                 $sixth_value = 'Вопрос';
               break;
               case 'souz':
                 $sixth_value = 'Союз';
               break;
               case 'verb':
                 $sixth_value = 'Глагол';
               break;
              }

              echo "<tr>
                  <td>$second_value</td>
                  <td>$third_value</td>
                  <td>$fourth_value</td>
                  <td>$fifth_value</td>
                  <td>$sixth_value</td>
              </tr>";
            }
          }
        }
           ?>
      </table>

      </div>
      <div class="pages">
        <form class="" action="" method="post">
          <label for="id_search">Слово </label>
          <input class="num_inp" type="text" name="id_search" value="" autocomplete="off">
          <input type="submit" name="done2" value=">" class="subm">
        </form>
        <form class="" action="" method="post">
          <label for="id_search3">Ч.Р. </label>
          <input class="num_inp" type="text" name="id_search3" value="" autocomplete="off">
          <input type="submit" name="done3" value=">" class="subm">
        </form>
        <form class="" action="" method="post">
          <label for="page">Page </label>
          <input class="num_inp" type="number" name="page" min="1" max="<?php echo floor($len[0] / 10 + 1); ?>" value="<?=$page?>" autocomplete="off">
          <label for="page"> of <?php echo floor($len[0] / 10 + 1); ?> </label>
          <input type="submit" name="done" value=">" class="subm">
          <input type="submit" name="done+" value=">>" class="subm">
        </form>
      </div>
    </main>

    </main>

      <script type="text/javascript" src="../../js/light.js"></script>
      <script type="text/javascript" src="../../js/menu-ad.js"></script>
    </body>
</html>

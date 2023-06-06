<?php
session_start();

$conn = new mysqli (
    'localhost',
    'root',
    '',
    'Naic'
);
$sql = $conn->prepare("SELECT id_user FROM Hotels WHERE id = ?");
$sql->bind_param('s', $_GET['id']);
$sql->execute();
$val = $sql->get_result()->fetch_row()[0] ?? 0;
if (!isset($_SESSION['auth_user_id']) || ($val > 0 && $val != $_SESSION['auth_user_id'])): // если не разрешено видеть отель (забронирован другим пользователем)
    ?>
    <script>location.href="index.php"</script>
    <?php
    exit();
endif;

$sql = $conn->prepare("UPDATE Hotels SET id_user = ? WHERE id = ?");
$sql->bind_param('ss', $_SESSION['auth_user_id'], $_GET['id']);
$sql->execute();
 ?>
<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" type="text/css" href="стиль.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body style="background-image: url(phon.jpg);">
    <p><b>Корзина</b></p>
    <ul align = center class=".menu"></ul>
      <div>
        <a href = index.php> На главную </a>
          <p><textarea rows="10" cols="45" id="text"></textarea></p>
          <!-- <p><input onClick="cl1()" type="submit" value="Оформить"></p> -->
          <p><input type="submit" value="Очистить" onClick="клир()"></p>
          <!-- <p><input type="submit" value="Скачать" onClick="writeFile('Чек.txt',document.getElementById('text').value)"></p> -->
      </div>
    <div class="sells"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="корзина.js" defer></script>
  </body>
</html>
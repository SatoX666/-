<?php session_start(); ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Хрыкин Илья</title>

      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
      <link rel="stylesheet" href="reg.css">
      <link href="стиль.css" rel="stylesheet" type="text/css"> 
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

   <body alink=#FFFFFF vlink=#800080>

      <!-- навигация -->
      <nav>
         <img src="logo_coin.png" alt="логотип" id="logo" >
         <a href="#">Главная</a>
         <a href="корзина.php">Корзина</a>
         <?php
         if (empty($_SESSION['auth_user_id'])): ?>
             <a href="javascript:openOpacity();openPUP()">Регистрация/Вход</a>
         <?php else: ?>
             <a href="logout.php">Выход</a>
         <?php endif ?>
      </nav>

      <!-- Сетка отелей -->
      <div class="bronirovanie">
         <main class="grid">
<?php
$conn = new mysqli (
    'localhost',
    'root',
    '',
    'Naic'
);
$res = [];
$query = "SELECT id FROM Hotels";
if (isset($_SESSION['auth_user_id']))
    $query .= " WHERE id_user IS NULL OR id_user = " . (int)$_SESSION['auth_user_id']; // где id_user (пользователь, который забронировал отель) пустой или равен нашему пользователю
$sql = $conn->query($query);
$result = $sql->fetch_all() ?? [];
foreach ($result as $var)
    array_push($res, $var[0]);

            if (in_array(1, $res)): ?>
            <figure class="g1">
               <a href="корзина.php?id=1">
                  <img src="отель 1.jpg" alt="Отель 1" onclick = "cll ('Отель 1',5000,'sp1','sp2','отель 1.jpg')">
                  <figcaption> Номер с видом на море №1</figcaption>
               </a>
            </figure>
            <?php endif;
            if (in_array(2, $res)): ?>
            <figure class="g2">
               <a href="корзина.php?id=2">
                  <img src="отель 2.jpg" alt="Отель 2" onclick= "cll ('Отель 2',6000,'sp1','sp2','отель 2.jpg')">
                  <figcaption> Отель с бассейном №2</figcaption>
               </a>
            </figure>
            <?php endif;
            if (in_array(3, $res)): ?>
            <figure class="g3">
               <a href="корзина.php?id=3">
                  <img src="отель 3.jpg" alt="Отель 3" onclick= "cll ('Отель 3',7000,'sp1','sp2','отель 3.jpg')">
                  <figcaption> Гостевой дом №3</figcaption>
               </a>
            </figure>
            <?php endif; ?>
         </main>
         <!-- selection -->
         <div class="selection">
            <SELECT class="select" id="sp1" >
                  <OPTION SELECTED VALUE="0">№ недвижимости</OPTION>
                  <OPTION VALUE="5000">1</OPTION>
                  <OPTION VALUE="5000">2</OPTION>
                  <OPTION VALUE="5000">3</OPTION>
            </SELECT>
               <SELECT class="select" name="543" id="sp2" >
                  <OPTION SELECTED VALUE="0">Продолжительность</OPTION>
                  <OPTION VALUE="5000">1 день</OPTION>
                  <OPTION VALUE="30000">7 дней</OPTION>
                  <OPTION VALUE="60000">14 дней</OPTION>
            </SELECT>
         </div>
         
      </div>

         
      <!-- Футер -->
      <footer>
         <div class="cp">
            <p>Обратная связь</p>
            <p>✆ +7(900)000-00-00</p>
            <p>🖂 Email@mail.ru</p>
         </div>
         <p>©2022, ООО "НАИЦ"</p>
         <img src="logo_coin.png" alt="logo_footer">
      </footer>

         <!-- Окно регистрации -->
         <div class="container">
           <form action="conn.php" method="get" >
            <input class="CloseReg" type="button" value="Закрыть" onclick="closeOpacity()">
             <p>Добро пожаловать!</p>
             <input name="email" type="email" placeholder="Email"><br>
             <input name="Password1" type="password" placeholder="Пароль"><br>
             <input style="cursor: pointer;" type="submit" value="Регистрация/Вход"><br>
             <a href="#">Забыли пароль?</a>
           </form>
        
       
         </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="корзина.js" defer></script>
      <script src="main.js"></script>
 
   </body>
</html>
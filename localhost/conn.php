<?php
$email=$_GET ['email'];
$pass=$_GET ['Password1'];

$conn = new mysqli (
    'localhost',
    'root',
    '',
    'Naic');

if (!$conn) {
    printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}

$sql = $conn->prepare("SELECT ID FROM Users WHERE Email = ?");
$sql->bind_param('s', $email);
$sql->execute();

if ($sql->get_result()->fetch_row()[0] ?? false) //если есть в бд такой email
{
    $sql = $conn->prepare("SELECT ID FROM Users WHERE Email = ? and Password = ?");
    $sql->bind_param('ss', $email, $pass);
    $sql->execute();
    $user_id = $sql->get_result()->fetch_row()[0];
    if ($user_id) //если пароль также совпал
    {
        echo 'Успешный вход';
        session_start();
        $_SESSION['auth_user_id'] = $user_id;
    }
    else // если неверный пароль
    {
        echo 'Неверный пароль';
    }
}
else //если нет такого email в бд
{
    echo 'Вы зарегистрированы';
    $sql = $conn->prepare("INSERT INTO Users (Email, Password) VALUES (?, ?)");
    $sql->bind_param('ss', $email, $pass);
    $sql->execute();
    //printf("%d Row inserted.\n", $sql->affected_rows);
    $sql = $conn->prepare("SELECT ID FROM Users WHERE Email = ? and Password = ?");
    $sql->bind_param('ss', $email, $pass);
    $sql->execute();
    session_start();
    $_SESSION['auth_user_id'] = $sql->get_result()->fetch_row()[0];
}
$sql->close();
?>

<script>location.href="index.php"</script>
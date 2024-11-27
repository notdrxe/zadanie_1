<?php

if (isset($_COOKIE['user_age'])) {
    $age = $_COOKIE['user_age'];
} else {

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['age'])) {
    
        $age = $_POST['age'];
        setcookie('user_age', $age, time() + (30 * 24 * 60 * 60)); 
    }
}


if (isset($_POST['delete_cookie'])) {
    setcookie('user_age', '', time() - 3600); 
    $age = null;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Введите ваш возраст</title>
</head>
<body>
    <?php if (isset($age)): ?>
        <h1>Ваш возраст: <?php echo htmlspecialchars($age); ?> лет</h1>
        <form method="post" action="">
            <input type="submit" name="delete_cookie" value="Удалить cookie">
        </form>
    <?php else: ?>
        <form method="post" action="">
            <label for="age">Введите ваш возраст:</label>
            <input type="number" id="age" name="age" required>
            <input type="submit" value="Отправить">
        </form>
    <?php endif; ?>
</body>
</html>
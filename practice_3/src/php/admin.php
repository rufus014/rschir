<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Administrate</title>
        <style>span { margin: 10px; }</style>
    </head>
    <body>
        <h1>List of users</h1>
        <?php
            $mysqli = new mysqli("db", "user", "password", "appDB");
						$result = $mysqli->query("SELECT * FROM users");
						while ($row = mysqli_fetch_assoc($result)) {
								$users[] = $row;
						}
        ?>
        <div style="
            display: flex;
            flex-direction: column;
        ">
				
					 <?php foreach ($users as $user) : ?>
								<?php echo implode(" | ",$user) ?>
						<?php endforeach; ?> 		

				</div>
        <?php $mysqli->close(); ?>
    </body>
</html>
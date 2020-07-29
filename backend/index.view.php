<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>

<body>
    <form>
        <?php foreach ($tasks as $list) {
            $list = json_decode($list);
            echo "<ul>$list->id 
             $list->description 
             $list->completed
          </ul>";
        }
        ?>
    </form>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="description" value=<?= $description ?>>
        <span> <?= $description_err ?></span>
        <button type="submit" value="Submit"/>
    </form>
    <br>
    <?= $description ?>
    <?= $description_err ?>

</body>

</html>
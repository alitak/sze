<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>02</title>
</head>
<body style="font-size: 26px">
<ul>
    <?php
    foreach ($filteredData as $book) {
        ?>
        <li>
            <?php echo $book['name'].' ('.$book['year'].')'; ?>
        </li>
        <?php
    }
    ?>
</ul>
</body>
</html>

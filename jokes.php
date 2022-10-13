<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>
<h1>jokes.php</h1>
    <?php
    try {
        
        $pdo = new PDO('mysql:host=localhost;dbname=ijdb; charset=utf8', 'ijdbuser', 'mypassword');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = 'SELECT `joketext` FROM `joke`';
        $result = $pdo->query($sql);
        
        while ($row= $result->fetch()) {
            $jokes[]=$row['joketext'];
        }

        $title = 'Joke List';
       
      
        
        ob_start();
        
        include __DIR__.'/templates/jokes.html.php';

        $output = ob_get_clean();
        
    }

    catch (PDOException $E) {
        $title = 'An error has occured';

        $output = 'Database error: '.$e->getMessage().' in '.$e->getFile().': '.$e->getLine();
    }

    include __DIR__.'/layout.html.php';
    ?>
</body>
</html>
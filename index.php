
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Lecteur XML</title>
</head>
<header>
    <h1>Copiez un lien XML dans le lecteur</h1>
    <div class="container-input">
        <form action="" method="post">
            <input type="text" placeholder="Copiez votre lien ici" name="url">
            <div class="btn">
                <button type="submit" name="submit">Lire</button>
            </div>
        </form>
    </div>
</header>
<body>
    <?php
    if(isset($_POST['submit']))
    {
        $url = $_POST['url'];
        displayAll($url);
    }else
    {
        echo "<p class='alert'>Veuillez entrer un lien XML valide.</p>";
    }
    
    function displayAll($url)
    {
        $xml = file_get_contents($url);
        $xml = simplexml_load_string($xml);
        
        foreach($xml->channel->item as $news)
        {
            echo "<div class='card'>
                  <div class='titleCard'><h2>$news->title</h2></div>
                  <div class='descriptionCard'><p>$news->description</p></div>
                  <div class='pubCard'><p>$news->pubDate</p></div>
                  <div class='linkCard'><form action='$news->link' method='get' target='_blank'><button class='btn-link'>Lire la suite</button></form></div>
                  </div>";
        }
    
    }
    ?>
</body>
</html>
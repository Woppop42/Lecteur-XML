
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <script src='./assets/script.js'></script>
    <title>Lecteur XML</title>
</head>
<header>
    <h1>Copiez un lien XML dans le lecteur</h1>
    <div class="container-input">
        <form action="" method="post" id="form">
            <input type="text" placeholder="Copiez votre lien ici" name="url" id="input">
            <div class="btn">
                <button type="submit" name="submit" id='btn'>Lire</button>
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
    }
    
    function displayAll($url)
    {
        $xml = file_get_contents($url);
        $xml = simplexml_load_string($xml);
        $articles = 0;
        $articlesMax = 10;
        foreach($xml->channel->item as $news)
        {
            echo "<div class='card'>
                  <div class='titleCard'><h2>$news->title</h2></div>
                  <div class='descriptionCard'><p>$news->description</p></div>
                  <div class='pubCard'><p>$news->pubDate</p></div>
                  <div class='linkCard'><form action='$news->link' method='get' target='_blank'><button class='btn-link'>Lire la suite</button></form></div>
                  </div>
                  <div class='block'></div>";
                  $articles ++;
                  if($articles == $articlesMax){break;}
        }
    
    }
    ?>
</body>
<footer>
    <div class='footer'>
        <h3>Quelques suggestions :</h3>
        <div class="suggest1">
            <ul>
            <li><a href="" onclick="copyLink(event,'https://www.lemonde.fr/international/rss_full.xml')">International</a></li>
            <li><a href="" onclick="copyLink(event, 'https://www.lemonde.fr/jeux-video/rss_full.xml')">Jeux-vidéos</a></li>
            <li><a href="" onclick="copyLink(event, 'https://www.lemonde.fr/sport/rss_full.xml')">Sports</a></li>
        </ul>
        </div>
    <div class="suggest2">
    <ul>
            <li><a href="" onclick="copyLink(event,'https://www.lemonde.fr/sciences/rss_full.xml')">Sciences</a></li>
            <li><a href="" onclick="copyLink(event, 'https://www.lemonde.fr/culture/rss_full.xml')">Culture</a></li>
            <li><a href="" onclick="copyLink(event, 'https://www.lemonde.fr/economie/rss_full.xml')">Economie</a></li>
        </ul>
    </div>
            
        
    </div>
    
</footer>
</html>
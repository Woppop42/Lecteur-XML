
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
    <!-- H1 du site et input servant à lire un flux RSS -->
    <h1>Copiez un lien XML dans le lecteur</h1>
    <div class="container-input">
        <form action="" method="post" id="form">
            <input type="text" placeholder="Copiez votre lien ici" name="url" id="input">
            <div class="btn">
                <button type="submit" name="submit" id='btn' class="btn-lecture">Lire</button>
            </div>
        </form>
    </div>
</header>
<body>
    <?php
    // Affichage du fil d'actu quand une adresse xml est entré dans l'input puis envoyé via $_POST
    if(isset($_POST['submit']))
    {
        // Appel de la fonction de vérification de l'url si le bouton est submit
        $url = $_POST['url'];
        if(validXML($url) == true)
        {
            // Lecture du flux après vérification :
            displayAll($url);
        }
        
    }
    
    // Fonction de lectue et d'affichage du flux RSS
    function displayAll($url)
    {
        // Récupération de l'url
        $xml = file_get_contents($url);
        // récupération du flux sous forme d'objet :
        $xml = simplexml_load_string($xml);
        // Compteur d'articles 
        $articles = 0;
        // Nombres d'articles affichés 
        $articlesMax = 10;
        // Foreach sur l'objet xml récupéré précédemment 
        foreach($xml->channel->item as $news)
        {
            // Affichage des infos de chaque article dans une card
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
    
    // Fonction de vérification sommaire avec une regex pour s'assurer qu'il s'agit bien d'une adresse XML
    function validXML($url){
        if(preg_match('/xml$/', $url)){
            return true;
        }else{
            echo "<p class='errorMessage'>Veuillez entrer une adresse XML valide.</p>";
            return false;
        }
    }
    ?>
</body>
<footer>
    <!-- Footer contenant des suggestions et contenant de liens clickables affichant sur la page leur contenu après le click -->
    <div class='footer'>
        <h3>Quelques suggestions :</h3>
        <div class="suggest1">
            <!-- Appel de la fonction copyLink sur les flux rss en suggestion -->
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
    <div class="suggest3">
        <ul>
            <li>
                <a href="" onclick="copyLink(event, 'https://www.liberation.fr/arc/outboundfeeds/rss-all/category/checknews/?outputType=xml')">CheckNews</a>
            </li>
            <li>
                <a href="" onclick="copyLink(event, 'https://www.liberation.fr/arc/outboundfeeds/rss-all/category/environnement/?outputType=xml')">Environnement</a>
            </li>
            <li>
                <a href="" onclick="copyLink(event, 'https://www.liberation.fr/arc/outboundfeeds/rss-all/category/politique/?outputType=xml')">Politique</a>
            </li>
        </ul>
    </div>
    <div class="suggest4">
        <ul>
            <li>
                <a href="" onclick="copyLink(event, 'https://www.liberation.fr/arc/outboundfeeds/rss-all/category/portraits/?outputType=xml')">Portraits</a>
            </li>
            <li>
            <a href="" onclick="copyLink(event, 'https://www.courrierinternational.com/feed/all/rss.xml')">Courrier International</a>
            </li>
            <li>
                <a href="" onclick="copyLink(event, 'https://www.cairn.info/rss/rss_revues.xml')">Cairn</a>
            </li>
        </ul>
    </div>
            
        
    </div>
    
</footer>
</html>
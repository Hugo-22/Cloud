<?php
// $d = dir(".");
// echo "Pointeur: ".$d->handle."<br>\n";
// echo "Chemin: ".$d->path."<br>\n";
// while($entry = $d->read()) {
//     echo $entry."<br>\n";
// }
// $d->close();
?>

<?php

 $dir = "./";
 //  si le dossier pointe existe
 if (is_dir($dir)) {
  
    // si il contient quelque chose
    if ($dh = opendir($dir)) {
  
        // boucler tant que quelque chose est trouve
        while (($file = readdir($dh)) !== false) {
  
            // affiche le nom du dossier
            if( $file != '.' && $file != '..' && $file != '.DS_Store') {
            $pathfile = $dir.''.$file;
            // echo "fichier : $file : type : " . filetype($dir . $file) . "<br />\n";
            echo "<a href='liste_fichier.php?list=$file'</a> $file <a href='delete.php?delete=$file'>Supprimer</a> <br> <br>";
            }
        }
        // on ferme la connection 
        closedir($dh);
    }
 }

?> 

<h1>Créer un dossier :</h1>
<form enctype="multipart/form-data" action="" method="post">
<input type="text" name="text" id="nom">
<input type="submit" value="Créer un dossier">
</form>

<?php

if(isset($_POST['text'])){
    $text = $_POST['text'];
    // var_dump($text);
    mkdir("$text");
    header("location: index.php");
}
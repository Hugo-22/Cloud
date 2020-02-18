<?php
session_start();
// var_dump($_SESSION['name_dossier']);

$fichier = $_FILES['fichier']['name'];
// var_dump($fichier);
$elementsChemin = pathinfo($fichier);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("jpeg", "jpg", "gif", "pdf", "pptx", "png", "txt", "docx", );
if (!(in_array($extensionFichier, $extensionsAutorisees))) {
echo "Le fichier n'a pas l'extension attendue";
} else {
$repertoireDestination = "./".$_SESSION['name_dossier']."/";
// var_dump($repertoireDestination);
// $nom = explode(" ", $fichier);
// var_dump($nom);
$nom = str_replace(" ", "_", $fichier);
var_dump($nom);
$nomDestination = "$nom";

if (move_uploaded_file($_FILES["fichier"]["tmp_name"],$repertoireDestination.$nomDestination)) {
echo "Votre fichier ".$nomDestination.
" a bien été transféré !";
header ('location : liste_fichier.php');

} else {
echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
"Le déplacement du fichier temporaire a échoué".
" vérifiez l'existence du répertoire ".$repertoireDestination;
}
}
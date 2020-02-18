<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="table.css">
    <title>Mes fichiers</title>
</head>
<body>
<main class="main">
  <aside class="sidebar">
    <nav class="nav">
      <ul>
        <li><a href="index.php">Welcome</a></li>
        <li class="active"><a href="dossiers.php">Mes Dossiers</a></li>
        <li><a href="#">??</a></li>
        <li><a href="#">??</a></li>
      </ul>
    </nav>
  </aside>

    <div class="container">
        <div class="row">
            <div class="col-lg-10">

 <table class="table-fill table-hover">
                <thead class="table-title">
                        <tr>
                            <th class="text-center">Mes fichiers</th>
                            <th class="text-center">Ajouter</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
 $adresse="./".$_GET['list']."/"; //Adresse du dossier sans oublier le / à la fin.
 $dossier=Opendir($adresse); //Ouverture du dossier.
 
 while ($Fichier = readdir($dossier)) //On affiche les fichiers les uns après les autres.
 {
     if ($Fichier != "." && $Fichier != ".." && $Fichier != ".DS_Store") {
         $_SESSION['name_dossier'] = $_GET['list'];
         
         $ext = new SplFileInfo($Fichier);
        $extension = $ext->getExtension();
        // var_dump($extension);


        if($extension == "docx"){
          echo '<tr> <td> <a href='.$adresse.$Fichier.'> <img id="img" width="150px" height="150px" src="./word.png"> </a><figcaption> '.$Fichier.' </figcaption> </td>';
        }
        else if ($extension == "html"){
          echo '<tr> <td> <a href='.$adresse.$Fichier.'> <img id="img" width="150px" height="150px" src="./web.png"> </a><figcaption> '.$Fichier.' </figcaption> </td>';
        }
        // else if ($extension == "png"){
        //   echo '<tr> <td> <a href='.$adresse.$Fichier.'> <img id="img" width="150px" height="150px" src="> </a><figcaption> '.$Fichier.' </figcaption> </td>';
        // }
        else {
          echo '<tr> <td> <a href='.$adresse.$Fichier.'> <img size="1000" id="img" width="150px" height="150px" src="'.$Fichier.'"> </a><figcaption> '.$Fichier.' </figcaption> </td>';
        }
        


         echo '<td> <form action="uploads.php" method="post" enctype="multipart/form-data">
         Select image to upload:
         <input type="file" name="fichier" size="40">
         <input type="submit" value="Upload Image" name="submit">
         
         </form> </td> </tr>';
     }
 }
 closedir($dossier);



?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</body>
</html>
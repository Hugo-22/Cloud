<?php
if (isset($_POST['text'])) {
    $text = $_POST['text'];
    // var_dump($text);
    mkdir("$text");
    header("location: dossiers.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.13.0/css/mdb.min.css" rel="stylesheet">
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.13.0/js/mdb.min.js"></script>
<script src="script.js"></script>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="table.css">
    <title>Mes dossiers</title>
</head>
<body>
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
           
            <?php

$dir = "./";
//  si le dossier pointe existe
if (is_dir($dir)) {
    ?>
    <!-- Modal -->

       

    </div>
  </div>
</div>
 <table class="table-fill table-hover">
                <thead class="table-title">
                        <tr>
                            <th class="text-center">Mes Dossiers <span type="button" class="fas fa-folder-plus elegant-color" data-toggle="modal" data-target="#basicExampleModal">
  
</span> </th>
                            <th class="text-center">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
// si il contient quelque chose
    if ($dh = opendir($dir)) {

        // boucler tant que quelque chose est trouve
        while (($file = readdir($dh)) !== false) {

            // affiche le nom du dossier
            if ($file != '.' && $file != '..' && $file != '.DS_Store' && $file != '.git') {
                $pathfile = $dir . '' . $file;
                // echo "fichier : $file : type : " . filetype($dir . $file) . "<br />\n";
                echo "<tr class='text-center'> <td> <a href='liste_fichier.php?list=$file'</a> $file</td>  <td> <a href='delete.php?delete=$file'>Supprimer</a> </> </tr>";
            }
        }
        echo "</>";
        // on ferme la connection
        closedir($dh);
    }
}
?>
</tbody>
</table>

<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" action="" id="form1" method="post">
    <input type="text" name="text" id="nom">
    <input type="submit" class="btn btn-primary" value="créer un dossier">
</form>
      </div>
    </div>

</div>
</div>
</div>

</body>
</html>
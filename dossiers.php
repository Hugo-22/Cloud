<?php
if (isset($_POST['text'])) {
    $text = $_POST['text'];
    // var_dump($text);
    mkdir("$text");
    header("location: dossiers.php");
}
?>
<?php include 'sidebar.php'; ?>
<table class="table w-75">
  <thead class="bg-thead white-text">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Taille</th>
      <th scope="col">Renommer</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php
$dir = "./";
//  si le dossier pointe existe
if (is_dir($dir)) {
  // si il contient quelque chose
    if ($dh = opendir($dir)) {

        // boucler tant que quelque chose est trouve
        while (($file = readdir($dh)) !== false) {
          $fichier = new SplFileInfo($file);
          $extension = $fichier->getExtension();
          $nom_fichier = $fichier->getBasename($extension);
          $final = explode(".", $nom_fichier);
          $filesize = filesize($dir.$file);
          $result = round($filesize/1000, 1) . " Ko";
          

          // fichiers
            if ($file != '.' && $file != '..' && $file != '.DS_Store' && $file != '.git' && $extension != "")  {
                $pathfile = $dir . '' . $file;
                
                echo "<tr> <td class='test'> <img src='https://zupimages.net/up/20/08/iscc.png' alt='' width='20' height='20'/> $file</td> <td> $result</td> <td class='text-center'> <span class='far fa-edit warning-color' alt='' width='20' height='20' id='edit' type='button' data-toggle='modal' data-target='#modal-edit'</span></td> </tr>";
                
                
                // <a href='https://zupimages.net/viewer.php?id=20/08/c90l.png'><img src='https://zupimages.net/up/20/08/c90l.png' alt='' width='20' height='20'/></a> 
            } 
            // dossiers
            else if ($file != '.' && $file != '..' && $file != '.DS_Store' && $file != '.git' && $extension == "")
           {
            $pathfile = $dir . '' . $file;
  
            echo "<tr> <td> <img src='https://zupimages.net/up/20/08/8pwy.png' alt='' width='20' height='20'/> <a href=liste_fichier.php?list=$file> $file </a></td> <td> $result</td> <td class='text-center'> <span class='far fa-edit warning-color' alt='' width='20' height='20' id='edit' type='button' data-toggle='modal' data-target='#modal-edit'</span> </td> </tr>";

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
  

<!-- modal edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Renommer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" action="" id="form2" method="post">
    <input type="text" name="edit" id="edit_txt">
    <input type="submit" class="btn btn-primary" value="Renommer">
</form>
      </div>
      
    </div>
  </div>
</div>
<!-- fin modal edit -->

<!-- modal création dossier -->
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

<script>

          let test = document.querySelector('.test');
          console.log(test.textContent);
          let edit_txt = document.querySelector('#edit_txt');
          console.log(edit_txt);
          
          edit_txt.textContent = test.textContent;
  </script>

</body>
</html>
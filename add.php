<?php
#ini_set('display_errors', '1');
#ini_set('display_startup_errors', '1');
#error_reporting(E_ALL);

require ("vendor/autoload.php");

chdir (__DIR__);
include "config.php";
include "anneli/header.php";
include "anneli/db.php";

if ($_POST != null) {
  // var_dump ($_FILES);
  $_POST ["type"] = $_GET ["type"];
  $s = "uid" ;
  $v = ":uid" ;
  foreach ($_FILES as $ftitle => $fname) {
    $filename = "files/".$fname ["name"] .".". explode ("/", $fname ["type"]) [1] ;
    if (!move_uploaded_file ($fname ["tmp_name"], $filename)) {
      ?><div class="alert alert-danger h3"><?php
      die (error_get_last ()["message"]);
    } else {
      $_POST [$ftitle] = $filename ;
      // $s .= ",".$ftitle ;
      // $v .= ",:".$ftitle ;
    }
  }
  foreach($_POST as $name => $val) {
    $s .= ",".$name ;
    $v .= ",:".$name ;
  }

  $_POST ["uid"] = $uid ;

  $statement = "INSERT into files ($s) values ($v) ;" ;
  // print ($statement);
  // var_dump ($_POST);
  $sql = $db -> prepare ($statement);
  if ($sql->execute( $_POST )) {
    ?>
    <script>
      Swal.fire(
        'File uploaded successfully',
        'The file has been uploaded successfully',
        'success'
      ).then((result) => {
        location.href = "/"
      })
    </script>
    <?php
    include "anneli/footer.php" ;
    die () ;
  }
  // var_dump ($sql);

}
?>

<div class="section row m-3 p-3 justify-content-center">
  <form enctype="multipart/form-data" method="post" action="add.php?type=<?php echo $_GET ["type"];?>" class="col-7 shadow p-3 shadow border border-primary">
    <h3 class="alert shadow alert-primary">Add <?php echo $_GET ["type"];?></h3>

  <?php
  foreach ($FILES_JSON [$_GET ["type"]] as $name => $type) {
    ?>
    <div class="mb-3">
      <label  class="form-label"><?php echo $name;?>&nbsp;&nbsp;</label>
      <input name="<?php echo $name ;?>" type="<?php echo $type ;?>" class="form-control" id="<?php echo $name ;?>" >
    </div>
    <?php
  }
  ?>

  <button class="btn btn-primary" type="submit">Submit</button>
  </form>
</div>
<?php
include "anneli/footer.php";
?>
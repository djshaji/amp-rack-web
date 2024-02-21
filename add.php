<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require ("vendor/autoload.php");

chdir (__DIR__);
include "config.php";
include "anneli/header.php";
include "anneli/db.php";

require_login ();
$labels = array () ;
$LABELS ["Download"] = "Upload " . $_GET ["type"] . " file" ;

if ($_POST != null) {
  // var_dump ($_FILES);
  $_POST ["type"] = $_GET ["type"];
  $s = "uid" ;
  $v = ":uid" ;
  foreach ($_FILES as $ftitle => $fname) {
    if ($fname["size"] == 0)
        continue ;
    $ext = explode ("/", $fname ["type"]);
    if ($ext [0] == "")
      $ext = "txt";
    else 
      $ext = $ext [1];
    $filename = "files/".$_GET["type"] ."/".$uid."/".$fname ["name"] . "-" . time () .".". $ext ;
    // var_dump ($filename);
    if (!file_exists (dirname ($filename)))
      mkdir (dirname ($filename),  0777, true) ;
    if (!move_uploaded_file ($fname ["tmp_name"], $filename)) {
      ?><div class="alert alert-danger h3"><?php
      // var_dump ($fname);
      echo "<h3>";var_dump ($fname) ;echo "</h3>";
      echo "<h1>Cannot upload $filename </h1>| Error code: ".$fname ["error"]."<br>";
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
  $type = $_GET ["type"];
  echo "<script>fileType = '$type'</script>" ;
  $sql = $db -> prepare ($statement);
  if ($sql->execute( $_POST )) {
    ?>
    <script>
      Swal.fire(
        'File uploaded successfully',
        'The file has been uploaded successfully',
        'success'
      ).then((result) => {
        location.href = "/view.php?type=" + fileType;
      })
    </script>
    <?php
    include "anneli/footer.php" ;
    die () ;
  }
  // var_dump ($sql);

}
?>

<div class="section row m-3  justify-content-center">
  <form enctype="multipart/form-data" method="post" action="add.php?type=<?php echo $_GET ["type"];?>" class="col-md-7 shadow p-3 shadow border border-primary">
    <h3 class="alert shadow alert-primary">Add <?php echo $_GET ["type"];?></h3>

  <?php
  foreach ($FILES_JSON [$_GET ["type"]] as $name => $type) {
    $label = $name ;
    // var_dump (in_array ($name, $LABELS)) ;

    if ($LABELS [$name] != null)
      $label = $LABELS [$name];
    ?>
    <div class="mb-3">
      <label  class="form-label"><?php echo $label;?>&nbsp;&nbsp;</label>
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

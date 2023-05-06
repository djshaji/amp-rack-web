<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require ("vendor/autoload.php");

chdir (__DIR__);
include "config.php";
include "anneli/header.php";
$type = $_GET ["type"];
include "anneli/db.php";
$sql = "SELECT * from files where type = '$type' order by id DESC limit 30;" ;
$q = $db -> prepare ($sql) ;
$result = $q -> execute () ;
$result = $q -> fetchAll () ;
var_dump ($result);
?>
<div class="section">
  <div class="alert alert-primary h2"><?php echo $type ;?></div>
  <div class="row m-4 p-2 justify-content-center">
    <?php
      foreach ($result as $card) {
        ?>
        <div class="card">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <?php
      }
    ?>
  </div>
</div>
<?php
include "anneli/footer.php";
?>
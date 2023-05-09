<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require ("vendor/autoload.php");

chdir (__DIR__);
include "config.php";
include "anneli/header.php";
include "anneli/ui.php" ;

$type = $_GET ["type"];

function isAudio () {
  global $type ;
  if ($type == "Drum Loops" || $type == "Rhythm Loops")
    return true ;
  return false ;
}

function isY () {
  global $type ;
  if ($type == "Videos")
    return true ;
  return false ;
}

include "anneli/db.php";
$page = $_GET ["page"] ;
if ($page == null)
  $page = 1 ;

$offset = $page - 1 ;
$offset = $offset * 30 ;
if ($uid == $root_user)
    $bypass = "or true " ;
else
    $bypass = "" ;

$sql = "SELECT * from files where type = '$type' and (approved = true or uid = '$uid' $bypass) order by id DESC limit $offset, 30 ;" ;
//echo $sql ;
$q = $db -> prepare ($sql) ;
$result = $q -> execute () ;
$result = $q -> fetchAll () ;
// var_dump ($result);
?>
<div class="section">
  <div class="alert alert-primary h2"><?php echo $type ;?></div>
  <div class="row m-4 p-2 justify-content-center">
    <?php
      foreach ($result as $card) {
        if (isAudio ())
          $card ["Preview"] = $card ["Download"] ;
        if (isY ()) {
          $card ["stub"] = explode ("?v=", $card ["Youtube_URL"])[1];
          // var_dump ($card);
        }
        ?>
        <div class="card col-md-3 <?php if (isY()) echo "bg-dark text-white m-2";?>">
          <div class="card-header">
            <?php if ($card ["Screenshot"] != null) { ?>
              <img class="img-fluid" src="<?php echo $card ["Screenshot"] ;?>">
            <?php } else if ($card ["Preview"] != null) { ?>
              <audio style="width: 265px;" controls>
                <source src="<?php echo $card ["Preview"] ;?>">
              </audio>
            <?php } else if (isY ()) { ?>
              <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $card["stub"];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>              
                <?php } ?>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $card ["Title"] ;?></h5>
            <p class="card-text">
              <?php echo $card ["Description"] ;?>
            </p>
            <?php if ($card ["Download"] != null) { ?>
              <a download href="<?php echo $card ["Download"] ;?>" class="btn btn-primary">Download</a>
            <?php } 
               if ($uid == $root_user && $card ["approved"] === null) { ?>
                 <div class="mt-3 card-footer text-muted">
                   <a href="/approve.php?id=<?php echo $card ["id"] ;?>" class="btn btn-success">Approve</a>
                   <a href="/delete.php?id=<?php echo $card ["id"] ;?>" class="btn btn-danger">Delete</a>
                 </div>

            <?php }
            ?>
          </div>
        </div>
        <?php
      }
    ?>
  </div>
</div>

<div class="d-flex justify-content-center">
  <ul class="pagination pagination-lg">
    <?php
      for ($i = $page - 1 ; $i > 0 ; $i --) { ?>
        <li class="page-item">
          <a class="page-link" href="/view.php?type=<?php echo $type . "&page=$i";?>"><?php echo $i;?></a>
        </li>
      <?php
        if ($i < $page - 5)
          break ;
      }

      for ($i = $page ; $i < $page + 5 ; $i ++) { ?>
        <li class="page-item <?php if ($i == $page) echo "active" ;?>">
          <a class="page-link" href="/view.php?type=<?php echo $type . "&page=$i";?>"><?php echo $i;?></a>
        </li>
      <?php }
    ?>
    <li class="page-item">
      <a class="page-link" href="/view.php?type=<?php $pp = $page + 1;  echo $type . "&page=$pp";?>">Next</a>
    </li>

  </ul>
</div>

<?php 
$links = array () ;
foreach ($FILES_JSON as $_type=>$_data) {
  $links [$_type] = "/add.php?type=$_type" ;
}
fab ("new", $links);
?>
<?php
include "anneli/footer.php";
?>

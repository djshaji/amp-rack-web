<?php
//ini_set('display_errors', '1');ini_set('display_startup_errors', '1'); error_reporting(E_ALL);

require ("vendor/autoload.php");

chdir (__DIR__);
include "config.php";
include "anneli/header.php";
include "anneli/ui.php" ;
include "anneli/db.php";

if ($uid == null) {
    die ("Unauthorized") ;
}

$id = $_GET ["id"] ;
if ($id == null ) {
    die ("incorrect usage") ;
}

$fetch = "SELECT * from files where id = ?" ;
$st = $db -> prepare ($fetch);
$result = $st -> execute ([$id]);
if ($result)
  $result = $st -> fetch () ;
else 
  die ("No data found");

if ($result ["uid"] != $uid) {
  die ("<h2 class='alert alert-danger'>Unauthorized 403</h2>") ;
}

$sql = "DELETE from files where id = ? and uid = '$uid';";
$statement = $db -> prepare ($sql) ;
if ($statement->execute([$id])) { ?>
<script>
Swal.fire(
  'Deleted preset',
  "Preset was deleted successfully",
  "success"
).then (()=> {
history.back ()
}) ;
</script>
<?php } else { ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Unable to update!',
  footer: "Cannot update"
})
</script>

<?php
}
?>

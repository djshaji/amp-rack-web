<?php
// ini_set('display_errors', '1');ini_set('display_startup_errors', '1'); error_reporting(E_ALL);

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

$sql = "DELETE from files where id = $id ;";
$statement = $db -> prepare ($sql) ;
if ($statement->execute()) { ?>
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

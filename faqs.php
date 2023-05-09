<?php
require ("vendor/autoload.php");

chdir (__DIR__);
include "config.php";
include "anneli/header.php";
include "Parsedown.php" ;
$file = file_get_contents('faqs.md');
$Parsedown = new Parsedown();
?>

<div class="section row m-4 p-2 ">
  <div class="col-md-7">
    <?php echo $Parsedown->text($file);?>
  </div>
</div>

<?php
include "anneli/footer.php" ;
?>

<script>
for (i of document.getElementsByTagName ("img"))
    i.classList.add ("img-fluid")

</script>

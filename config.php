<?php
$config = array (
    "dir"=> "/var/www/amp",
    "filesdir"=> "/var/www/amp/files",
    "serviceAccount"=> "/var/www/amp-admin/amp-rack-firebase-adminsdk-h9jwj-b9993828c2.json",
    "database" => "mysql:host=localhost;dbname=letsgodil;charset=utf8mb4",
    "database_user" => "clover",
    "database_pass" => "iloveshajikhan",
    "codename" => "Amp Rack Guitar Effects",
    "description" => "Amp Rack is a Guitar / Voice Audio Effects Processor for Android. Amp Rack is an Open Source LADSPA Plugins Host for Android. More than 150 high quality audio plugins are available which can be added in any order to the audio effect chain to create distinct high quality tones for your guitar!",
    "skin" => "materia",
    "theme" => "blue_deep_orange",
    "font"=> "Montserrat",
    "header" => true,
    "header-bg" => "primary",
    "footer" => true,
    "footer-bg" => "text-white bg-primary ",
    "privacy-policy"=> null,
    "logo" => "/logo.png",

    "drawer" => array (
      "Themes"=> '?list=1',
      "Presets"=> '?icons=1',
      "Connect Guitar to Phone" => "",
      "About"=> "/anneli/about.php"
    ),
    "messages" => array (
      "new"=> true
    ),
    "analytics" => false,
    "footer-floating" => '<!-- Expandable Textfield -->
          <div class="mdl-textfield pt-3 mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input onchange="searchFiles();" class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="sample-expandable">Search</label>
            </div>
          </div>'
  );
  
  
?>
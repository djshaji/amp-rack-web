<?php
#ini_set('display_errors', '1');
#ini_set('display_startup_errors', '1');
#error_reporting(E_ALL);

require ("vendor/autoload.php");

chdir (__DIR__);
include "config.php";
include "anneli/header.php";
?>

<div style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('hero.jpg');  background-repeat: no-repeat;background-position: center;background-size:cover;" class="px-4 py-5 mb-4 text-center">
  <img class="d-block mx-auto mb-4 img-fluid" src="/logo.png" alt="" width="72" height="57">
  <h1 class="display-5 fw-bold text-white">Amp Rack 3</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4 text-white">
      <iframe class="mb-3 shadow" width="560" height="315" src="https://www.youtube.com/embed/CXAqloaG5OE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>      
      Amp Rack is a Guitar / Voice Audio Effects Processor for Android. Amp Rack is an Open Source LADSPA Plugins Host for Android. More than 150 high quality audio plugins are available which can be added in any order to the audio effect chain to create distinct high quality tones for your guitar!
    </p>
    <div class="justify-content-center">
      <a href="https://play.google.com/store/apps/details?id=com.shajikhan.ladspa.amprack&amp;pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1" rel="nofollow"><img width="150" alt="Get it on Google Play" src="https://camo.githubusercontent.com/f8cc865a8fa303cbf10e8d0451254fa21c07163dc23a5becc9c174f28f4028f7/68747470733a2f2f706c61792e676f6f676c652e636f6d2f696e746c2f656e5f75732f6261646765732f7374617469632f696d616765732f6261646765732f656e5f62616467655f7765625f67656e657269632e706e67" data-canonical-src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png" style="max-width: 100%;"></a>
      <a href="https://github.com/djshaji/amp-rack" type="button" class="btn btn-primary"><i class="fab fa-github me-2"></i>Source</a>
    </div>
    <div class="justify-content-center">
        <a href="/view?type=Themes" type="button" class="btn btn-info"><i class="fas fa-image me-2"></i>Explore Themes</a>
        <a href="/view?type=Presets" type="button" class="btn btn-success"><i class="fas fa-list me-2"></i>Explore Presets</a>
    </div>

  </div>
</div>

<div class="row justify-content-center">
  <?php
  $files = scandir ("screens/") ;
  foreach ($files as $f) {
    if ($f [0] == '.')
      continue;
    ?>
    <a href="screens/<?php echo $f;?>" class="col-md-2 shadow m-2">
      <img src="<?php echo "screens/".$f ;?>" class="img-fluid">
    </a>
    <?php
  }
  ?>
</div>

<div class="section m-3 p-3" style="font-size:110%">
  <div class="alert alert-primary h2">
    Introducing Amp Rack Version 3!
  </div>

  <div class="alert text-dark text-bold border border-primary">
    <i class="fas fa-info-circle me-2 text-primary"></i>This is the biggest update of Amp Rack till date, and contains tons of new features and under the hood bug fixes.

  </div>

    <h4>New features</h4>
  <ul>
    <li>LV2 Plugin support</li>
    <li>Fully skinnable theme engine</li>
    <li>All new Quick Patch: Just one tap to change factory patches for finding sounds quickly</li>
    <li>All new Backing Track player. Simply record some chords and use it on loop as a backing track! You can change BPM and Volume of the backing track. Perfect to practice solos or master scales</li>
    <li>All new Drum Machine. Transform yourself into a one man band, or just practice rocking out. Choose from a variety of exciting tracks. Change BPM according to your genre and preference.</li>
    <li>Improved Presets Loading</li>
    <li>Improved recorded audio sharing support</li>
    <li>Beautiful new material design 3 themes</li>
  </ul>

<h4>More Features</h4>
<ul>
  <li>High Quality Audio Plugins such as different Distortion, Overdrive, Cabinet Emulation, Delay, Echo, Reverb, Compressors, Limiters, Sustain, Vocoders, Tube Emulators, and even Autotune (and many more!)</li>

  <li>Easy to use UI with customizable background!</li>

  <li>One click operation: add a new effect to the chain, or use presets created by professional guitarists for beautiful instant ready made tones for your tracks!</li>

  <li>Add Unlimited effects in any order to the effect chain</li>

  <li>Customize effect parameters as per your sound preference</li>

  <li>Save presets and share with the world!</li>

  <li>Supports Mic / Mic in jack / USB Interfaces. No need for expensive accessories. Just buy any generic 1/4" TRS to 3.5mm adapter for less than $1 and rock on!</li>

  <li>High performance Low Latency Native Audio Processing: No latency on even the most basic devices</li>

  <li>All new Backing Track player. Simply record some chords and use it on loop as a backing track! You can change BPM and Volume of the backing track. Perfect to practice solos or master scales</li>

  <li>All new Drum Machine. Transform yourself into a one man band, or just practice rocking out. Choose from a variety of exciting tracks. Change BPM according to your genre and preference.</li>

  <li>High performance realtime low latency code</li>

  <li>High quality floating point precision audio processing</li>

  <li>Completely Open Source App</li>
</ul>
</div>

<?php
include "anneli/footer.php";
?>

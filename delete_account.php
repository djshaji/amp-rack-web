<?php
//ini_set('display_errors', '1');ini_set('display_startup_errors', '1');error_reporting(E_ALL);

require ("vendor/autoload.php");

chdir (__DIR__);
include "config.php";
include "anneli/header.php";
include "anneli/ui.php" ;
include_once "anneli/functions.php" ;
if ($uid == null) {
  require_login () ;
  die () ;
}

include "anneli/db.php";
?>
<div class="row m-3 p-3">
  <div class="col-12">
    <h2 class="shadow   p-3 m-1 text-danger"><i class="fas text-bold fa-user-slash"></i>&nbsp;&nbsp;Delete My Account</h2>
  </div>

  <p class="col-12 shadow p-3 m-3">
    You can delete all your uploaded presets, delete your account, or both. 
    <br><br>
    Please note that this cannot be undone.
  </p>

  <div class="row p-3 m-1" id="presets">
    <h4 class="p-3 border border-primary">
      <button class="btn btn-primary" onclick="getPresets ()">
        List my presets
      </button>
      <div id="preset-spinner" class="d-none spinner-grow spinner-grow text-primary ms-2" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>

    </h4>
    <div class="col-3 d-none shadow" id="preset">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
        <div class="card-footer d-none text-muted"></div>

        <button onclick="deletePreset (this)" class="btn btn-danger m-3">
          <i class="fas text-bold fa-trash-alt me-2"></i>
          Delete
          <div class="d-none spinner-grow spinner-grow-sm text-light ms-2" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>

        </button>

      </div>
    </div>
  </div>

  <div class="card-footer m-3">
    <button onclick="deleteAllPresets ()" class="btn btn-danger m-3">
      <i class="fas text-bold fa-trash-alt me-2"></i>
      Delete all presets
      <div class="d-none spinner-grow spinner-grow-sm text-light ms-2" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>

    </button>

    <button onclick="deleteUser ()" class="btn btn-danger m-3">
      <i class="fas fa-user-times bold me-2"></i>
      Delete my account
      <div class="d-none spinner-grow spinner-grow-sm text-light ms-2" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </button>
    
  </div>
</div>
<?php
include "anneli/footer.php" ;
?>

<script>
presets = null

function getPresets ()   {
  document.getElementById ("preset-spinner").classList.remove ("d-none")
  presets = []
  p = firebase.firestore ().collection ("presets") .where ("uid", "==", fireuser.uid).get ()   .then((querySnapshot) => {
        querySnapshot.forEach((doc) => {
            // doc.data() is never undefined for query doc snapshots
            console.log(doc.id, " => ", doc.data());
            presets [doc.id] = doc.data ()

            preset = document.getElementById ("preset").cloneNode (true)
            preset.classList.remove ("d-none")
            document.getElementById ("presets").appendChild (preset)
            preset.getElementsByClassName ("card-title")[0].innerText = presets [doc.id]["name"]
            preset.getElementsByClassName ("card-subtitle")[0].innerText = presets [doc.id]["desc"]
            preset.getElementsByClassName ("card-footer")[0].innerText = doc.id
            preset.getElementsByTagName ("button")[0].id = doc.id

        });

        document.getElementById ("preset-spinner").classList.add ("d-none")
        if (presets.length == 0) {
          Swal.fire ("No presets found", "You have not saved any presets.", "error")
        }
    })

      
}

function deletePreset (element) {
  doc = element.id
  name = element.parentElement.children [0].innerText
  Swal.fire({
    title: "Do you want to delete this preset?",
    showCancelButton: true,
    confirmButtonColor: "#ff0000",
    cancelButtonColor: "#009e12",
    text: name,
    confirmButtonText: "Delete",
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      firebase.firestore().collection("presets").doc(doc).delete().then(() => {
        Swal.fire("Deleted", "Preset deleted successfully", "success").then (()=>location.reload());
      }).catch((error) => {
          Swal.fire("Unable to delete preset", "Error removing document: " + doc, error);
      });

    } else if (result.isDenied) {
      // Swal.fire("Changes are not saved", "", "info");
    }
  });

}

function deleteAllPresets () {
  if (presets == null) {
    Swal.fire ("Load presets first and try again") ;
    getPresets ();
    return
  }
  Swal.fire({
    title: "Do you want to delete all presets?",
    showCancelButton: true,
    confirmButtonColor: "#ff0000",
    cancelButtonColor: "#009e12",
    text: "Clicking delete will delete all presets. This action cannot be undone.",
    confirmButtonText: "Delete",
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      var batch = firebase.firestore ().batch();
      for (l in presets) {
        batch.delete (firebase.firestore ().collection ("presets").doc (l))
      }

      batch.commit().then(() => {
        Swal.fire("Deleted", "Presets deleted successfully", "success").then (()=>location.reload());
      }).catch((error) => {
          Swal.fire("Unable to delete presets");
      });

    } else if (result.isDenied) {
      // Swal.fire("Changes are not saved", "", "info");
    }
  });

}

function deleteUser () {
  Swal.fire({
    title: "Do you want to delete your account?",
    showCancelButton: true,
    confirmButtonColor: "#ff0000",
    cancelButtonColor: "#009e12",
    text: "Clicking delete will delete your account. This action cannot be undone. Delete your data before you delete your account.",
    confirmButtonText: "Delete",
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      fireuser.delete().then(() => {
        // User deleted.
        Swal.fire ("You account has been deleted.", "Goodbye old friend, it has been nice knowing you", "success").then (()=> {
          location.reload()
        })
      }).catch((error) => {
        // An error ocurred
        // ...
        Swal.fire ("Unable to delete account", "Try logging out and logging in again.", "error")
      });

    }
  })
}

// getPresets ()
</script>
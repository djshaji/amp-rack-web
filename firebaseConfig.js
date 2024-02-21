const firebaseConfig = {
    apiKey: "AIzaSyANGMMRsRUYO305VjmzpCrubx1LkhPWZHY",
    // authDomain: "amp-rack.firebaseapp.com",
    // authDomain: "acoustixaudio.org",
    authDomain: location.host,
    projectId: "amp-rack",
    storageBucket: "amp-rack.appspot.com",
    messagingSenderId: "983863263684",
    appId: "1:983863263684:web:cd3d864443d1dcade06491",
    measurementId: "G-EM0TL0MC6G"
  };

  // Initialize Firebase
  // const app = initializeApp(firebaseConfig);
  //const analytics = getAnalytics(app);

// Initialize Firebase
firebaseApp = firebase.initializeApp(firebaseConfig);
analytics = firebase.analytics();
// const messaging = firebase.messaging ();

var uiConfigRedirect = {
  callbacks: {
    signInSuccessWithAuthResult: function(authResult, redirectUrl) {
      // User successfully signed in.
      // Return type determines whether we continue the redirect automatically
      // or whether we leave that to developer to handle.
      return true;
    },

    uiShown: function() {
      // The widget is rendered.
      // Hide the loader.
      // document.getElementById('loader').style.display = 'none';
    }
  },
  // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
  // signInFlow: 'popup',
  // signInSuccessUrl: '/index.php',
  signInSuccessUrl: '/index.php',
  signInOptions: [
    // Leave the lines as is for the providers you want to offer your users.
    firebase.auth.GoogleAuthProvider.PROVIDER_ID,
    // firebase.auth.FacebookAuthProvider.PROVIDER_ID,
    // firebase.auth.TwitterAuthProvider.PROVIDER_ID,
    // firebase.auth.GithubAuthProvider.PROVIDER_ID,
    firebase.auth.EmailAuthProvider.PROVIDER_ID
    // firebase.auth.PhoneAuthProvider.PROVIDER_ID
  ]
  // Terms of service url.
  // tosUrl: '<your-tos-url>',
  // Privacy policy url.
  // privacyPolicyUrl: '<your-privacy-policy-url>'
};

var uiConfig = {
  callbacks: {
    signInSuccessWithAuthResult: function(authResult, redirectUrl) {
      // User successfully signed in.
      // Return type determines whether we continue the redirect automatically
      // or whether we leave that to developer to handle.
      location.reload ()
      return false;
    },

    uiShown: function() {
      // The widget is rendered.
      // Hide the loader.
      // document.getElementById('loader').style.display = 'none';
    }
  },
  // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
  // signInFlow: 'popup',
  // signInSuccessUrl: '/index.php',
  signInSuccessUrl: '/index.php',
  signInOptions: [
    // Leave the lines as is for the providers you want to offer your users.
    firebase.auth.GoogleAuthProvider.PROVIDER_ID,
    // firebase.auth.FacebookAuthProvider.PROVIDER_ID,
    // firebase.auth.TwitterAuthProvider.PROVIDER_ID,
    // firebase.auth.GithubAuthProvider.PROVIDER_ID,
    firebase.auth.EmailAuthProvider.PROVIDER_ID
    // firebase.auth.PhoneAuthProvider.PROVIDER_ID
  ]
  // Terms of service url.
  // tosUrl: '<your-tos-url>',
  // Privacy policy url.
  // privacyPolicyUrl: '<your-privacy-policy-url>'
};
importScripts("https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js");

firebase.initializeApp({
    apiKey: "AIzaSyB-AGRKUNXzY5B9n7939wyFkl8oZj02aKY",
    authDomain: "izigo-e6681.firebaseapp.com",
    projectId: "izigo-e6681",
    storageBucket: "izigo-e6681.appspot.com",
    messagingSenderId: "178295908248",
    appId: "1:178295908248:web:1c1ae96fc4e39c87ba2ded",
    databaseURL: "...",
});

const messaging = firebase.messaging();

// Optional:
messaging.onBackgroundMessage((message) => {
});

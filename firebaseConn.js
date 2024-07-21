import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.4/firebase-app.js";
import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/10.12.4/firebase-auth.js";

const firebaseConfig = {
    apiKey: "YOUR-API-KEY",
    authDomain: "YOUR-AUTH-DOMAIN",
    projectId: "YOUR-PROJECT-ID",
    storageBucket: "YOUR-STORAGE-BUCKET",
    messagingSenderId: "YOUR-MESSAGING-SENDER-ID",
    appId: "YOUR-APP-ID",
    measurementId: "YOUR-MEASUREMENT-ID"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
auth.languageCode = 'en'
const provider = new GoogleAuthProvider();

const googleLogin = document.getElementById("google-login-btn");
googleLogin.addEventListener("click", function() {

    signInWithPopup(auth, provider)
        .then((result) => {
            const credential = GoogleAuthProvider.credentialFromResult(result);
            const user = result.user;
            console.log(user)

            // Create a JSON object to send to the PHP script
            const userData = {
                uid: user.uid,
                email: user.email,
                displayName: user.displayName,
                phoneNumber: user.phoneNumber,
                photoURL: user.photoURL
            };
            // Make an AJAX request to the PHP script
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'storeUser.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify(userData));

            // window.location.href = 'profile.php';
            window.location.href = `profile.php?uid=${user.uid}`;
        }).catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;

        });

});



var submitBtn = document.getElementById("submitBtn");

submitBtn.addEventListener('click', (e) => {
    e.preventDefault();

        //get user data 

        let form = document.getElementById("loginForm");

        var email = form.email.value;
        var password = form.password.value;


        firebase.auth().signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
            // Signed in
            var user = userCredential.user;
            // ...
            //return home
            window.location.href = "index.php";
        })
        .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log("error code: " + error.code);
            console.log("error message: " + error.message);
            alert(error.message);
        });
    
    
})




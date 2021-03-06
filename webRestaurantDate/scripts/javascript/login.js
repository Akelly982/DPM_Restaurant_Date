


var submitBtn = document.getElementById("submitBtn");
var submitBtn2 = document.getElementById("submitBtn2");

submitBtn.addEventListener('click', (e) =>{
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







//submitBtn2.addEventListener('click', (e) =>{
//    e.preventDefault();
//    
//    var user = firebase.auth().currentUser;
//
//    if (user) {
//        // User is signed in
//        // get user data
//        db.collection("users").doc(user.uid).get().then((doc) =>{
//            if(doc.exists){
//                //found connect user doc
//                console.log("auth user exists and connected doc");
//            }else{
//                //cant find user doc connect to AUTH user
//                console.log("no such document but auth user exists.");
//            }
//        });
//
//    } else {
//        // No user is signed in.
//        // change nothing in navigation
//    }
//    
//})


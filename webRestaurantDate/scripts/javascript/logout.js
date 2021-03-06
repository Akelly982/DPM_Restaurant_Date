
//sign out
firebase.auth().signOut().then(() => {
    // Sign-out successful.
    //alert("sign out successfull");
    window.location.href = "index.php";
    
}).catch((error) => {
  // An error happened.
    console.log("Error code: " + error.code);
    alert("error: " + error.message);
});



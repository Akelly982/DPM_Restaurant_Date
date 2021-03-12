// user properties
//https://firebase.google.com/docs/analytics/user-properties

//manage users 
//https://firebase.google.com/docs/auth/web/manage-users

// sign in new user / existing user
//https://firebase.google.com/docs/auth/web/start



//identify form
let myForm = document.querySelector('#addUserForm');

//get submit btn
let submitBtn = document.querySelector('#submitBtn');




submitBtn.addEventListener('click', (e) =>{
    e.preventDefault();
    
    //get data 
    var email = myForm.email.value;
    var password = myForm.password.value;
    
    var userName = myForm.userName.value;
    var firstName = myForm.firstName.value;
    var lastName = myForm.lastName.value;
    var phone = myForm.phone.value;
    var gender = myForm.gender.value;
    var birthday = myForm.birthday.value;
    var height = myForm.birthday.value;
    
    var summary = document.querySelector('#taSummary').value;
    
    //test by logging
    // console.log(password);
    // console.log(email);
    // console.log(userName);
    // console.log(firstName);
    // console.log(lastName);
    // console.log(phone);
    // console.log(gender);
    // console.log(age);
    // console.log(summary);
    
    
    
    
    firebase.auth().createUserWithEmailAndPassword(email, password).then((userCredential) => {
        // Signed in 
        // dont try return values here like a method / function
        // this is run on response from the auth host firebase
        var user = userCredential.user;
        console.log("signed in: " + user.uid);
        
        //user.uid is going to be used as their id for firestore aswell

        //add to firestore
        //.add takes in an object as the value
        db.collection('users').doc(user.uid).set({
            username: userName,
            firstName: firstName,
            lastName: lastName,
            email: email,
            phone: phone,
            gender: gender,
            summary: summary,
            birthday: birthday,
            height: height,
            //imgPath: user.uid,
            imgPath: "tempUserImg",
            imgExt: ".png",
            userType: "user"
        })    
        .then((docRef) => {
            console.log("Document successfully updated!");

            if(false){
                //reset values
                // all done reset form values to zero
                myForm.userName.value="";
                myForm.firstName.value = "";
                myForm.lastName.value = "";
                myForm.email.value = "";
                myForm.phone.value = "";
                myForm.gender.value = "";
                myForm.age.value = "";
                myForm.password.value = "";
                //summary access == different than others
                summary.value = "";
            }else{
                //return home
                //window.location.href = 'index.php';
            }
            


        })
        .catch((error) => {
            // The document probably doesn't exist.
            console.log("Error updating firestore document: ", error);
        });
        
        
      })
    
      .catch((error) => {
        console.log("error");
        var errorCode = error.code;
        var errorMessage = error.message;
        console.log("---SignUpInit Catch error---");
        console.log("error Code: " + error.code);
        console.log("error Msg: " + error.message);
        alert("error Msg: " + error.message);
        
        
        
      });
    
    

    
    
    
})







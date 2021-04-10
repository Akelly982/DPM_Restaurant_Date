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
    var authId = myForm.authId.value;
    var email = myForm.email.value;
    
    var userName = myForm.userName.value;
    var firstName = myForm.firstName.value;
    var lastName = myForm.lastName.value;
    var phone = myForm.phone.value;
    var gender = myForm.gender.value;
    var birthday = myForm.birthday.value;
    var height = myForm.height.value;
    var smoker = myForm.smoker.value;
    
    var summary = document.querySelector('#taSummary').value;
    
    
        
    //user.uid is going to be used as their id for firestore aswell

    //we use set because we know the id we want for our document
    db.collection('users').doc(authId).set({
        username: userName,
        firstName: firstName,
        lastName: lastName,
        email: email,
        phone: phone,
        gender: gender,
        summary: summary,
        birthday: birthday,
        height: height,
        smoker: smoker,
        //set up with temp image and ext
        imgPath: "tempUserImg",
        imgExt: ".png",
        iconImgPath: "tempUserIconImg",
        iconImgExt: ".png",
        heroImgPath: "tempUserHeroImg",
        heroImgExt: ".png",
        galleryCSV: "tempUserGalleryImg1.png,tempUserGalleryImg2.png",
        userType: "user"
    })    
    .then((docRef) => {
        console.log("Document successfully updated!");
        //return home
        window.location.href = 'index.php';
    })
    .catch((error) => {
        // The document probably was not created.
        console.log("Error creating firestore document: ", error);
    });
        

    
    

    
    
    
})







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
    
    var username = myForm.username.value;
    var firstName = myForm.firstName.value;
    var lastName = myForm.lastName.value;
    var address = myForm.address.value;
    var category1 = myForm.cat1.value;
    var category2 = myForm.cat2.value;
    var category3 = myForm.cat3.value; 

    var resName = myForm.resName.value;
    var phone = myForm.phone.value;
    
    var summary = document.querySelector('#taSummary').value;  


    //test by logging
    // console.log(password);
    // console.log(email);
    // console.log(resName);
    // console.log(phone);
    // console.log(summary);
    

    // add data to firestore using their authID
    db.collection('restaurants').doc(authId).set({
        username: username,
        firstName: firstName,
        lastName: lastName,
        address: address,
        resName: resName,
        email: email,
        phone: phone,
        summary: summary,
        category1: category1,
        category2: category2,
        category3: category3,
        imgPath: "tempResImg",
        imgExt: ".png",
        iconImgPath: "tempResIconImg",
        iconImgExt: ".png",
        heroImgPath: "tempResHeroImg",
        heroImgExt: ".png",
        galleryCSV: "tempResGalleryImg1.png,tempResGalleryImg2.png",
        userType: "restaurants"
        
    })    
    .then((docRef) => {
        console.log("Document successfully updated!");
        //return home
        //window.location.href = 'index.php';
    })
    .catch((error) => {
        // The document probably was not created.
        console.log("Error creating firestore document: ", error);
    });
        

        

})







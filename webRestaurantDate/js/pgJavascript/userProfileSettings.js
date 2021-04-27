

//update user form
var updateUserForm = document.getElementById("updateUserForm");

// update form btn
//var updateUserBtn = document.getElementById("updateUserDataBtn");
var updateUserBtn = document.querySelector("#updateUserDataBtn");

//fields for fill on load
var firstNameField = document.getElementById("userFirstNameField");
var lastNameField = document.getElementById("userLastNameField");
var usernameField = document.getElementById("userUsernameField");
var phoneField = document.getElementById("userPhoneField");
var genderField = document.getElementById("userGenderField");
var birthdayField = document.getElementById("userBirthdayField");
var heightField = document.getElementById("userHeightField");
var smokerField = document.getElementById("userSmokerField");
var summaryField = document.getElementById("userSummaryField");

//image update btn hidden inputs
var userIdSingle = document.getElementById("userIdSingle");
var userIdGallery = document.getElementById("userIdGallery");

//display image
var userDisplay1Img = document.getElementById("userDisplay1");
var userDisplay2Img = document.getElementById("userDisplay2");


//gallery parent element
var galleryGridParent = document.getElementById("upGalleryGrid");


{/* <div class="profileGalleryItemGrid" id="upGalleryGrid">
                        <div class="profileGalleryItem">
                            <h2 class="profileGalleryText">Loading in your images...</h2>
                        </div>
                    </div> */}




// ----- FUN..ctions ----------------------


function fillUserFields(doc,uid){
    //data fields user edit
    firstNameField.setAttribute("value",doc.data().firstName);
    lastNameField.setAttribute("value",doc.data().lastName);
    usernameField.setAttribute("value",doc.data().username);
    phoneField.setAttribute("value",doc.data().phone);
    genderField.setAttribute("value",doc.data().gender);
    birthdayField.setAttribute("value",doc.data().birthday);
    heightField.setAttribute("value",doc.data().height);
    smokerField.setAttribute("value", doc.data().smoker);
    summaryField.innerHTML = doc.data().summary;

    //hidden fields
    userIdSingle.setAttribute("value", uid);
    userIdGallery.setAttribute("value", uid);

}

function fillUserDisplay(doc,uid){
    //display image
    userDisplay1Img.setAttribute("style", "background-image: url(userImage/" + doc.data().iconImgPath  +  doc.data().iconImgExt  + ")");
    userDisplay2Img.setAttribute("style", "background-image: url(userImage/" + doc.data().iconImgPath  +  doc.data().iconImgExt  + ")");
}

function fillUserGallery(doc,uid){

    // Items we are going to create

    // <!-- On found doc load item (gallery will be a CSV forEach loop)-->
    // <div class="rdGalleryItem" style="background-image: url(userImage/tempResImg.png);">
    // </div>

    // <!-- no gallery items found -->
    // <div class="rdGalleryItem">
    //     <h3 class="rdGalleryText">Gallery images for this restraunt have not been uploaded yet. Patience is a virtue..</h3>
    // </div>





    //empty parent grid of current items
    galleryGridParent.innerHTML = "";

    //get and split userGalleryCSV
    //CSV comma seperated values
    var userGalleryCSV = doc.data().galleryCSV;
    console.log("CSV: " + userGalleryCSV);
    var strResult = userGalleryCSV.split(",");


    console.log("--------- image split ----------");
    // our image paths seperated
    strResult.forEach(element => {
        console.log(element);
    });
    

    //console.log(strResult.length);
    
    if(strResult.length == 0){
        console.log("--------- no images found ----------");
        let item = document.createElement("div");
        item.setAttribute("class", "rdGalleryItem");
        galleryGridParent.append(item);
        item.innerHTML = "<h3 class='rdGalleryText'>Gallery images for this user have not been uploaded yet. Patience is a virtue..</h3>"
    }else{
        console.log("--------- create image items ----------");
        strResult.forEach(element => {
            let item = document.createElement("div");
            item.setAttribute("class", "profileGalleryItem");
            item.setAttribute("style","background-image: url(userImage/"+ element  +");")
            galleryGridParent.append(item);
        });
    }   

    
    

}





//------- On load ---------

//get user data 
var userId = "undefined";

// check for user 
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        //check in user's collection
        db.collection("users").doc(user.uid).get().then((doc) =>{
            if(doc.exists){
                  //console.log(user.uid);
                  userId = user.uid;
                  fillUserFields(doc,userId);
                  fillUserDisplay(doc,userId);
                  fillUserGallery(doc,userId);
                }else{
                alert("could not find active user document.")
                window.location.href = 'login.php';
            }
        });
    } else {
      // No user is logged in
      // ...
    }
});





updateUserBtn.addEventListener('click', (e) =>{
    e.preventDefault();
    
    //get data 
    var firstName = updateUserForm.firstName.value;
    var lastName = updateUserForm.lastName.value;
    var username = updateUserForm.username.value;
    var phone = updateUserForm.phone.value;
    var gender = updateUserForm.gender.value;
    var birthday = updateUserForm.birthday.value;
    var height = updateUserForm.height.value;
    var smoker = updateUserForm.smoker.value;
    var summary = document.querySelector('#userSummaryField').value;

    //update using userId doc
    db.collection('users').doc(userId).update({
        firstName: firstName,
        lastName: lastName,
        username: username,
        phone: phone,
        gender: gender,
        birthday: birthday,
        height: height,
        smoker: smoker,
        summary: summary,
    })    
    .then((docRef) => {
        console.log("Document successfully updated!");
        //reload page getting new data 
        window.location.href = 'userProfileSettings.php';
    })
    .catch((error) => {
        // The document probably was not created.
        console.log("Error updating firestore document: ", error);
    });

});
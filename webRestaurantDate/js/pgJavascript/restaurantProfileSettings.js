

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
var resNameField = document.getElementById("userResNameField");
var streetField = document.getElementById("userStreetField");
var cityField = document.getElementById("userCityField");
var stateField = document.getElementById("userStateField");

var cat1 = document.getElementById("catDrop1");
var cat2 = document.getElementById("catDrop2");
var cat3 = document.getElementById("catDrop3");

var summaryField = document.getElementById("userSummaryField");

//image update btn hidden inputs
var userIdSingle = document.getElementById("userIdSingle");
var userIdSingleHero = document.getElementById("userIdSingleHero");
var userIdGallery = document.getElementById("userIdGallery");


//display image
var userDisplay1Img = document.getElementById("userDisplay1");
var userDisplay2Img = document.getElementById("userDisplay2");

//hero image
var userHeroImg = document.getElementById("userHeroImage");

//gallery parent element
var galleryGridParent = document.getElementById("rpGalleryGrid");




// ----- FUN..ctions ----------------------


function fillUserFields(doc,rid){
    firstNameField.setAttribute("value",doc.data().firstName);
    lastNameField.setAttribute("value",doc.data().lastName);
    usernameField.setAttribute("value",doc.data().username);
    phoneField.setAttribute("value",doc.data().phone);
    resNameField.setAttribute("value",doc.data().resName);
    streetField.setAttribute("value",doc.data().street);
    cityField.setAttribute("value",doc.data().city);
    stateField.setAttribute("value", doc.data().state);

    cat1.value = doc.data().category1;
    cat2.value = doc.data().category2;
    cat3.value = doc.data().category3;

    summaryField.innerHTML = doc.data().summary;

    //hidden fields
    userIdSingle.setAttribute("value", rid);
    userIdSingleHero.setAttribute("value", rid);
    userIdGallery.setAttribute("value", rid);
}


function fillUserDisplay(doc){
    //display image
    userDisplay1Img.setAttribute("style", "background-image: url(userImage/" + doc.data().iconImgPath  +  doc.data().iconImgExt  + ")");
    userDisplay2Img.setAttribute("style", "background-image: url(userImage/" + doc.data().iconImgPath  +  doc.data().iconImgExt  + ")");
}

function fillUserHero(doc){
    userHeroImg.setAttribute("style", "background-image: url(userImage/" + doc.data().heroImgPath  +  doc.data().heroImgExt  + ")")
}

function fillUserGallery(doc){

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







function getCategories(doc,parentElement){
    
    //item to create 
    //<option value="saab">Saab</option>  

    //create and append per doc
    var opt = document.createElement("option");
    opt.setAttribute("value",doc.data().cat);
    //append before innerHTML to parent
    parentElement.append(opt);
    opt.innerHTML = doc.data().cat;

}






//------- On load ---------

//Do this first so that field values exist on resUserDataFill
// get categories from db for cat1,cat2,cat3
db.collection('categories').get().then((snapshot) => {
    //size = snapshot.size; //testing
    snapshot.docs.forEach(doc => {
        getCategories(doc, cat1);
        getCategories(doc, cat2);
        getCategories(doc, cat3);
    })
})

//Then get userRes data 
var resId = "undefined";
// check for user 
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        //check in restraunts collection
        db.collection("restaurants").doc(user.uid).get().then((doc) =>{
            if(doc.exists){
                    //console.log(user.uid);
                    resId = user.uid;
                    fillUserFields(doc,resId);

                    fillUserDisplay(doc);
                    fillUserGallery(doc);
                    fillUserHero(doc);
            }else{
                alert("could not find active user document.")
                //window.location.href = 'login.php';
            }
        });
    } else {
      // No user is logged in
      // ...
    }
});







// ----- on event ------------



// firstNameField.setAttribute("value",doc.data().firstName);
// lastNameField.setAttribute("value",doc.data().lastName);
// usernameField.setAttribute("value",doc.data().username);
// phoneField.setAttribute("value",doc.data().phone);
// resNameField.setAttribute("value",doc.data().resName);
// streetField.setAttribute("value",doc.data().street);
// cityField.setAttribute("value",doc.data().city);
// stateField.setAttribute("value", doc.data().state);

// cat1.value = doc.data().category1;
// cat2.value = doc.data().category2;
// cat3.value = doc.data().category3;

// summaryField.innerHTML = doc.data().summary;

updateUserBtn.addEventListener('click', (e) =>{
    e.preventDefault();

    //get data 
    var firstName = updateUserForm.firstName.value;
    var lastName = updateUserForm.lastName.value;
    var username = updateUserForm.username.value;
    var phone = updateUserForm.phone.value;
    var resName = updateUserForm.resName.value;
    var street = updateUserForm.street.value;
    var city = updateUserForm.city.value;
    var state = updateUserForm.state.value;
    var category1 = updateUserForm.cat1.value;
    var category2 = updateUserForm.cat2.value;
    var category3 = updateUserForm.cat3.value; 
    var summary = document.querySelector('#userSummaryField').value;

    //update using userId doc
    db.collection('restaurants').doc(resId).update({
        firstName: firstName,
        lastName: lastName,
        username: username,
        phone: phone,
        resName: resName,
        city, city,
        street: street,
        state: state,
        category1: category1,
        category2: category2,
        category3: category3,
        summary: summary,
    })    
    .then((docRef) => {
        console.log("Document successfully updated!");
        //reload page getting new data 
        window.location.href = 'restaurantProfileSettings.php';
    })
    .catch((error) => {
        // The document probably was not created.
        console.log("Error updating firestore document: ", error);
    });

});
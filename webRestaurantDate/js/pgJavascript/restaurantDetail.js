//get restraunt
// name
// summary 
// address
// resHeroImg
var resNameElement = document.getElementById("rdName");
var resSummaryElement = document.getElementById("rdSummary");
var resAddressElement = document.getElementById("rdAddress");
var resHeroImg = document.getElementById("resHeroImg");

//galleryGridParent

var galleryGridParent = document.getElementById("rdGalleryGrid");

//get item grid for restraunt detail comments
var commentGrid = document.querySelector("#rdCommentGrid");

//get resId (hidden at top of page)
var resId = document.getElementById("restaurantId").value;
//console.log(resId);

var commentForm = document.getElementById("rdAddCommentF");
var commentFormBtn = document.getElementById("rdAddCommentBtn");


// on page load save some data for use with moving to addUserComment
//initialize user as false
var isUser = false;
var isRestraunt = false;
var userId = "undefined";

// check for user 
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        //check in user's collection
        db.collection("users").doc(user.uid).get().then((doc) =>{
            if(doc.exists){
                  //console.log("user found for jsResDetail");
                  isUser = true;
                  userId = user.uid;     //NOTE must be declared within scope
            }else{
                //check in restraunt's collection
                db.collection("restaurant").doc(user.uid).get().then((doc) =>{
                    if(doc.exists){
                      console.log("restaurant user found for jsResDetail");
                      isRestraunt = true;
                    }else{
                      //cant find user doc connect to AUTH user in RESTRAUNT collection
                      console.log("no such document in Restraunts or User collection");
                    }
              });
            }
        });
    } else {
      // No user is logged in
      // ...
    }
});




//----------functions---------------------------



function emptyParentContent(){
    commentGrid.innerHTML = "";
}


function setRestrauntData(doc){
    resNameElement.innerHTML = doc.data().resName;
    resSummaryElement.innerHTML = doc.data().summary;
    resAddressElement.innerHTML = "Location: " + doc.data().address;
    resHeroImg.setAttribute("style", "background-image: url(userImage/" +  doc.data().heroImgPath + doc.data().heroImgExt + ");"   );
    //console.log("background-image: url(userImage/" +  doc.data().heroImgPath + doc.data().heroImgExt + ");" );
}

// if you enter your own GET METHOD IN URL and it is incorrect
function setRestrauntDataError(){
    resNameElement.innerHTML = "Error unknown restraunt";
}


function createCommentItem(doc){
    

    // item to create-------------
    // <div class="rdCommentItem">
    //     <div class="rdCommentImg" style="background-image: url(userImage/tempUserImg.png);">
    //     </div>
    //     <h4 class="rdCommentTitle">Awsome Coffee</h4>
    //     <p class="rdCommentText">making it look like readable English. 
    //     Many desktop publishing packages and web page editors 
    //     now use Lorem Ipsum as their default model text
    //     </p>
    // </div>

    //create element
    let commentItem = document.createElement('div');
    //append to parent element
    commentGrid.append(commentItem);
    
    //fill created element
    // doing this method ensure your quotation marks line up correctly
    commentItem.innerHTML = "<div class='rdCommentItem'>" +
        "<div class='rdCommentImg' style='background-image: url(userImage/"+    doc.data().userImgPath + doc.data().userImgExt   + ");'></div>" +
        "<h3 class='rdCommentTitle'>"+ doc.data().commentTitle +"</h3>" +
        "<p class='rdCommentText'>"+  doc.data().commentText     +"</p>" +
    "</div>";

    //checking data
    //console.log(commentItem.innerHTML);

}


function createCommentNoItemFound(){

    // item to create --------------------
    // <!-- no comments found  -->
    // <div class="rdCommentItem">
    //     <h4 class="rdCommentTitle">No comments found be the first to review this new restraunt. 
    //         Add a comment by clicking the button just above. 
    //     </h4>
    // </div>


    //create element
    let emptyCommentItem = document.createElement('div');
    //append to parent element
    commentGrid.append(emptyCommentItem);
    
    //fill created element
    // doing this method ensure your quotation marks line up correctly
    emptyCommentItem.innerHTML = "<div class='rdCommentItem'>" +
         "<h3 class='rdCommentTitle'>No comments found be the first to review this new restraunt."+
            "Add a comment by clicking the button just above."+
         "</h3>"+
    "</div>";


}






//--- db based functions -------------------

function checkSnapshotAndRenderDoc(snapshot){
    size = snapshot.size // will return the collection size
    //console.log("num docs = " + size);

    //optimzed by most likely first
    if(size > 0){
        emptyParentContent();
        snapshot.docs.forEach(doc => {
            createCommentItem(doc);
        })

    }else{
        emptyParentContent();
        createCommentNoItemFound();
    }

}


function fillRestaurantGallery(doc){

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
    //console.log("CSV: " + userGalleryCSV);
    var strResult = userGalleryCSV.split(",");


    // console.log("--------- image split ----------");
    // // our image paths seperated
    // strResult.forEach(element => {
    //     console.log(element);
    // });
    

    //console.log(strResult.length); 
    
    if(strResult.length == 0){
        console.log("--------- no images found in gallery ----------");
        let item = document.createElement("div");
        item.setAttribute("class", "rdGalleryItem");
        galleryGridParent.append(item);
        item.innerHTML = "<h3 class='rdGalleryText'>Gallery images for this restaurant have not been uploaded yet. Patience is a virtue..</h3>"
    }else{
        //console.log("--------- create image items ----------");
        strResult.forEach(element => {
            let item = document.createElement("div");
            item.setAttribute("class", "rdGalleryItem");
            item.setAttribute("style","background-image: url(userImage/"+ element  +");")
            galleryGridParent.append(item);
        });
    }   

    

}



//--------on js load ---------------------------------

//setup restraunt data
db.collection('restaurants').doc(resId).get().then((doc) =>{
    if (doc.exists) {
        setRestrauntData(doc);
        fillRestaurantGallery(doc);
    } else {
        // doc.data() will be undefined in this case
        console.log("No such user document found!");
        setRestrauntDataError();
    }
}).catch((error) =>{
    
});


// get comments on the restraunt
db.collection('restaurants').doc(resId).collection("comments").get().then((snapshot) => {
    checkSnapshotAndRenderDoc(snapshot);
});



//------- buttons ----------------------------------------

commentFormBtn.addEventListener('click', (event) =>{
    event.preventDefault();

    //check user loggin status (must be standard user)
    var myCheckerBool = false;

    if(isUser){
        myCheckerBool = true;
    }else if(isRestraunt){
        //res not allowed to comment on other restaurant
        alert("Restaurants are not allowed to comment on other restaurants");   
    }else{
        alert("To make comments you must be logged in as a non restaurant");
        window.location.href = 'signUpPg1.php';
    }


    // check to ensure radio btn has been hit
    if(myCheckerBool){
        //get radio value (isPositive)
        isPosReview = commentForm.userReviewIsPos.value;
        console.log("isPosValue = " + isPosReview);

        //check for valid radio response (is not null really, I dont preset value so user has to choose)
        if(isPosReview == "true" || isPosReview == "false"){ 
            //alert("success review ready to go current user = " + userId + " isPos = " + isPosReview);
             window.location.href = 'restaurantDetailAddUserComment.php' + "?restaurantId=" + resId +"&userId=" + userId +"&isPos=" + isPosReview;

        }else{
            alert("Please select if the restraunt was interesting to you?");
        }
    }
})









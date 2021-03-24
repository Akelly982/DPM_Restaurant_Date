//get restraunt
// name
// summary 
// address
// resHeroImg
var resNameElement = document.getElementById("rdName");
var resSummaryElement = document.getElementById("rdSummary");
var resAddressElement = document.getElementById("rdAddress");
var resHeroImg = document.getElementById("resHeroImg");


//get item grid for restraunt detail comments
var commentGrid = document.querySelector("#rdCommentGrid");

//get resId (hidden at top of page)
var resId = document.getElementById("restrauntId").value;
//console.log(resId);


var isUser = false;
var isRestraunt = false;

// check for user 
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        //check in user's collection
        db.collection("users").doc(user.uid).get().then((doc) =>{
            if(doc.exists){
                  console.log("user found for jsResDetail");
                  isUser = true;
                  var userId = user.uid;
            }else{
                //check in restraunt's collection
                db.collection("restraunts").doc(user.uid).get().then((doc) =>{
                    if(doc.exists){
                      console.log("restraunt user found for jsResDetail");
                      var isRestraunt = true;
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
    //resHeroImg.setAttribute("script", "background-image: url(userImage/" +  doc.data().heroImgPath + doc.data().heroImgExt + ");"   );
    //console.log("background-image: url(userImage/" +  doc.data().heroImgPath + doc.data().heroImgExt + ");" );
}


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
        "<h4 class='rdCommentTitle'>"+ doc.data().commentTitle +"</h4>" +
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
         "<h4 class='rdCommentTitle'>No comments found be the first to review this new restraunt."+
            "Add a comment by clicking the button just above."+
         "</h4>"+
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



//--------on js load ---------------------------------

db.collection('restraunts').doc(resId).get().then((doc) =>{
    if (doc.exists) {
        setRestrauntData(doc);
    } else {
        // doc.data() will be undefined in this case
        console.log("No such document!");
        setRestrauntDataError();
    }
}).catch((error) =>{
    
});


db.collection('restraunts').doc(resId).collection("comments").get().then((snapshot) => {
    checkSnapshotAndRenderDoc(snapshot);
});





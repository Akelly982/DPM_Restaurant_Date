
//get data from page
var resId = document.getElementById("restaurantId").value;
var isPosReview = document.getElementById("isPosReview").value;
var GETuserId = document.getElementById("getUserId").value;

//parent container if needed
var parentCont = document.getElementById("parentRdacAddCommentCont");

//form Submit btn
var formBtn = document.getElementById("formBtn");





//initialize user tempdata
var userId = "undefined";

// check for user 
firebase.auth().onAuthStateChanged((user) => {
    if (user) {
        //check in user's collection
        db.collection("users").doc(user.uid).get().then((doc) =>{
            if(doc.exists){
                  //console.log("user found for jsResDetail");
                  userId = user.uid;     //NOTE must be declared within scope
            }else{
                // no need to check for restraunt users here
            }
        });
    } else {
      // No user is logged in
      // ...
    }
});






//-----functions------------


function userMismatch(){


    //item to create within parent
    //<div class="rdacAddCommentForm">
    //     <h4> User does not match signed in user. </h4>
    //</div>

    //empty parent
    parentCont.innerHtml ="<div class='rdacAddCommentForm'>" +
                              "<h4> page User does not match signed in user. </h4>" +
                           "</div>";

}









//on load ------------------------------------------------------

//check to ensure user that got here from previous page is in
//infact the actural logged in user
if(userId != GETuserId){
    userMismatch();
}


//Buttons --------------------------------------------
formBtn.addEventListener('click', (event) =>{
    event.preventDefault();
    //note we have acces to current 
    //    user id == userId 
    //    restaurant id == resId

    //textArea userCommentStr
    var userCommentTitle = document.querySelector("#tfUserCommentTitle").value;
    var userComment = document.querySelector("#taUserComment").value;
    
    //testing
    console.log(userCommentTitle);
    console.log(userComment);
    console.log("resId:  "+resId);
    console.log("userid:  "+ userId);
    //return;

    

    
    //NOTE: remeber that you dont know when the response will be read so additional code relying on
    // other code should happen within the doc.exists / etc.

    //update restaurants with user data
    // for Ref db.collection('restaurants').doc(resId).get().then((doc) =>{ 
    db.collection("users").doc(userId).get().then((doc) =>{
        if(doc.exists){
            
            db.collection('restaurants').doc(resId).collection("comments").add({
                isPosReview: isPosReview,
                commentText: userComment,
                commentTitle: userCommentTitle,
                userId: userId,
                userFirstName: doc.data().firstName,
                userLastName: doc.data().lastName,
                userImgExt: doc.data().imgExt,
                userImgPath: doc.data().imgPath,
                username: doc.data().username,
                smoker: doc.data().smoker,
                birthday: doc.data().birthday,
                gender: doc.data().gender,
                height: doc.data().height,
                summary: doc.data().summary
            })    
            .then((docRef) => {  //it is undetermined when this will run due to data transfer times
                
                //testing
                // console.log("Document successfully updated for RESTAURANT COMMENTS");
                // console.log("comment added to:" + resId);
                // console.log("docRef for resCommentId = " + docRef.id);
        
                restaurantCommentId = docRef.id;
                
                //testing
                //console.log("docRef id = " + restaurantCommentId);
        
                //update user with restaurant data
                db.collection("restaurants").doc(resId).get().then((doc) =>{
                    if(doc.exists){

                        //var userDocRef = updateUserDbComments(userCommentTitle,userCommentStr, userId, doc, restaurantCommentId);
                        
                        db.collection('users').doc(userId).collection('restaurantComments').add({
                            isPosReview: isPosReview,
                            commentText: userComment,
                            commentTitle: userCommentTitle,
                            restaurantId: resId,
                            restaurantName: doc.data().resName,
                            restaurantCommentId: restaurantCommentId
                        })    
                        .then((docRef) => {
                            console.log("Document successfully updated for USER COMMENTS");
                            
                            var resName = doc.data().resName; //get this to return to resDetailPage
                            //alert("successfull update of both user and res comments");
                            window.location.href = 'restaurantDetail.php' + "?restaurantName=" + resName +"&restaurantId=" + resId;

                        })
                        .catch((error) => {
                            //Catch for User document probably was not created.
                            console.log("Error creating firestore document: ", error);


                            
                        });
                    }else{
                        alert("could not identify restaurant for user try again");
                    }
                }).catch((error) =>{
                    //catch for res for user DB access error
                    console.log("ERROR restaurant DB for user catch with: " + error);

                    //TODO if error happens here delete resCommentDocument
                });
        



              
            }).catch((error) => { 
                // Catch for res document probably was not created.
                console.log("Error creating firestore document: ", error);
            });
        
        }else{
            alert("could not identify user for restaurant try again");
        }
    }).catch((error) =>{ 
        //catch for User for Res DB access error
        console.log("ERROR User DB for restaurant catch with: " + error);
    });
    


})













// Previous code was ineffective did not work with regards to promise || then || asycn response. 


//redundant                          // REF    userCommentTitle,userCommentStr,resId,doc                        
// function updateRestrauntDbComments(userCommentTitle, userComment, rId, userDoc){

//     //testing
//     // console.log("--------------------------------------");
//     // console.log("entered RES update function -----")
//     // console.log("cmt title: " + userCommentTitle);
//     // console.log("cmt: " + userComment);
//     // console.log("rId: " + rId);
//     // console.log("isPos: " + isPosReview);
//     // console.log("userDoc: " + userDoc.id);
//     // console.log("firstName: " + userDoc.data().firstName);
//     // console.log("--------------------------------------");


//     db.collection('restaurants').doc(rId).collection("comments").add({
//         isPosReview: isPosReview,
//         commentText: userComment,
//         commentTitle: userCommentTitle,
//         userId: userId,
//         userFirstName: userDoc.data().firstName,
//         userLastName: userDoc.data().lastName,
//         userImgExt: userDoc.data().imgExt,
//         userImgPath: userDoc.data().imgPath,
//         username: userDoc.data().username,
//         smoker: userDoc.data().smoker,
//         birthday: userDoc.data().birthday,
//         gender: userDoc.data().gender,
//         height: userDoc.data().height,
//         summary: userDoc.data
//     })    
//     .then((docRef) => {

//         console.log("Document successfully updated for RESTAURANT COMMENTS");
//         console.log("docRef for resCommentId = " + docRef.id);

//         restaurantCommentId = docRef.id;
        
//         //testing
//         console.log("comment added to:" + rId);
//         console.log("docRef id = " + restaurantCommentId);

//         //update user with restaurant data
//         db.collection("restaurants").doc(rId).get().then((doc) =>{
//             if(doc.exists){

//                 var userDocRef = updateUserDbComments(userCommentTitle,userCommentStr, userId, doc, restaurantCommentId);
//                 if(userDocRef == -1){
//                     alert("ERROR adding restaurant comment to user comments db.")
//                 }
//                 var resName = doc.data().resName; //get this to return to resDetailPage
//                 alert("successfull update of both user and res comments");
//                 //window.location.href = 'restaurantDetail.php' + "?restaurantName=" + resName +"&restaurantId=" + resId;

//             }else{
//                 alert("could not identify restaurant for user try again");
//             }

//         }).catch((error) =>{
//             console.log("ERROR restaurant DB for user catch with: " + error)
//         });

//     })
//     .catch((error) => {
//         // The document probably was not created.
//         console.log("Error creating firestore document: ", error);
//         return -1;
//     });


// }




// redundant
// function updateUserDbComments(userCommentTitle,userComment, uId, resDoc, restaurantCommentId){

//     //testing
//     // console.log("--------------------------------------");
//     // console.log("entered USER update function -----");
//     // console.log("cmt title: " + userCommentTitle);
//     // console.log("cmt: " + userComment);
//     // console.log("resId: " + resId);
//     // console.log("resCommentId: " + restrauntCommentId);
//     // console.log("isPos: " + isPosReview);
//     // console.log("resDoc: " + userDoc.id);
//     // console.log("--------------------------------------");

//     db.collection('users').doc(uId).collection('restaurantComments').add({
//         isPosReview: isPosReview,
//         commentText: userComment,
//         commentTitle: userCommentTitle,
//         restaurantId: resId,
//         restaurantName: resDoc.data().resName,
//         restaurantCommentId: restaurantCommentId
//     })    
//     .then((docRef) => {
//         console.log("Document successfully updated!");
//         console
//         return docRef.id;
//     })
//     .catch((error) => {
//         // The document probably was not created.
//         console.log("Error creating firestore document: ", error);
//         return -1;
//     });


// }
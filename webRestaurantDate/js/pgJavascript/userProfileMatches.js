
//parent
parentGrid = document.getElementById("matchesGalleryGrid");






//----functions --------

function userItemManager(itemArray){
    console.log("itemMangerHit");
    //handel item array here 
    if(itemArray.size == 0){
        parentGrid.innerHTML = "";
        createUserNoItems();
    }else{

        parentGrid.innerHTML = "";
        itemArray.forEach(item =>{
            createUserItems(item);
        })
    }
}

function createUserNoItems(){

    // <!-- no user items found -->
    // <div class="matchesGalleryItem">
    //     <h3 class="matchesGalleryText"> We have found no matches for you try adding some comments / reviews to restaurants. </h3>
    // </div>

    var d = document.createElement('div');
    d.setAttribute("class","matchesGalleryItem");
    parentGrid.append(d);
    d.innerHTML = "<h3 class='matchesGalleryText'> We have found no matches for you try adding some comments / reviews to restaurants. </h3>"

}

function createUserItems(item){


    // <!-- On found doc load item -->
    // <div class="matchesGalleryItem" style="background-image: url(userImage/tempResImg.png);">
    //      <p class='matchesItemText'>2</p>
    // </div>

    var newItem = document.createElement("div");

    newItem.setAttribute("class","matchesGalleryItem");
    newItem.setAttribute("style","background-image: url(userImage/" + item.getImgName() +  item.getImgExt() +  ");");

    parentGrid.append(newItem);
    newItem.innerHTML = "<p class='matchesItemText'>" + item.getMatchCounter() + "</p>" +
                        "<p class='matchesItemText'>" + item.getUsername() + "</p>"

    newItem.addEventListener('click', (event) => {
        alert("item clicked");
        //window.location.href = 'restaurantDetail.php' + "?restaurantName=" + doc.data().resName +"&restaurantId=" + doc.id;
    })

}



function updateMatchUserArrayWithUser(myUserIdInt,userToAdd,myMatchUserArray){

    if(userToAdd.getUserId() == myUserIdInt){
        //This is me skip
        //console.log('This user to add is myself skip.');

    }else{
        var addUserBool = false;

        myMatchUserArray.forEach(elem =>{
            if(elem.getUserId() == userToAdd.getUserId()){  //check if item already exists
                addUserBool = true;
                elem.setMatchCounterPlusOne();
            }
    
        })
    
        //console.log(addUserBool);
        if (!addUserBool){
            //add user 
            myMatchUserArray.push(userToAdd);
        }
    }
    
}



function defaultMatches(userId){

    // get current user comments where isPositive (has origin restaurant ID)
    // for each restaurantId find other users with same isPos result
    // add users to list of MatchUsers class ensuring no duplicates.   
    //     if duplicate increment match counter 
    // display list of matchUsers


    var userArray = [];
    
    db.collection('users').doc(userId).collection('restaurantComments').where('isPosReview','==',"true").get().then((snapshot) => {
        //console.log("User Pos reviews comments found = " + snapshot.size);
        snapshot.docs.forEach(userCommentdoc => {

            db.collection('restaurants').doc(userCommentdoc.data().restaurantId).collection('comments').where('isPosReview', '==' ,"true").get().then((snapshot) => {
                //console.log( "Restaurant "+ userCommentdoc.data().restaurantId +" has " + snapshot.size + " Pos review from users.");
                snapshot.docs.forEach(resCommentDoc => {

                    // temp user built with matchUser constructor
                    //var userMyself = new MatchUser(1, "AidanDaBest","Aidan","kelly","this is my summary","akHeroImg",".png");
                    var tempUser = new MatchUser(
                        resCommentDoc.data().userId,
                        resCommentDoc.data().username,
                        resCommentDoc.data().userFirstName,
                        resCommentDoc.data().userLastName,
                        "summary is undefined in field",
                        resCommentDoc.data().userImgPath,
                        resCommentDoc.data().userImgExt
                    )
                    //console.log(tempUser.getUserId());

                    //add user to array (works more like a list though)
                        //if user already in array increase their matchCounter
                    updateMatchUserArrayWithUser(userId,tempUser,userArray);

                })

                //testing 
                userArray.forEach(e =>{
                    console.log("username: " + e.getUsername() + "    /  mCounter: " + e.getMatchCounter());
                })

                userItemManager(userArray);   //this will run multiple times 
                        
            }) 
        })
        
    }) 


    

}




// on load -----------------------------------


var userId = "undefined";

// check for user 
firebase.auth().onAuthStateChanged((user) => {         //this can take time to return a result
    if (user) {
        //check in user's collection
        db.collection("users").doc(user.uid).get().then((doc) =>{
            if(doc.exists){
                //console.log(user.uid);
                userId = user.uid; 
                console.log("Current user id: " + userId);
                defaultMatches(userId);
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














// get current user comments where isPositive (has origin restaurant ID)
// for each restaurantId find other users with same isPos result
// add users to list of MatchUsers class ensuring no duplicates.   
//     if duplicate increment match counter 
// display list of matchUsers




//outer loop
// db.collection('users').doc(userId).collection('restaurantComments').where('isPosReview' == "true").get().then((snapshot) => {
//     console.log("User Pos reviews found = " + snapshot.size);
//     snapshot.docs.forEach(userCommentdoc => {

    

//     })
// }) 


// inner loop
// db.collection('restaurants').doc(userCommentdoc.data().restaurantId).collection('comments').where('isPosReview' == "true").get().then((snapshot) => {
//     console.log("A has" + snapshot.size + " Pos review from users.");
//     snapshot.docs.forEach(resCommentDoc => {
//         var tempUser = new MatchUser(
//             resCommentDoc.data().userId,
//             resCommentDoc.data().username,
//             resCommentDoc.data().userFirstName,
//             resCommentDoc.data().userLastName,
//             "summary is undefined in field",
//             resCommentDoc.data().userImgPath,
//             resCommentDoc.data().userImgExt
//         )
//         updateMatchUserArrayWithUser(tempUser,userArr);
//     })
    
    
// }) 


// userArr.forEach(e =>{
//     console.log("username: " + e.getUsername() + "    /  mCounter: " + e.getMatchCounter());
// })









//TESTING JS MatchUser CLASS
// testing if class works
// var userMyself = new MatchUser(1, "AidanDaBest","Aidan","kelly","this is my summary","akHeroImg",".png");
// var user2 = new MatchUser(2, "Bestie","Bertha","tienna","My name is bertha and it is not a very good name.","ggImg",".png");
// var user3 = new MatchUser(3, "lama","Leroy","manyana","Monkeys can swing great distances","maImg",".png");
// var user4 = new MatchUser(4, "Kinao","Kevin","aolthe","Lorum ipsim impsum this lorum","limeImg",".png");

// // console.log("ID: " + user.getUserId());
// // console.log("Username: " + user.getUsername());
// // console.log("FirstName: " + user.getFirstName());
// // console.log("FastName: " + user.getLastName());
// // console.log("Summary: " + user.getSummary());
// // console.log("ImgName: " + user.getImgName());
// // console.log("ImgExt: " + user.getImgExt());
// // user.setMatchCounterPlusOne();
// // console.log("MatchCounter: " + user.getMatchCounter());




// // init array, get user and add to an array using method push  (adds item to end)
// var holderArr = [];

// //holderArr.push(user1);
// holderArr.push(user2);
// holderArr.push(user3);
// holderArr.push(user4);

// //holderArr[0].getFirstName();


// // get first name of all items ensureing data held its integrity through array 
// // holderArr.forEach(elem => {
// //     console.log(elem.getFirstName());
// // });


// // update match counter if user already exists 
// //   else update user 
// //   else identify that user is myself

// var user3Copy = new MatchUser(3, "lama","Leroy","manyana","Monkeys can swing great distances","maImg",".png");
// var user5 = new MatchUser(10, "timbo","timmy","manyana","Hillbilly timbo here to help","Dasvidonya",".jpeg");


// updateMatchUserArrayWithUser(userMyself.getUserId(), userMyself, holderArr);  //should result to is me
// updateMatchUserArrayWithUser(userMyself.getUserId(), user3Copy, holderArr); // should update matchCounter by += 1
// updateMatchUserArrayWithUser(userMyself.getUserId(), user5, holderArr); //should add user to array push()

// holderArr.forEach(elem => {
//     console.log("username: " + elem.getUsername() + " /   matchCounter: " + elem.getMatchCounter());
// });



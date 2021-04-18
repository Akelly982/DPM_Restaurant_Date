
//parent
parentGrid = document.getElementById("matchesGalleryGrid");

//radios
isPosTrueRadio = document.getElementById("isPosTrue");
isPosFalseRadio = document.getElementById("isPosFalse");

//btns
searchByReviewPosBtn = document.getElementById("searchByReviewTypeBtn");
genderBtn = document.getElementById("byGenderBtn");
ageRangeHighBtn = document.getElementById("byAgeRangeHighBtn");
ageRangeLowBtn = document.getElementById("byAgeRangeLowBtn");






//----functions --------

function userItemManager(itemArray){
    //console.log("itemMangerHit");
    //console.log(itemArray.length);

    //handel item array here 
    if(itemArray.length == 0){
        parentGrid.innerHTML = "";
        createUserNoItemsFound();
    }else{
        parentGrid.innerHTML = "";
        itemArray.forEach(item =>{
            createUserItems(item);
        })
    }
}

function createUserNoItemsFound(){

    // <!-- no user items found -->
    // <div class="matchesGalleryItem">
    //     <h3 class="matchesGalleryText">  </h3>
    // </div>

    var d = document.createElement('div');
    d.setAttribute("class","matchesGalleryItem");
    parentGrid.append(d);
    d.innerHTML = "<h3 class='matchesGalleryText'> Unfortunatly no results where found. </h3>"

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



function updateMatchUserArray(myUserIdInt,userToAdd,myMatchUserArray){

    if(userToAdd.getUserId() == myUserIdInt){
        //This is me skip
        //console.log('This user to add is myself skip.');

    }else{
        var addUser = true;

        myMatchUserArray.forEach(elem =>{
            if(elem.getUserId() == userToAdd.getUserId()){  //check if user exists
                addUser = false;  
                elem.setMatchCounterPlusOne();
            }
    
        })
    
        //console.log(addUserBool);
        if (addUser){
            //add user 
            myMatchUserArray.push(userToAdd);
        }
    }
    
}

function updateResArray(resIdToAdd,myResArray){

    var addRes = true;

    myResArray.forEach(elem =>{
        if(elem == resIdToAdd){  //check if item already exists
            addRes = false;
        }
    })

    //console.log(addUserBool);
    if (addRes){
        //add user 
        myResArray.push(resIdToAdd);
    }

}






// matches functions ------------------------------------------------------------
//-------------------------------------------------------------------------------

function matchesIsPosReview(userId,isPosStr){

    // get current user comments where isPositive (has origin restaurant ID)
    // for each restaurantId find other users with same isPos result
    // add users to list of MatchUsers class ensuring no duplicates.   
    //     if duplicate increment match counter 
    // display list of matchUsers


    var matchUserArray = [];
    var resArray = [];

    //outerloop
    db.collection('users').doc(userId).collection('restaurantComments').where('isPosReview','==', isPosStr ).get().then((snapshot) => {
        //console.log("User Pos reviews comments found = " + snapshot.size);

        //If user is new and has no comments update user
        if(snapshot.size == 0){
            parentGrid.innerHTML = "";
            createUserNoItems();
        }

        snapshot.docs.forEach(userCommentdoc => {
            
            updateResArray(userCommentdoc.data().restaurantId,resArray);      

            
        })


        console.log("resArray: -----------------");
        resArray.forEach(e =>{
            console.log ("resId: " + e);
        })
        

        //inner loop
        resArray.forEach(elemResId =>{
            db.collection('restaurants').doc(elemResId).collection('comments').where('isPosReview', '==' ,isPosStr).get().then((snapshot) => {
                //console.log( "Restaurant "+ userCommentdoc.data().restaurantId +" has " + snapshot.size + " Pos review from users.");
                snapshot.docs.forEach(resCommentDoc => {
            
                    // temp user built with matchUser constructor
                    //REF SHOULD LOOK LIKE THIS
                    // ---> constructor(userId,username,firstName,lastName,summary,imgName,imgExt,birthday,gender,height,smoker) {
                    var tempUser = new MatchUser(
                        resCommentDoc.data().userId,
                        resCommentDoc.data().username,
                        resCommentDoc.data().userFirstName,
                        resCommentDoc.data().userLastName,
                        resCommentDoc.data().summary,
                        resCommentDoc.data().userImgPath,
                        resCommentDoc.data().userImgExt,
                        resCommentDoc.data().birthday,
                        resCommentDoc.data().gender,
                        resCommentDoc.data().height,
                        resCommentDoc.data().smoker
                    )
                    //console.log(tempUser.getUserId());
            
                    //add user to array (works more like a list though)
                        //if user already in array increase their matchCounter
                    updateMatchUserArray(userId,tempUser,matchUserArray);
                })
            
                console.log("Array Size: " + matchUserArray.length);
                
                //testing v2 (shows match counter and added property value per round)
                matchUserArray.forEach(e =>{
                    console.log("username: " + e.getUsername() +
                    "    /  mCounter: " + e.getMatchCounter() +
                    "    /  Birthday: " + e.getBirthday() +
                    "    /  Gender: " + e.getGender() +
                    "    /  Height: " + e.getHeight()
                    );
                })
        
                userItemManager(matchUserArray);   //this will run multiple times 
                      
            })


        })// inner loop
        
    }) //outer loop
}






function matchesByGender(userId,isPosStr,genderStr){

    // get current user comments where isPositive (has origin restaurant ID)
    // for each restaurantId find other users with same isPos result
    // add users to list of MatchUsers class ensuring no duplicates.   
    //     if duplicate increment match counter 
    // display list of matchUsers


    var matchUserArray = [];
    var resArray = [];

    //outerloop
    db.collection('users').doc(userId).collection('restaurantComments').where('isPosReview','==', isPosStr).get().then((snapshot) => {
        //console.log("User Pos reviews comments found = " + snapshot.size);

        //If user is new and has no comments update user
        if(snapshot.size == 0){
            parentGrid.innerHTML = "";
            createUserNoItems();
        }

        snapshot.docs.forEach(userCommentdoc => {
            
            updateResArray(userCommentdoc.data().restaurantId,resArray);      

            
        })


        console.log("resArray: -----------------");
        resArray.forEach(e =>{
            console.log ("resId: " + e);
        })
        

        //inner loop
        resArray.forEach(elemResId =>{
            db.collection('restaurants').doc(elemResId).collection('comments').where('isPosReview', '==' ,isPosStr).where('gender','==',genderStr).get().then((snapshot) => {
                //console.log( "Restaurant "+ userCommentdoc.data().restaurantId +" has " + snapshot.size + " Pos review from users.");
                snapshot.docs.forEach(resCommentDoc => {
            
                    // temp user built with matchUser constructor
                    //REF SHOULD LOOK LIKE THIS
                    // ---> constructor(userId,username,firstName,lastName,summary,imgName,imgExt,birthday,gender,height,smoker) {
                    var tempUser = new MatchUser(
                        resCommentDoc.data().userId,
                        resCommentDoc.data().username,
                        resCommentDoc.data().userFirstName,
                        resCommentDoc.data().userLastName,
                        resCommentDoc.data().summary,
                        resCommentDoc.data().userImgPath,
                        resCommentDoc.data().userImgExt,
                        resCommentDoc.data().birthday,
                        resCommentDoc.data().gender,
                        resCommentDoc.data().height,
                        resCommentDoc.data().smoker
                    )
                    //console.log(tempUser.getUserId());
            
                    //add user to array (works more like a list though)
                        //if user already in array increase their matchCounter
                    updateMatchUserArray(userId,tempUser,matchUserArray);
                })
            
                console.log("Array Size: " + matchUserArray.length);
        
                userItemManager(matchUserArray);   //this will run multiple times  

            })


        })// inner loop
        
    }) //outer loop
}


function getBirthdayYearHigh(userBirthday,ageRange){
    //needs to return a date plus ageRange in years

    //console.log(userBirthday   + "  //  " + ageRange );
    //user date to seperate out and increment year
    var d = new Date(userBirthday);
    d.setFullYear(parseInt(d.getFullYear()) + parseInt(ageRange));   // should be just yyyy as int
    var dateHigh = d.getFullYear() + "-00-00";

    //console.log("highDate: " + dateHigh);
    return dateHigh;    
}

function getBirthdayYearLow(userBirthday,ageRange){
    //needs to return a date plus ageRange in years

    //user date to seperate out and increment year
    var d = new Date(userBirthday);
    d.setFullYear(parseInt(d.getFullYear()) - parseInt(ageRange));   // should be just yyyy as int
    var dateLow = d.getFullYear() + "-00-00";

    return dateLow;    
}


function matchesByAgeRangeHigh(userId,isPosStr,ageRange){

    //outer outer loop
    db.collection('users').doc(userId).get().then((doc) =>{
        if (doc.exists) {
            var userBirthday = doc.data().birthday;

            var dateHigh = getBirthdayYearHigh(userBirthday,ageRange);
            
            console.log("Age range High setup for where stmt -------------------------");
            console.log(userBirthday   + "  //  " + ageRange );
            console.log(dateHigh);
            
            
            var matchUserArray = [];
            var resArray = [];

            //outerloop
            db.collection('users').doc(userId).collection('restaurantComments').where('isPosReview','==', isPosStr ).get().then((snapshot) => {
                //console.log("User Pos reviews comments found = " + snapshot.size);

                //If user is new and has no comments update user
                if(snapshot.size == 0){
                    parentGrid.innerHTML = "";
                    createUserNoItems();
                }

                snapshot.docs.forEach(userCommentdoc => {
                    
                    updateResArray(userCommentdoc.data().restaurantId,resArray);      

                    
                })


                console.log("resArray: -----------------");
                resArray.forEach(e =>{
                    console.log ("resId: " + e);
                })
                

                //inner loop
                resArray.forEach(elemResId =>{ 
                    db.collection('restaurants').doc(elemResId).collection('comments').where('isPosReview', '==' ,isPosStr).where('birthday','>',dateHigh).get().then((snapshot) => {
                        //console.log( "Restaurant "+ userCommentdoc.data().restaurantId +" has " + snapshot.size + " Pos review from users.");
                        snapshot.docs.forEach(resCommentDoc => {
                    
                            // temp user built with matchUser constructor
                            //REF SHOULD LOOK LIKE THIS
                            // ---> constructor(userId,username,firstName,lastName,summary,imgName,imgExt,birthday,gender,height,smoker) {
                            var tempUser = new MatchUser(
                                resCommentDoc.data().userId,
                                resCommentDoc.data().username,
                                resCommentDoc.data().userFirstName,
                                resCommentDoc.data().userLastName,
                                resCommentDoc.data().summary,
                                resCommentDoc.data().userImgPath,
                                resCommentDoc.data().userImgExt,
                                resCommentDoc.data().birthday,
                                resCommentDoc.data().gender,
                                resCommentDoc.data().height,
                                resCommentDoc.data().smoker
                            )
                            //console.log(tempUser.getUserId());
                    
                            //add user to array (works more like a list though)
                                //if user already in array increase their matchCounter
                            updateMatchUserArray(userId,tempUser,matchUserArray);
                        })
                    
                        //console.log("Array Size: " + matchUserArray.length);
                
                        userItemManager(matchUserArray);   //this will run multiple times        

                    })


                })// inner loop
                
            }) //outer loop




        } else {
            // doc.data() will be undefined in this case
            console.log("No such user document found!");
            setRestrauntDataError();
        }
    }).catch((error) =>{
        
    });


}















// on load -------------------------------------------------------
//----------------------------------------------------------------

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
                matchesIsPosReview(userId,"true");
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




//Buttons ---------------------------------------------------------



function getIsPosRadioValue(){
    //get RadioValue
    if(isPosTrueRadio.checked){
        return "true";
    }else if (isPosFalseRadio.checked){
        return "false";
    }else{
        alert("please select a positive / negative radio btn");
    }
}



searchByReviewPosBtn.addEventListener('click', (event) =>{
    event.preventDefault();

    matchesIsPosReview(userId, getIsPosRadioValue());
})



genderBtn.addEventListener('click', (event) =>{
    event.preventDefault();

    //get gender txtfield value
    var genderTxt = document.querySelector('#byGenderTextField').value;
    var isPosStr;

    if(genderTxt.length == 0){
        alert("Please fill in the gender text field.");
    }else{
        isPosStr = getIsPosRadioValue();
        if(isPosStr == "true" || isPosStr == "false"){
            matchesByGender(userId,isPosStr,genderTxt);
        }
        
    }



})



ageRangeHighBtn.addEventListener('click', (event) =>{
    event.preventDefault();

    //get ageRange txtfield value
    var ageRange = document.querySelector('#byAgeRangeNumber').value;
    var isPosStr;

    if(ageRange.length == 0){
        alert("Please fill in the age range number field.");
    }else if(ageRange < 0){
        alert("Age range cant be less than 0.");
    }else{
        isPosStr = getIsPosRadioValue();
        if(isPosStr == "true" || isPosStr == "false"){
            //console.log(ageRange);
            matchesByAgeRangeHigh(userId,isPosStr,ageRange);
        }
        
    }

})

ageRangeLowBtn.addEventListener('click', (event) =>{
    event.preventDefault();

    //get ageRange txtfield value
    var ageRange = document.querySelector('#byAgeRangeNumber').value;
    var isPosStr;

    if(ageRange.length == 0){
        alert("Please fill in the age range number field.");
    }else if(ageRange < 0){
        alert("Age range cant be less than 0.");
    }else{
        isPosStr = getIsPosRadioValue();
        if(isPosStr == "true" || isPosStr == "false"){
            //console.log(ageRange);
            //matchesByAgeRangeLow(userId,isPosStr,ageRange);  //does not yet exist
        }
        
    }

})















//---------------------------------
//
// ---- NOTES ----------------------
//
//-----------------------------

//matches types
// by isPosReview   \  function  matchesIsPosReview()  true / false
// by gender         \  function matchesByGender()     string male
// by ageRangeHigh           function matchesByAgeRangeHigh()     int +10
// by ageRangeLow           function matchesByAgeRangeLow()     int +10

// get current user comments where isPositive (has origin restaurant ID)
// for each restaurantId find other users with same isPos result
// add users to list of MatchUsers class ensuring no duplicates.   
//     if duplicate increment match counter 
// display list of matchUsers





// ######working but if user comments on a restraunt multiple time the matcher runs the restraunt multiple times..
// function matchesIsPosReview(userId){

//     // get current user comments where isPositive (has origin restaurant ID)
//     // for each restaurantId find other users with same isPos result
//     // add users to list of MatchUsers class ensuring no duplicates.   
//     //     if duplicate increment match counter 
//     // display list of matchUsers


//     var matchUserArray = [];
    
//     db.collection('users').doc(userId).collection('restaurantComments').where('isPosReview','==',"true").get().then((snapshot) => {
//         //console.log("User Pos reviews comments found = " + snapshot.size);

//         //If user is new and has no comments update user
//         if(snapshot.size == 0){
//             parentGrid.innerHTML = "";
//             createUserNoItems();
//         }
        
//         snapshot.docs.forEach(userCommentdoc => {
            

//             db.collection('restaurants').doc(userCommentdoc.data().restaurantId).collection('comments').where('isPosReview', '==' ,"true").get().then((snapshot) => {
//                 //console.log( "Restaurant "+ userCommentdoc.data().restaurantId +" has " + snapshot.size + " Pos review from users.");
//                 snapshot.docs.forEach(resCommentDoc => {

//                     // temp user built with matchUser constructor
//                     //REF SHOULD LOOK LIKE THIS
//                     // ---> constructor(userId,username,firstName,lastName,summary,imgName,imgExt,birthday,gender,height,smoker) {
//                     var tempUser = new MatchUser(
//                         resCommentDoc.data().userId,
//                         resCommentDoc.data().username,
//                         resCommentDoc.data().userFirstName,
//                         resCommentDoc.data().userLastName,
//                         resCommentDoc.data().summary,
//                         resCommentDoc.data().userImgPath,
//                         resCommentDoc.data().userImgExt,
//                         resCommentDoc.data().birthday,
//                         resCommentDoc.data().gender,
//                         resCommentDoc.data().height,
//                         resCommentDoc.data().smoker
//                     )
//                     //console.log(tempUser.getUserId());

//                     //add user to array (works more like a list though)
//                         //if user already in array increase their matchCounter
//                     updateMatchUserArray(userId,tempUser,matchUserArray);
//                 })

//                 console.log("Array Size: " + matchUserArray.length);
//                 if(matchUserArray.length != 0){

//                     //testing v2 (shows match counter and added property value per round)
//                     matchUserArray.forEach(e =>{
//                         console.log("username: " + e.getUsername() +
//                         "    /  mCounter: " + e.getMatchCounter() +
//                         "    /  Birthday: " + e.getBirthday() +
//                         "    /  Gender: " + e.getGender() +
//                         "    /  Height: " + e.getHeight()
//                         );
//                     })

//                     userItemManager(matchUserArray);   //this will run multiple times 
//                 }       
//             }) 
//         })
        
//     }) 
// }



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



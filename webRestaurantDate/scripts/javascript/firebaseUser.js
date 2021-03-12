
// user management firebase pg
//https://firebase.google.com/docs/auth/web/manage-users


// html we are trying to create

//<div id="userNav">
//    <p>myName</p>
//    <a href="logout.php">Logout</a>
//    <a href="userSettings">Settings</a>
//    <input type="hidden" id="currentUserId" value="">
//    <input type="hidden" id="currentUserType" value="">
//</div>







//functions--------

function displayUserDataNav(doc){
    
    console.log("entered function");
    
    //get target navElement
    let navUser = document.querySelector("#userNav");
    
    // empty nav element for rebuild
    navUser.innerHTML = "";
    
    
    // create elements
    let uName = document.createElement("p");
    let uLogout = document.createElement("a");
    let uSettings = document.createElement("a");
    let uInputId = document.createElement("input");
    let uInputType = document.createElement("input");
    
    
    //p element
    //check to see if fields exists
    //var isUser = doc.contains("username");  //didnt work  
    //var isUser = doc.getBoolean("username"); //didnt work
    
    var isUser = doc.data().username;   //either will or wont get a value one will result null
    var isRes = doc.data().resName;
    
    //depending on type of user set p element 
    if(isUser != null){
        uName.textContent=doc.data().username;
    }else{
        if(isRes != null){
            uName.textContent=doc.data().resName;
        }else{
            uName.textContent="undefined";
            console.log("both fields did not exist for username / resName");
        }
    }
    
    
    
    //a link elements
    //set href
    uLogout.setAttribute("href","logout.php");
    uSettings.setAttribute("href","userSettings.php");
    
    //set txt content
    uLogout.textContent = "Logout";
    uSettings.textContent = "Settings";
    
    
    //input elements
    //set value
    uInputId.setAttribute("value",doc.id);
    uInputType.setAttribute("value",doc.data().usertype);
    //set id 
    uInputId.setAttribute("id","currentUserId");
    uInputType.setAttribute("id","currentUserType");
    //set type
    uInputId.setAttribute("type","hidden");
    uInputType.setAttribute("type","hidden");
    
    
    
    //append data to userNav
    navUser.append(uName);
    navUser.append(uLogout);
    navUser.append(uSettings);
    navUser.append(uInputId);
    navUser.append(uInputType);
    
}








// ---- start pg content ------ 


//console.log("firebaseUser has ran");
//var user = firebase.auth().currentUser;
//console.log(user);
//
//if (user) {
//    // User is signed in
//    // get user data
//    db.collection("users").doc(user.uid).get().then((doc) =>{
//        if(doc.exists){
//            //found connect user doc
//            console.log("auth user exists and connected doc");
//            //display data in nav
//            displayUserDataNav(doc);
//        }else{
//            //cant find user doc connect to AUTH user
//            console.log("no such document but auth user exists.");
//        }
//    });
//    
//} else {
//    // No user is signed in.
//    // change nothing in navigation
//}




// using observer 

firebase.auth().onAuthStateChanged((user) => {
  if (user) {
    // User is signed in, see docs for a list of available properties
    // https://firebase.google.com/docs/reference/js/firebase.User
    //var uid = user.uid;
    // only using user.uid 
    // all our other properties will be saved in the firestore
    console.log("A userType is logged in.");

    //check if user
    db.collection("users").doc(user.uid).get().then((doc) =>{
        if(doc.exists){
                //found connect user doc
                console.log("auth user exists and connected user doc");
                console.log("user id: " + user.uid);
                //display data in nav
                displayUserDataNav(doc);
            }else{
                
                 //check if user
                db.collection("restraunts").doc(user.uid).get().then((doc) =>{
                    if(doc.exists){
                        //found connect Restraunt User doc
                        console.log("auth user exists and connected restraunt doc");
                        console.log("user id: " + user.uid);
                        //display data in nav
                        displayUserDataNav(doc);
                    }else{
                        //cant find user doc connect to AUTH user
                        console.log("no such document in Restraunts collection.");
                }
    });
            }
    });


   




  } else {
    // No user is logged in
    // ...
  }
});

// user management firebase pg
//https://firebase.google.com/docs/auth/web/manage-users


// html we are trying to create

//<div id="userNav">
//    <span>myName</span>
//    <a href="logout.php">Logout</a>
//    <a href="userSettings">Settings</a>
//    <input type="hidden" id="currentUserId" value="">
//    <input type="hidden" id="currentUserType" value="">
//</div>







//functions--------




function logout(){
    
    //sign out
    firebase.auth().signOut().then(() => {
        // Sign-out successful.
        //alert("sign out successfull");
        window.location.href = "index.php";
        
    }).catch((error) => {
    // An error happened.
        console.log("Error code: " + error.code);
        alert("error: " + error.message);
    });

}



function displayUserDataNav(doc){
    
    //get target navElement
    let navUser = document.querySelector("#userNav");
    
    // empty nav element for rebuild
    navUser.innerHTML = "";
    

    // create elements
    let uName = document.createElement("span"); //changed to span to not affect nav layout
    let uLogout = document.createElement("a");
    let uSettings = document.createElement("a");
    let uInputId = document.createElement("input");
    let uInputType = document.createElement("input");
    
    
    //p element
    //check to see if fields exists
    //var isUser = doc.contains("username");  //didnt work  
    //var isUser = doc.getBoolean("username"); //didnt work

    //BOTH USERTYPES NOW HAVE USERNAME;
    
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
        }
    }
    
    
    
    //a link elements
    //set href
    uLogout.setAttribute("href","");  //gets it to behave like a normal a element
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


    uLogout.addEventListener('click', (event) => {
        event.preventDefault();
        logout();
    })

    
}








// ---- start pg content ------ 




// using observer 
firebase.auth().onAuthStateChanged((user) => {
  if (user) {
    // User is signed in, see docs for a list of available properties
    // https://firebase.google.com/docs/reference/js/firebase.User
    //var uid = user.uid; // only using user.uid 
    // all our other properties will be saved in the firestore

    //checking
    //console.log("A userType is logged in.");

    //check i user's collection
    db.collection("users").doc(user.uid).get().then((doc) =>{
        if(doc.exists){
                //display data in nav
                displayUserDataNav(doc);
        }else{
                
            //check in restraunt's collection
            db.collection("restaurants").doc(user.uid).get().then((doc) =>{
                if(doc.exists){
                    //display data in nav
                    displayUserDataNav(doc);
                }else{
                    //cant find user doc connect to AUTH user in RESTRAUNT collection
                    //console.log("no such document in Restraunts or Users collection.");
                }
            });
        }
    });
  } else {
    // No user is logged in
    // ...
  }
});
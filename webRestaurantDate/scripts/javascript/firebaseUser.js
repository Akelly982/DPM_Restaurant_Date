
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
    
    //get target navElement
    var navUser = document.getElementById("userNav");
    
    // empty nav element for rebuild
    navUser.innerHtml = "";
    
    
    // create elements
    let uName = document.createElement("p");
    let uLogout = document.createElement("a");
    let uSettings = document.createElement("a");
    let uInputId = document.createElement("input");
    let uInputType = document.createElement("input");
    
    
    //p element
    //check to see if fields exists
    var isUser = doc.getBoolean("username");
    var isRes = doc.getBoolean("resName");
    
    //depending on type of user set p 
    if(isUser){
        uName.textContent=doc.data().username;
    }else{
        if(isRes){
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
    
}








// ---- start pg content ------ 

console.log("firebaseUser has ran");
var user = firebase.auth().currentUser;
console.log(user);

if (user) {
    // User is signed in
    // get user data
    db.collection("users").doc(user.uid).get().then((doc) =>{
        if(doc.exists){
            //found connect user doc
            console.log("auth user exists and connected doc");
            //display data in nav
            displayUserDataNav(doc);
        }else{
            //cant find user doc connect to AUTH user
            console.log("no such document but auth user exists.");
        }
    });
    
} else {
    // No user is signed in.
    // change nothing in navigation
}
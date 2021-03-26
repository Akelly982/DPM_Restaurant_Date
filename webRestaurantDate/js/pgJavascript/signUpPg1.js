
   
var myform = document.querySelector("#userForm");
var signUpBtn = document.querySelector("#signUpPgSubmitBtn");


// //init form to go to user
// form.setAttribute("action","signUpUserPg2.php");

// // On Event on radio btns
// signUpResRadio.addEventListener("click",(e)=>{
//     e.preventDefault();
//     //set action to sign up restraunt
//     form.setAttribute("action","signUpRestrauntPg2.php");
//     console.log("signUpRestrauntPg2.php");
    

// })
  
// signUpUserRadio.addEventListener('click', (e) =>{
//     e.preventDefault();
//     form.setAttribute("action","signUpUserPg2.php");
//     console.log("signUpUserPg2.php");
// })



//add user to firebase AUTH and pass their auth id to the next page.
signUpPgSubmitBtn.addEventListener('click', (e) =>{
    e.preventDefault();


    //get data 
    // email and password checks done by firebase.Auth
    var email = myform.email.value;
    var password = myform.password.value;


    //ensure usertype is valid
    var userType = myform.userType.value; //get value from radio btn's
    console.log("userType: " + userType);


    if(userType == "user" || userType == "restaurant"){  

        firebase.auth().createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
            // Signed in 
            // dont try return values here like a method / function
            // this is run on response from the auth host firebase
            var user = userCredential.user;
            console.log("signed in: " + user.uid);
            
            //move to relevent page with AUTH user.uid
            switch(userType){
                case "user":  //user
                    //alert("case user hit");
                    window.location.href = 'signUpUserPg2.php'  + "?user=" + user.uid + "&email=" + email; 
                    break;
    
                case "restaurant": // restraunt
                    //alert("case res hit");
                    window.location.href = 'signUpRestaurantPg2.php'  + "?user=" + user.uid + "&email=" + email; 
                    break;
    
                default:
                    alert("user created but unkown userType for page selection");
                    break;
    
            }
    
            
        })
        .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log("---SignUpInit Catch error---");
            console.log("error Code: " + error.code);
            console.log("error Msg: " + error.message);
            alert("error Msg: " + error.message);
        });
        
    }else{
        alert("Error: Are you a user or a restraunt?");
    }

})





var signUpResRadio = document.querySelector("#signUpRes");
var signUpUserRadio = document.querySelector("#signUpUser");
var form = document.querySelector("#userForm");




//init form to go to user
form.setAttribute("action","signUpUserPg2.php");

// On Event on radio btns
signUpResRadio.addEventListener("click",(e)=>{
    e.preventDefault();
    //set action to sign up restraunt
    form.setAttribute("action","signUpRestrauntPg2.php");
    console.log("signUpRestrauntPg2.php");
    

})
  
signUpUserRadio.addEventListener('click', (e) =>{
    e.preventDefault();
    form.setAttribute("action","signUpUserPg2.php");
    console.log("signUpUserPg2.php");
})


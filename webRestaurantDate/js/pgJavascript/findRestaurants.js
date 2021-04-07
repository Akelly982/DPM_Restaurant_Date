

// NOTE watch out for scope on these functions 
// vars can be recognised across function with intelisense

// get parent container that we will edit content within
var resCont = document.querySelector("#resContent");

//searh name
var searchByNameBtn = document.querySelector("#searchByNameBtn");
var searchByNameTextField = document.querySelector("#searchByNameTextField");

//category btns
var resSearchMexican = document.querySelector("#searchMexican");
var resSearchThai = document.querySelector("#searchThai");
var resSearchFastFood = document.querySelector("#searchFastFood");


// // List the category
// var resCat = document.querySelector("resCategories");

// //retrieve one document and save it to userDetails
// function testResItem(doc){
//     console.log("resCatefory: " + doc.data().category1);
// }


// --------------------------------------------------------
//----------- functions  creating elements -----------------

//testRes item
function testResItem(doc){
    console.log("resImgExt: " + doc.data().imgExt);
    console.log("resImgPath: " + doc.data().imgPath);
    console.log("resName: " + doc.data().resName);
    console.log("resLocation: " + doc.data().location);
    console.log("resSummary: " + doc.data().summary);
}


//create rerstraunt item
function createRestrauntItem(doc){


    // testResItem(doc);

    //what it should end up looking like
    // <div class="findResContentItem">   
    //     <div class="frImage" style="background-image: url(userImage/temResImg.png);">
    //     </div>
    //     <div class="frText">
    //         <h2>my Restraunt name</h2>
    //         <h4>Cafe: location of my cafe </h4>
    //         <p class="frSummary"> Summary of my cafe. </p>
    //         <button class="frBtn"> Enter </button>
    //     </div>
    // </div>



    //create elements
    let divContItem = document.createElement("div");
    let divFrImg = document.createElement("div");
    let divFrText = document.createElement("div");

    let resName = document.createElement('h2');
    let resLoca = document.createElement('h4');
    let resSum = document.createElement('p');

    let detailsPgBtn = document.createElement('button');


    
    //set content data
    divContItem.setAttribute("class","findResContentItem");
    
    divFrImg.setAttribute("class","frImage");
    divFrImg.setAttribute("style","background-image: url(userImage/" + doc.data().imgPath + doc.data().imgExt);
    resSum.setAttribute("class","frSummary");


    divFrText.setAttribute("class","frText");
    resName.textContent = doc.data().resName;
    resLoca.textContent = doc.data().street + " " + doc.data().city + " " + doc.data().state;
    resSum.textContent = doc.data().summary;

    detailsPgBtn.textContent = "Enter";



    //connect elements
    divContItem.append(divFrImg);
    divContItem.append(divFrText);

    divFrText.append(resName);
    divFrText.append(resLoca);
    divFrText.append(resSum);
    divFrText.append(detailsPgBtn);




    //DETAIL PAGE btn----------------------
    //move to detail page
    //uses a sneaky PHP GET 
        // I did this so you can share your resDetail pg's with fellow fellas and shellas

    detailsPgBtn.addEventListener('click', (event) => {
        window.location.href = 'restaurantDetail.php' + "?restaurantName=" + doc.data().resName +"&restaurantId=" + doc.id;
    })


    //append doc to the parent element
    resCont.append(divContItem);


}

function createRestrauntItemByInnerHtml(doc){
    // <!-- The item to be created in JS for every res returned -->

    //                                           //## parent is resCont
    // <div class="findResContentItem">          //##this is resContItem div                                             <!-- userImage/tempResImg.png -->
    //     <div class="frImage" style="background-image: url(userImage/tempResImg.png);">
    //     </div>
    //     <div class="frText">                  //##this is resContItemText
    //         <h2>my Restraunt name</h2>
    //         <h4>Cafe: location of my cafe </h4>
    //         <p class="frSummary">Summary of my cafe. lorum ipsum elipsum da ipsum ya lorum ipsum is a ispum of a lorum 
    //         ipsum elipsum da ipsum ya lorum ipsum is a ispum of a lorum
    //         </p>
    //         <button class="frBtn"> Enter </button>
    //     </div>
    // </div>


    //create item Divs
    let resContItem = document.createElement("div");
    let resContItemText = document.createElement("div");

    //setup elements
    resContItem.setAttribute("class","findResContentItem");
    resContItemText.setAttribute("class","frText");

    //setup btn
    let detailsPgBtn = document.createElement('button');
    detailsPgBtn.textContent = "Enter";

    //append to parent       //must already be connect to parent within the document to add innerHTML
    resCont.append(resContItem); 
    
    //set inner content for    <div class="findResContentItem"> 
    resContItem.innerHTML = '<div class="frImage" style="background-image: url(userImage/'+ doc.data().imgPath + doc.data().imgExt + ');">' +
                            '</div>';

    resContItem.append(resContItemText);

    // set inner content for    <div class="frText">  
    resContItemText.innerHTML = '<h2>' +  doc.data().resName + '</h2>' + 
                                    '<h4> Location: ' +  doc.data().street + " " + doc.data().city + " " + doc.data().state + '</h4>' + 
                                    '<p class="frSummary">' +  doc.data().summary +'</p>';

    // append btn
    // resContItemText.append(detailsPgBtn);



    //DETAIL PAGE btn----------------------
    //move to detail page
    //uses a sneaky PHP GET 
    // I did this so you can share your resDetail pg's with fellow fellas and shellas
    //----------------------------------------------------
    // detailsPgBtn.addEventListener('click', (event) => {
    //     window.location.href = 'restaurantDetail.php' + "?restaurantName=" + doc.data().resName +"&restaurantId=" + doc.id;
    // })
    //------------------------------------------------------
    // When click the content items go to the detail pages
    resContItem.addEventListener('click', (event) => {
        window.location.href = 'restaurantDetail.php' + "?restaurantName=" + doc.data().resName +"&restaurantId=" + doc.id;
    })


}


function emptySnapshot(){

    // <div class="findResContentItem">
    //     <div class="frText">
    //         <h3>No restraunts by that type found. <br> Try again.</h3>
    //     </div>
    // </div>

    //create elements
    let resContItem2 = document.createElement("div");
    let divClass = document.createElement("div");
    let text = document.createElement("h3");

    //setup elements
    resContItem2.setAttribute("class","findResContentItem");
    divClass.setAttribute("class","frText");
    text.textContent = "No restraunts by that type found. <br> Try again."  // <br> will not work this way

    //append elements
    resContItem2.append(divClass);
    divClass.append(text);

    //append to parent
    resCont.append(resContItem2)
}


function emptySnapshotByInnerHtml(){

    // <div class="findResContentItem">
    //     <div class="frText">
    //         <h3>No restraunts by that type found. <br> Try again.</h3>
    //     </div>
    // </div>

    //create elements
    let resContItem2 = document.createElement("div");

    //setup elements
    resContItem2.setAttribute("class","findResContentItem");

    //append to parent
    resCont.append(resContItem2); //must already be connect to parent within the document 

    //using innerHtml
    resContItem2.innerHTML = '<div class="frText">' + 
                                '<h3>No restraunts by that type found. <br> Try again.</h3>' + 
                            '</div>';
    
}



function addSpacer(){
    spacerDiv = document.createElement("div");
    spacerDiv.setAttribute("class","frContentSpacer");
    resCont.append(spacerDiv);
}


function emptyParentContent(){
    //empty parent container of content
    resCont.innerHTML = "";
}



// --------------------------------------------------------
//----------- functions  working with Firestore -----------------

function searchCriteriaBtn(searchStr){
    
    db.collection('restaurants').where('category1', '==', searchStr  ||  'category2', '==', searchStr  || 'category3', '==', searchStr).get().then((snapshot) => {
        checkSnapRenderDoc(snapshot);
    }) 

}


function checkSnapRenderDoc(snapshot){
    size = snapshot.size // will return the collection size
    console.log("num docs = " + size);

    //optimzed by most likely first
    if(size > 1){
        emptyParentContent();
        snapshot.docs.forEach(doc => {
            createRestrauntItemByInnerHtml(doc);
        })
        

    }else if(size == 1){
        emptyParentContent();
        // add one frContentSpacer to help clear 
        // footer of the bottom of the screen
        // addSpacer();
        snapshot.docs.forEach(doc => {
            createRestrauntItemByInnerHtml(doc);
        })
        addSpacer();

    }else{
        //size is less than 1 so nothing or error
        emptyParentContent();
        // addSpacer();
        emptySnapshotByInnerHtml();
        addSpacer();
    }
}





// --------------------------------------------------------
//------------------------------------------------------

// on js load code -------------------------------------
db.collection('restaurants').get().then((snapshot) => {
    checkSnapRenderDoc(snapshot);
})


// on buttons event--------------------------------------------

resSearchFastFood.addEventListener("click", (e) =>{
    e.preventDefault();
    searchCriteriaBtn("fastfood");
})

resSearchMexican.addEventListener("click", (e) =>{
    e.preventDefault();
    searchCriteriaBtn("mexican"); 
})

resSearchThai.addEventListener("click", (e) =>{
    e.preventDefault();
    searchCriteriaBtn("thai");
})

searchByNameBtn.addEventListener("click", (e) =>{
    e.preventDefault();

    //get txt field data
    var userStr = searchByNameTextField.value;
    //ensure textfield is not empty
    if(userStr === ""){
        alert("search text field is empty");

    }else{
        db.collection('restaurants').where('resName', '==', userStr).get().then((snapshot) => {
            checkSnapRenderDoc(snapshot);
        }) 
        
    }

    
})
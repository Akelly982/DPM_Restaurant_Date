function toggleSearch(){
    var x = document.getElementById("searchMb");
    let leftnav = document.querySelector('.findResSearchMb');
    
    if (x.style.display === "block") {
        x.style.display = "none";
        leftnav.classList.toggle('findResSearchMb_active');
        
    } else {
        x.style.display = "block";
        leftnav.classList.toggle('findResSearchMb_active');
    }
}

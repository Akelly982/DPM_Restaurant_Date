function toggleSearch(){
    var x = document.getElementById("searchMb");
    let leftnav = document.querySelector('.toggleSearchMenu');
    
    if (x.style.display === "block") {
        x.style.display = "none";
        leftnav.classList.toggle('toggleSearchMenu_active');
        
    } else {
        x.style.display = "block";
        leftnav.classList.toggle('toggleSearchMenu_active');
    }
}

function animateFrom(elem, direction) {
    direction = direction | 1;
    
    var x = 0,
        y = direction * 100;
    if(elem.classList.contains("gs_reveal_fromLeft")) {
        x = '-50%';
        y = 0;
    } else if(elem.classList.contains("gs_reveal_fromRight")) {
        x = '50%';
        y = 0;
    }
    else if(elem.classList.contains("gs_reveal_fromBottom")) {
        x = 0;
        y = '12%';
    }
    gsap.fromTo(elem, {x: x, y: y, autoAlpha: 0}, {
        duration: 3, 
        x: 0,
        y: 0, 
        autoAlpha: 3, 
        ease: "expo", 
        overwrite: "auto"
    });
}

function hide(elem) {
    gsap.set(elem, {autoAlpha: 0});
}

document.addEventListener("DOMContentLoaded", function() {
    gsap.registerPlugin(ScrollTrigger);
    
    gsap.utils.toArray(".gs_reveal").forEach(function(elem) {
      hide(elem); // assure that the element is hidden when scrolled into view

    ScrollTrigger.create({
        trigger: elem,
        onEnter: function() { animateFrom(elem) }, 
        onEnterBack: function() { animateFrom(elem, -1) },
        onLeave: function() { hide(elem) } // assure that the element is hidden when scrolled into view
        });
    });
});


var enabled = false
let navLinks = document.getElementById("navLinks")
let Avatar = document.getElementById("resAvatar")

document.getElementById("hamburger").addEventListener('click', e => {


    if (!enabled) {
        navLinks.classList.remove("nav-links")
        navLinks.classList.add("resNavLinks")
        Avatar.style.display = "flex"
        enabled = true
    } else {
        navLinks.classList.remove("resNavLinks")
        navLinks.classList.add("nav-links")
        Avatar.style.display = "none"
        enabled = false
    }
})


window.addEventListener('click', function(e){   
    if(enabled) {
        if (!document.getElementById('navLinks').contains(e.target) && !document.getElementById('hamburger').contains(e.target)){
            navLinks.classList.remove("resNavLinks")
            navLinks.classList.add("nav-links")
            Avatar.style.display = "none"
            enabled = false
    //         navLinks.classList.add("nav-links")
    //         Avatar.style.display = "none"
    //         enabled = false
            console.log("Out");
        }
    }
});
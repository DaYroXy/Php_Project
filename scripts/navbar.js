

var enabled = false

document.getElementById("hamburger").addEventListener('click', e => {
    let navLinks = document.getElementById("navLinks")
    let Avatar = document.getElementById("resAvatar")

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

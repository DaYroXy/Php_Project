

var enabled = false
let navLinks = document.getElementById("navLinks")
let Avatar = document.getElementById("resAvatar")


document.getElementById("hamburger").addEventListener('click', e => {
    if (!enabled) {
        navLinks.classList.add("resNavLinks")
        document.querySelector('.resNavLinks').style = "animation: 0.3s forwards OpenTab"
        navLinks.classList.remove("nav-links")
        Avatar.style.display = "flex"

        enabled = true
    } else {
        document.querySelector('.resNavLinks').style = "animation: 0.3s forwards CloseTab"    
        setTimeout(() => {
            document.querySelector('.resNavLinks').style = ""
            navLinks.classList.remove("resNavLinks")
            navLinks.classList.add("nav-links")
            Avatar.style.display = "none"
            enabled = false 
        }, 400);
    }
})


window.addEventListener('click', function(e){   
    if(enabled) {
        if (!document.getElementById('navLinks').contains(e.target) && !document.getElementById('hamburger').contains(e.target)){
            document.querySelector('.resNavLinks').style = "animation: 0.3s forwards CloseTab"
            setTimeout(() => {
                document.querySelector('.resNavLinks').style = ""
                navLinks.classList.remove("resNavLinks")
                navLinks.classList.add("nav-links")
                Avatar.style.display = "none"
                enabled = false 
            }, 400);
        }
    }
});




function changeImage(event) {
    console.log(URL.createObjectURL(event.value));
    // console.log(URL.createObjectURL(event.target));
    // document.getElementById("imageOnChange").src
    // console.log(event.value);
}

var loadFile = function(event) {
	var image = document.getElementById('imageOnChange');
	image.src = URL.createObjectURL(event.target.files[0]);
};
//Startup Function
function onLoad() {
    var currentTheme = localStorage.getItem("theme");
    if (!currentTheme) {
        // Set default theme if not set
        localStorage.setItem("theme", "light");
        currentTheme = "light";
    }
    if (currentTheme === "dark") {
        document.documentElement.classList.add("dark");
    }

    const messageCard = document.getElementById("messageCard");
    if (messageCard) {
        removeAfterTime(3000);
    }
}

function openDialogue(id){
    //this function allows the dialogue to be opened along with storing the store id in the dialogue
    const dialogue = document.getElementById("dialogue");
    console.log(id)
    dialogue.setAttribute('open', id);
    dialogue.setAttribute('storeid', id);
}


document.querySelectorAll('.deleteButton').forEach((button) => {
    //For each delete button in the dialogue, 
    button.addEventListener('click', function (event) {
        event.preventDefault();
        let action = this.getAttribute("href");
        let storeid = document.getElementById("dialogue").getAttribute("storeid")
        let form = document.getElementById("deletionForm" + storeid);
        console.log(form)

        form.setAttribute('action', action);
        form.submit();
    })
})


//Toggles between the theme and saves preference in local storage
document.getElementById("toggleTheme").addEventListener("click", () => {
    var currentTheme = localStorage.getItem("theme")
    if (currentTheme == "dark") {
        localStorage.setItem("theme", "light");
    }
    else if (currentTheme == "light") {
        localStorage.setItem("theme", "dark");
    }
    document.documentElement.classList.toggle("dark");
});

//Navigates to a particular url, the whole url must be given via named routue and not part of that route
function navigateTo(url) {
    window.location.href = url;
}

//Adds a fade out animation for a given object after a specified amount of time
function removeAfterTime(time) {
    messageCard = document.getElementById("messageCard");
    setTimeout(() => {
        messageCard.classList.add("fadeOutUp")
        setTimeout(() => {
            messageCard.remove()
        }, 750);
    }, time);
}
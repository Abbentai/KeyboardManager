//Startup Function
function onLoad(){
    console.log('dings')
    var currentTheme = localStorage.getItem("theme")
    if (currentTheme == "dark"){
        ToggleTheme();
    }
}

//Toggles between the theme and saves preference in local storage
document.getElementById("toggleTheme").addEventListener("click", () => {
    var currentTheme = localStorage.getItem("theme")
    if(currentTheme == "dark"){
        localStorage.setItem("theme", "light");
    }
    else if (currentTheme == "light"){
        localStorage.setItem("theme", "dark");
    }

    ToggleTheme()
});

function ToggleTheme(){
    document.documentElement.classList.toggle("dark");
}


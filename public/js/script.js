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
}

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
function navigateTo(url){
    window.location.href = url;
}
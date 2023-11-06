import './bootstrap';

const themeToggleImg = document.getElementById("theme-toggle-img");
let isDarkMode = localStorage.getItem("darkMode") === "true";

themeToggleImg.addEventListener("click", () => {
    isDarkMode = !isDarkMode;
    if (isDarkMode) {
        document.body.classList.add("dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
    }
    localStorage.setItem("darkMode", isDarkMode);
});

document.addEventListener("DOMContentLoaded", () => {
    let isDarkMode = localStorage.getItem("darkMode") === "true";
    if (isDarkMode) {
        document.body.classList.add("dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
    }
});



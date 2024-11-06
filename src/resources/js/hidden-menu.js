const checkbox = document.getElementById("toggle-menu");
const label = document.querySelector('div[for="toggle-menu"]');
const menu = document.querySelector(".menu");

label.addEventListener("click", () => {
    checkbox.checked = !checkbox.checked;

    menu.classList.toggle("hidden", !checkbox.checked);
});

menu.addEventListener("click", () => {
    checkbox.checked = false;
    menu.classList.add("hidden");
});

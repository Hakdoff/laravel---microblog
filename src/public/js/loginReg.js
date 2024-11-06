let swapped = localStorage.getItem("swapped") === "true";
const button = document.getElementById("button");
const loginDiv = document.getElementById("login");
const signupDiv = document.getElementById("signup");
const cover = document.getElementById("cover");
const messages = document.getElementById("messages");
const logo = document.getElementById("logo");

document.getElementById("loginMobile").addEventListener("click", loginMobile);
document.getElementById("signupMobile").addEventListener("click", signupMobile);

function loginMobile() {
    swapped = !swapped;
    localStorage.setItem("swapped", swapped.toString());
    location.reload();
}

function signupMobile() {
    swapped = !swapped;
    localStorage.setItem("swapped", swapped.toString());
    location.reload();
}

document.getElementById("button").addEventListener("click", function () {
    loginDiv.classList.add("swap-one");
    signupDiv.classList.add("swap-two");
    button.disabled = true;
    button.classList.remove("cursor-pointer");
    button.classList.add("fade", "pointer-events-none");
    messages.classList.add("fade");

    setTimeout(() => {
        loginDiv.classList.remove("swap-one");
        signupDiv.classList.remove("swap-two");
        button.classList.add("cursor-pointer");
        button.classList.remove("pointer-events-none");
        button.classList.remove("fade");
        messages.classList.remove("fade");
    }, 2000);

    !swapped ? loginToRegister() : registerToLogin();

    swapped = !swapped;
    localStorage.setItem("swapped", swapped.toString());
});

function loginToRegister() {
    cover.classList.add("to-left");
    cover.classList.remove("to-right");
    logo.classList.add("spin");
    logo.classList.remove("spin-back");
    setTimeout(() => {
        button.textContent = "Login";
    }, 1000);
}

function registerToLogin() {
    cover.classList.remove("to-left");
    cover.classList.add("to-right");
    logo.classList.remove("spin");
    logo.classList.add("spin-back");
    setTimeout(() => {
        button.textContent = "Register";
    }, 1000);
}

function registerRefresh() {
    if (swapped === true) {
        cover.classList.remove("right-0");
        cover.classList.add("right-1/3");
        logo.classList.add("left-88");
        logo.classList.remove("left-[5%]");
        button.textContent = "Login";
    }
}

let wasBelow640 = window.matchMedia("(max-width: 640px)").matches;

function checkIfBelow() {
    const isBelow640 = window.matchMedia("(max-width: 640px)").matches;

    switch (true) {
        case isBelow640 && !swapped:
            setMobileLayout();
            break;
        case isBelow640 && swapped:
            setMobileSwappedLayout();
            break;
        case !isBelow640 && !swapped:
            setDesktopLayout();
            break;
        case !isBelow640 && swapped:
            setDesktopSwappedLayout();
            break;
    }
}

const toSignUp = document.getElementById("toSignUp");
const toLogin = document.getElementById("toLogin");

function setMobileLayout() {
    loginDiv.classList.remove("w-4/12", "absolute", "right-1/3");
    loginDiv.classList.add("sm:w-4/12", "w-full", "relative");
    signupDiv.classList.add("hidden");

    cover.classList.add("w-full", "top-96", "mt-40");
    cover.classList.remove("w-8/12", "to-right", "right-1/3");
    logo.classList.add("hidden");
    button.classList.add("hidden");
    toSignUp.classList.remove("hidden");
}

function setMobileSwappedLayout() {
    signupDiv.classList.remove("w-4/12");
    signupDiv.classList.add("sm:w-4/12", "w-full");
    loginDiv.classList.add("hidden");

    cover.classList.add("w-full", "top-96", "mt-80");
    cover.classList.remove("w-8/12", "to-left", "right-1/3");
    logo.classList.add("hidden");
    button.classList.add("hidden");
    toLogin.classList.remove("hidden");
}

function setDesktopLayout() {
    loginDiv.classList.add("w-4/12", "absolute");
    loginDiv.classList.remove("sm:w-4/12", "w-full", "relative");
    signupDiv.classList.remove("hidden");

    cover.classList.remove("w-full", "top-96", "mt-40");
    cover.classList.add("w-8/12");
    logo.classList.remove("hidden");
    button.classList.remove("hidden");
    toSignUp.classList.add("hidden");
}

function setDesktopSwappedLayout() {
    signupDiv.classList.add("w-4/12");
    signupDiv.classList.remove("sm:w-4/12", "w-full");
    loginDiv.classList.remove("hidden");

    cover.classList.remove("w-full", "top-96", "mt-80");
    cover.classList.add("w-8/12");
    logo.classList.remove("hidden");
    button.classList.remove("hidden");
    toLogin.classList.add("hidden");
}

function checkScreenSize() {
    const isBelow640 = window.matchMedia("(max-width: 640px)").matches;

    if (isBelow640 !== wasBelow640) {
        checkIfBelow();
        wasBelow640 = isBelow640;
    }
}

function handlePageLoad() {
    toSignUp.classList.add("hidden");
    toLogin.classList.add("hidden");
    setTimeout(() => {
        checkIfBelow();
        console.log("Page loaded");
    }, 100);
}

document.addEventListener("DOMContentLoaded", () => {
    handlePageLoad();
    registerRefresh();
});

window.addEventListener("resize", checkScreenSize);

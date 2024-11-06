document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById("auto-resize-textarea");
    const counter = document.getElementById("text-counter");
    const maxChars = 140;

    function showCounter(currentLength, maxChars) 
    {
        currentLength > 0 ? counter.classList.remove("hidden") : counter.classList.add("hidden");
        currentLength > maxChars ? counter.classList.add("text-rose-600") : counter.classList.remove("text-rose-600");
    }

    textarea.addEventListener("input", () => {
        const currentLength = textarea.value.length;
        showCounter(currentLength, maxChars);
        counter.textContent = `${currentLength}/${maxChars}`;

    });
});

document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.getElementById("auto-resize-textarea");

    function autoResize() {
        this.style.height = "auto";
        this.style.height = this.scrollHeight + "px";
    }

    textarea.addEventListener("input", autoResize);
});

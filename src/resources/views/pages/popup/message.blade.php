@if (session('success'))
    <div id="successMessage"
        class="fixed bottom-10 z-50 -right-20 transform -translate-x-1/2 bg-green-500 text-white px-6 py-4 rounded shadow-md transition-opacity duration-500 opacity-0">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="errorMessage"
        class="fixed bottom-10 z-50 -right-20 transform -translate-x-1/2 bg-rose-400 text-white px-6 py-4 rounded shadow-md transition-opacity duration-500 opacity-0">
        {{ session('error') }}
    </div>
@endif

@if (session('delete'))
    <div id="successMessage"
        class="fixed bottom-10 z-50 -right-20 transform -translate-x-1/2 bg-rose-400 text-white px-6 py-4 rounded shadow-md transition-opacity duration-500 opacity-0">
        {{ session('delete') }}
    </div>
@endif

<style>
    @keyframes fadeMessage {
        0% {
            opacity: 1;
        }

        80% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    .fade-message {
        animation: fadeMessage 3s forwards;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const successMessage = document.getElementById("successMessage");
        const errorMessage = document.getElementById("errorMessage");

        successMessage.classList.add("fade-message");
        setTimeout(() => {
            successMessage.style.display = "none";
            errorMessage.style.display = "none";
        }, 3000);
    });
</script>

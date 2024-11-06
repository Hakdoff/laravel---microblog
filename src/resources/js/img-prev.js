document.getElementById('image-upload').addEventListener('change', function (event) {
    const imagePreviewContainer = document.getElementById('image-preview-container');
    imagePreviewContainer.innerHTML = '';

    for (const file of event.target.files) {
        if (file.type.match('image.*')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgContainer = document.createElement('div');
                imgContainer.classList.add('relative', 'inline-block', 'mr-2', 'mb-2');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('w-32', 'h-32', 'object-cover');
                imgContainer.appendChild(img);

                const exitButton = document.createElement('button');
                exitButton.innerHTML = '&times;';
                exitButton.classList.add('absolute', 'top-0', '-right-8', 'bg-mygray', 'text-white', 'rounded-full', 'w-6', 'h-6', 'flex', 'items-center', 'justify-center', 'text-sm', 'font-bold', 'cursor-pointer');
                exitButton.onclick = function() {
                    imgContainer.remove();

                hideContainer();

                };
                imgContainer.appendChild(exitButton);

                imagePreviewContainer.appendChild(imgContainer);
            };
            reader.readAsDataURL(file);
        }
    }
    imagePreviewContainer.classList.remove('hidden');
});

function hideContainer(){
    if (imagePreviewContainer.childNodes.length === 0) {
        imagePreviewContainer.classList.add('hidden');
        document.getElementById('image-upload').value = '';
    }
}

document.getElementById('image-upload').addEventListener('click', function () {
    if (this.value === '') {
        const imagePreviewContainer = document.getElementById('image-preview-container');
        imagePreviewContainer.classList.add('hidden');
    }
});

(function () {
    const fileUpload = document.querySelector('.file-upload');
    const userImage = document.querySelector('.user__img');

    if (!fileUpload || !userImage) return;

    fileUpload.oninput = function (e) {
        const file = this.files[0];
        const reader = new FileReader();

        reader.onload = function () {
            if (userImage.getAttribute('hidden') !== null) userImage.removeAttribute('hidden')

            fileUpload.hidden = false;
            userImage.src = this.result;
        };

        reader.readAsDataURL(file);
    };
})();

(function() {

})();
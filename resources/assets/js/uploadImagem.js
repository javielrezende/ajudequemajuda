function previewFile() {
    let preview = document.getElementById('imagem_preview');
    let file = document.getElementById('imagem').files[0];
    let reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}
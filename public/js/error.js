
function loadDefaultImg() {
    var imgArray = document.querySelectorAll('img')
    for (var i = 0; i < imgArray.length; ++i) {
        var img = imgArray[i];
        img.addEventListener('error', function () {
            this.src = '../images/produit/no_image.jpg'
        }.bind(img))
    }
}

document.addEventListener('DOMContentLoaded', function () {
    loadDefaultImg()
})
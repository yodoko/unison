function loadDefaultImg(noImage) {
    var imgArray = document.querySelectorAll('img')
    for (var i = 0; i < imgArray.length; ++i) {
        var img = imgArray[i];
        img.addEventListener('error', function () {
            this.src = noImage
        }.bind(img))
    }
}
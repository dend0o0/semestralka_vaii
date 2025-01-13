console.log("lalala");
document.querySelectorAll('.galleryImage').forEach(image => {
    image.addEventListener('click', () => {
        console.log("clicked");
        const imageId = image.closest('.imageContainer').id.split('-')[1];
        console.log(imageId);
        const fullscreen = document.getElementById(`fullscreen-${imageId}`);
        console.log(fullscreen);
        console.log(fullscreen.style.display);
        fullscreen.style.display = 'flex';
    });
});

document.querySelectorAll('.fullscreen').forEach(fullscreen => {
    fullscreen.addEventListener('click', () => {
        fullscreen.style.display = 'none';
    });
});

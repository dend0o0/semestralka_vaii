console.log("lalala");
document.querySelectorAll('.galleryImage').forEach(image => {
    image.addEventListener('click', () => {
        const imageId = image.closest('.imageContainer').id.split('-')[1];
        console.log(imageId);
        const fullscreen = document.getElementById(`fullscreen-${imageId}`);
        console.log(fullscreen);
        console.log(fullscreen.style.display);
        fullscreen.style.display = 'flex'; // Zobrazí obrázok v fullscreen
    });
});

document.querySelectorAll('.fullscreen').forEach(fullscreen => {
    fullscreen.addEventListener('click', () => {
        fullscreen.style.display = 'none';
    });
});

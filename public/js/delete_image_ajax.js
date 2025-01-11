$(document).ready(function () {


    $('#articleGalleryContainer').on('submit', '.deleteImageForm', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let form = $(this);
        let url = form.attr('action');
        let imageContainer = form.closest('.imageContainer');

        if (confirm('Naozaj chcete odstrániť tento obrázok?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function (response) {
                    imageContainer.remove();
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    alert('Vyskytla sa chyba pri odstraňovaní obrázka.');
                }
            });
        }
    });
});

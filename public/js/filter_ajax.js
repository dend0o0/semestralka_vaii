$(document).ready(function () {
    $('#kategoria').on('change', function () {
        const selectedCategory = $(this).val();
        if (selectedCategory) {
            loadFilteredData(`/list/${selectedCategory}`);
        }
    });

    function loadFilteredData(url) {
        $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                $('#list-content').html(response);
            },
            error: function () {
                alert('Chyba pri načítavaní dát.');
            }
        });
    }
});

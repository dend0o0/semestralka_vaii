 $(document).ready(function() {
    $('#commentForm').on('submit', function(event) {
        event.preventDefault();

        let formData = {
            obsah: $('#commentObsah').val()
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            url: '/clanok/1/comment',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function(response) {
                $('#commentsList').append(`
                        <div class="comment">
                            <p>${response.user}</p>
                            <p>${response.created_at}</p>
                            <p>${response.obsah}</p>
                        </div>
                    `);

                $('#commentObsah').val('');
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert('Nastala chyba pri odosielaní komentára.');
            }
        });
    });
});


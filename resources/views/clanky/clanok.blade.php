
<x-layout>
    <div id="clanok-header">
        <h2>{{ $rastlina->nazov }} </h2>
        <a href="{{ $rastlina->id }}/upravit">Upraviť</a>
    </div>


    <p><strong>Latinský názov: </strong>{{ $rastlina->lat_nazov }}</p>
    <p><strong>Kategória: </strong> {{ $rastlina->category->name_category }}</p>
    <p><strong>Vhodná teplota: </strong>{{ $rastlina->min_teplota }}°C až {{ $rastlina->max_teplota }}°C</p>

    <p>{{ $rastlina->obsah }}</p>

    <section id="articleGallery">
        <h2>Galéria</h2>
        <div id="articleGalleryContainer">
            <img src="{{ asset('storage/' . $rastlina->obrazok) }}" alt="Titulný obrázok">
            @foreach($images as $image)
                <div class="imageContainer" id="image-{{ $image->id }}">
                    <img class="galleryImage" src="{{ asset('storage/' . $image->img) }}" alt="{{ $image->description }}">
                    <div class="fullscreen" id="fullscreen-{{ $image->id }}">
                        <img src="{{ asset('storage/' . $image->img) }}" alt="{{ $image->description }}">
                        <p>{{ $image->name }} - {{ $image->description }}</p>
                        <form method="POST" class="deleteImageForm" action="/clanok/{{ $rastlina->id }}/upload/{{ $image->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Odstrániť</button>
                        </form>
                        <p><a href="/clanok/{{ $rastlina->id }}/{{ $image->id }}/upravit">Upraviť</a></p>
                    </div>

                </div>
            @endforeach
        </div>
    </section>
    <section id="articleComments">
        <h2>Komentáre</h2>
        <div id="commentsList">
        @foreach($comments as $comment)
            <div class="comment">
                <p>{{ $comment->user->name }}</p>
                <p>{{ $comment->created_at }}</p>
                <p>{{ $comment->obsah }}</p>
            </div>

        @endforeach
        </div>
        @auth
        <form id="commentForm" method="post" action="{{ url('/clanok/' . $rastlina->id . '/comment') }}">
            @csrf
            <textarea id="commentObsah" name="obsah" placeholder="Váš komentár..."></textarea><br>
            <input type="submit">
        </form>
        @endauth
    </section>
    <script src="{{ asset('js/comments_ajax.js') }}"></script>
    <script src="{{ asset('js/delete_image_ajax.js') }}"></script>
    <script src="{{ asset('js/image_fullscreen.js') }}"></script>
</x-layout>

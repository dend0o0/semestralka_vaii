
<x-layout>
    <div id="clanok-header">
        <h2>{{ $rastlina->nazov }} </h2>
        @auth
            @if($rastlina->user->id == Auth::id())
                <a href="/clanok/{{ $rastlina->id }}/upravit">[Upraviť článok]</a>
            @endif
        @endauth
    </div>

    <p>Vytvorené používateľom <strong>{{ $rastlina->user->name }}</strong></p>
    <p><strong>Latinský názov: </strong>{{ $rastlina->lat_nazov }}</p>
    <p><strong>Kategória: </strong> {{ $rastlina->category->name_category }}</p>
    <p><strong>Vhodná teplota: </strong>{{ $rastlina->min_teplota }}°C až {{ $rastlina->max_teplota }}°C</p>

    <p>{{ $rastlina->obsah }}</p>

    <section id="articleGallery">
        <h2>Galéria</h2>
        <div id="articleGalleryContainer">
            <div class="imageContainer" id="image-{{ $rastlina->obrazok }}">
            <img class="galleryImage" src="{{ asset('storage/' . $rastlina->obrazok) }}" alt="Titulný obrázok">
            <div class="fullscreen" id="fullscreen-{{ $rastlina->obrazok }}">
                <img src="{{ asset('storage/' . $rastlina->obrazok) }}" alt="Titulný obrázok">
                <p>Titulný obrázok</p>
            </div>
            </div>
            @foreach($images as $image)
                <div class="imageContainer" id="image-{{ $image->id }}">
                    <img class="galleryImage" src="{{ asset('storage/' . $image->img) }}" alt="{{ $image->description }}">
                    <div class="fullscreen" id="fullscreen-{{ $image->id }}">
                        <img src="{{ asset('storage/' . $image->img) }}" alt="{{ $image->description }}">
                        <p>{{ $image->name }} - {{ $image->description }}</p>
                        @auth
                            @if(Auth::id() == $rastlina->user->id)
                                <div id="fullscreenButtonContainer">
                                    <form method="POST" class="deleteImageForm" action="/clanok/{{ $rastlina->id }}/upload/{{ $image->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Odstrániť</button>
                                    </form>
                                    <form method="GET" action="/clanok/{{ $rastlina->id }}/{{ $image->id }}/upravit">
                                        <button type="submit">Upraviť</button>
                                    </form>
                                </div>
                            @endif
                        @endauth

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
                <p><strong>{{ $comment->user->name }}</strong> [{{ $comment->created_at }}]</p>
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
    <script src="{{ asset('js/validation_comments.js') }}"></script>
</x-layout>

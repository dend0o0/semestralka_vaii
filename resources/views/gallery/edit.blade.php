<x-layout>

    <h2>Upraviť informácie o obrázku</h2>
    @if($errors->any())
        @foreach($errors->all() as $err)
            <p>{{ $err }}</p>
        @endforeach
        <p>Údaje nie sú správne vyplnené</p>
    @endif
    <div id="errorForm"></div>
    <form id="edit-create-form" method="post" action="{{ '/clanok/' . $rastlina->id . '/' . $image->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label>Názov obrázku:<br></label>
        <input type="text" name="nazov" value="{{ $image->name }}"><br>
        <br>
        <label>Popis obrázku:</label><br>
        <textarea name="popis" id="obsahClanku" placeholder="Váš popis obrázku...">{{ $image->description }}</textarea><br>




        <input type="submit">
    </form>
    <script src="{{ asset('js/validation_gallery.js') }}"></script>
</x-layout>

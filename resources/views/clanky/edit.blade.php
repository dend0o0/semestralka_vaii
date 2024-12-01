<x-layout>
    <h2>Upraviť článok</h2>
    @if($errors->any())
        <p>Údaje nie sú správne vyplnené</p>
    @endif
    <form method="POST" action="/clanok/{{ $rastlina->id }}">
        @csrf
        @method('DELETE')
        <button>Odstrániť</button>
    </form>
    <form method="post" action="/clanok/{{ $rastlina->id }}">
        @csrf
        @method('PATCH')
        <label>Názov kvetu:<br></label>
        <input
            type="text"
            name="nazovClanku"
            value="{{ $rastlina->nazov }}"><br>
        @error('nazov')
        <p>{{ 'Chybne vyplnené' }}</p>
        @enderror
        <label>Latinský názov:<br></label>
        <input type="text" name="nazovLat" value="{{ $rastlina->lat_nazov }}">
        <br>


        <label>Obsah článku:</label><br>
        <textarea name="obsahClanku" id="obsahClanku">{{ $rastlina->obsah }}</textarea><br>


        <select id="kategoria" name="kategoria">
            @foreach($kategorie as $cat)
                <option value="{{ $cat->id }}" @if($rastlina->category->id == $cat->id) {{ "selected" }} @endif>{{ $cat->name_category }}</option>
            @endforeach

        </select><br>
        <br>
        <label>Minimálna teplota:</label>
        <input type="number" name="minTeplota" value="{{ $rastlina->min_teplota }}">
        <label>Maximálna teplota</label>
        <input type="number" name="maxTeplota" value="{{ $rastlina->max_teplota }}">
        <br>
        <input type="submit">
    </form>
</x-layout>

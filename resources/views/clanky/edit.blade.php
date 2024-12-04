<x-layout>
    <h2>Upraviť článok</h2>
    @if($errors->any())
        <p>Údaje nie sú správne vyplnené</p>
    @endif
    <div id="errorForm"></div>
    <form id="edit-create-form" method="post" action="/clanok/{{ $rastlina->id }}">
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
        <div id="form-teplota-wrapper">
            <label for="minTeplota">Minimálna teplota:
                <input type="number" name="minTeplota" value="{{ $rastlina->min_teplota }}">
            </label>
            <label for="maxTeplota">Maximálna teplota:
                <input type="number" name="maxTeplota" value="{{ $rastlina->max_teplota }}">
            </label>
        </div><br>
        <input type="checkbox" id="kvitnuca-checkbox" name="kvitnuca" value="1" {{ $rastlina->kvitnuca == 1 ? 'checked' : '' }}>
        <label for="kvitnuca-checkbox">Je rastlina kvitnúca?</label><br><br>
        <br>
        <input type="submit">
    </form>
    <h3>Odstrániť článok</h3>
    <p>Pozor! Táto akcia je nenávratná!</p>
    <form method="POST" action="/clanok/{{ $rastlina->id }}">
        @csrf
        @method('DELETE')
        <button class="button-delete">Odstrániť</button>
    </form>
    <script src="{{ asset('js/validation.js') }}"></script>
</x-layout>

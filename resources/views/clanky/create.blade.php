<x-layout>

    <h2>Vytvoriť nový článok</h2>
    @if($errors->any())
        @foreach($errors->all() as $err)
            <p>{{ $err }}</p>
        @endforeach
        <p>Údaje nie sú správne vyplnené</p>
    @endif
    <div id="errorForm"></div>
    <form id="edit-create-form" method="post" action="/clanky" enctype="multipart/form-data">
    @csrf

        <label>Názov rastliny:<br></label>
        <input type="text" name="nazovClanku"><br>

        <label>Latinský názov:<br></label>
        <input type="text" name="nazovLat"><br>

        <select id="kategoria" name="kategoria">
            @foreach($kategorie as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name_category }}</option>
            @endforeach

        </select><br>
        <div id="form-teplota-wrapper">
            <label for="minTeplota">Minimálna teplota:
            <input type="number" name="minTeplota">
            </label>
            <label for="maxTeplota">Maximálna teplota:
            <input type="number" name="maxTeplota">
            </label>
        </div>
        <input type="file" name="image">
        <br>
        <label>Obsah článku:</label><br>
        <textarea name="obsahClanku" id="obsahClanku" placeholder="Vaše poznatky k rastline..."></textarea><br>




        <input type="submit">
    </form>
    <script src="{{ asset('js/validation.js') }}"></script>
</x-layout>

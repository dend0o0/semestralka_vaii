<x-layout>
    <h2>Zoznam všetkých rastlín</h2>
    <p>Zoznam všetkých rastlín v našej databáze. Rastliny je možné vyhľadávať taktiež podľa druhu.</p>
    <form action="/list" method="get" id="list-filter">
        <select id="kategoria" name="kategoria">
        @foreach($kategoria as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name_category }}</option>
        @endforeach
        </select>
    </form>
    <table id="full-list">
        <thead>
        <tr>
            <th id="table-img">Obrázok</th>
            <th id="table-name">Názov</th>
            <th id="table-cat">Kategória</th>
            <th id="table-link">Odkaz</th>
        </tr>
        </thead>
        <tbody id="list-content">
        @include('list.table-content')
        </tbody>
    </table>

    <script src="{{ asset('js/filter_ajax.js') }}"></script>

</x-layout>

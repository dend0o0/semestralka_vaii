<x-layout>
    <h2>Zoznam všetkých rastlín</h2>
    <p>Zoznam všetkých rastlín v našej databáze. Rastliny je možné vyhľadávať taktiež pomocou textového hľadania alebo podľa druhu.</p>

    <table id="full-list">
        <tr>
            <th id="table-img">Obrázok</th>
            <th id="table-name">Názov</th>
            <th id="table-cat">Kategória</th>
            <th id="table-link">Odkaz</th>
        </tr>
        @foreach($rastliny as $rastlina)
            <tr>
                <td><img src="img/{{ $rastlina['obrazok'] }}" alt="Zelenec chocholatý"></td>
                <td>{{ $rastlina['nazov'] }}</td>

                <td>{{ $rastlina->category->name_category }}</td>

                <td>
                    <a href="/clanok/{{ $rastlina['id'] }}" class="main-link-button">Zobraziť</a>
                    <a href="/clanok/{{ $rastlina['id'] }}/upravit" class="main-link-button">Upraviť</a>
                </td>
            </tr>
        @endforeach

    </table>
    <div>
        {{ $rastliny->links() }}
    </div>
</x-layout>

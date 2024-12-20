
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
        </div>
    </section>
    <section id="articleComments">
        <h2>Komentáre</h2>
        <p>Aktuálne žiadne komentáre</p>
    </section>
</x-layout>

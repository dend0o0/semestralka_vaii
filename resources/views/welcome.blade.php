<x-layout>
    <h1>Vitajte v databáze zelených rastlín!!!</h1>
    <p>Na tejto stránke je možné nájsť základné informácie o rôznych zelených rastlinách rozdelených do kategórií. Do tejto databázy môže prispievať každý registrovaný užívateľ. </p>
    <a href="#" class="main-link-button">Prejsť na zoznam rastlín</a>
    <h1>Posledne pridané články</h1>

    <section id="articles">
        @foreach($rastliny as $rastlina)
            <article>
                <img src="{{ asset('storage/' . $rastlina->obrazok) }}" alt="{{ $rastlina->nazov }}">
                <h2>{{ $rastlina->nazov }}</h2>
                <a href="clanok/{{ $rastlina->id }}" class="main-link-button">Zobraziť viac</a>
            </article>
        @endforeach
    </section>
</x-layout>

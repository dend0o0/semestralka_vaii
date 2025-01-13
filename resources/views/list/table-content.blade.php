@foreach($rastliny as $rastlina)
    <tr>
        <td><img src="{{ asset('storage/' . $rastlina->obrazok) }}" alt="Titulná fotka"></td>
        <td>{{ $rastlina->nazov }}</td>
        <td>{{ $rastlina->category->name_category }}</td>
        <td>
            <a href="/clanok/{{ $rastlina->id }}" class="main-link-button">Zobraziť</a>
            @auth
                @if($rastlina->user->id == Auth::id())
                    <a href="/clanok/{{ $rastlina->id }}/upravit" class="main-link-button">Upraviť</a>
                @endif
            @endauth
        </td>
    </tr>
@endforeach

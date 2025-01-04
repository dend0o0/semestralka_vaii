<x-layout>
    <h2>Registrácia užívateľa</h2>
    @if($errors->any())
        @foreach($errors->all() as $err)
            <p>{{ $err }}</p>
        @endforeach
        <p>Údaje nie sú správne vyplnené</p>
    @endif
    <form method="post" action="/register">
    @csrf
        <label>
            Meno:<br>
            <input type="text" name="name"><br>
        </label>
        <label>
            E-mailová adresa:<br>
            <input type="email" name="email">
        </label><br>
        <label>
            Heslo:<br>
            <input type="password" name="password">
        </label><br>
        <label>
            Zopakované heslo:<br>
            <input type="password" name="password_confirmation">
        </label><br>
        <input type="submit">


    </form>
    <p>Po prihlásení je možné prispievať do zoznamu rastlín a taktiež mazať a upravovať ostatné príspevky. Účet je možné vytvoriť na vyžiadanie od administrátora stránky.</p>
</x-layout>

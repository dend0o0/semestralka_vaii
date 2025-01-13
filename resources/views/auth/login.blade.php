<x-layout>
    <h2>Prihlásenie užívateľa</h2>

    <form method="post" action="/login" id="login-form">
        <div id="errorForm">
            @foreach($errors->all() as $err)
                <p>{{ $err }}</p>
            @endforeach
        </div><br>


        @csrf

        <label>
            E-mailová adresa:<br>
            <input type="email" name="email"><br>
        </label>
        <label>
            Heslo:<br>
            <input type="password" name="password">
        </label><br>
        <input type="submit">

    </form>
    <p>Po prihlásení je možné prispievať do zoznamu rastlín a taktiež mazať a upravovať ostatné príspevky. Účet je možné vytvoriť kliknutím na <a href="/register">tento odkaz</a>.</p>
    <script src="{{ asset('js/validation_login.js') }}"></script>
</x-layout>

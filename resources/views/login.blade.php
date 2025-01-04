<x-layout>
    <h2>Prihlásenie užívateľa</h2>
    <form method="post" action="/login">
        @csrf

        <label>
            Prihlasovacie meno:<br>
            <input type="email" name="email"><br>
        </label>
        <label>
            Heslo:<br>
            <input type="password" name="password">
        </label><br>
        <input type="submit">

    </form>
    <p>Po prihlásení je možné prispievať do zoznamu rastlín a taktiež mazať a upravovať ostatné príspevky. Účet je možné vytvoriť na vyžiadanie od administrátora stránky.</p>
</x-layout>

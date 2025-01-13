<h1>Inštalácia</h1>

<h2>Inštalácia Laravel aplikácie</h2>

<ol>
    <li>Nainštalujte závislosti:
        <pre><code>composer install</code></pre>
    </li>
</ol>

<h2>Nastavenie prostredia</h2>
<ol>
    <li>Nastavte konfiguráciu databázy v súbore <code>.env</code>:
        <pre><code>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nazov_databazy
DB_USERNAME=uzivatel
DB_PASSWORD=heslo
        </code></pre>
    </li>
</ol>

<h2>Migrácie databázy</h2>
<pre><code>php artisan migrate
php artisan db:seed</code></pre>

<h2>Inštalácia a kompiláca Less</h2>
<pre><code>
npm install
npm run dev
lessc resources/css/style.less public/css/css.css
</code></pre>

<h2>Spustenie lokálneho servera</h2>
<pre><code>php artisan serve</code></pre>
<p>Aplikácia bude dostupná na <a href="http://127.0.0.1:8000">http://127.0.0.1:8000</a>.</p>

<header>
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">
                <img src="/img/logo.png" alt="logo" class="logo">
            </a>
            <a href="/login">
                <sl-avatar
                    initials="{{$user??''}}"
                    class="right hide-on-med-and-down"
                    label="User avatar">
                </sl-avatar>
            </a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Pradžia</a></li>
                <li><a href="/persons">Persons</a></li>
                <li><a href="/addresss">Adresai</a></li>
                <li><a href="/users">Vartotojai</a></li>
                <li><a href="/kontaktai">Kontaktai</a></li>
            </ul>

        </div>
    </nav>
</header>

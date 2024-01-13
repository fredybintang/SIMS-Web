<section>
    <nav class="h-100">
        <div class="sidebar d-flex flex-column flex-shrink-0 h-100">
            <a href="/product" class="d-flex align-items-center justify-content-center text-white fw-bold mb-5 mt-4 text-decoration-none w-100">
                <img src="{{ asset('assets/Handbag.png') }}" alt="logo" width="25px">
                <span class="fs-5 ms-2">SIMS Web App</span>
            </a>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="/product" class="nav-link active text-white">
                        <img src="{{ asset('assets/Package.png') }}" alt="Produk">
                        <span class="ms-1" id="menu-item">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="/profile" class="nav-link text-white">
                        <img src="{{ asset('assets/User.png') }}" alt="Profil">
                        <span class="ms-1" id="menu-item">Profil</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="nav-link text-white">
                        @csrf
                        <img src="{{ asset('assets/SignOut.png') }}" alt="Logout">
                        <button type="submit" class="text-white bg-transparent border-0">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</section>

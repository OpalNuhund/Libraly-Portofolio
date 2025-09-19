<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Catredal Libraly | @yield('title')</title>
        <link rel="shortcut icon" href="/img/cardinalLibraryIcon.png" type="image/x-icon">
        <link rel="stylesheet" href="/css/websiteStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <body>
        <header>
            <nav>
            <a href="/perpustakaan" class="{{ Request::is('perpustakaan') ? 'active' : '' }}">Beranda</a>
            <a href="/perpustakaan/list-buku" class="{{ Request::is('perpustakaan/list-buku') ? 'active' : '' }}">Koleksi Buku</a>
            <a href="/perpustakaan/tentang-kami" class="{{ Request::is('perpustakaan/tentang-kami') ? 'active' : '' }}">Tentang</a>
            <a href="/perpustakaan/kontak" class="{{ Request::is('perpustakaan/kontak') ? 'active' : '' }}">Kontak</a>
            </nav>
        </header>
        @yield('content')

        <footer>
            <div class="footer-container">
                <div class="footer-section">
                    <h3>Tentang Kami</h3>
                    <p>Catredal Libraly adalah perpustakaan digital modern yang menyediakan berbagai koleksi buku dari seluruh dunia manusia maupun underworld.</p>
                </div>

                <div class="footer-section">
                    <h3>Link Cepat</h3>
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="/perpustakaan/list-buku">Koleksi Buku</a></li>
                        <li><a href="/perpustakaan/artikel">Artikel</a></li>
                        <li><a href="/perpustakaan/tentang-kami">Tentang Kami</a></li>
                        <li><a href="/perpustakaan/kontak">Kontak</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Kontak Kami</h3>
                    <ul>
                        <li>Jl. Central Catredal No. 123, UnderWorld</li>
                        <li>Quinella@Catredal.com</li>
                        <li>+62 123 4567 890</li>
                    </ul>

                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Newsletter</h3>
                    <p>Berlangganan untuk mendapatkan update terbaru dari kami.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Alamat Email Anda">
                        <button type="submit">Berlangganan</button>
                    </form>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 Catredal Libraly. Semua hak cipta dilindungi. | <a href="#">Kebijakan Privasi</a> | <a href="/login-dashboard">Login -></a></p>
            </div>
        </footer>
    </body>
</html>


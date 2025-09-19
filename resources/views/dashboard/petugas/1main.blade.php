<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <title>Catredal Libraly | Dashboard Petugas @yield('page-title')</title>
      <link rel="stylesheet" href="{{ asset('css/dashobardStyle.css') }}">
      <link rel="shortcut icon" href="{{ asset('img/cardinalLibraryIcon.png') }}" type="image/x-icon">
   </head>
   <body>
      <div class="container" role="main">
          <nav class="sidebar" aria-label="Primary Navigation">
             <div class="sidebar-header">CrLby</div>
            <div class="nav-icons" role="navigation" aria-label="Sidebar Navigation">
               <a href="petugasn/dashboard-petugas" class="{{ Request::is('petugas/dashboard-petugas') ? 'activeSideBar' : '' }}" id="data" data-page="dashboard" title="Dashboard" aria-label="Dashboard">
                     📊
               </a>
               <a href="/petugas/dashboard-petugas-kategori" class="{{ Request::is(['petugas/dashboard-petugas-kategori', 'petugas/dashboard-petugas-kategori/edit-kategori-*', 'petugas/dashboard-petugas-kategori/add-kategori']) ? 'activeSideBar' : '' }}" data-page="categories" title="Kategori" aria-label="Kategori">
                  📂
               </a>
               <a href="/petugas/dashboard-petugas-buku" class="{{ Request::is(['petu gas/dashboard-petugas-buku', 'petugas/dashboard-petugas-buku/edit-buku-*', 'petugas/dashboard-petugas-buku/add-buku']) ? 'activeSideBar' : '' }}" id="books" data-page="books" title="Buku" aria-label="Books">
                     📚
               </a>
               <a href="/petugas/dashboard-petugas-siswa" class="{{ Request::is(['petugas/dashboard-petugas-siswa', 'petugas/dashboard-petugas-siswa/edit-siswa-*', 'petugas/dashboard-petugas-siswa/add-siswa']) ? 'activeSideBar' : '' }}" data-page="members" title="Siswa" aria-label="Members">
                  👥
               </a>
               <a href="/petugas/dashboard-petugas-logpeminjaman" class="{{ Request::is('petugas/dashboard-petugas-logpeminjaman') ? 'activeSideBar' : '' }}" data-page="log" title="Log Peminjaman" aria-label="Log Peminjaman">
                     📜
               </a>
            </div>
            <div class="sidebar-footer">CardinalLibraly</div>
         </nav>

         <section class="main-content" tabindex="0" aria-live="polite">
            <header class="header">
               <h1 id="page-title">@yield('page-title')</h1>
               <div class="header-right">
                  <div class="user-info-horizontal">
                     <img src="{{ asset('img/petugas.png') }}" alt="User Photo" class="user-photo">
                     <div class="text-info">
                        <div class="username">{{ Auth::user()->username ?? 'Guest' }}</div>
                        <div class="email">{{ Auth::user()->email ?? 'email@example.com' }}</div>
                     </div>
                     <a href="/petugas/dashboard-petugas-settings" class="btn-setting">⚙️</a>
                  </div>
               <div class="btn-users">
                  <a href="/logout"><button class="btn">Logout</button></a>
                  <a href="/perpustakaan"><button class="btn">Branda</button></a>
               </div>
            </header>
            <section class="page active" id="dashboard" role="region" aria-labelledby="dashboard-title">
               @yield('content')
            </section>
         </section>
      </div>

      <script src="{{ asset('js/dashboardScript.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   </body>
</html>

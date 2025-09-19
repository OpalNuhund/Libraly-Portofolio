<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <title>Catredal Libraly | Dashboard Admin @yield('page-title')</title>
      <link rel="stylesheet" href="{{ asset('css/dashobardStyle.css') }}">
      <link rel="shortcut icon" href="{{ asset('img/cardinalLibraryIcon.png') }}" type="image/x-icon">
   </head>
   <body>
      <div class="container" role="main">
          <nav class="sidebar" aria-label="Primary Navigation">
             <div class="sidebar-header">CrLby</div>
            <div class="nav-icons" role="navigation" aria-label="Sidebar Navigation">
               <a href="/admin/dashboard-admin" class="{{ Request::is('admin/dashboard-admin') ? 'activeSideBar' : '' }}" id="data" data-page="dashboard" title="Dashboard" aria-label="Dashboard">
                     📊
               </a>
               <a href="/admin/dashboard-admin-kategori" class="{{ Request::is(['admin/dashboard-admin-kategori', 'admin/dashboard-admin-kategori/edit-kategori-*', 'admin/dashboard-admin-kategori/add-kategori']) ? 'activeSideBar' : '' }}" data-page="categories" title="Kategori" aria-label="Kategori">
                  📂
               </a>
               <a href="/admin/dashboard-admin-buku" class="{{ Request::is(['admin/dashboard-admin-buku', 'admin/dashboard-admin-buku/edit-buku-*', 'admin/dashboard-admin-buku/add-buku']) ? 'activeSideBar' : '' }}" id="books" data-page="books" title="Buku" aria-label="Books">
                     📚
               </a>
               <a href="/admin/dashboard-admin-siswa" class="{{ Request::is(['admin/dashboard-admin-siswa', 'admin/dashboard-admin-siswa/edit-siswa-*', 'admin/dashboard-admin-siswa/add-siswa']) ? 'activeSideBar' : '' }}" data-page="members" title="Siswa" aria-label="Members">
                  👥
               </a>
               <a href="/admin/dashboard-admin-petugas" class="{{ Request::is(['admin/dashboard-admin-petugas', 'admin/dashboard-admin-petugas/edit-petugas-*', 'admin/dashboard-admin-petugas/add-petugas']) ? 'activeSideBar' : '' }}" title='Petugas' aria-label="Manage staff" data-page="staff">
                  👨‍💼
               </a>
               <a href="/admin/dashboard-admin-logpeminjaman" class="{{ Request::is('admin/dashboard-admin-logpeminjaman') ? 'activeSideBar' : '' }}" data-page="log" title="Log Peminjaman" aria-label="Log Peminjaman">
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
                     <img src="{{ asset('img/admin.png') }}" alt="User Photo" class="user-photo">
                     <div class="text-info">
                        <div class="username">{{ Auth::user()->username ?? 'Guest' }}</div>
                        <div class="email">{{ Auth::user()->email ?? 'email@example.com' }}</div>
                     </div>
                     <a href="/admin/dashboard-admin-settings" class="btn-setting">⚙️</a>
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

<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
      <a href="index.html">{{ config('app.name') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">{{ substr(config('app.name'), 0, 2) }}</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item dropdown{{ request()->is('dashboard') ? ' active' : '' }}">
        <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Halaman</li>
      <ul class="sidebar-menu">
              <li class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}"><a class="nav-link" 
              href="{{ route('kategori.index') }}"><i class="fas fa-th-large"></i><span>Kategori</span></a>
              </li>
              <li class="{{ request()->routeIs('admin.data-pengguna*') ? 'active' : '' }}"><a class="nav-link" 
              href="{{ route('admin.data-pengguna') }}"><i class="fas fa-users"></i> <span>Data Pengguna</span></a>
              </li>
              <li class="{{ request()->routeIs('nasabah.*') ? 'active' : '' }}"><a class="nav-link" 
              href="{{ route('nasabah.index') }}"><i class="fas fa-users-cog"></i> <span>Data Nasabah</span></a>
              </li>
              <li class="{{ request()->routeIs('data-sampah.*') ? 'active' : '' }}"><a class="nav-link" 
              href="{{ route('data-sampah.index') }}"><i class="fas fa-boxes"></i> <span>Data Sampah</span></a>
              </li>
              <li class="{{ request()->routeIs('admin.data_penarikan.*') ? 'active' : '' }}"><a class="nav-link" 
              href="{{ route('admin.data_penarikan.index') }}"><i class="fas fa-money-bill"></i> <span>Data Penarikan</span></a>
              </li>
              <li class="{{ request()->routeIs('setoran.*') ? 'active' : '' }}"><a class="nav-link" 
              href="{{ route('setoran.index') }}"><i class="fas fa-wallet"></i> <span>Setoran</span></a>
              </li>
              <!-- Tambahkan Tabungan di sini -->
              <li class="{{ request()->routeIs('admin.tabungan.*') ? 'active' : '' }}"><a class="nav-link" 
              href="{{ route('admin.tabungan.index') }}"><i class="fas fa-piggy-bank"></i> <span>Tabungan</span></a>
              </li>
          </ul>
  </ul>
</aside>

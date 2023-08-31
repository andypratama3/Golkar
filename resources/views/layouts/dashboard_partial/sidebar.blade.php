<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard.index') ? '' : 'collapsed' }}" href="{{ route('dashboard.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('dashboard.datamaster.tps.index') }}"  class="nav-link {{ Request::routeIs('datamaster.tps.*') ? 'collapsed' : '' }} ">
                <i class="bi bi-circle"></i><span>Tps</span>
              </a>
            <a href="{{ route('dashboard.datamaster.kecamatan.index') }}"  class="nav-link {{ Request::routeIs('datamaster.kecamatan.*') ? 'collapsed' : '' }} ">
                <i class="bi bi-circle"></i><span>Kecamatan</span>
            </a>
            <a href="{{ route('dashboard.datamaster.desa.index') }}"  class="nav-link {{ Request::routeIs('datamaster.desa.*') ? 'collapsed' : '' }} ">
                <i class="bi bi-circle"></i><span>Desa</span>
            </a>

            <a href="{{ route('dashboard.datamaster.tps.index') }}"  class="nav-link {{ Request::routeIs('datamaster.tps.*') ? 'collapsed' : '' }} ">
              <i class="bi bi-circle"></i><span>Dpt</span>
            </a>

          </li>
        </ul>
      </li>
      <!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard.data.*') ? '' : 'collapsed' }}" href="{{ route('dashboard.data.index') }}">
          <i class="bi bi-person"></i>
          <span>Data</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard.kordinator.kecamatan.*') ? '' : 'collapsed' }}" href="{{ route('dashboard.kordinator.kecamatan.index') }}">
          <i class="bi bi-person"></i>
          <span>Kordinator Kecamatan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard.peserta.*') ? '' : 'collapsed' }}" href="{{ route('dashboard.peserta.index') }}">
          <i class="bi bi-person"></i>
          <span>Kordinator Desa</span>
        </a>
    </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard.peserta.*') ? '' : 'collapsed' }}" href="{{ route('dashboard.peserta.index') }}">
          <i class="bi bi-person"></i>
          <span>Relawan Tps</span>
        </a>
      </li>
      <!-- End Profile Page Nav -->
    </ul>

  </aside>

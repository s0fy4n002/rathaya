<div class="nav-content d-flex">

          <div class="logo position-relative">{{-- Logo START --}}
            <a href="Dashboards.Default.html">
              {{-- Logo can be added directly --}}
              <img src="/th/be/img/logo/pg_logo_white.png" alt="PCBH | Pantau Gambut" />
              {{-- Or added via css to provide different ones for different color themes --}}
              <!-- <div class="img"></div> -->
            </a>
          </div>{{-- Logo END --}}
          {{-- Language Switch START --}}
          {{-- <div class="language-switch-container">
            <button class="btn btn-empty language-button dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</button>
            <div class="dropdown-menu">
              <a href="#" class="dropdown-item">DE</a>
              <a href="#" class="dropdown-item active">EN</a>
              <a href="#" class="dropdown-item">ES</a>
            </div>
          </div> --}}{{-- Language Switch END --}}

          <div class="user-container d-flex">{{-- User Menu START --}}
            <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="profile" alt="profile" src="/atr/{{ Auth::user()->avatar <> '' ? Auth::user()->avatar : 'empty.jpg' }}" />
              <div class="name">{{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end user-menu wide">
              <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                  <div class="text-extra-small text-primary">MENU</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="#">User Info</a>
                    </li>
                  </ul>
                </div>
                <div class="col-6 ps-1 pe-1">
                  <ul class="list-unstyled">
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">Logout</span>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
          </div>{{-- User Menu END --}}

          <ul class="list-unstyled list-inline text-center menu-icons">{{-- Icons Menu START --}}
            {{-- <li class="list-inline-item">
              <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
              </a>
            </li> --}}
            <li class="list-inline-item">
              <a href="#" id="pinButton" class="pin-button">
                <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
              </a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('frontpage') }}" >
                    <div class="position-relative d-inline-flex">
                        <i data-acorn-icon="content" data-acorn-size="18"></i>
                        <span class="position-absolute notification-dot rounded-xl"></span>
                    </div>
                </a>
            </li>
          </ul>{{-- Icons Menu END --}}

          {{-- Menu Bar START --}}
          <div class="menu-container flex-grow-1">
            <ul id="menu" class="menu">
              <li>
                <a href="/webadmin/dashboard" data-href="/dashboard"><i data-acorn-icon="home" class="icon" data-acorn-size="18"></i><span class="label">Dashboards</span></a>
              </li>
              <li>
                <a href="#frontpage" data-href="frontpage"><i data-acorn-icon="collapse" class="icon" data-acorn-size="18"></i><span class="label">Frontpage</span></a>
                <ul id="frontpage">
                  <li><a href="{{ route('sliders.index') }}" data-href="slider"><span class="label">Slider</span></a></li>
                  <li><a href="{{ route('frontpage.edit', 1) }}" data-href="frontpage"><span class="label">Content</span></a></li>
                  <li><a href="{{ route('howwework.index') }}" data-href="howwework"><span class="label">How We Work</span></a></li>
                </ul>
              </li>
              <li>
                <a href="{{ route('pics.index') }}" data-href="pics"><i data-acorn-icon="office" class="icon" data-acorn-size="18"></i><span class="label">Person In Charge</span></a>
              </li>
              <li>
                <a href="{{ route('firms.index') }}" data-href="firms"><i data-acorn-icon="building-large" class="icon" data-acorn-size="18"></i><span class="label">Businesses</span></a>
              </li>
              <li>
                <a href="{{ route('products.index') }}" data-href="products"><i data-acorn-icon="list" class="icon" data-acorn-size="18"></i><span class="label">Products</span></a>
              </li>
              <li>
                <a href="/webadmin/enablers" data-href="enablers"><i data-acorn-icon="badge" class="icon" data-acorn-size="18"></i><span class="label">Enablers</span></a>
              </li>
              <li>
                <a href="/webadmin/partners" data-href="partners"><i data-acorn-icon="sync-horizontal" class="icon" data-acorn-size="18"></i><span class="label">Partners</span></a>
              </li>
              <li>
                <a href="#blocks" data-href="users"><i data-acorn-icon="user" class="icon" data-acorn-size="18"></i><span class="label">Users Management</span></a>
                <ul id="blocks">
                  <li><a href="{{ route('users.index') }}" data-href="users/users"><span class="label">Users</span></a></li>
                  <li><a href="{{ route('roles.index') }}" data-href="roles"><span class="label">Roles</span></a></li>
                  <li><a href="{{ route('permissions.index') }}" data-href="permissions"><span class="label">Permissions</span></a></li>
                </ul>
              </li>
              <li class="mega">
                <a href="#interface" data-href="master"><i data-acorn-icon="wallet" class="icon" data-acorn-size="18"></i><span class="label">Master Tables</span></a>
                <ul id="interface">
                  <li>
                    <a href="#interfaceComponents" data-href="zone"><span class="label">Region</span></a>
                    <ul id="interfaceComponents">
                      <li>
                        <a href="{{ route('provinces.index') }}" data-href="provinces"><span class="label">Provinces</span></a>
                      </li>
                      <li>
                        <a href="{{ route('regencies.index') }}" data-href="regencies"><span class="label">Regencies</span></a>
                      </li>
                      <li>
                        <a href="{{ route('districts.index') }}" data-href="districts"><span class="label">Districts</span></a>
                      </li>
                      {{-- <li>
                        <a href="{{ route('villages.index') }}" data-href="villages"><span class="label">Villages</span></a>
                      </li> --}}
                    </ul>
                  </li>
                  <li>
                    <a href="#interfaceForms" data-href="app"><span class="label">Applications</span></a>
                    <ul id="interfaceForms">
                      <li>
                        <a href="{{ route('genders.index') }}" data-href="genders"><span class="label">Genders</span></a>
                      </li>
                      <li>
                        <a href="{{ route('bentities.index') }}" data-href="bentities"><span class="label">Business Entities</span></a>
                      </li>
                      <li>
                        <a href="{{ route('tovercats.index') }}" data-href="tovercats"><span class="label">Turnovers</span></a>
                      </li>
                      <li>
                        <a href="{{ route('invneeds.index') }}" data-href="invneeds"><span class="label">Investment Needs</span></a>
                      </li>
                      <li>
                        <a href="{{ route('commoditycats.index') }}" data-href="commoditycats"><span class="label">Commodities</span></a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i data-acorn-icon="logout" class="icon" data-acorn-size="18"></i><span class="label">Logout</span>
                </a>
              </li>
            </ul>
          </div>{{-- Menu Bar START --}}


          <div class="mobile-buttons-container">{{-- Mobile Buttons START --}}
            <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">{{-- Scrollspy Mobile Button Start --}}
              <i data-acorn-icon="menu-dropdown"></i>
            </a>{{-- Scrollspy Mobile Button End --}}

            {{-- Scrollspy Mobile Dropdown Start --}}
            <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
            {{-- Scrollspy Mobile Dropdown End --}}

            <a href="#" id="mobileMenuButton" class="menu-button">{{-- Menu Button Start --}}
              <i data-acorn-icon="menu"></i>
            </a>{{-- Menu Button End --}}
          </div>{{-- Mobile Buttons START --}}
        </div>
        <div class="nav-shadow"></div>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

      <title>{{ $title ?? 'Page Title' }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />
      <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../assets/vendor/fonts/remixicon/remixicon.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <i class="ri-file-edit-fill fs-3 text-primary"></i>
            <a href="{{route('/')}}" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-semibold ms-1">Contracts</span>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->

            <li class="menu-header">
                <span class="menu-header-text">Menu</span>
              </li>

            <li @class(['menu-item', 'active' => request()->routeIs('/')])>
              <a href="{{route('/')}}" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div data-i18n="Basic">Dashboard</div>
              </a>
            </li>
            <!-- Layouts -->
            <li @class(['menu-item', 'open' => request()->routeIs('external-companies.*') || request()->routeIs('external-contacts.*')])>
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ri-hotel-fill"></i>
                <div data-i18n="Layouts">External Entities</div>
              </a>

              <ul class="menu-sub">
                <li @class(['menu-item', 'active' => request()->routeIs('external-companies.*')])>
                  <a href="{{route('external-companies.index')}}" class="menu-link">
                    <div>External Companies</div>
                  </a>
                </li>
                <li @class(['menu-item', 'active' => request()->routeIs('external-contacts.index')])>
                  <a href="{{route('external-contacts.index')}}" class="menu-link">
                    <div>External Contacts</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
                <a href="cards-basic.html" class="menu-link">
                  <i class="menu-icon ri-money-dollar-box-line"></i>
                  <div data-i18n="Basic">Purchases</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="cards-basic.html" class="menu-link">
                  <i class="menu-icon ri-contract-line"></i>
                  <div data-i18n="Basic">Purchase Contracts</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="cards-basic.html" class="menu-link">
                  <i class="menu-icon ri-notification-2-line"></i>
                  <div data-i18n="Basic">Notifications</div>
                </a>
            </li>

            <li class="menu-header mt-7">
              <span class="menu-header-text">Apps &amp; Pages</span>
            </li>
            <!-- Apps -->
            <li class="menu-item">
              <a
                href="https://demos.themeselection.com/materio-bootstrap-html-admin-template/html/vertical-menu-template/app-email.html"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons ri-mail-open-line"></i>
                <div data-i18n="Email">Email</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="ri-menu-fill ri-24px"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="ri-search-line ri-22px me-2"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..." />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-4">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/materio-bootstrap-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/materio-bootstrap-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0 me-2">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0 small">John Doe</h6>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="ri-user-3-line ri-22px me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="ri-settings-4-line ri-22px me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 ri-file-text-line ri-22px me-3"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span
                            class="flex-shrink-0 badge badge-center rounded-pill bg-danger h-px-20 d-flex align-items-center justify-content-center"
                            >4</span
                          >
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <div class="d-grid px-4 pt-2 pb-1">
                        <a class="btn btn-danger d-flex" href="javascript:void(0);">
                          <small class="align-middle">Logout</small>
                          <i class="ri-logout-box-r-line ms-2 ri-16px"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                {{ $slot }}
            </div>
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>


    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

  </body>
</html>
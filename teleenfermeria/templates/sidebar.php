            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo" style="padding-left: 1.5rem; !important">
                    <a href="./" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="../assets/img/icons/brands/teleenfermeria.png" style="width:40px;" alt="Cinque Terre">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-size: 1.4rem !important; color:#00B2A9 !important;">Teleenfermería</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <?php $menu = substr($file, strpos($file," ") + 1); ?>
                    <?php $submenu = substr($file, 0, strpos($file," ")); ?>
                    <li class="menu-item <?php echo $res = ($menu == 'Dashboard') ? 'active open' : '' ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Dashboards">Dashboards</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $res = ($menu == 'Analytics') ? 'active' : '' ?>">
                                <a href="dashboards-analytics.html" class="menu-link">
                                    <div data-i18n="Analytics">Analytics</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $res = ($menu == 'CRM') ? 'active' : '' ?>">
                                <a href="dashboards-crm.html" class="menu-link">
                                    <div data-i18n="CRM">CRM</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $res = ($menu == 'ECommerce') ? 'active' : '' ?>">
                                <a href="dashboards-ecommerce.html" class="menu-link">
                                    <div data-i18n="eCommerce">eCommerce</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Aplicaciones -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Aplicaciones</span>
                    </li>
                    <li class="menu-item <?php echo ($menu == 'Llamada') ? 'active open' : '' ?>">
                        <a href="app-calendar.html" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-phone"></i>
                            <div data-i18n="Llamadas">Llamadas</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $res = ($submenu == 'Registros') ? 'active' : '' ?>">
                                <a href="registros-llamada" class="menu-link">
                                    <i class='bx bx-list-check me-1'></i><div data-i18n="Registros">Registros</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $res = ($submenu == 'Nueva') ? 'active' : '' ?>">
                                <a href="nueva-llamada" class="menu-link">
                                    <i class='bx bx-message-square-add me-1'></i><div data-i18n="Agregar">Agregar</div>
                                </a>
                            </li>                            
                        </ul>
                    </li>
                    <li class="menu-item <?php echo $res = ($menu == 'Usuarios') ? 'active open' : '' ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Personal">Personal</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $res = ($submenu == 'Registros') ? 'active' : '' ?>">
                                <a href="registros-usuarios" class="menu-link">
                                    <i class='bx bx-list-check me-1'></i><div data-i18n="Lista">Lista</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $res = ($submenu == 'Nuevo') ? 'active' : '' ?>">
                                <a href="nuevo-usuario" class="menu-link">
                                    <i class='bx bx-user-plus me-1'></i></i><div data-i18n="Agregar">Agregar</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Administrador -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Administrador</span>
                    </li>
                    <li class="menu-item">
                        <a href="app-calendar.html" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-phone"></i>
                            <div data-i18n="Perfil">Perfil</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-invoice-list.html" class="menu-link">
                                    <i class='bx bx-list-check me-1'></i><div data-i18n="Registros">Registros</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-invoice-preview.html" class="menu-link">
                                    <i class='bx bx-message-square-add me-1'></i><div data-i18n="Agregar">Agregar</div>
                                </a>
                            </li>                            
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Personal">Personal</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="app-invoice-list.html" class="menu-link">
                                    <i class='bx bx-list-check me-1'></i><div data-i18n="Lista">Lista</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="app-invoice-preview.html" class="menu-link">
                                    <i class='bx bx-user-plus me-1'></i></i><div data-i18n="Agregar">Agregar</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
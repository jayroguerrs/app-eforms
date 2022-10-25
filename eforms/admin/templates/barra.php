 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-clinic-medical"></i>
    </div>
    <div class="sidebar-brand-text mx-3">EForms</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Nuevo registro -->
<li class="nav-item">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-plus-circle"></i>
        <span>Nuevo registro</span></a>
</li>
<!-- Nav Item - Base de datos -->
<li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Base de datos</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tablas:</h6>
            <a class="collapse-item active" href="#">Todos</a>
            <a class="collapse-item" href="#">Evaluados</a>
            <a class="collapse-item" href="#">Pendientes</a>
        </div>
    </div>
</li>
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Administrador
</div>

<!-- Nav Item - Panel administrador Collapse Menu -->
<li class="nav-item" id="bd-nav">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-user"></i>
        <span>Panel administrador</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Personal:</h6>

            <a class="collapse-item" href="lista-personal.php" id="bd-lista"><i class="fas fa-fw fa-user" style="margin-right: 0.5rem"></i>Listado</a>
            <a class="collapse-item" href="nuevo-personal.php" id="bd-crear"><i class="fas fa-fw fa-plus" style="margin-right: 0.5rem"></i>Agregar</a>

            <h6 class="collapse-header">Usuarios:</h6>
                       
            <a class="collapse-item" href="lista-admin.php" id="bd-lista"><i class="fas fa-fw fa-list" style="margin-right: 0.5rem"></i>Listado</a>
            <a class="collapse-item" href="nuevo-admin.php" id="bd-crear"><i class="fas fa-fw fa-plus" style="margin-right: 0.5rem"></i>Agregar</a>
        </div>
    </div>
</li>

<!-- Nav Item - Panel administrador Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Panel administrador</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="#">Colors</a>
            <a class="collapse-item" href="#">Borders</a>
            <a class="collapse-item" href="#">Animations</a>
            <a class="collapse-item" href="#">Other</a>
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
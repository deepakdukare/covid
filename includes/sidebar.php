<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #122520;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-virus"></i>
        </div>
        <a class="sidebar-brand-text mx-3" href="http://localhost/covid-tms/" style="color: inherit; text-decoration: none; font-weight: bold;">COVID19-TMS</a>
        </a>

    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Conditional Sidebar Links based on Session -->
    <?php if($_SESSION['aid']): ?>

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Phlebotomist Section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePhlebotomist"
            aria-expanded="true" aria-controls="collapsePhlebotomist">
            <i class="fas fa-fw fa-users"></i>
            <span>Phlebotomist</span>
        </a>
        <div id="collapsePhlebotomist" class="collapse" aria-labelledby="headingPhlebotomist" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add-phlebotomist.php">Add</a>
                <a class="collapse-item" href="manage-phlebotomist.php">Manage</a>
            </div>
        </div>
    </li>

    <!-- Testing Section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTesting"
            aria-expanded="true" aria-controls="collapseTesting">
            <i class="fas fa-fw fa-virus"></i>
            <span>Testing</span>
        </a>
        <div id="collapseTesting" class="collapse" aria-labelledby="headingTesting" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="new-test.php">New</a>
                <a class="collapse-item" href="assigned-test.php">Assigned</a>
                <a class="collapse-item" href="ontheway-samplecollection-test.php">On the Way for Sample Collection</a>
                <a class="collapse-item" href="sample-collected-test.php">Sample Collected</a>
                <a class="collapse-item" href="samplesent-lab-test.php">Sent to Lab</a>
                <a class="collapse-item" href="reportdelivered-test.php">Report Delivered</a>
                <a class="collapse-item" href="all-test.php">All Tests</a>
            </div>
        </div>
    </li>

    <!-- Report Section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
            aria-expanded="true" aria-controls="collapseReport">
            <i class="fas fa-fw fa-file"></i>
            <span>Report</span>
        </a>
        <div id="collapseReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="bwdates-report-ds.php">B/w Dates Report</a>
                <a class="collapse-item" href="search-report.php">Search Report</a>
            </div>
        </div>
    </li>

    <?php else: ?>

    <!-- Non-Admin Sidebar -->
    
    <!-- Live Test Updates -->
    <li class="nav-item">
        <a class="nav-link" href="live-test-updates.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Testing Section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTesting"
            aria-expanded="true" aria-controls="collapseTesting">
            <i class="fas fa-fw fa-cog"></i>
            <span>Testing</span>
        </a>
        <div id="collapseTesting" class="collapse" aria-labelledby="headingTesting" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="new-user-testing.php">New User</a>
                <a class="collapse-item" href="registered-user-testing.php">Already Registered User</a>
            </div>
        </div>
    </li>

    <!-- Test Report -->
    <li class="nav-item">
        <a class="nav-link" href="patient-search-report.php">
            <i class="fas fa-fw fa-file"></i>
            <span>Test Report</span></a>
    </li>

    <!-- Admin Login -->
    <li class="nav-item active">
        <a class="nav-link" href="login.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Admin</span></a>
    </li>

    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

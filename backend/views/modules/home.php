<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();

    }

    if(!isset($_SESSION["validar"])){
      //header("location: login");


    	echo "<script> window.location.href = 'login' </script>";

      exit();
    }
?>

<main>

  <?php 
    include "header.php"; 
  ?>
        
        <div id="wrapper">
            <?php 
              include "left-sidebar.php"; 
            ?>
            
            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div id="project-dashboard" class="page-layout simple right-sidebar">

                        <div class="page-content-wrapper custom-scrollbar">

                            <!-- HEADER -->
                            <div class="page-header bg-primary text-auto d-flex flex-column justify-content-between px-6 pt-4 pb-0">

                                <div class="row no-gutters align-items-start justify-content-between flex-nowrap">

                                    <div>
                                        <span class="h2">Bienvenido, <?php echo $_SESSION["usuario"]; ?>!</span>
                                    </div>

                                    <button type="button" class="sidebar-toggle-button btn btn-icon d-block d-xl-none" data-fuse-bar-toggle="dashboard-project-sidebar" aria-label="Toggle sidebar">
                                        <i class="icon icon-menu"></i>
                                    </button>
                                </div>

                                <div class="row no-gutters align-items-center project-selection">

                                    <div class="selected-project h6 px-4 py-2">ACME Corp. Backend App</div>

                                    <div class="project-selector">
                                        <button type="button" class="btn btn-icon">
                                            <i class="icon icon-dots-horizontal"></i>
                                        </button>
                                    </div>

                                </div>

                            </div>
                            <!-- / HEADER -->

                            <!-- CONTENT -->
                            <div class="page-content">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="home-tab" data-toggle="tab" href="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-expanded="true">Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link btn" id="budget-summary-tab" data-toggle="tab" href="#budget-summary-tab-pane" role="tab" aria-controls="budget-summary-tab-pane">Budget Summary</a>
                                    </li>

                                   <!--  <li class="nav-item">
                                        <a class="nav-link btn" id="team-members-tab" data-toggle="tab" href="#team-members-tab-pane" role="tab" aria-controls="team-members-tab-pane">Team Members</a>
                                    </li> -->
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">

                                        <!-- WIDGET GROUP -->
                                        <div class="widget-group row no-gutters">

                                            <!-- WIDGET 1 -->
                                            <div class="col-12 col-sm-6 col-xl-3 p-3">

                                                <div class="widget widget1 card">

                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">

                                                            <select class="h6 custom-select">
                                                                <option selected="" value="today">Today</option>
                                                                <option value="yesterday">Yesterday</option>
                                                                <option value="tomorrow">Tomorrow</option>
                                                            </select>

                                                        </div>

                                                        <button type="button" class="btn btn-icon">
                                                            <i class="icon icon-dots-vertical"></i>
                                                        </button>

                                                    </div>

                                                    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">

                                                        <div class="title text-secondary">25</div>

                                                        <div class="sub-title h6 text-muted">DUE TASKS</div>

                                                    </div>

                                                    <div class="widget-footer p-4 bg-light row no-gutters align-items-center">

                                                        <span class="text-muted">Completed:</span>

                                                        <span class="ml-2">7</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 1 -->

                                            <!-- WIDGET 2 -->
                                            <div class="col-12 col-sm-6 col-xl-3 p-3">

                                                <div class="widget widget2 card">

                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Overdue</span>
                                                        </div>

                                                        <button type="button" class="btn btn-icon">
                                                            <i class="icon icon-dots-vertical"></i>
                                                        </button>
                                                    </div>

                                                    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
                                                        <div class="title text-danger">4</div>
                                                        <div class="sub-title h6 text-muted">TASKS</div>
                                                    </div>

                                                    <div class="widget-footer p-4 bg-light row no-gutters align-items-center">
                                                        <span class="text-muted">Yesterday's:</span>
                                                        <span class="ml-2">2</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 2 -->

                                            <!-- WIDGET 3 -->
                                            <div class="col-12 col-sm-6 col-xl-3 p-3">

                                                <div class="widget widget3 card">

                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Issues</span>
                                                        </div>

                                                        <button type="button" class="btn btn-icon">
                                                            <i class="icon icon-dots-vertical"></i>
                                                        </button>

                                                    </div>

                                                    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
                                                        <div class="title text-warning">32</div>
                                                        <div class="sub-title h6 text-muted">OPEN</div>
                                                    </div>

                                                    <div class="widget-footer p-4 bg-light row no-gutters align-items-center">
                                                        <span class="text-muted">Closed today:</span>
                                                        <span class="ml-2">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 3 -->

                                            <!-- WIDGET 4 -->
                                            <div class="col-12 col-sm-6 col-xl-3 p-3">

                                                <div class="widget widget4 card">

                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Features</span>
                                                        </div>

                                                        <button type="button" class="btn btn-icon">
                                                            <i class="icon icon-dots-vertical"></i>
                                                        </button>

                                                    </div>

                                                    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
                                                        <div class="title text-info">42</div>
                                                        <div class="sub-title h6 text-muted">PROPOSALS</div>
                                                    </div>

                                                    <div class="widget-footer p-4 bg-light row no-gutters align-items-center">
                                                        <span class="text-muted">Implemented:</span>
                                                        <span class="ml-2">8</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 4 -->

                                            <!-- WIDGET 5 -->
                                            <div class="col-12 p-3">

                                                <div class="widget widget5 card">

                                                    <div class="widget-header px-4 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Github Issues</span>
                                                        </div>

                                                        <div>

                                                            <button type="button" class="widget5-option-change-btn btn btn-link" data-interval="TW">
                                                                This Week
                                                            </button>

                                                            <button type="button" class="widget5-option-change-btn btn btn-link" data-interval="LW">
                                                                Last Week
                                                            </button>

                                                            <button type="button" class="widget5-option-change-btn btn btn-link" data-interval="2W">
                                                                2 WEEKS AGO
                                                            </button>

                                                        </div>
                                                    </div>

                                                    <div class="widget-content p-4">

                                                        <div class="row">

                                                            <div class="col-12 col-lg-6">

                                                                <div id="widget5-main-chart">
                                                                    <svg></svg>
                                                                </div>

                                                            </div>

                                                            <div class="col-12 col-lg-6">

                                                                <div id="widget5-supporting-charts" class="row">

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-created-chart">
                                                                            <div class="h6 text-muted">CREATED</div>
                                                                            <div class="h2 count">48</div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-closed-chart">
                                                                            <div class="h6 text-muted">CLOSED</div>
                                                                            <div class="h2 count">26</div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-re-opened-chart">
                                                                            <div class="h6 text-muted">RE-OPENED</div>
                                                                            <div class="h2 count">2</div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-wont-fix-chart">
                                                                            <div class="h6 text-muted">WON'T FIX</div>
                                                                            <div class="h2 count">4</div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-needs-test-chart">
                                                                            <div class="h6 text-muted">NEED'S TEST</div>
                                                                            <div class="h2 count">8</div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-6 p-4">

                                                                        <div id="widget5-fixed-chart">
                                                                            <div class="h6 text-muted">FIXED</div>
                                                                            <div class="h2 count">14</div>
                                                                            <div class="chart-wrapper">
                                                                                <svg></svg>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 5 -->


                                        </div>
                                        <!-- / WIDGET GROUP -->
                                    </div>
                                    <div class="tab-pane fade p-3" id="budget-summary-tab-pane" role="tabpanel" aria-labelledby="budget-summary-tab">

                                        <!-- WIDGET GROUP -->
                                        <div class="widget-group row no-gutters">

                                            <!-- WIDGET 8 -->
                                            <div class="col-12 col-lg-6 p-3">

                                                <div class="widget widget8 card">

                                                    <div class="widget-header px-4 row no-gutters align-items-center justify-content-between">
                                                        <div class="col">
                                                            <span class="h6">Budget Distribution</span>
                                                        </div>
                                                    </div>

                                                    <div class="widget-content row">

                                                        <div class="col-12">

                                                            <div id="widget8-main-chart" class="p-4">
                                                                <svg></svg>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 8 -->

                                            <!-- WIDGET 9 -->
                                            <div class="col-12 col-lg-6 p-3">

                                                <div class="widget widget9 card">

                                                    <div class="widget-header px-4 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h6">Spent</span>
                                                        </div>

                                                        <div class="">
                                                            <select id="widget9-option-select" class="h6 custom-select">
                                                                <option selected="" value="TW">This Week</option>
                                                                <option value="LW">Last Week</option>
                                                                <option value="2W">2 Weeks Ago</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="widget-content">

                                                        <div id="widget9-weeklySpent" class="budget-item p-4 row no-gutters align-items-center">

                                                            <div class="col-12 col-sm-auto p-2">

                                                                <div class="item-title text-muted">WEEKLY SPENT</div>

                                                                <div class="pt-2 h2">
                                                                    <span class="text-muted">$</span>
                                                                    <span class="item-value">3,630.15</span>
                                                                </div>

                                                            </div>

                                                            <div class="chart-wrapper col-12 col-sm">
                                                                <svg></svg>
                                                            </div>
                                                        </div>

                                                        <div id="widget9-totalSpent" class="budget-item p-4 row no-gutters align-items-center">

                                                            <div class="col-12 col-sm-auto p-2">

                                                                <div class="item-title text-muted">TOTAL SPENT</div>

                                                                <div class="pt-2 h2">
                                                                    <span class="text-muted">$</span>
                                                                    <span class="item-value">34,758.34</span>
                                                                </div>
                                                            </div>

                                                            <div class="chart-wrapper col-12 col-sm">
                                                                <svg></svg>
                                                            </div>
                                                        </div>

                                                        <div id="widget9-remaining" class="budget-item p-4 row no-gutters align-items-center">

                                                            <div class="col-12 col-sm-auto p-2">

                                                                <div class="item-title text-muted">REMAINING</div>

                                                                <div class="pt-2 h2">
                                                                    <span class="text-muted">$</span>
                                                                    <span class="item-value">89.241,66</span>
                                                                </div>

                                                            </div>

                                                            <div class="chart-wrapper col-12 col-sm">
                                                                <svg></svg>
                                                            </div>

                                                        </div>

                                                        <div class="divider w-100 my-2"></div>

                                                        <div id="widget9-total-budget" class="p-4">

                                                            <div class="item-title text-muted">TOTAL BUDGET</div>

                                                            <div class="pt-2 h2">
                                                                <span class="text-muted">$</span>
                                                                <span class="item-value">124.000,00</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 9 -->

                                            <!-- WIDGET 10 -->
                                            <div class="col-12 p-3">

                                                <div class="widget widget10 card">

                                                    <div class="widget-header pl-4 pr-2 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h5">Budget Details</span>
                                                        </div>

                                                        <button type="button" class="btn btn-icon">
                                                            <i class="icon icon-dots-vertical"></i>
                                                        </button>

                                                    </div>

                                                    <div class="widget-content p-4 table-responsive">

                                                        <table class="table">

                                                            <thead>
                                                                <tr>

                                                                    <th>
                                                                        Budget Type
                                                                    </th>

                                                                    <th>
                                                                        Total Budget
                                                                    </th>

                                                                    <th>
                                                                        Spent ($)
                                                                    </th>

                                                                    <th>
                                                                        Spent (%)
                                                                    </th>

                                                                    <th>
                                                                        Remaining ($)
                                                                    </th>

                                                                    <th>
                                                                        Remaining (%)
                                                                    </th>

                                                                </tr>
                                                            </thead>

                                                            <tbody>

                                                                <tr>

                                                                    <td>
                                                                        <span class="badge badge-primary">
                                                                            Wireframing
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="text-bold">
                                                                            $14,880.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            $14,000.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="text-success">
                                                                            %94.08
                                                                        </span>

                                                                        <i class="icon icon-trending-up text-success s-4"></i>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            $880.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            %5.92
                                                                        </span>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <td>
                                                                        <span class="badge badge-success">
                                                                            Design
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="text-bold">
                                                                            $21,080.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            $17,240.34
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="text-success">
                                                                            %81.78
                                                                        </span>

                                                                        <i class="icon icon-trending-up text-success s-4"></i>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            $3,839.66
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            %18.22
                                                                        </span>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <td>
                                                                        <span class="badge badge-warning">
                                                                            Coding
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="text-bold">
                                                                            $34,720.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            $3,518.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="text-danger">
                                                                            %10.13
                                                                        </span>

                                                                        <i class="icon icon-trending-down text-danger s-4"></i>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            $31,202.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            %89.87
                                                                        </span>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <td>
                                                                        <span class="badge badge-info">
                                                                            Marketing
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="text-bold">
                                                                            $34,720.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            $0.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="text-info">
                                                                            %0.00
                                                                        </span>

                                                                        <i class="icon icon-minus text-info s-4"></i>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            $34,720.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            %100.00
                                                                        </span>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <td>
                                                                        <span class="badge badge-danger">
                                                                            Extra
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="text-bold">
                                                                            $18,600.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            $0.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="text-info">
                                                                            %0.00
                                                                        </span>

                                                                        <i class="icon icon-minus text-info s-4"></i>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            $34,720.00
                                                                        </span>

                                                                    </td>

                                                                    <td>
                                                                        <span class="">
                                                                            %100.00
                                                                        </span>

                                                                    </td>

                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / WIDGET 10 -->
                                        </div>
                                        <!-- / WIDGET GROUP -->
                                    </div>


                                    
                                    <!-- <div class="tab-pane fade p-6" id="team-members-tab-pane" role="tabpanel" aria-labelledby="team-members-tab">

        
                                        <div class="widget-group row no-gutters">

                               
                                            <div class="col-12">

                                                <div class="card">

                                                    <div class="widget-header px-4 py-6 row no-gutters align-items-center justify-content-between">

                                                        <div class="col">
                                                            <span class="h5">Team Members</span>
                                                        </div>

                                                        <div>
                                                            <span class="badge badge-danger">20 members</span>
                                                        </div>

                                                    </div>

                                                    <div class="divider"></div>

                                                    <div class="widget-content table-responsive">

                                                        <table class="table">

                                                            <thead>
                                                                <tr>

                                                                    <th>

                                                                    </th>

                                                                    <th>
                                                                        Name
                                                                    </th>

                                                                    <th>
                                                                        Position
                                                                    </th>

                                                                    <th>
                                                                        Office
                                                                    </th>

                                                                    <th>
                                                                        E-Mail
                                                                    </th>

                                                                    <th>
                                                                        Phone
                                                                    </th>

                                                                </tr>
                                                            </thead>

                                                            <tbody>

                                                                <tr>

                                                                    <td>

                                                                        <img class="avatar" src="views/images/avatars/james.jpg">

                                                                    </td>

                                                                    <td>

                                                                        <span>Jack Gilbert</span>

                                                                    </td>

                                                                    <td>

                                                                        <span>Design Manager</span>

                                                                    </td>

                                                                    <td>

                                                                        <span>Johor Bahru</span>

                                                                    </td>

                                                                    <td>

                                                                        <span>jgilbert48@mail.com</span>

                                                                    </td>

                                                                    <td>

                                                                        <span>&#43;16 298 032 7774</span>

                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <td>

                                                                        <img class="avatar" src="views/images/avatars/katherine.jpg">

                                                                    </td>

                                                                    <td>

                                                                        <span>Kathy Anderson</span>

                                                                    </td>

                                                                    <td>

                                                                        <span>Recruiting Manager</span>

                                                                    </td>

                                                                    <td>

                                                                        <span>Solţānābād</span>

                                                                    </td>

                                                                    <td>

                                                                        <span>kanderson49@mail.com.br</span>

                                                                    </td>

                                                                    <td>

                                                                        <span>&#43;23 572 311 1136</span>

                                                                    </td>

                                                                </tr>
                                                            

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div> -->
                                </div>

                            </div>
                            <!-- / CONTENT -->

                        </div>
                       
                    </div>

                    <script type="text/javascript" src="views/js/apps/dashboard/project.js"></script>

                </div>
            </div>
            <?php 
              include "right-sidebar.php"; 
            ?>

        </div>
      <?php 
        include "footer.php"; 
      ?> 

</main>



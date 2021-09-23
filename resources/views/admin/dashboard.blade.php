@extends("admin.layout.interface")
@section("breadcrumb")
 <li class="breadcrumb-item"><a href="#">Admin</a></li>
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection
@section("content")
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-12 col-12 col-xl-4">
            <div class="card bg-primary order-card">
                <div class="card-body">
                    <a href="{{URL::to('admin/book')}}">
                        <h2 class="text-right text-white">
                            <i class="fa fa-tag float-left"></i><span></span>
                        </h2>
                        <p class="m-b-0 text-light">
                            Total Books<span class="float-right">{{count($totalBooks)}}</span>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12 col-12 col-xl-4">
            <div class="card bg-info order-card">
                <div class="card-body">
                    <a href="{{URL::to('admin/user')}}">
                        <h2 class="text-right text-white">
                            <i class="fa fa-user float-left"></i><span></span>
                        </h2>
                        <p class="m-b-0 text-light">
                            Total Authors<span class="float-right">{{count($totalAuthors)}}</span>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12 col-12 col-xl-4">
            <div class="card bg-danger order-card">
                <div class="card-body">
                    <a href="{{URL::to('admin/newsLetter')}}">
                        <h2 class="text-right text-white">
                            <i class="fa fa-users float-left"></i><span></span>
                        </h2>
                        <p class="m-b-0 text-light">
                            Total NewsLetter Subscriber<span class="float-right">{{count($totalNewsLetterSubscriber)}}</span>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12 col-12 col-xl-4">
            <div class="card bg-primary order-card">
                <div class="card-body">
                    <a href="{{URL::to('admin/orders')}}">
                        <h2 class="text-right text-white">
                            <i class="fa fa-clipboard float-left"></i><span></span>
                        </h2>
                        <p class="m-b-0 text-light">
                            Total Orders<span class="float-right">{{count($totalOrders)}}</span> <br>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12 col-12 col-xl-4">
            <div class="card bg-info order-card">
                <div class="card-body">
                    <a href="{{URL::to('admin/orders')}}">
                        <h2 class="text-right text-white">
                            <i class="fa fa-clipboard-check float-left"></i><span></span>
                        </h2>
                        <p class="m-b-0 text-light">
                            Complete Orders <span class="float-right"> {{count($totalCompleteOrders)}}</span> <br>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12 col-12 col-xl-4">
            <div class="card bg-danger order-card">
                <div class="card-body">
                    <a href="{{URL::to('admin/orders')}}">
                        <h2 class="text-right text-white">
                            <i class="fa fa-clipboard-list float-left"></i><span></span>
                        </h2>
                        <p class="m-b-0 text-light">
                            Pending Orders<span class="float-right">{{count($totalPendingOrders)}}</span> <br>
                        </p>
                    </a>
                </div>
            </div>
        </div>

    </div>
<!-- <div class="row stats-row">
    <div class="col-lg-4 col-md-12">
        <div class="card card-transparent stats-card">
            <div class="card-body">
                <div class="stats-info">
                    <h5 class="card-title">$3,089.67<span class="stats-change stats-change-danger">-8%</span></h5>
                    <p class="stats-text">Total revenue for last  20 days</p>
                </div>
                <div class="stats-icon change-danger">
                    <i class="material-icons">trending_down</i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card card-transparent stats-card">
            <div class="card-body">
                <div class="stats-info">
                    <h5 class="card-title">168,047<span class="stats-change stats-change-success">+16%</span></h5>
                    <p class="stats-text">Unique visitors in current period</p>
                </div>
                <div class="stats-icon change-success">
                    <i class="material-icons">trending_up</i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card card-transparent stats-card">
            <div class="card-body">
                <div class="stats-info">
                    <h5 class="card-title">47,350<span class="stats-change stats-change-success">+12%</span></h5>
                    <p class="stats-text">Total investments in this month</p>
                </div>
                <div class="stats-icon change-success">
                    <i class="material-icons">trending_up</i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card savings-card">
            <div class="card-body">
                <h5 class="card-title">Savings<span class="card-title-helper">30 Days</span></h5>
                <div class="savings-stats">
                    <h5>$4,502.00</h5>
                    <span>Total savings for last month</span>
                </div>
                <div id="sparkline-chart-1"></div>
            </div>
        </div>
        <div class="card top-products">
            <div class="card-body">
                <h5 class="card-title">Popular Products<span class="card-title-helper">Today</span></h5>
                <div class="top-products-list">
                    <div class="product-item">
                        <h5>Alpha - File Hosting Service</h5>
                        <span>4,037 downloads</span>
                        <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                    </div>
                    <div class="product-item">
                        <h5>Lime - Task Managment Dashboard</h5>
                        <span>1,876 downloads</span>
                        <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                    </div>
                    <div class="product-item">
                        <h5>Space - Meetup Hosting App</h5>
                        <span>1,252 downloads</span>
                        <i class="material-icons product-item-status product-item-danger">arrow_downward</i>
                    </div>
                    <div class="product-item">
                        <h5>Meteor - Messaging App</h5>
                        <span>938 downloads</span>
                        <i class="material-icons product-item-status product-item-success">arrow_upward</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Visitors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Investments</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="visitors-stats">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="visitors-stats-info">
                                <p>Total visitors in the current period:</p>
                                <h5>77,871</h5>
                                <span>6-26 Apr</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="visitors-stats-info">
                                <p>Unique visitors in the current period and ratio:</p>
                                <h5>58,403</h5>
                                <span>6-26 Apr</span>
                            </div>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div id="chart-visitors"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="alert alert-info no-m" role="alert">
                Data has been updated 35 minutes ago, go to the reports page to access data history.
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Server Load<span class="card-title-helper">Optimal</span></h5>
                <div class="server-load row">
                    <div class="server-stat col-sm-4">
                        <p>167GB</p>
                        <span>Usage</span>
                    </div>
                    <div class="server-stat col-sm-4">
                        <p>320GB</p>
                        <span>Space</span>
                    </div>
                    <div class="server-stat col-sm-4">
                        <p>57.4%</p>
                        <span>CPU</span>
                    </div>
                </div>
                <div id="server-load-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card card-transactions">
            <div class="card-body">
                <h5 class="card-title">Transactions<a href="#" class="card-title-helper blockui-transactions"><i class="material-icons">refresh</i></a></h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Company</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0776</td>
                                <td>Sale Management</td>
                                <td>$18, 560</td>
                                <td><span class="badge badge-success">Finished</span></td>
                            </tr>
                            <tr>
                                <td>0759</td>
                                <td>Dropbox</td>
                                <td>$40, 672</td>
                                <td><span class="badge badge-warning">Waiting</span></td>
                            </tr>
                            <tr>
                                <td>0741</td>
                                <td>Social Media</td>
                                <td>$13, 378</td>
                                <td><span class="badge badge-info">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>0740</td>
                                <td>Envato Market</td>
                                <td>$17, 456</td>
                                <td><span class="badge badge-info">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>0735</td>
                                <td>Graphic Design</td>
                                <td>$29, 999</td>
                                <td><span class="badge badge-secondary">Canceled</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load("current", {packages:['corechart']});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ["Element", "Sale", { role: "style" }],
                            @foreach($activeUserGraphAllDataArray as $daataa)
                                ["<?= $daataa[1] ?>",<?= $daataa[0] ?>, "stroke-color: #B2BABB ; stroke-width: 4; fill-color: #CCD1D1"],
                            @endforeach
                        ]);

                        var view = new google.visualization.DataView(data);
                        view.setColumns([0, 1,
                                        { calc: "stringify",
                                            sourceColumn: 1,
                                            type: "string",
                                            role: "annotation" },
                                        2]);

                        var options = {
                            title: "Sale Graph",
                            width: 600,
                            height: 400,
                            bar: {groupWidth: "50%"},
                            legend: { position: "none" },
                        };
                        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                        chart.draw(view, options);
                    }
                </script>
                <div id="columnchart_values" style="width: 1000px; height: 500px;"></div>


                
<style>
    rect[Attributes Style] {
        x: 118;
        y: 93;
        width: 70;
     
    }
</style>
@endsection

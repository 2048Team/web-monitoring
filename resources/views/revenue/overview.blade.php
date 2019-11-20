@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/global/vendor/footable/footable.core.css">
    <link rel="stylesheet" href="/assets/examples/css/dashboard/analytics.css">
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

@show

@section('page')
    <div class="page">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/bots/list">Bots</a></li>
                <li class="breadcrumb-item">Revenue Detail</li>
                <li class="breadcrumb-item active">{{$bot->title}}</li>

            </ol>

        </div>

        <!-- Page Content -->
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-12">
                    <!-- Product Overview Card -->
                    <div id="productOverviewWidget" class="card card-shadow card-md">
                        <!-- The Header Of First Card -->
{{--                        <div class="card-header card-header-transparent py-20">--}}
{{--                            <div class="btn-group dropdown">--}}
{{--                                <a href="#" class="text-body blue-grey-700 text-uppercase" data-toggle="dropdown">MONEY IN</a>--}}
{{--                            </div>--}}
{{--                            <div class="card-header-actions">--}}
{{--                                <ul class="nav nav-pills nav-pills-rounded product-filters">--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="active nav-link" href="#scoreLineToDay" data-toggle="tab">Day</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="#scoreLineToWeek" data-toggle="tab">Week</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="#scoreLineToMonth" data-toggle="tab">Month</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- End The Header Of First Card -->

                        <!-- The Content Of First Card -->
                        <div class="card-block p-20">
{{--                            <div class="tab-content">--}}
{{--                                <div class="ct-chart tab-pane active" id="scoreLineToDay"></div>--}}
{{--                                <div class="ct-chart tab-pane" id="scoreLineToWeek"></div>--}}
{{--                                <div class="ct-chart tab-pane" id="scoreLineToMonth"></div>--}}
{{--                            </div>--}}
                            <div id="productOptionsData" class="text-center">
                                <div class="row no-space">
                                    <!-- The First Counter Block-->
                                    <div class="col-xl-4 col-md-6">
                                        <div class="counter">
                                            <div class="counter-label">Visit</div>
                                            <div class="counter-number-group text-truncate">
                                                <span id="visited" class="counter-number">{{$bot->count}}</span>
                                            </div>
                                            <div class="ct-chart" data-counter-type="productVist"></div>
                                        </div>
                                    </div>
                                    <!-- End The First Counter Block-->

                                    <!-- The Second Counter Block-->
                                    <div class="col-xl-4 col-md-6">
                                        <div class="counter">
                                            <div class="counter-label">Investment (VNĐ)</div>
                                            <div class="counter-number-group text-truncate">
                                                <span  class="counter-number"><?php echo number_format($bot->investment, 0, ',', '.');?></span>
                                            </div>
                                            <div class="ct-chart" data-counter-type="productVistors"></div>
                                        </div>
                                    </div>
                                    <!-- End The Second Counter Block-->

                                    <!-- The fourth Counter Block-->
                                    <div class="col-xl-4 col-md-6">
                                        <div class="counter">
                                            <div class="counter-label">Current (VNĐ)</div>
                                            <div class="counter-number-group text-truncate">
                                                <span id="current" class="counter-number"><?php echo number_format($bot->current, 0, ',', '.');?></span>
                                            </div>
                                            <div class="ct-chart" data-counter-type="productBounceRate"></div>
                                        </div>
                                    </div>
                                    <!-- End The fourth Counter Block-->
                                </div>
                            </div>
                        </div>
                        <!-- End The Content Of First Card -->
                    </div>
                    <!-- End Product Overview Card -->
                </div>
                <div class="col-12" id="table_data">
                    <div  class="card card-shadow card-md" style="margin-top: 30px;">
                        <div class="card-header card-header-transparent pb-15">
                            <p class="font-size-14 blue-grey-700 mb-0 text-uppercase">Current transactions</p>
                        </div>
                        <div class="card-block px-30">
                            <div class="row">
                                <div class="col-md-12" id="current_transaction">
                                    <!-- Browsers Vists Table -->
                                    <table class="table table-hover table-bordered table-striped toggle-arrow-tiny"
                                           id="exampleFooAccordion"
                                           data-sorting="true" data-show-toggle="true" data-toggle-column="last">
                                        <thead>
                                        <tr>
                                            <th data-name="title">ID</th>
                                            <th data-name="title">Plate Number</th>
                                            <th data-name="title">Time</th>
                                            <th data-name="title">Txs</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $row)
                                            <tr>
                                                <td><a href="/transactions/detail/{{ $row->id }}" >{{ $row->id }}</a> </td>
                                                <td>{{$row->plate_id}}</td>
                                                <td>{{$row->time}}</td>
                                                <td><a target="_blank" href="https://scan.testnet.tomochain.com/txs/{{ $row->txs }}" >{{ $row->txs }}</a> </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    <!-- End Browsers Vists Table -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Panel Accordion -->

                <!-- End Panel Accordion -->
                </div>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
@endsection
@section('scripts-content')
    <script src="/global/vendor/footable/footable.min.js"></script>
    <script src="/assets/examples/js/dashboard/analytics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function fetch_data(id)
        {
            const bot_id = '{{$bot->id}}';

            console.log('Fetching...');
            toastr.success('New transaction'+id)

            $.ajax({
                url:"/api/revenue/getcurrent/"+bot_id,
                success:function(data)
                {
                    $('#current_transaction').html(data);
                }
            });
        }

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('8c4e632cc7b673471589', {
            cluster: 'ap1',
            forceTLS: true
        });

        var channel = pusher.subscribe('transaction-channel');
        channel.bind('add-event', function(data) {
           fetch_data(data.message);
            $('#visited').text(data.count);
            $('#current').text(data.money.toLocaleString());
            // console.log(data.money.toLocaleString())
        });
    </script>


@endsection

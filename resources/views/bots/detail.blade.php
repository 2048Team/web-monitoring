@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/assets/css/site.min.css">
@show

@section('page')
    <div class="page">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/bots/list">Bots</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>

        </div>

        <div class="page-content">
            <!-- Panel Google Maps -->
            <div class="col-12">
                <!-- Example Simple -->
                <h3 class="transaction-id">{{$bot->title}}</h3>
                <br>
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Detail</h3>
                    </div>
                    <div class="panel-body">
                        <div class="transaction-detail">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Code</td>
                                    <td>{{$bot->codeview}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{$bot->address}}  </td>
                                </tr>
                                <tr>
                                    <td>Start day</td>
                                    <td>{{$bot->action_day}}</td>
                                </tr>
                                <tr>
                                    <td>Investment</td>
                                    <td><?php echo number_format($bot->investment, 0, ',', '.');?></td>
                                </tr>
                                <tr>
                                    <td>Current</td>
                                    <td><?php echo number_format($bot->current, 0, ',', '.');?> <a href="/revenue/{{$bot->id}}">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <span class="badge badge-table @if($bot->isActive===1) badge-success @else badge-danger @endif"> @if($bot->isActive===1) Active @else Closed @endif</span>
                                        {{--                    <span class="badge badge-table badge-danger">Suspended</span>--}}
                                    </td>
                                </tr>
                                @if($bot->isActive !== 1 )
                                    <tr>
                                        <td>Closed day</td>
                                        <td>{{$bot->action_day}}</td>
                                    </tr>
                                @endif

                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Example Simple -->
            </div>
            <div class="col-12">
                <div id="map" style="width:100%;height:400px;"></div>

{{--                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d168489.12831455935!2d105.7442437917599!3d21.067912354417864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313507f8f0c615c7%3A0xf85cec9539900094!2zVHLhuqFtIFRodSBQaMOtIENhbyB04buRYyBIw6AgTuG7mWkgLSBC4bqvYyBHaWFuZw!5e0!3m2!1svi!2s!4v1573784074598!5m2!1svi!2s" width="1200" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>--}}
            </div>


            <!-- End Panel Google Maps -->
        </div>
    </div>
@endsection
@section('scripts-content')
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyC8pb8k0f7rbIw-S8TDnMST70YKAESFmWA"></script>
    <script>

        var title = "<?php echo $bot->title; ?>";
        function initMap() {
            // The location of Uluru
            var bot = {lat:{{$bot->lat}}, lng: {{$bot->lng}}};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 14, center: bot});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: bot, map: map, title:title});
        }
        initMap();

    </script>
{{--    <script src="/global/vendor/gmaps/gmaps.js"></script>--}}
{{--    <script src="/global/js/Plugin/gmaps.js"></script>--}}
    <script src="/assets/examples/js/advanced/maps-google.js"></script>
    <style>
        .transaction-id{
            color: #868f9b;
            margin-bottom: 10px;
        }
        .table td, .table th{
            border-top:none;
        }
    </style>



@endsection


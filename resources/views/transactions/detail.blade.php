@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/assets/css/site.min.css">
@show

@section('page')
    <div class="page">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Transactions</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>

        </div>

        <div class="page-content">
            <!-- Panel Google Maps -->
            <div class="col-12">
                <!-- Example Simple -->
                <h3 class="transaction-id">ID: {{$transaction->id}}</h3>
                <br>
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">Detail</h3>
                    </div>

                    <div class="panel-body">
                        <div class="transaction-detail">
                            <table class="table table-borderless">
                                <tr>
                                    <td>ID</td>
                                    <td>{{$transaction->id}}</td>
                                </tr>
                                <tr>
                                    <td>Plate Number</td>
                                    <td>{{$transaction->plate_id}}</td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>{{$transaction->time}} (UTC)</td>
                                </tr>
                                <tr>
                                    <td>Bot station title</td>
                                    <td>{{$transaction->bot->title}} <a target="_blank" href="/bot/detail/{{$transaction->bot->id}}">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>Bot station address</td>
                                    <td>{{$transaction->bot->address}}</td>
                                </tr>
                                <tr>
                                    <td>Type of ticket</td>
                                    <td>{{$transaction->type}}</td>
                                </tr>
                                <tr>
                                    <td>Money</td>
                                    <td><?php echo number_format($transaction->money, 0, ',', '.');?> VNĐ</td>
                                </tr>
                                <tr>
                                    <td>TX on Blockchain</td>
                                    <td><a target="_blank" href="https://scan.testnet.tomochain.com/txs/{{ $transaction->txs }}" >{{ $transaction->txs }}</a> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Example Simple -->
            </div>

            <!-- End Panel Google Maps -->
        </div>
    </div>
@endsection
@section('scripts-content')
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

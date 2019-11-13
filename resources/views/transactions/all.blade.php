@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/global/vendor/footable/footable.core.css">
    <link rel="stylesheet" href="/assets/examples/css/tables/footable.css">
@show

@section('page')
    <div class="page">
        <div class="row page-header">
            <div class="col-sm-5" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/transactions">Transactions</a></li>
                </ol>
            </div>
            <div class="col-sm-7" >
                <form action="/transactions/searchresult" method="post">
                    {{ csrf_field()}}
                    <input class="form-control pull-right" type="text" name="keyword" id="input-search" placeholder="Search with Plate Number/BOT ID/ID/TXS">

                </form>
            </div>
{{--            <h4 class="card-title" style="display:inline-block;">DANH MỤC CHI TIẾT</h4>--}}
{{--            <a type="button" name="add" id="add" class="btn btn-success pull-right"--}}
{{--               style="display: inline-block" href="/admin/tourcategory/add">Thêm danh mục--}}
{{--            </a>--}}
        </div>

        <!-- Page Content -->
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                        <div class="col-12" id="table_data">
                            <!-- Panel Accordion -->
                        @include('transactions.pagination_data')

                        <!-- End Panel Accordion -->

                </div>

            </div>
        </div>
        <!-- End Page Content -->
    </div>
@endsection
@section('scripts-content')
    <script src="/global/vendor/footable/footable.min.js"></script>
    <script src="/assets/examples/js/tables/footable.js"></script>
    <script>


        $(document).ready(function(){

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"/transactions/fetch_data?page="+page,
                    success:function(data)
                    {
                        $('#table_data').html(data);
                    }
                });
            }


        });
    </script>
    <style>
        input[type=text] {
            width: 340px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 100px;
            font-size: 16px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 10px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            display: block;
            margin: 0 0 0 auto;
        }

        input[type=text]:focus {
            width: 100%;
        }
@endsection

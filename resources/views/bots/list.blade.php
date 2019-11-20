@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/global/vendor/footable/footable.core.css">
    <link rel="stylesheet" href="/assets/examples/css/tables/footable.css">
@show

@section('page')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">List bots</h1>
        </div>

        <!-- Page Content -->
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-12" id="table_data">
                    <!-- Panel Accordion -->
                @include('bots.table')

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
                    url:"/bots/getBots?page="+page,
                    success:function(data)
                    {
                        $('#table_data').html(data);
                    }
                });
            }

        });
    </script>

@endsection

@extends('layout.master')

@section('header-content')
    <link rel="stylesheet" href="/assets/css/site.min.css">
@show

@section('page')
    <div class="page">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                <li class="breadcrumb-item active">Advanced UI</li>
            </ol>
            <h1 class="page-title">Google Maps</h1>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-inverse btn-round" href="http://hpneo.github.com/gmaps/"
                   target="_blank">
                    <i class="icon wb-link" aria-hidden="true"></i>
                    <span class="hidden-sm-down">Official Website</span>
                </a>
            </div>
        </div>

        <div class="page-content">
            <!-- Panel Google Maps -->
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Example Simple -->
                            <div class="example-wrap">
                                <h4 class="example-title">Maps</h4>
                                <div class="example">
                                    <div class="h-500" id="simpleGmap"></div>
                                </div>
                            </div>
                            <!-- End Example Simple -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Panel Google Maps -->
        </div>
    </div>
@endsection
@section('scripts-content')
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="/global/js/Plugin/gmaps.js"></script>
    <script src="/global/vendor/gmaps/gmaps.js"></script>
    <script src="/assets/examples/js/advanced/maps-google.js"></script>
@endsection

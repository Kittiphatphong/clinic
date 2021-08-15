@extends('layouts.newApp')

@section('title','ໜ້າລັກ')

@section('content')

    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-address-card"></i> ໜ້າ​ຫຼັກ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">



            <div class="card">
                <div class="card-header card-navy card-outline">

                </div>
                <br>
                <div class="card-body p-1">
                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-12 text-center">
                            ສະ​ບາຍ​ດີ, ທ່າ​ນ {{Auth::user()->name}}
                        </div>
                        <div class="col-md-1" >

                        </div>
                    </div>
                </div>

            </div>



    </div>
@endsection



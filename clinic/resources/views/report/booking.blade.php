@extends('layouts.newApp')

@section('title','Clients')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-address-card"></i> ຈັດ​ການ​ຂໍ້​ມູນ​ລູກ​ຄ້າ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

                        <a href="{{route('client.create')}}" class="btn btn-success "><i class="fa fa-user-plus"></i> ເພີ່ມ​ຂໍ້​ມູນ​ລູກ​ຄ້າ</a></a>

                    </div>
                </div>
                <br>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-checkable col-12" id="kt_datatable" style="margin-top: 13px !important">
                            <thead>
                            <tr>

                                <th>ໄອ​ດີ</th>
                                <th>ຊື່ ແລະ​ນາມ​ສະ​ກຸນ</th>
                                <th>​ຊື່​ຜູ້​ໃຊ້</th>
                                <th>ເພດ</th>
                                <th>ເບີ​ໂທ</th>
                                <th>ທີ່​ຢູ່</th>
                                <th>ວັນ​ເກີດ</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($booking as $item)
                                <tr>
                                    <td>{{$item->time_service}}</td>
                                    <td>{{$item->firstname}} {{$item->lastname}}</td>
                                    <td>{{$item->username}}</td>
                                    <th>{{$item->gender}}</th>
                                    <th>{{$item->phone}}</th>
                                    <th>{{$item->address}}</th>

               
                                    <td>{{$item->birthday}}</td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>



    </div>


@endsection



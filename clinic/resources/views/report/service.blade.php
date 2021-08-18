@extends('layouts.newApp')

@section('title','report')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-circle"></i> ລູກ​ຄ້າ​ທີ​ມາ​ໃຊ້​ບໍ​ລິ​ການ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

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

                                <th>ເພດ</th>
                                <th>ເບີ​ໂທ</th>

                                <th>ຈຳ​ນວນ​ຄັ້ງ</th>
                                <th>ວັນ​ເກີດ</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($client_services as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->firstname}} {{$item->lastname}}</td>

                                    <th>{{$item->gender}}</th>
                                    <th>{{$item->phone}}</th>
                                     <td>{{$item->registers->where('status_id',4)->count()}}</td>
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



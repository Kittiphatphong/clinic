@extends('layouts.newApp')

@section('title','Clients')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-circle"></i> ລາຍ​ງານ​ການ​ຈອງ</h1>
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
                    <form method="get" action="{{route('report.income')}}">
                        <div class="col-12 border my-2 rounded  d-flex justify-content-center">
                            <div class="form-group">
                                <label>ມື້​ເລີ່ມ</label>
                                <input type="date" class="form-control" name="start" required>
                            </div>
                            <div class="form-group">
                                <label>ຫາ​ມື້</label>
                                <input type="date" class="form-control" name="end" required>
                            </div>
                            <div class="form-group ">
                                <label>.</label>
                                <button class="btn btn-primary form-control">ຄົ້ນ​ຫາ</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-checkable col-12" id="kt_datatable" style="margin-top: 13px !important">
                            <thead>
                            <tr>

                                <th>ເວ​ລາ​ບໍ​ລິ​ການ</th>
                                <th>ຜູ້ເຮັດ​ບິນ</th>
                                <th>ທ່າ​ໝໍ</th>
                                <th>ລູກ​ຄ້າ</th>

                                <th>ເບີ​ໂທ</th>
                                <th>ການ​ບໍ​ລິ​ການ</th>
                                <th><b class="text-primary">{{number_format($sum)}} ກີບ</b></th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($income as $item)
                                <tr>
                                    <td>{{$item->updated_at}}</td>
                                    <td>{{$item->userB->name}} </td>
                                    <td>{{$item->userR->name}} </td>
                                    <td>{{$item->clients->firstname}} {{$item->clients->lastname}}</td>
                                    <th>{{$item->clients->phone}}</th>
                                    <th>
                                        @foreach($item->register_services as $service)
                                            [{{$service->services->name}}]
                                        @endforeach
                                    </th>
                                    <th>
                                        {{number_format ($item->sumPrice())}} ກີບ
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>



    </div>


@endsection



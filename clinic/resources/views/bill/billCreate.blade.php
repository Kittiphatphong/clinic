@extends('layouts.newApp')

@section('title','Que')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-clock"></i> {{isset($edit)?'ແກ້ໄຂ':'ຈ່າ​​ຍ'}}​ການບໍ​ລິ​ການ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

                        <a href="{{route('order-register.index')}}" class="btn btn-success "><i class="fa fa-list"></i> ລາຍ​ການ​ຈອງ​ຄິ​ວ</a></a>

                    </div>

                </div>
                <br>

                <div class="card-body pt-0">
                    <form method="get" action="{{route('bill.create')}}">

                        <div class="d-flex justify-content-around border p-2 mb-4 rounded bg-light">
                           <p> ລູກ​ຄ້າ:​ {{$data_register->clients->firstname}} {{$data_register->clients->lastname}}</p>
                            <p> ຈອງ​ຄິ​ວ:​ <b>{{$data_register->time_service}}</b></p>
                        </div>

                        <div class="form-group">
                            <label>ຂໍ້​ມູນ​ການ​ບໍ​ລິ​ການ</label>
                            <select class="form-control select2" id="kt_select2_3" name="service_id[]" multiple="multiple" required>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}"
                                    @if(in_array($service->id,$service_register))
                                        selected
                                        @endif
                                    >{{$service->name}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ປະ​ເພດ​ຍາ</label>
                            <select class="form-control select2" id="kt_select2_4" name="medicine_id[]" multiple="multiple" required>
                                @foreach($medicines as $medicine)
                                    <option value="{{$medicine->id}}">{{$medicine->name}} {{$medicine->slug}}</option>

                                @endforeach
                            </select>
                        </div>
                </div>

            </div>

            <button class="btn btn-primary btn-block">{{isset($edit)?'ແກ້​ໄຂ':'ເພີ່ມ'}}​</button>
            </form>
    </div>


@endsection



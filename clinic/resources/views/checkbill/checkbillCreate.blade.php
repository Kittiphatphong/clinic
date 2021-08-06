@extends('layouts.newApp')

@section('title','ຊຳ​ລະ​ເງີນ')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-hospital-user"></i> ການສຳ​ລະ​ເງີນ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

                        <a href="{{route('bill.index')}}" class="btn btn-success "><i class="fa fa-list"></i> ລາຍ​ການ​ສຳ​ລະ​ເງີນ</a></a>

                    </div>

                </div>
                <br>

                <div class="card-body pt-0">
                    <form method="post" action="{{route('check-bill.create')}}">

                        <div class="form-group">
                            <label>ລູກ​ຄ້າ</label>
                            <select class="form-control select2" id="kt_select2_1" name="client_id">
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->firstname}} {{$client->lastname}} ({{$client->phone}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ຂໍ້​ມູນ​ການ​ບໍ​ລິ​ການ</label>
                            <select class="form-control select2" id="kt_select2_3" name="service_id[]" multiple="multiple" required>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>

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
                        <div class="form-group ">
                            <label>ຄຳ​ອະ​ທິບ​ບາຍ</label>
                            <textarea class="form-control" name="description" rows="4"></textarea>
                        </div>
                </div>

            </div>

            <button class="btn btn-primary btn-block">ສົ່ງ​ຕໍ່</button>
            </form>
    </div>


@endsection



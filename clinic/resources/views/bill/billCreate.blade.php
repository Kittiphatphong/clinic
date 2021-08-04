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
                    <form method="post" action="{{isset($edit)?route('order-register.update',$edit->id):route('order-register.store')}}">
                        @csrf
                        @isset($edit)
                            @method('PATCH')
                        @endisset

                        <div class="form-group">
                            <label>ຂໍ້​ມູນ​ການ​ບໍ​ລິ​ການ</label>
                            <select class="form-control select2" id="kt_select2_3" name="service_id[]" multiple="multiple" required>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}" >{{$service->name}}</option>

                                @endforeach
                            </select>
                        </div>
                </div>

            </div>

            <button class="btn btn-primary btn-block">{{isset($edit)?'ແກ້​ໄຂ':'ເພີ່ມ'}}​</button>
            </form>
    </div>


@endsection



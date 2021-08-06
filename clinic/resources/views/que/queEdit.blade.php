@extends('layouts.newApp')

@section('title','Que')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-clock"></i> {{isset($edit)?'ແກ້ໄຂ':'ເພີ່​ມ'}}​ຂໍ້​ມູນການ​ຈອງ​ຄິ​ວ</h1>
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
                    <form method="post" action="{{route('order-register.update',$edit->id)}}">
                        @csrf
                        @isset($edit)
                            @method('PATCH')
                        @endisset



                        <div class="row">
                            <div class="form-group col-6">
                                <label>ສະ​ຖາ​ນະ</label>
                                <select class="form-control" name="status_id">
                                    @foreach($status as $item)
                                        <option value="{{$item->id}}"
                                                @if($item->id ==$edit->status_id)
                                                selected @endif>
                                            {{$item->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>ເວ​ລາ​ນັດ​ໝາ​ຍ [
                                    @if($edit->time_service != null)
                                    <span class="text-primary">{{$edit->time_service}}</span>
                                    @else
                                        <span class="text-danger">ຍັງ​ບໍ່​ທັນ​ມີ​ເວ​ລາ​ນັດ​ໝາຍ</span>
                                    @endif
                                    ]</label>
                                <input type="datetime-local" name="time_service" class="form-control"
                                       @if($edit->time_service != null)
                                       value="{{\Carbon\Carbon::create($edit->time_service)->toDateTimeLocalString()}}"
                                       @endif
                                       @if($edit->time_servie == null) required @endif>
                            </div>

                        </div>

                </div>

            </div>

            <button class="btn btn-primary btn-block">{{isset($edit)?'ແກ້​ໄຂ':'ເພີ່ມ'}}​ຄິ​ວ</button>
            </form>
    </div>


@endsection



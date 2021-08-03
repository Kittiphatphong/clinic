@extends('layouts.newApp')

@section('title','Clients')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-address-card"></i> {{isset($edit)?'ແກ້ໄຂ':'ເພີ່​ມ'}}​ລູກ​ຄ້າ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

                        <a href="{{route('client.index')}}" class="btn btn-success "><i class="fa fa-list"></i> ລາຍ​ການຂໍ້​ມູນ​ລູກ​ຄ້າ</a></a>

                    </div>
                </div>
                <br>
                <div class="card-body pt-0">
                    <form method="post" action="{{isset($edit)?route('client.update',$edit->id):route('client.store')}}">
@csrf
                        @isset($edit)
                            @method('PATCH')
                            @endisset

                        <div class="form-group">
                            <label>ຊື່ເຂົ້າ​ລະ​ບົບ​ລູກ​ຄ້າ</label>
                            <input type="text" class="form-control" name="username" value="{{isset($edit)?$edit->username:''}}" autocomplete="off">

                        </div>
                        <div class="form-group row">
    <div class="col-6">
        <label>ຊື່</label>
        <input type="text" class="form-control" name="firstname" value="{{isset($edit)?$edit->firstname:''}}">
    </div>
    <div class="col-6">
    <label>ນາມ​ສະ​ກຸນ</label>
    <input type="text" class="form-control" name="lastname" value="{{isset($edit)?$edit->lastname:''}}">
    </div>
</div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label>ເພດ</label>
                            <select class="form-control" name="gender">
                                <option value="ຊາຍ" @isset($edit) @if($edit->gender == 'ຊາຍ')selected  @endif @endisset>ຊາຍ</option>
                                <option value="ຍິງ" @isset($edit) @if($edit->gender == 'ຍິງ')selected @endif @endisset>ຍິງ</option>
                                <option value="ອືນໆ" @isset($edit) @if($edit->gender == 'ອືນໆ')selected @endif @endisset>ອືນໆ</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label>ວັນ​ເກີດ</label>
                            <input type="date" class="form-control" name="birthday" value="{{isset($edit)?$edit->birthday:''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label>ເບີ​ໂທ</label>
                            <input type="text" class="form-control" name="phone" value="{{isset($edit)?$edit->phone:''}}">
                        </div>
                        <div class="col-6">
                            <label>ທິ່​ຍູ່</label>
                            <input type="text" class="form-control" name="address" value="{{isset($edit)?$edit->address:''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label>ລະຫັດ​ຜ່າ​ນ</label>
                            <input type="password" class="form-control" name="password" autocomplete="off">
                        </div>
                        <div class="col-6">
                            <label>ຢືນ​ຢັນ​ລະ​ຫັດ​ຜ່າ​ນ</label>
                            <input type="password" class="form-control" name="password_confirmation" autocomplete="off">
                        </div>
                    </div>

                </div>

            </div>

            <button class="btn btn-primary btn-block">{{isset($edit)?'ແກ້​ໄຂ':'ເພີ່ມ'}} ລູກ​ຄ້າ</button>
            </form>
    </div>


@endsection



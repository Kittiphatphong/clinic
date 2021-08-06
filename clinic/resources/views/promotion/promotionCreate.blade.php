@extends('layouts.newApp')

@section('title','Promotions')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fab fa-product-hunt"></i> {{isset($edit)?'ແກ້ໄຂ':'ເພີ່​ມ'}}​ຂໍ້​ມູນໂປ​ໂມ​ຊັ້ນ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

                        <a href="{{route('promotion.index')}}" class="btn btn-success "><i class="fa fa-list"></i> ລາຍ​ການ​ໂປ​ໂມ​ຊັ້ນ</a></a>

                    </div>
                </div>
                <br>
                <div class="card-body pt-0">
                    <form method="post" action="{{isset($edit)?route('promotion.update',$edit->id):route('promotion.store')}}">
@csrf
                        @isset($edit)
                            @method('PATCH')
                            @endisset



    <div class="form-group">
        <label>ຊື່​ໂປ​ໂມ​ຊັ້ນ</label>
        <input type="text" class="form-control" name="name" value="{{isset($edit)?$edit->name:''}}" required>
    </div>


                        <div class="form-group">
                            <label>ເປີ​ເຊັນ​ສ່ວນ​ລຸດ</label>
                            <input type="number" class="form-control" name="percent" value="{{isset($edit)?$edit->percent:''}}" autocomplete="off" required>

                        </div>

                </div>

            </div>

            <button class="btn btn-primary btn-block">{{isset($edit)?'ແກ້​ໄຂ':'ເພີ່ມ'}}​ໂປ​ໂມ​ຊັ້ນ</button>
            </form>
    </div>


@endsection



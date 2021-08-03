@extends('layouts.newApp')

@section('title','Medicines')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-capsules"></i> {{isset($edit)?'ແກ້ໄຂ':'ເພີ່​ມ'}}​ຂໍ້​ມູນ​ຢາ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

                        <a href="{{route('medicine.index')}}" class="btn btn-success "><i class="fa fa-list"></i> ລາຍ​ການຂໍ້​ມູນ​ຢາ</a></a>

                    </div>
                </div>
                <br>
                <div class="card-body pt-0">
                    <form method="post" action="{{isset($edit)?route('medicine.update',$edit->id):route('medicine.store')}}">
@csrf
                        @isset($edit)
                            @method('PATCH')
                            @endisset


                        <div class="form-group row">
    <div class="col-6">
        <label>ຊື່</label>
        <input type="text" class="form-control" name="name" value="{{isset($edit)?$edit->name:''}}" required>
    </div>
    <div class="col-6">
    <label>ຊື່​ສາ​ກົນ</label>
    <input type="text" class="form-control" name="slug" value="{{isset($edit)?$edit->slug:''}}" required>
    </div>
</div>
                        <div class="form-group">
                            <label>ລາ​ຄາ</label>
                            <input type="text" class="form-control" onkeyup="format(this)" name="price" value="{{isset($edit)?$edit->price:''}}" autocomplete="off" required>

                        </div>

                </div>

            </div>

            <button class="btn btn-primary btn-block">{{isset($edit)?'ແກ້​ໄຂ':'ເພີ່ມ'}}ຂໍ້​ມູນ​ຢາ</button>
            </form>
    </div>

    <script>

        function format(input) {
            var nStr = input.value + '';
            nStr = nStr.replace(/\,/g, "");
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            input.value = x1 + x2;
        }

    </script>
@endsection



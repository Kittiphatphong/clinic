@extends('layouts.newApp')

@section('title','Service')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-concierge-bell"></i> {{isset($edit)?'ແກ້ໄຂ':'ເພີ່​ມ'}}​ຂໍ້​ມູນການ​ບໍ​ລິ​ການ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

                        <a href="{{route('service.index')}}" class="btn btn-success "><i class="fa fa-list"></i> ລາຍ​ການ​ບໍ​ລິ​ການ</a></a>

                    </div>
                </div>
                <br>
                <div class="card-body pt-0">
                    <form method="post" action="{{isset($edit)?route('service.update',$edit->id):route('service.store')}}">
@csrf
                        @isset($edit)
                            @method('PATCH')
                            @endisset



    <div class="form-group">
        <label>ການ​ບໍ​ລິ​ການ</label>
        <input type="text" class="form-control" name="name" value="{{isset($edit)?$edit->name:''}}" required>
    </div>


                        <div class="form-group">
                            <label>ລາ​ຄາ</label>
                            <input type="text" class="form-control" onkeyup="format(this)" name="price" value="{{isset($edit)?$edit->price:''}}" autocomplete="off" required>

                        </div>

                </div>

            </div>

            <button class="btn btn-primary btn-block">{{isset($edit)?'ແກ້​ໄຂ':'ເພີ່ມ'}}​ບໍ​ລິ​ການ</button>
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



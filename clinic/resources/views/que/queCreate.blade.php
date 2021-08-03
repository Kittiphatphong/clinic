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
                    <form method="post" action="{{isset($edit)?route('order-register.update',$edit->id):route('order-register.store')}}">
@csrf
                        @isset($edit)
                            @method('PATCH')
                            @endisset


<div class="row">


    <div class="form-group col-6">
        <label>ເວ​ລາ​ນັດ​ໝາ​ຍ</label>
        <input type="datetime-local" name="time_service" class="form-control" placeholder="Select date & time"  required />
    </div>
                        <div class="form-group  col-6">
                            <label>ລູກ​ຄ້າ</label>
                            <select class="form-control select2" id="kt_select2_1" name="client_id">
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->firstname}} {{$client->lastname}} ({{$client->phone}})</option>
                                @endforeach
                            </select>
                        </div>
</div>
    <div class="form-group ">
        <label>ຄຳ​ອະ​ທິບ​ບາຍ</label>
        <textarea class="form-control" name="description" rows="4"></textarea>
    </div>

                </div>

            </div>

            <button class="btn btn-primary btn-block">{{isset($edit)?'ແກ້​ໄຂ':'ເພີ່ມ'}}​ຄິ​ວ</button>
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



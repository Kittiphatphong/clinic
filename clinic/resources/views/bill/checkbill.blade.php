@extends('layouts.newApp')

@section('title','ຊຳ​ລະ​ເງີນ')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-shopping-cart"></i> ສຳ​ລະ​ເງີນ</h1>
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
                    <form method="post" action="{{route('bill.store')}}">

                    @csrf
                        <div class="form-group">
                            <label>ຊຳ​ລະ​ການ​ບໍ​ລິ​ການ</label>
                            <div class="border">
                            @foreach($service_id as $key => $id)
                           <div class="p-3 row">
                               <div class="col-4">
                               <h6>{{\App\Models\Service::find($id)->name}} <b>{{number_format(\App\Models\Service::find($id)->price)}} ກີບ</b> </h6>
                               </div>

                               <div class="col-4">
                                   <input type="number" class="form-control" placeholder="ໃສ່​ຈຳ​ນວນ">
                               </div>
                           </div>
                            @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ຊຳ​ລະ​ຄ່າ​ຢາ</label>
                            <div class="border">
                            @foreach($medicine_id as $key => $id)
                                <div class="p-3 row">
                                    <div class="col-4">
                                        <h6>{{\App\Models\Medicine::find($id)->name}} <b>{{number_format(\App\Models\Medicine::find($id)->price)}} ກີບ</b> </h6>
                                    </div>

                                    <div class="col-4">
                                        <input type="number" class="form-control" placeholder="ໃສ່​ຈຳ​ນວນ">
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>


                </div>

            </div>

            <button class="btn btn-primary btn-block">{{isset($edit)?'ແກ້​ໄຂ':'ສຳ​ລະ'}}​</button>
            </form>
    </div>


@endsection



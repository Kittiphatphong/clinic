@extends('layouts.newApp')

@section('title','ການ​ໃຊ້​ບໍ​ລິ​ການ')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-hospital-user"></i> ຈັດ​ການ​ຂໍ້​ມູນການ​ໃຊ້​ບໍ​ລິ​ການ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

                        <a href="{{route('check-bill.create')}}" class="btn btn-success "><i class="fa fa-plus"></i> ເພີ່ມ​ຂໍ້​ມູນໃຊ້​ບໍ​ລິ​ການ</a></a>

                    </div>
                </div>
                <br>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-checkable col-12" id="kt_datatable" style="margin-top: 13px !important">
                            <thead>
                            <tr>

                                <th>ເວ​ລາຊຳ​ລະ</th>
                                <th>ລູກ​ຄ້າ</th>
                                <th>ເບີ​ໂທ​ລູກ​ຄ້າ</th>
                                <th>ຜູ້​ນັດ​ລູກ​ຄ້າ</th>
                                <th>ຜູ້​ຮັບຊຳ​ລະ</th>
                                <th>ການ​ບໍ​ລິ​ການ</th>
                                <th>ຈຳນວນ​ເງີນ</th>
                                <th>ຮູບ​ແບບ</th>
                                <th>ຄຳ​ສັ່ງ</th>
                                <th>ເວ​ລາ​ນັດພົບ</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_bills as $item)
                                <tr>
                                    <td>{{$item->updated_at}}</td>
                                    <td>{{$item->clients->firstname}} {{$item->clients->lastname}}</td>
                                    <td>{{$item->clients->phone}}</td>
                                    <td>{{$item->userR->name}}</td>
                                    <td>{{$item->userB->name}}</td>
                                    <td>
                                        @foreach($item->bills as $service)
                                            [{{$service->name}}]
                                        @endforeach
                                    </td>
                                    <td>
                                        {{number_format ($item->sumPrice())}} ກີບ
                                        @if($item->discount >0)
                                           <span class="text-danger"> (-{{$item->discount}} %)</span>
                                            <strike class="text-secondary">{{number_format ($item->priceUnDiscount())}}ກີບ</strike>
                                            @endif
                                    </td>
                                    <td>
                                        @if($item->booking_status == 1)
                                                  <span class="badge badge-success"><i class="fas fa-clock"></i> ຈອງ​ຄິ​ວ</span>
                                        @else
                                            <span class="badge badge-primary"><i class="fas fa-home"></i> ໜ້າ​ຮ້າ​ນ</span>
                                        @endif


                                    </td>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start m-0">
{{--                                            <a href="{{route('order-register.edit',$item->id)}}" class="btn btn-link" ><i class="far fa-edit"></i></a>--}}
                                            <a href="{{route('bill.show',$item->id)}}" class="btn btn-link" ><i class="fa fa-print"></i></a>
                                            <form action="{{route('bill.destroy',$item->id)}}" method="post" class="delete{{$item->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" btn btn-link delete_button" data-id="{{$item->id}}"><i class="fas fa-trash"></i></button>
                                            </form>

                                        </div>

                                    </td>
                                    <td>{{$item->time_service}}</td>



                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>



    </div>


@endsection



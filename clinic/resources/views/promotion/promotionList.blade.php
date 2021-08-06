@extends('layouts.newApp')

@section('title','Promotions')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fab fa-product-hunt"></i> ຈັດ​ການ​ຂໍ້​ມູນໂປ​ໂມ​ຊັ້ນ</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

                        <a href="{{route('promotion.create')}}" class="btn btn-success "><i class="fa fa-plus"></i> ເພີ່ມ​ຂໍ້​ມູນໂປ​ໂມ​ຊັ້ນ</a></a>

                    </div>
                </div>
                <br>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-checkable col-12" id="kt_datatable" style="margin-top: 13px !important">
                            <thead>
                            <tr>

                                <th>ໄອ​ດີ</th>
                                <th>ໂປ​ໂມ​ຊັ້ນ</th>

                                <th>ເປີ​ເຊັນ</th>

                                <th>ຄຳ​ສັ່ງ</th>
                                <th>ເວ​ລາ</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_promotions as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}} </td>

                                    <td>{{$item->percent}} %</td>

                                    <td>
                                        <div class="d-flex justify-content-start m-0">
                                            <a href="{{route('promotion.edit',$item->id)}}" class="btn btn-link" ><i class="far fa-edit"></i></a>
                                            <form action="{{route('promotion.destroy',$item->id)}}" method="post" class="delete{{$item->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" btn btn-link delete_button" data-id="{{$item->id}}"><i class="fas fa-trash"></i></button>
                                            </form>

                                        </div>

                                    </td>
                                    <td>{{$item->updated_at}}</td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>



    </div>


@endsection



@extends('layouts.newApp')

@section('title','ໜ້າລັກ')

@section('content')

    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-address-card"></i> จัดการข้อมูลสมาชิก</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">



            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">
                        <a href="https://devtai.com/">
                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-user-plus"></i> เพิ่มข้อมูล สมาชิก</button></a>

                    </div>
                </div>
                <br>
                <div class="card-body p-1">
                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                <tr role="row" class="info">
                                    <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ลำดับ</th>
                                    <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่อ</th>
                                    <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">นามสกุล</th>
                                    <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">อีเมล์</th>
                                    <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">เบอร์โทร</th>
                                    <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ที่อยู่</th>
                                    <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">-</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>
                                        No.
                                    </td>
                                    <td>
                                        วัยวุฒิ
                                    </td>
                                    <td>
                                        ชุมเมืองปัก
                                    </td>
                                    <td>
                                        devtai@gmail.com
                                    </td>
                                    <td>
                                        098-373-8651
                                    </td>
                                    <td>
                                        310/181 บางปะกอก กรุงเทพมหานคร
                                    </td>
                                    <td>

                                        <a class="btn btn-info btn-xs" href="https://www.youtube.com/watch?v=ogcLWCZx80I" target="_blank">
                                            <i class="fas fa-eye">
                                            </i>

                                        </a>


                                        <a class="btn btn-warning btn-xs" href="https://www.youtube.com/watch?v=dS5huqAyE30" target="_blank">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>

                                        <a class="btn btn-danger btn-xs" href="https://www.youtube.com/watch?v=ww_rpK-Sz3c" target="_blank">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                        </a>
                                    </td>


                                </tr>
                                <tr>
                                    <td>
                                        No.
                                    </td>
                                    <td>
                                        วัยวุฒิ
                                    </td>
                                    <td>
                                        ชุมเมืองปัก
                                    </td>
                                    <td>
                                        devtai@gmail.com
                                    </td>
                                    <td>
                                        098-373-8651
                                    </td>
                                    <td>
                                        310/181 บางปะกอก กรุงเทพมหานคร
                                    </td>
                                    <td>

                                        <a class="btn btn-info btn-xs" href="https://www.youtube.com/watch?v=ogcLWCZx80I" target="_blank">
                                            <i class="fas fa-eye">
                                            </i>

                                        </a>


                                        <a class="btn btn-warning btn-xs" href="https://www.youtube.com/watch?v=dS5huqAyE30" target="_blank">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>

                                        <a class="btn btn-danger btn-xs" href="https://www.youtube.com/watch?v=ww_rpK-Sz3c" target="_blank">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                        </a>
                                    </td>


                                </tr>
                                <tr>
                                    <td>
                                        No.
                                    </td>
                                    <td>
                                        วัยวุฒิ
                                    </td>
                                    <td>
                                        ชุมเมืองปัก
                                    </td>
                                    <td>
                                        devtai@gmail.com
                                    </td>
                                    <td>
                                        098-373-8651
                                    </td>
                                    <td>
                                        310/181 บางปะกอก กรุงเทพมหานคร
                                    </td>
                                    <td>

                                        <a class="btn btn-info btn-xs" href="https://www.youtube.com/watch?v=ogcLWCZx80I" target="_blank">
                                            <i class="fas fa-eye">
                                            </i>

                                        </a>


                                        <a class="btn btn-warning btn-xs" href="https://www.youtube.com/watch?v=dS5huqAyE30" target="_blank">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>

                                        <a class="btn btn-danger btn-xs" href="https://www.youtube.com/watch?v=ww_rpK-Sz3c" target="_blank">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                        </a>
                                    </td>


                                </tr>
                                <tr>
                                    <td>
                                        No.
                                    </td>
                                    <td>
                                        วัยวุฒิ
                                    </td>
                                    <td>
                                        ชุมเมืองปัก
                                    </td>
                                    <td>
                                        devtai@gmail.com
                                    </td>
                                    <td>
                                        098-373-8651
                                    </td>
                                    <td>
                                        310/181 บางปะกอก กรุงเทพมหานคร
                                    </td>
                                    <td>

                                        <a class="btn btn-info btn-xs" href="https://www.youtube.com/watch?v=ogcLWCZx80I" target="_blank">
                                            <i class="fas fa-eye">
                                            </i>

                                        </a>


                                        <a class="btn btn-warning btn-xs" href="https://www.youtube.com/watch?v=dS5huqAyE30" target="_blank">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>

                                        <a class="btn btn-danger btn-xs" href="https://www.youtube.com/watch?v=ww_rpK-Sz3c" target="_blank">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                        </a>
                                    </td>


                                </tr>
                                <tr>
                                    <td>
                                        No.
                                    </td>
                                    <td>
                                        วัยวุฒิ
                                    </td>
                                    <td>
                                        ชุมเมืองปัก
                                    </td>
                                    <td>
                                        devtai@gmail.com
                                    </td>
                                    <td>
                                        098-373-8651
                                    </td>
                                    <td>
                                        310/181 บางปะกอก กรุงเทพมหานคร
                                    </td>
                                    <td>

                                        <a class="btn btn-info btn-xs" href="https://www.youtube.com/watch?v=ogcLWCZx80I" target="_blank">
                                            <i class="fas fa-eye">
                                            </i>

                                        </a>


                                        <a class="btn btn-warning btn-xs" href="https://www.youtube.com/watch?v=dS5huqAyE30" target="_blank">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>

                                        <a class="btn btn-danger btn-xs" href="https://www.youtube.com/watch?v=ww_rpK-Sz3c" target="_blank">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                        </a>
                                    </td>


                                </tr>
                                <tr>
                                    <td>
                                        No.
                                    </td>
                                    <td>
                                        วัยวุฒิ
                                    </td>
                                    <td>
                                        ชุมเมืองปัก
                                    </td>
                                    <td>
                                        devtai@gmail.com
                                    </td>
                                    <td>
                                        098-373-8651
                                    </td>
                                    <td>
                                        310/181 บางปะกอก กรุงเทพมหานคร
                                    </td>
                                    <td>

                                        <a class="btn btn-info btn-xs" href="https://www.youtube.com/watch?v=ogcLWCZx80I" target="_blank">
                                            <i class="fas fa-eye">
                                            </i>

                                        </a>


                                        <a class="btn btn-warning btn-xs" href="https://www.youtube.com/watch?v=dS5huqAyE30" target="_blank">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>

                                        <a class="btn btn-danger btn-xs" href="https://www.youtube.com/watch?v=ww_rpK-Sz3c" target="_blank">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                        </a>
                                    </td>


                                </tr>
                                <tr>
                                    <td>
                                        No.
                                    </td>
                                    <td>
                                        วัยวุฒิ
                                    </td>
                                    <td>
                                        ชุมเมืองปัก
                                    </td>
                                    <td>
                                        devtai@gmail.com
                                    </td>
                                    <td>
                                        098-373-8651
                                    </td>
                                    <td>
                                        310/181 บางปะกอก กรุงเทพมหานคร
                                    </td>
                                    <td>

                                        <a class="btn btn-info btn-xs" href="https://www.youtube.com/watch?v=ogcLWCZx80I" target="_blank">
                                            <i class="fas fa-eye">
                                            </i>

                                        </a>


                                        <a class="btn btn-warning btn-xs" href="https://www.youtube.com/watch?v=dS5huqAyE30" target="_blank">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>

                                        <a class="btn btn-danger btn-xs" href="https://www.youtube.com/watch?v=ww_rpK-Sz3c" target="_blank">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                        </a>
                                    </td>


                                </tr>


                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-1" >

                        </div>
                    </div>
                </div>

            </div>



    </div>
@endsection



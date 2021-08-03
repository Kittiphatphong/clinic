@extends('layouts.newApp')

@section('title','New user')

@section('content')
    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <h1><i class="nav-icon fas fa-user"></i> {{isset($edit)?'ແກ້​ໄຂ':'ເພີ່ມ'}}ຜູ້​ໃຊ້</h1>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header card-navy card-outline">


                    <div align="right">

                        <a href="{{route('user.index')}}" class="btn btn-success "><i class="fa fa-list"></i> ລາຍ​ການຜຸ້​ໃຊ້</a></a>

                    </div>
                </div>
                <br>
                <div class="card-body pt-0">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

                    <form method="POST" action="{{isset($edit)? route('user.update',$edit->id):route('register')  }}">
                    @csrf
                    @isset($edit)
                        @method('PATCH')
                    @endisset
                    <!-- Name -->
                        <div>
                            <label>ຊຶ່ ແລະ​​ ນາມ​ສະ​ກຸນ</label>

                            <x-input id="name" class="block mt-1 w-full form-control" type="text" name="name" value="{{isset($edit)? $edit->name: ''}}" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <label>ຊື່​ສຳ​ລັບ​ເຂົ້າ​ລະ​ບົບ</label>

                            <x-input  class="block mt-1 w-full form-control" type="text" name="email" value="{{isset($edit)? $edit->email: ''}}" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <label>ລະ​ຫັດ​ຜ່າ​ນ</label>

                            <x-input id="password" class="block mt-1 w-full form-control"
                                     type="password"
                                     name="password"
                                     autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <label>ຢຶນ​ຢັນ​ລະ​ຫັດ​ຜ່າ​ນ</label>

                            <x-input id="password_confirmation" class="block mt-1 w-full form-control"
                                     type="password"
                                     name="password_confirmation"  />
                        </div>

                        <div class="flex items-center justify-end mt-4">


                        <button class="btn btn-primary btn-lg">{{isset($edit)?'ແກ້​ໄຂ':'ລົງ​ທະ​ບຽນ'}}</button>
                        </div>
                    </form>

                </div>

            </div>



    </div>


@endsection





<!doctype html>
<html lang="en">
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }

        @font-face {
            font-family: 'noto';
            src: url("{{asset('assets/NotoSansLao-Bold.ttf')}}");
        }
        body {
            font-family: noto;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>ໃບ​ສຳ​ລະ​ເງີນ</h2><h3 class="pull-right">ເລກ​ບິນ #{{$service->id}}</h3>
            </div>
            <hr>

            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>ຄີ​ນິກ​ຂ້ອຍ:</strong><br>
                        <i class="fas fa-phone-square-alt"></i><br>
                        jsmith@email.com
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>ວັນ​ທີ​ອອກ​ບິນ:</strong><br>
                        {{$service->updated_at}}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>ລວມ​ລາຍ​ການ</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="h4">
                                <td><strong>ລາຍ​ການ</strong></td>
                                <td class="text-center"><strong>ລາ​ຄາ</strong></td>
                                <td class="text-center"><strong>ຈຳ​ນວນ</strong></td>
                                <td class="text-right"><strong>ລວມ</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($service->bills as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td class="text-center"><b>{{number_format($item->price)}}</b> ກີບ</td>
                                <td class="text-center">{{$item->amount}}</td>
                                <td class="text-right"><b>{{$item->totalPrice()}}</b> ກີບ</td>
                            </tr>
                           @endforeach
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>ລາ​ຄາ​ເຕັມ</strong></td>
                                <td class="thick-line text-right"><b>{{number_format($service->priceUnDiscount())}} ກິບ</b></td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>ສວນ​ລົດ</strong></td>
                                <td class="no-line text-right">- {{$service->discount}} %</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>ລວມ</strong></td>
                                <td class="no-line text-right"><b>{{number_format($service->sumPrice())}} ກິບ</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

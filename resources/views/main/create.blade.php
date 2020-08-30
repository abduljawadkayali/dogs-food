@extends('layouts.User')
@section('header')
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    @include('include.footer')
@endsection
@section('content')

    <div class="container-fluid"id="display" style="visibility: hidden;">

        <h1>
            <div class="row">
                <div class="col-md-6">
                    <i class="fas fa-plus"></i> @lang("Yeni çözum Üret")
                </div>
                    <div class="col-md-2">
            <button style="float: right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        <span class="fas fa-plus">
                        </span>
                @lang("Yiyecek Seç")</button>
                    </div>
                <div class="col-md-2">
            <button id="lpbutton" style="float: right; " type="button" class="btn btn-primary" onclick="lp()">
                        <span class="fas fa-running">
                        </span>
                @lang("Lp Çözdür")</button>
            </div>
                <div class="col-md-2">
            <button style="float: right; " type="button" class="btn btn-danger" onclick="solution()">
                        <span class="fas fa-hand-paper">
                        </span>
                @lang("Çözdür")</button>
                    </div>

            </div>




        </h1>

        <div id="app" v-cloak  >


        </div>


        </div>


			<hr>


			 {{ Form::open(array('url' => 'solution', 'method' => 'POST'))}}
        <div class="row">
            <div class="col-md-9">
        <div class="form-group">
            <div class="col-md-12" >
                <div class="form-group">
                    <div id="app"></div>

                    <table  class="scroll1" id="result" >
                        <tr style="background-color: #fff">
                            <th >@lang("Yiyecekler")</th>
                            <th>@lang("Fiyat")</th>
                            <th>@lang("Eldeki Miktar")</th>
                            <th  id="Lp"  >@lang("Lp Hesaplanan Miktar")</th>

                            <th id="Hesaplanan"  >@lang("Hesaplanan Fiyat")</th>
                            <th  id="Besin"  >@lang("Besin madde")</th>
                            <th  id="Ihtyac"  >@lang("Köpek Ihtyacı")</th>
                            <th  id="Yiyecek"  >@lang("Yiyecek")</th>
                            <th id="Sonuc"  >@lang("Sonuç")</th>
                            <th id="percent"  >@lang("%")</th>
                            <th id="km"  >@lang("Km %")</th>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        </div>
            <div class="col-md-3" >
                <div class="form-group">
                    <label for="animal_id">@lang("Köpek Seç")</label>
                    <select name="animal_id" class="form-control">
                        <option value="">@lang("--- Köpek Seç ---")</option>
                        @foreach ($Animal as $key => $value)
                            <option value="{{ $value->id }}">{{ __($value->name) }}</option>
                        @endforeach
                    </select>
                    <label id="familyId" style="visibility: hidden;">@lang("Köpek ırkı: ")</label>
                    <label id="family"></label><br>
                    <label id="foodId" style="visibility: hidden;">@lang("yiyecek türü: ")</label>
                    <label id="food"></label><br>
                    <label id="motionId" style="visibility: hidden;">@lang("Hareket Durumu: ")</label>
                    <label id="motion"></label><br>
                    <label id="ageId" style="visibility: hidden;">@lang("Yaş Kategoresi: ")</label>
                    <label id="age"></label><br>
                    <table name="dog" id="myTable" style="visibility: hidden;">
<tr>
    <th>@lang("Özellik")</th>
    <th>@lang("En Az")</th>
    <th>@lang("En Çok")</th>
    <th>@lang("Değer")</th>
</tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
        <table class="scroll" id="result2" >
            <tr  style="background-color: #fff">
                <th >@lang("Yiyecekler")</th>
                <th>@lang("En Az")</th>
                <th>@lang("En Çok")</th>
                <th>@lang("Yiyecek grubu")</th>
                <th   >@lang("Km")</th>
                <th   >@lang("HP")</th>
                <th   >@lang("Lif")</th>
                <th   >@lang("Kul")</th>
                <th   >@lang("CHO")</th>
                <th   >@lang("Kalsiyum")</th>
                <th   >@lang("Fosfor")</th>
                <th   >@lang("Ca/P")</th>
                <th   >@lang("Magnezyum")</th>
                <th   >@lang("Sodyum")</th>
                <th   >@lang("Taurin")</th>
                <th   >@lang("Yag")</th>
                <th   >@lang("Linoleik asit")</th>
                <th   >@lang("Fiyat")</th>


            </tr>

        </table>
            </div>
        </div>
        <div class="row">
        <div class="col-md-3">
           
            {{ Form::close() }}
         </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="container-fluid">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang("Hammadde Seç")</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <nav>

                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">


                        @foreach ($foodGroup as $key => $value)
                @if($value->id ==1)
                                <a class="nav-item nav-link show active" id="{{ $value->id  }}" data-toggle="tab" href="#nav-{{ $value->id  }}" role="tab" aria-controls="nav-profile" aria-selected="false">{{ __($value->name) }}</a>
                            @else
                                <a class="nav-item nav-link" id="{{ $value->id  }}" data-toggle="tab" href="#nav-{{ $value->id  }}" role="tab" aria-controls="nav-profile" aria-selected="false">{{ __($value->name) }}</a>

                        @endif
                        @endforeach

                            </div>
                            </nav>

                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                <div class="tab-content py-6 px-3 px-sm-0" id="nav-tabContent">
                                    @foreach ($foodGroup as $key => $value)
                                        @if($value->id ==1)

                                            <div class="tab-pane fade active show" id="nav-{{ $value->id }}" role="tabpanel" aria-labelledby="nav-{{ $value->id }}-tab">
                                                <div id="pickList{{ $value->id }}"></div>
                                            </div>
                                        @else

                                            <div class="tab-pane fade" id="nav-{{ $value->id }}" role="tabpanel" aria-labelledby="nav-{{ $value->id }}-tab">
                                                <div id="pickList{{ $value->id }}"></div>
                                            </div>

                                    @endif



                                @endforeach



                                </div>
                                <div class="container">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"></h3>
                                        </div>
                                        <table class="table">
                                            <thead>

                                            <tr class="table-active">
                                                <th scope="col">@lang("Yiyecek")</th>
                                                <th scope="col">@lang("En Az")</th>
                                                <th scope="col">@lang("En Çok")</th>
                                                <th scope="col">@lang("Fiyat")</th>
                                                <th scope="col">@lang("KM")</th>
                                                <th scope="col">@lang("HP")</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td id="foodname" scope="row"></td>
                                                <td id="min"></td>
                                                <td id="max"></td>
                                                <td id="Fiyat"></td>
                                                <td id="km"></td>
                                                <td id="hp"></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <table class="table">
                                            <thead>
                                            <tr class="table-active">
                                                <th scope="col">@lang("Lif")</th>
                                                <th scope="col">@lang("Kul")</th>
                                                <th scope="col">@lang("Karbonhidrat")</th>
                                                <th scope="col">@lang("Kalsiyum")</th>
                                                <th scope="col">@lang("Fosfor")</th>
                                                <th scope="col">@lang("Magnezyum")</th>
                                                <th scope="col">@lang("Sodyum")</th>
                                                <th scope="col">@lang("Taurin")</th>
                                                <th scope="col">@lang("Oil")</th>
                                                <th scope="col">@lang("Linoleik")</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td id="lif" scope="row"></td>
                                                <td id="kul" scope="row"></td>
                                                <td id="karbonhidrat" scope="row"></td>
                                                <td id="Kalsiyum" scope="row"></td>
                                                <td id="fosfor" scope="row"></td>
                                                <td id="Magnezyum" scope="row"></td>
                                                <td id="Sodyum" scope="row"></td>
                                                <td id="Taurin" scope="row"></td>
                                                <td id="Oil" scope="row"></td>
                                                <td id="Linoleik" scope="row"></td>


                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button  onclick="aktar()" type="button" class="btn btn-primary" data-dismiss="modal"><span class="fas fa-check">
                        </span>@lang("  Seçenekleri Aktar")</button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="fas fa-times">
                        </span> @lang("  Seçmeden Kapat")   </button>

                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="width: 48px">
                <span class="fa fa-spinner fa-spin fa-3x"></span>
            </div>
        </div>
    </div>
    <div class="modal-body">
    </div>
    <style>
        .bd-example-modal-lg .modal-dialog{
            display: table;
            position: relative;
            margin: 0 auto;
            top: calc(50% - 24px);
        }

        .bd-example-modal-lg .modal-dialog .modal-content{
            background-color: transparent;
            border: none;
        }

        table {
            font-family: arial, sans-serif!important;
            border-collapse: collapse!important;
            width: 100%!important;
            padding: 1px!important;
        }

        td, th {
            border: 1px solid #dddddd!important;
            text-align: center;
            padding: 1px!important;
        }

        #motionId, #food, #foodId, #motion, #family, #familyId, #age, #ageId, #myTable{
            font-size: 12px!important;
            padding: 1px!important;
        }
        .scroll1{
            display: block!important;
            max-height: 500px!important;
            overflow-y: auto!important;
        }

        .scroll{
            display: block!important;
            max-height: 550px!important;
            overflow-y: auto!important;
        }

        th {
            position: -webkit-sticky!important;
            position: sticky!important;
            top: 0!important;
            z-index: 2!important;
            background-color: white!important;
        }
    </style>

    <script type="text/javascript">

        function solution() {

          //  console.log("animalID");
                var animalID = jQuery('select[name="animal_id"]').val();
                if(animalID){
                    var foods =[];
                    var foodValue =[];
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var table = document.getElementById("result");
                    var r=1; //start counting rows in table
                    while(row=table.rows[r++])
                    {
                        foods.push(row.cells[0].innerHTML);
                        foodValue.push(row.cells[2].innerHTML);
                        cell=row.cells[0];
                        // console.log(cell.innerHTML);
                        cell=row.cells[2];
                        //  console.log(cell.innerHTML);

                    }

                    $.ajax({
                        /* the route pointing to the post function */
                        url: '/cozum',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN, data:[foods,foodValue,animalID] },
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            console.log(data);
                            karma = data['karma']['karma_specific_value'][0];
                            animal = data['animal']['animal_need'][0];
                           // console.log(karma);
                            var r =1;
                            table.rows[1].cells[5].innerHTML = '@lang("Dry Matter,g")';

                            table.rows[1].cells[6].innerHTML ='';
                            table.rows[1].cells[7].innerHTML = karma['Km'];
                            table.rows[1].cells[8].innerHTML = data['KmSonuc'];
                            table.rows[1].cells[9].innerHTML = data['KmPercent'];
                            table.rows[1].cells[10].innerHTML = data['KmKM'];

                            table.rows[2].cells[5].innerHTML = '@lang("Raw Protein,g")';

                            table.rows[2].cells[6].innerHTML =animal['Hp'];
                            table.rows[2].cells[7].innerHTML = karma['Hp'];
                            table.rows[2].cells[8].innerHTML = data['HpSonuc'];
                            table.rows[2].cells[9].innerHTML = data['HpPercent'];
                            table.rows[2].cells[10].innerHTML = data['HpKM'];

                            table.rows[3].cells[5].innerHTML = '@lang("Energy, kcal")';

                            table.rows[3].cells[6].innerHTML =animal['Enerji'];
                            table.rows[3].cells[7].innerHTML = karma['Enerji'];
                            table.rows[3].cells[8].innerHTML = data['EnerjiSonuc'];
                            table.rows[3].cells[9].innerHTML = data['EnerjiPercent'];
                            table.rows[3].cells[10].innerHTML = data['EnerjiKM'];


                            table.rows[4].cells[5].innerHTML = '@lang("Lif,g")';

                            table.rows[4].cells[6].innerHTML =animal['Lif'];
                            table.rows[4].cells[7].innerHTML = karma['Lif'];
                            table.rows[4].cells[8].innerHTML = data['LifSonuc'];
                            table.rows[4].cells[9].innerHTML = data['LifPercent'];
                            table.rows[4].cells[10].innerHTML = data['LifKM'];

                            table.rows[5].cells[5].innerHTML = '@lang("Kul,g")';

                            table.rows[5].cells[6].innerHTML =animal['Kul'];
                            table.rows[5].cells[7].innerHTML = karma['Kul'];
                            table.rows[5].cells[8].innerHTML = data['KulSonuc'];
                            table.rows[5].cells[9].innerHTML = data['KulPercent'];
                            table.rows[5].cells[10].innerHTML = data['KulKM'];

                            table.rows[6].cells[5].innerHTML = '@lang("Carbohydrate,g")';

                            table.rows[6].cells[6].innerHTML =animal['Karbonhidrat'];
                            table.rows[6].cells[7].innerHTML = karma['Karbonhidrat'];
                            table.rows[6].cells[8].innerHTML = data['KarbonhidratSonuc'];
                            table.rows[6].cells[9].innerHTML = data['KarbonhidratPercent'];
                            table.rows[6].cells[10].innerHTML = data['KarbonhidratKM'];

                            table.rows[7].cells[5].innerHTML = '@lang("Calcium,g")';

                            table.rows[7].cells[6].innerHTML =animal['Kalsiyum'];
                            table.rows[7].cells[7].innerHTML = karma['Kalsiyum'];
                            table.rows[7].cells[8].innerHTML = data['KalsiyumSonuc'];
                            table.rows[7].cells[9].innerHTML = data['KalsiyumPercent'];
                            table.rows[7].cells[10].innerHTML = data['KalsiyumKM'];

                            table.rows[8].cells[5].innerHTML = '@lang("Fosfor,g")';

                            table.rows[8].cells[6].innerHTML =animal['Fosfor'];
                            table.rows[8].cells[7].innerHTML = karma['Fosfor'];
                            table.rows[8].cells[8].innerHTML = data['FosforSonuc'];
                            table.rows[8].cells[9].innerHTML = data['FosforPercent'];
                            table.rows[8].cells[10].innerHTML = data['FosforKM'];

                            table.rows[9].cells[5].innerHTML = '@lang("Ca/P,%")';

                            table.rows[9].cells[6].innerHTML =animal['Ca_p'];
                            table.rows[9].cells[7].innerHTML = karma['Ca_p'];
                            table.rows[9].cells[8].innerHTML = data['Ca_pSonuc'];
                            table.rows[9].cells[9].innerHTML = data['Ca_pPercent'];
                            table.rows[9].cells[10].innerHTML = data['Ca_pKM'];

                            table.rows[10].cells[5].innerHTML = '@lang("Magnesium,mg")';

                            table.rows[10].cells[6].innerHTML =animal['Meganizyum'];
                            table.rows[10].cells[7].innerHTML = karma['Meganizyum'];
                            table.rows[10].cells[8].innerHTML = data['MeganizyumSonuc'];
                            table.rows[10].cells[9].innerHTML = data['MeganizyumPercent'];
                            table.rows[10].cells[10].innerHTML = data['MeganizyumKM'];

                            table.rows[11].cells[5].innerHTML = '@lang("Sodium,mg")';

                            table.rows[11].cells[6].innerHTML =animal['Sodyum'];
                            table.rows[11].cells[7].innerHTML = karma['Sodyum'];
                            table.rows[11].cells[8].innerHTML = data['SodyumSonuc'];
                            table.rows[11].cells[9].innerHTML = data['SodyumPercent'];
                            table.rows[11].cells[10].innerHTML = data['SodyumKM'];

                            table.rows[12].cells[5].innerHTML = '@lang("Taurin,g")';

                            table.rows[12].cells[6].innerHTML =animal['Taurin'];
                            table.rows[12].cells[7].innerHTML = karma['Taurin'];
                            table.rows[12].cells[8].innerHTML = data['TaurinSonuc'];
                            table.rows[12].cells[9].innerHTML = data['TaurinPercent'];
                            table.rows[12].cells[10].innerHTML = data['TaurinKM'];

                            table.rows[13].cells[5].innerHTML = '@lang("Oil,g")';

                            table.rows[13].cells[6].innerHTML =animal['Yag'];
                            table.rows[13].cells[7].innerHTML = karma['Yag'];
                            table.rows[13].cells[8].innerHTML = data['YagSonuc'];
                            table.rows[13].cells[9].innerHTML = data['YagPercent'];
                            table.rows[13].cells[10].innerHTML = data['YagKM'];

                            table.rows[14].cells[5].innerHTML = '@lang("Linoliek Acid, g")';

                            table.rows[14].cells[6].innerHTML =animal['LinoliekAsit'];
                            table.rows[14].cells[7].innerHTML = karma['LinoliekAsit'];
                            table.rows[14].cells[8].innerHTML = data['LinoliekAsitSonuc'];
                            table.rows[14].cells[9].innerHTML = data['LinoliekAsitPercent'];
                            table.rows[14].cells[10].innerHTML = data['LinoliekAsitKM'];



                        }
                    });
                  //  console.log(animalID);
                }







        }





        function lp() {


            const buton = document.getElementById('lpbutton');


                 window.check ++;
                 if (window.check > 7)
                 {
                     window.check = 2;
                     window.bool = false;
                 }


            console.log(window.check);
            var foods =[];
            var foodValue =[];
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = document.getElementById("result");
            var r=1; //start counting rows in table
            while(row=table.rows[r++])
            {
                foods.push(row.cells[0].innerHTML);
                foodValue.push(row.cells[2].innerHTML);
                cell=row.cells[0];
               // console.log(cell.innerHTML);
                cell=row.cells[2];
              //  console.log(cell.innerHTML);

            }



            $.ajax({

                /* the route pointing to the post function */
                url: '/aiFood',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, data:[foods,foodValue] },
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {


                    window.Variable  = data[0];
                    window.Constraint  = data[1];
                    if ( window.bool !== true)
                    {
                        window.bool = true;
                        window.bool1 = false;
                        buton.click();

                    }
                    if ( window.bool1 !== true)
                    {
                        window.bool1 = true;
                        window.bool2 = false;
                        buton.click();

                    }
                    if ( window.bool2 !== true)
                    {
                        window.bool2 = true;
                        window.bool3 = false;
                        buton.click();

                    }
                    if ( window.bool3 !== true)
                    {
                        window.bool3 = true;
                        window.bool4 = false;
                        buton.click();

                    }
                    if ( window.bool4 !== true)
                    {
                        window.bool4 = true;
                        window.bool5 = false;
                        var r =1;
                        while(row=table.rows[r++])
                        {
                            row.cells[3].innerHTML = '';
                            row.cells[4].innerHTML = '';

                        }
                        buton.click();

                    }

                }
            });


           // console.log(foods );



                if(sonuc.state === true)
            {
                for (i = 0; i < sonuc.keys.length; i++) {
                    var r=1; //start counting rows in table
                    while(row=table.rows[r++])
                    {
                        if(row.cells[0].innerHTML == sonuc.keys[i])
                        {
                            row.cells[3].innerHTML = sonuc.values[i];
                            row.cells[4].innerHTML = (sonuc.values[i] * row.cells[1].innerHTML).toFixed(3);
                            break;
                        }
                    }
                   // console.log(sonuc.keys[i],sonuc.values[i] );

                }
                var animalID = jQuery('select[name="animal_id"]').val();
                if(animalID){
                    var foods =[];
                    var foodValue =[];
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var table = document.getElementById("result");
                    var r=1; //start counting rows in table
                    while(row=table.rows[r++])
                    {
                        foods.push(row.cells[0].innerHTML);
                        foodValue.push(row.cells[2].innerHTML);
                        cell=row.cells[0];
                        // console.log(cell.innerHTML);
                        cell=row.cells[2];
                        //  console.log(cell.innerHTML);

                    }

                    $.ajax({
                        /* the route pointing to the post function */
                        url: '/cozum',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN, data:[foods,foodValue,animalID] },
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            console.log(data);
                            karma = data['karma']['karma_specific_value'][0];
                            animal = data['animal']['animal_need'][0];
                            // console.log(karma);
                            var r =1;
                            table.rows[1].cells[5].innerHTML = '@lang("Dry Matter,g")';

                            table.rows[1].cells[6].innerHTML ='';
                            table.rows[1].cells[7].innerHTML = karma['Km'];
                            table.rows[1].cells[8].innerHTML = data['KmSonuc'];
                            table.rows[1].cells[9].innerHTML = data['KmPercent'];
                            table.rows[1].cells[10].innerHTML = data['KmKM'];

                            table.rows[2].cells[5].innerHTML = '@lang("Raw Protein,g")';

                            table.rows[2].cells[6].innerHTML =animal['Hp'];
                            table.rows[2].cells[7].innerHTML = karma['Hp'];
                            table.rows[2].cells[8].innerHTML = data['HpSonuc'];
                            table.rows[2].cells[9].innerHTML = data['HpPercent'];
                            table.rows[2].cells[10].innerHTML = data['HpKM'];

                            table.rows[3].cells[5].innerHTML = '@lang("Energy, kcal")';

                            table.rows[3].cells[6].innerHTML =animal['Enerji'];
                            table.rows[3].cells[7].innerHTML = karma['Enerji'];
                            table.rows[3].cells[8].innerHTML = data['EnerjiSonuc'];
                            table.rows[3].cells[9].innerHTML = data['EnerjiPercent'];
                            table.rows[3].cells[10].innerHTML = data['EnerjiKM'];


                            table.rows[4].cells[5].innerHTML = '@lang("Lif,g")';

                            table.rows[4].cells[6].innerHTML =animal['Lif'];
                            table.rows[4].cells[7].innerHTML = karma['Lif'];
                            table.rows[4].cells[8].innerHTML = data['LifSonuc'];
                            table.rows[4].cells[9].innerHTML = data['LifPercent'];
                            table.rows[4].cells[10].innerHTML = data['LifKM'];

                            table.rows[5].cells[5].innerHTML = '@lang("Kul,g")';

                            table.rows[5].cells[6].innerHTML =animal['Kul'];
                            table.rows[5].cells[7].innerHTML = karma['Kul'];
                            table.rows[5].cells[8].innerHTML = data['KulSonuc'];
                            table.rows[5].cells[9].innerHTML = data['KulPercent'];
                            table.rows[5].cells[10].innerHTML = data['KulKM'];

                            table.rows[6].cells[5].innerHTML = '@lang("Carbohydrate,g")';

                            table.rows[6].cells[6].innerHTML =animal['Karbonhidrat'];
                            table.rows[6].cells[7].innerHTML = karma['Karbonhidrat'];
                            table.rows[6].cells[8].innerHTML = data['KarbonhidratSonuc'];
                            table.rows[6].cells[9].innerHTML = data['KarbonhidratPercent'];
                            table.rows[6].cells[10].innerHTML = data['KarbonhidratKM'];

                            table.rows[7].cells[5].innerHTML = '@lang("Calcium,g")';

                            table.rows[7].cells[6].innerHTML =animal['Kalsiyum'];
                            table.rows[7].cells[7].innerHTML = karma['Kalsiyum'];
                            table.rows[7].cells[8].innerHTML = data['KalsiyumSonuc'];
                            table.rows[7].cells[9].innerHTML = data['KalsiyumPercent'];
                            table.rows[7].cells[10].innerHTML = data['KalsiyumKM'];

                            table.rows[8].cells[5].innerHTML = '@lang("Fosfor,g")';

                            table.rows[8].cells[6].innerHTML =animal['Fosfor'];
                            table.rows[8].cells[7].innerHTML = karma['Fosfor'];
                            table.rows[8].cells[8].innerHTML = data['FosforSonuc'];
                            table.rows[8].cells[9].innerHTML = data['FosforPercent'];
                            table.rows[8].cells[10].innerHTML = data['FosforKM'];

                            table.rows[9].cells[5].innerHTML = '@lang("Ca/P,%")';

                            table.rows[9].cells[6].innerHTML =animal['Ca_p'];
                            table.rows[9].cells[7].innerHTML = karma['Ca_p'];
                            table.rows[9].cells[8].innerHTML = data['Ca_pSonuc'];
                            table.rows[9].cells[9].innerHTML = data['Ca_pPercent'];
                            table.rows[9].cells[10].innerHTML = data['Ca_pKM'];

                            table.rows[10].cells[5].innerHTML = '@lang("Magnesium,mg")';

                            table.rows[10].cells[6].innerHTML =animal['Meganizyum'];
                            table.rows[10].cells[7].innerHTML = karma['Meganizyum'];
                            table.rows[10].cells[8].innerHTML = data['MeganizyumSonuc'];
                            table.rows[10].cells[9].innerHTML = data['MeganizyumPercent'];
                            table.rows[10].cells[10].innerHTML = data['MeganizyumKM'];

                            table.rows[11].cells[5].innerHTML = '@lang("Sodium,mg")';

                            table.rows[11].cells[6].innerHTML =animal['Sodyum'];
                            table.rows[11].cells[7].innerHTML = karma['Sodyum'];
                            table.rows[11].cells[8].innerHTML = data['SodyumSonuc'];
                            table.rows[11].cells[9].innerHTML = data['SodyumPercent'];
                            table.rows[11].cells[10].innerHTML = data['SodyumKM'];

                            table.rows[12].cells[5].innerHTML = '@lang("Taurin,g")';

                            table.rows[12].cells[6].innerHTML =animal['Taurin'];
                            table.rows[12].cells[7].innerHTML = karma['Taurin'];
                            table.rows[12].cells[8].innerHTML = data['TaurinSonuc'];
                            table.rows[12].cells[9].innerHTML = data['TaurinPercent'];
                            table.rows[12].cells[10].innerHTML = data['TaurinKM'];

                            table.rows[13].cells[5].innerHTML = '@lang("Oil,g")';

                            table.rows[13].cells[6].innerHTML =animal['Yag'];
                            table.rows[13].cells[7].innerHTML = karma['Yag'];
                            table.rows[13].cells[8].innerHTML = data['YagSonuc'];
                            table.rows[13].cells[9].innerHTML = data['YagPercent'];
                            table.rows[13].cells[10].innerHTML = data['YagKM'];

                            table.rows[14].cells[5].innerHTML = '@lang("Linoliek Acid, g")';

                            table.rows[14].cells[6].innerHTML =animal['LinoliekAsit'];
                            table.rows[14].cells[7].innerHTML = karma['LinoliekAsit'];
                            table.rows[14].cells[8].innerHTML = data['LinoliekAsitSonuc'];
                            table.rows[14].cells[9].innerHTML = data['LinoliekAsitPercent'];
                            table.rows[14].cells[10].innerHTML = data['LinoliekAsitKM'];



                        }
                    });
                    //  console.log(animalID);
                }
            }






        }
        function aktar() {
            window.check = 1 ;

            $(document).ready(function(){
                $('.modal').modal('show');
                setTimeout(function () {

                    $('.modal').modal('hide');
                }, 3000  );


            var foods =[];
            var table = document.getElementById("result");
            while (table.rows.length > 1) {
                table.deleteRow(1);
            }
                var table1 = document.getElementById("result2");
                while (table1.rows.length > 1) {
                    table1.deleteRow(1);
                }

            $("#pickListResult1 option").each(function()
            {
                foods.push($(this).val())
            });

            $("#pickListResult2 option").each(function()
            {
                foods.push($(this).val())
                // Add $(this).val() to your list
            });

            $("#pickListResult3 option").each(function()
            {
                foods.push($(this).val())
                // Add $(this).val() to your list
            });
            $("#pickListResult4 option").each(function()
            {
                foods.push($(this).val())
                // Add $(this).val() to your list
            });
            $("#pickListResult5 option").each(function()
            {
                foods.push($(this).val())
                // Add $(this).val() to your list
            });
            $("#pickListResult6 option").each(function()
            {
                foods.push($(this).val())
                // Add $(this).val() to your list
            });
            $("#pickListResult7 option").each(function()
            {
                foods.push($(this).val())
                // Add $(this).val() to your list
            });
            $("#pickListResult8 option").each(function()
            {
                foods.push($(this).val())
                // Add $(this).val() to your list
            });
            $("#pickListResult9 option").each(function()
            {
                foods.push($(this).val())
                // Add $(this).val() to your list
            });
            $("#pickListResult10 option").each(function()
            {
                foods.push($(this).val())
                // Add $(this).val() to your list
            });
            $("#pickListResult11 option").each(function()
            {
                foods.push($(this).val())
                // Add $(this).val() to your list
            });
           // console.log(JSON.stringify(foods));


                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                    $.ajax({
                        /* the route pointing to the post function */
                        url: '/mainRelation',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN, data:foods},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (foods) {
                            var table = document.getElementById("result");
                            while (table.rows.length > 1) {
                                table.deleteRow(1);
                            }
                            for (i = 0; i < foods[0].length; i++) {
                                var row = table.insertRow(-1);
                                table.contentEditable = true;
                                var cell1 = row.insertCell(0);
                                var cell2 = row.insertCell(1);
                                var cell3 = row.insertCell(2);
                                var cell4 = row.insertCell(3);
                                var cell5= row.insertCell(4);
                                var cell6= row.insertCell(5);
                                var cell7= row.insertCell(6);
                                var cell8= row.insertCell(7);
                                var cell9= row.insertCell(8);
                                var cell10= row.insertCell(9);
                                var cell11= row.insertCell(10);
                                cell1.innerHTML = foods[0][i];

                                cell2.innerHTML = foods[15][i];
                                cell3.innerHTML = '';
                                cell4.innerHTML = '';
                            }

                            var table1 = document.getElementById("result2");
                            while (table1.rows.length > 1) {
                                table1.deleteRow(1);
                            }
                            for (i = 0; i < foods[0].length; i++) {
                                var row = table1.insertRow(-1);
                                table1.contentEditable = true;
                                var cell1 = row.insertCell(0);
                                var cell2 = row.insertCell(1);
                                var cell3 = row.insertCell(2);
                                var cell4 = row.insertCell(3);
                                var cell5 = row.insertCell(4);
                                var cell6 = row.insertCell(5);
                                var cell7 = row.insertCell(6);
                                var cell8 = row.insertCell(7);
                                var cell9 = row.insertCell(8);
                                var cell10 = row.insertCell(9);
                                var cell11 = row.insertCell(10);
                                var cell12 = row.insertCell(11);
                                var cell13 = row.insertCell(12);
                                var cell14 = row.insertCell(13);
                                var cell15 = row.insertCell(14);
                                var cell16 = row.insertCell(15);
                                var cell17 = row.insertCell(16);
                                var cell18 = row.insertCell(17);
                                cell1.innerHTML = foods[0][i];

                                cell2.innerHTML = (0.999*foods[3][i]).toFixed(3);
                                cell3.innerHTML = (1.2*foods[3][i]).toFixed(3);
                                cell4.innerHTML = foods[16][i];
                                cell5.innerHTML = foods[1][i];
                                cell6.innerHTML = foods[2][i];
                                cell7.innerHTML = foods[4][i];
                                cell8.innerHTML = foods[5][i];
                                cell9.innerHTML = foods[6][i];
                                cell10.innerHTML = foods[7][i];
                                cell11.innerHTML = foods[8][i];
                                cell12.innerHTML = foods[9][i];
                                cell13.innerHTML = foods[10][i];
                                cell14.innerHTML = foods[11][i];
                                cell15.innerHTML = foods[12][i];
                                cell16.innerHTML = foods[13][i];
                                cell17.innerHTML = foods[14][i];
                                cell18.innerHTML = foods[15][i];

                            }


                        }
                    });

            });





        }

        function myFunction(s) {
            var id =s[s.selectedIndex].id
            jQuery.ajax({
                url : '/foodRelation/' +id,
                type : "GET",
                dataType : "json",
                success:function(data) {
                   // console.log(data);



                    document.getElementById("foodname").innerHTML ='';
                    document.getElementById("min").innerHTML ='';
                    document.getElementById("max").innerHTML ='';
                    document.getElementById("price").innerHTML = '';
                    document.getElementById("km").innerHTML = '';
                    document.getElementById("hp").innerHTML = '';
                    document.getElementById("lif").innerHTML = '';
                    document.getElementById("kul").innerHTML = '';
                    document.getElementById("karbonhidrat").innerHTML = '';
                    document.getElementById("Kalsiyum").innerHTML = '';
                    document.getElementById("fosfor").innerHTML = '';
                    document.getElementById("Magnezyum").innerHTML ='';
                    document.getElementById("Sodyum").innerHTML = '';
                    document.getElementById("Taurin").innerHTML = '';
                    document.getElementById("Oil").innerHTML = '';
                    document.getElementById("Linoleik").innerHTML ='';


                    document.getElementById("foodname").innerHTML =s[s.selectedIndex].value;
                    for (i=0; i< data[0].length; i++)
                    {

                        if (data[0][i].food_specific_id == 3)
                        {
                            document.getElementById("min").innerHTML =0.999* data[0][i].specific_value;
                            document.getElementById("max").innerHTML =1.2* data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 15)
                        {
                            document.getElementById("price").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 1)
                        {
                            document.getElementById("km").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 2)
                        {
                            document.getElementById("hp").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 4)
                        {
                            document.getElementById("lif").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 5)
                        {
                            document.getElementById("kul").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 6)
                        {
                            document.getElementById("karbonhidrat").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 7)
                        {
                            document.getElementById("Kalsiyum").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 8)
                        {
                            document.getElementById("fosfor").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 10)
                        {
                            document.getElementById("Magnezyum").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 11)
                        {
                            document.getElementById("Sodyum").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 12)
                        {
                            document.getElementById("Taurin").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 13)
                        {
                            document.getElementById("Oil").innerHTML = data[0][i].specific_value;
                        }
                        if (data[0][i].food_specific_id == 14)
                        {
                            document.getElementById("Linoleik").innerHTML = data[0][i].specific_value;
                        }
                    }

                 //   alert(data[0]);
                }
        });
        }

        (function($)  {



            $.fn.pickList1 = function(options) {

                var opts = $.extend({}, $.fn.pickList1.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData1').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd1").on('click', function() {
                        var p = pickThis.find("#pickData1 option:selected");
                        p.clone().appendTo("#pickListResult1");

                        p.remove();
                    });

                    $("#pAddAll1").on('click', function() {
                        var p = pickThis.find("#pickData1 option");
                        p.clone().appendTo("#pickListResult1");
                        p.remove();
                    });

                    $("#pRemove1").on('click', function() {
                        var p = pickThis.find("#pickListResult1 option:selected");
                        p.clone().appendTo("#pickData1");
                        p.remove();
                    });

                    $("#pRemoveAll1").on('click', function() {
                        var p = pickThis.find("#pickListResult1 option");
                        p.clone().appendTo("#pickData1");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml1 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData1' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons1' style=' margin-top: 1%;'>" +
                        "	<button id='pAdd1' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll1' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove1'  style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll1' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult1' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml1);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList1.defaults = {
                add1: 'Add',
                addAll1: 'Add All',
                remove1: 'Remove',
                removeAll1: 'Remove All'
            };


        }(jQuery));

        (function($) {

            $.fn.pickList2 = function(options) {

                var opts = $.extend({}, $.fn.pickList2.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData2').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd2").on('click', function() {
                        var p = pickThis.find("#pickData2 option:selected");
                        p.clone().appendTo("#pickListResult2");

                        p.remove();
                    });

                    $("#pAddAll2").on('click', function() {
                        var p = pickThis.find("#pickData2 option");
                        p.clone().appendTo("#pickListResult2");
                        p.remove();
                    });

                    $("#pRemove2").on('click', function() {
                        var p = pickThis.find("#pickListResult2 option:selected");
                        p.clone().appendTo("#pickData2");
                        p.remove();
                    });

                    $("#pRemoveAll2").on('click', function() {
                        var p = pickThis.find("#pickListResult2 option");
                        p.clone().appendTo("#pickData2");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml2 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select style=' margin: 2%; height: 90%; '  onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData2' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons2' style=' margin-top: 1%;' >" +
                        "	<button id='pAdd2' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll2' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove2' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll2' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult2' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml2);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList2.defaults = {
                add2: 'Add',
                addAll2: 'Add All',
                remove2: 'Remove',
                removeAll2: 'Remove All'
            };


        }(jQuery));


        (function($) {

            $.fn.pickList3 = function(options) {

                var opts = $.extend({}, $.fn.pickList3.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData3').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd3").on('click', function() {
                        var p = pickThis.find("#pickData3 option:selected");
                        p.clone().appendTo("#pickListResult3");

                        p.remove();
                    });

                    $("#pAddAll3").on('click', function() {
                        var p = pickThis.find("#pickData3 option");
                        p.clone().appendTo("#pickListResult3");
                        p.remove();
                    });

                    $("#pRemove3").on('click', function() {
                        var p = pickThis.find("#pickListResult3 option:selected");
                        p.clone().appendTo("#pickData3");
                        p.remove();
                    });

                    $("#pRemoveAll3").on('click', function() {
                        var p = pickThis.find("#pickListResult3 option");
                        p.clone().appendTo("#pickData3");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml3 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select  style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData3' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons3' style=' margin-top: 1%;'>" +
                        "	<button id='pAdd3' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll3' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove3'  style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll3' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult3' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml3);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList3.defaults = {
                add3: 'Add',
                addAll3: 'Add All',
                remove3: 'Remove',
                removeAll3: 'Remove All'
            };


        }(jQuery));


        (function($) {

            $.fn.pickList4 = function(options) {

                var opts = $.extend({}, $.fn.pickList4.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData4').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd4").on('click', function() {
                        var p = pickThis.find("#pickData4 option:selected");
                        p.clone().appendTo("#pickListResult4");

                        p.remove();
                    });

                    $("#pAddAll4").on('click', function() {
                        var p = pickThis.find("#pickData4 option");
                        p.clone().appendTo("#pickListResult4");
                        p.remove();
                    });

                    $("#pRemove4").on('click', function() {
                        var p = pickThis.find("#pickListResult4 option:selected");
                        p.clone().appendTo("#pickData4");
                        p.remove();
                    });

                    $("#pRemoveAll4").on('click', function() {
                        var p = pickThis.find("#pickListResult4 option");
                        p.clone().appendTo("#pickData4");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml4 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData4' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons4' style=' margin-top: 1%;'>" +
                        "	<button id='pAdd4' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll4' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove4' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll4' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult4' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml4);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList4.defaults = {
                add4: 'Add',
                addAll4: 'Add All',
                remove4: 'Remove',
                removeAll4: 'Remove All'
            };


        }(jQuery));

        (function($) {

            $.fn.pickList5 = function(options) {

                var opts = $.extend({}, $.fn.pickList5.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData5').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd5").on('click', function() {
                        var p = pickThis.find("#pickData5 option:selected");
                        p.clone().appendTo("#pickListResult5");

                        p.remove();
                    });

                    $("#pAddAll5").on('click', function() {
                        var p = pickThis.find("#pickData5 option");
                        p.clone().appendTo("#pickListResult5");
                        p.remove();
                    });

                    $("#pRemove5").on('click', function() {
                        var p = pickThis.find("#pickListResult5 option:selected");
                        p.clone().appendTo("#pickData5");
                        p.remove();
                    });

                    $("#pRemoveAll5").on('click', function() {
                        var p = pickThis.find("#pickListResult5 option");
                        p.clone().appendTo("#pickData5");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml5 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData5' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons5' style=' margin-top: 1%;'>" +
                        "	<button id='pAdd5' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll5' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove5' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll5' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult5' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml5);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList5.defaults = {
                add5: 'Add',
                addAll5: 'Add All',
                remove5: 'Remove',
                removeAll5: 'Remove All'
            };


        }(jQuery));


        (function($) {

            $.fn.pickList6 = function(options) {

                var opts = $.extend({}, $.fn.pickList6.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData6').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd6").on('click', function() {
                        var p = pickThis.find("#pickData6 option:selected");
                        p.clone().appendTo("#pickListResult6");

                        p.remove();
                    });

                    $("#pAddAll6").on('click', function() {
                        var p = pickThis.find("#pickData6 option");
                        p.clone().appendTo("#pickListResult6");
                        p.remove();
                    });

                    $("#pRemove6").on('click', function() {
                        var p = pickThis.find("#pickListResult6 option:selected");
                        p.clone().appendTo("#pickData6");
                        p.remove();
                    });

                    $("#pRemoveAll6").on('click', function() {
                        var p = pickThis.find("#pickListResult6 option");
                        p.clone().appendTo("#pickData6");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml6 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData6' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons6' style=' margin-top: 1%;'>" +
                        "	<button id='pAdd6' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll6' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove6' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll6' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult6' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml6);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList6.defaults = {
                add6: 'Add',
                addAll6: 'Add All',
                remove6: 'Remove',
                removeAll6: 'Remove All'
            };


        }(jQuery));


        (function($) {

            $.fn.pickList7 = function(options) {

                var opts = $.extend({}, $.fn.pickList7.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData7').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd7").on('click', function() {
                        var p = pickThis.find("#pickData7 option:selected");
                        p.clone().appendTo("#pickListResult7");

                        p.remove();
                    });

                    $("#pAddAll7").on('click', function() {
                        var p = pickThis.find("#pickData7 option");
                        p.clone().appendTo("#pickListResult7");
                        p.remove();
                    });

                    $("#pRemove7").on('click', function() {
                        var p = pickThis.find("#pickListResult7 option:selected");
                        p.clone().appendTo("#pickData7");
                        p.remove();
                    });

                    $("#pRemoveAll7").on('click', function() {
                        var p = pickThis.find("#pickListResult7 option");
                        p.clone().appendTo("#pickData7");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml7 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData7' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons7' style=' margin-top: 1%;'>" +
                        "	<button id='pAdd7' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll7' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove7' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll7' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult7' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml7);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList7.defaults = {
                add7: 'Add',
                addAll7: 'Add All',
                remove7: 'Remove',
                removeAll7: 'Remove All'
            };


        }(jQuery));

        (function($) {

            $.fn.pickList8 = function(options) {

                var opts = $.extend({}, $.fn.pickList8.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData8').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd8").on('click', function() {
                        var p = pickThis.find("#pickData8 option:selected");
                        p.clone().appendTo("#pickListResult8");

                        p.remove();
                    });

                    $("#pAddAll8").on('click', function() {
                        var p = pickThis.find("#pickData8 option");
                        p.clone().appendTo("#pickListResult8");
                        p.remove();
                    });

                    $("#pRemove8").on('click', function() {
                        var p = pickThis.find("#pickListResult8 option:selected");
                        p.clone().appendTo("#pickData8");
                        p.remove();
                    });

                    $("#pRemoveAll8").on('click', function() {
                        var p = pickThis.find("#pickListResult8 option");
                        p.clone().appendTo("#pickData8");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml8 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData8' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons8' style=' margin-top: 1%;'>" +
                        "	<button id='pAdd8' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll8' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove8' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll8' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult8' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml8);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList8.defaults = {
                add8: 'Add',
                addAll8: 'Add All',
                remove8: 'Remove',
                removeAll8: 'Remove All'
            };


        }(jQuery));

        (function($) {

            $.fn.pickList9 = function(options) {

                var opts = $.extend({}, $.fn.pickList9.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData9').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd9").on('click', function() {
                        var p = pickThis.find("#pickData9 option:selected");
                        p.clone().appendTo("#pickListResult9");

                        p.remove();
                    });

                    $("#pAddAll9").on('click', function() {
                        var p = pickThis.find("#pickData9 option");
                        p.clone().appendTo("#pickListResult9");
                        p.remove();
                    });

                    $("#pRemove9").on('click', function() {
                        var p = pickThis.find("#pickListResult9 option:selected");
                        p.clone().appendTo("#pickData9");
                        p.remove();
                    });

                    $("#pRemoveAll9").on('click', function() {
                        var p = pickThis.find("#pickListResult9 option");
                        p.clone().appendTo("#pickData9");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml9 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData9' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons9' style=' margin-top: 1%;'>" +
                        "	<button id='pAdd9' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll9' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove9' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll9' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult9' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml9);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList9.defaults = {
                add9: 'Add',
                addAll9: 'Add All',
                remove9: 'Remove',
                removeAll9: 'Remove All'
            };


        }(jQuery));


        (function($) {

            $.fn.pickList10 = function(options) {

                var opts = $.extend({}, $.fn.pickList10.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData10').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd10").on('click', function() {
                        var p = pickThis.find("#pickData10 option:selected");
                        p.clone().appendTo("#pickListResult10");

                        p.remove();
                    });

                    $("#pAddAll10").on('click', function() {
                        var p = pickThis.find("#pickData10 option");
                        p.clone().appendTo("#pickListResult10");
                        p.remove();
                    });

                    $("#pRemove10").on('click', function() {
                        var p = pickThis.find("#pickListResult10 option:selected");
                        p.clone().appendTo("#pickData10");
                        p.remove();
                    });

                    $("#pRemoveAll10").on('click', function() {
                        var p = pickThis.find("#pickListResult10 option");
                        p.clone().appendTo("#pickData10");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml10 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData10' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons10' style=' margin-top: 1%;'>" +
                        "	<button id='pAdd10' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll10' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove10' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll10' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult10' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml10);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList10.defaults = {
                add10: 'Add',
                addAll10: 'Add All',
                remove10: 'Remove',
                removeAll10: 'Remove All'
            };


        }(jQuery));

        (function($) {

            $.fn.pickList11 = function(options) {

                var opts = $.extend({}, $.fn.pickList11.defaults, options);

                this.fill = function() {
                    var option = '';

                    $.each(opts.data, function(key, val) {
                        option += '<option id=' + val.id + '>' + val.name+'</option>' ;

                    });
                    this.find('#pickData11').append(option);
                };
                this.controll = function() {
                    var pickThis = this;

                    $("#pAdd11").on('click', function() {
                        var p = pickThis.find("#pickData11 option:selected");
                        p.clone().appendTo("#pickListResult11");

                        p.remove();
                    });

                    $("#pAddAll11").on('click', function() {
                        var p = pickThis.find("#pickData11 option");
                        p.clone().appendTo("#pickListResult11");
                        p.remove();
                    });

                    $("#pRemove11").on('click', function() {
                        var p = pickThis.find("#pickListResult11 option:selected");
                        p.clone().appendTo("#pickData11");
                        p.remove();
                    });

                    $("#pRemoveAll11").on('click', function() {
                        var p = pickThis.find("#pickListResult11 option");
                        p.clone().appendTo("#pickData11");
                        p.remove();
                    });
                };


                this.init = function() {
                    var pickListHtml11 =
                        "<div class='row'>" +
                        "  <div class='col-sm-5'>" +
                        "	 <select style=' margin: 2%; height: 90%; ' onclick=\"myFunction(this)\" class='form-control pickListSelect' id='pickData11' multiple>" +
                        "                    </select> " +
                        " </div>" +
                        " <div class='col-sm-2 pickListButtons11' style=' margin-top: 1%;'>" +
                        "	<button id='pAdd11' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-right\"></span></button>" +
                        "   <br>   <button style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' id='pAddAll11' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-right\"></span></button>" +
                        "	<br><button id='pRemove11' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" + "<span class=\"fas fa-angle-left\"></span></button>" +
                        "	<br><button id='pRemoveAll11' style='width: 50%; margin: 2%;  position: relative;left: 25%; right: 25%;' class='btn btn-primary btn-sm'>" +  "<span class=\"fas fa-angle-double-left\"></span></button>" +
                        " <br></div>" +
                        " <div class='col-sm-5'>" +
                        "    <select style=' margin: 2%; height: 90%; ' class='form-control pickListSelect' id='pickListResult11' multiple></select>" +
                        " </div>" +
                        "</div>";

                    this.append(pickListHtml10);

                    this.fill();
                    this.controll();
                };

                this.init();
                return this;
            };

            $.fn.pickList11.defaults = {
                add11: 'Add',
                addAll11: 'Add All',
                remove11: 'Remove',
                removeAll11: 'Remove All'
            };


        }(jQuery));

        this.getValues = function () {
            var objResult = [];
            this.find(".pickListResult1 option").each(function () {
                objResult.push({
                    id: $(this).data('id')
                });
            });
            return objResult;
        };



        var pick = $("#pickList1").pickList1({
            data: food1

        });


        var pick = $("#pickList2").pickList2({
            data: food2
        });

        var pick = $("#pickList3").pickList3({
            data: food3
        });


        function isNotEmpty(obj) {
            for(var key in obj) {
                if(obj.hasOwnProperty(key))
                    return true;
            }
            return false;
        }


        if (isNotEmpty(food4))
        {
            var pick = $("#pickList4").pickList4({
                data: food4
            });
        }

        if (isNotEmpty(food5))
        {
            var pick = $("#pickList5").pickList5({
                data: food5
            });
        }

        if (isNotEmpty(food6))
        {
            var pick = $("#pickList6").pickList6({
                data: food6
            });
        }

        if (isNotEmpty(food7))
        {
            var pick = $("#pickList7").pickList7({
                data: food7
            });
        }

        if (isNotEmpty(food8))
        {
            var pick = $("#pickList8").pickList8({
                data: food8
            });
        }

        if (isNotEmpty(food9))
        {
            var pick = $("#pickList9").pickList9({
                data: food9
            });
        }

        if (isNotEmpty(food10))
        {
            var pick = $("#pickList10").pickList10({
                data: food10
            });
        }

        if (isNotEmpty(food11))
        {
            var pick = $("#pickList11").pickList11({
                data: food11
            });
        }







        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

        $('#myTable').on('change', function(){
            $(this).closest('tr').find('input[name="dbFlag"]').val('U');
        });




        jQuery(document).ready(function ()
        {
            document.getElementById("display").style.visibility =  "visible";

            jQuery('select[name="animal_id"]').on('change',function(){
                var animalID = jQuery(this).val();
                jQuery.ajax({
                    url : '/dogNeed/' +animalID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {

                        window.animal = data;

                    }
                });


                if(animalID)
                {
                    var table = document.getElementById("myTable");
                    while (table.rows.length > 1) {
                        table.deleteRow(1);
                    }

                    document.getElementById("myTable").style.visibility =  "visible";

                    jQuery.ajax({
                        url : '/dog/' +animalID,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            $(document).ready(function () {
                                document.getElementById("familyId").style.visibility =  "visible";
                                $('#family').text(data[1]);
                            });

                            $(document).ready(function () {
                                document.getElementById("foodId").style.visibility =  "visible";
                                $('#food').text(data[2]);
                            });

                            $(document).ready(function () {
                                document.getElementById("motionId").style.visibility =  "visible";
                                $('#motion').text(data[3]);
                            });

                            $(document).ready(function () {
                                document.getElementById("ageId").style.visibility =  "visible";
                                $('#age').text(data[4]);
                            });

                            $(document).ready(function () {
                                jQuery.each(data[0,5], function(key,value){
                                    jQuery.each(value, function(id,name){


                                        if(id === "user_id") {
                                            return false;
                                        }
                                        if(id === "id") {
                                            return ;
                                        }
                                        if(id === "animal_id") {
                                            return ;
                                        }
                                        if(id === "Yag") {
                                            var table = document.getElementById("myTable");
                                            var row = table.insertRow(-1);
                                            table.contentEditable = true;
                                            var cell1 = row.insertCell(0);
                                            var cell2 = row.insertCell(1);
                                            var cell3 = row.insertCell(2);
                                            var cell4 = row.insertCell(3);
                                            cell1.innerHTML = id;
                                            cell2.innerHTML = (0.999* name).toFixed(3);
                                            cell3.innerHTML = (2* name).toFixed(3);
                                            cell4.innerHTML = 0;
                                            if(0.999* name <= cell4.innerHTML && 2* name > cell4.innerHTML)
                                            {
                                                row.style.backgroundColor = "green";
                                            }
                                            else
                                            {
                                                row.style.backgroundColor = "red";
                                            }
                                        }
                                        else if(id === "Enerji") {
                                            var table = document.getElementById("myTable");
                                            var row = table.insertRow(-1);
                                            table.contentEditable = true;
                                            var cell1 = row.insertCell(0);
                                            var cell2 = row.insertCell(1);
                                            var cell3 = row.insertCell(2);
                                            var cell4 = row.insertCell(3);
                                            cell1.innerHTML = id;
                                            cell2.innerHTML = (0.999* name).toFixed(3);
                                            cell3.innerHTML = (1.2* name).toFixed(3);
                                            cell4.innerHTML = 0;

                                            if(0.999* name <= cell4.innerHTML && 1.2* name > cell4.innerHTML)
                                            {
                                                row.style.backgroundColor = "green";
                                            }
                                            else
                                            {
                                                row.style.backgroundColor = "red";
                                            }
                                        }
                                        else {
                                            var table = document.getElementById("myTable");
                                            var row = table.insertRow(-1);
                                            table.contentEditable = true;
                                            var cell1 = row.insertCell(0);
                                            var cell2 = row.insertCell(1);
                                            var cell3 = row.insertCell(2);
                                            var cell4 = row.insertCell(3);
                                            cell1.innerHTML = id;
                                            cell2.innerHTML =(0.999* name).toFixed(3);
                                            cell3.innerHTML = name;
                                            cell4.innerHTML = 0;

                                            if(0.999* name > cell4.innerHTML )
                                            {
                                                row.style.backgroundColor = "red";
                                            }
                                            if(0.999* name <= cell4.innerHTML )
                                            {
                                                row.style.backgroundColor = "green";
                                            }

                                        }

                                    });
                                });


                            });
                        }
                    });

                    function loadScript(url, callback){

                        var script = document.createElement("script")
                        script.type = "text/javascript";
                        script.id = "appScript";

                        if (script.readyState){  //IE
                            script.onreadystatechange = function(){
                                if (script.readyState == "loaded" ||
                                    script.readyState == "complete"){
                                    script.onreadystatechange = null;
                                    callback();
                                }
                            };
                        } else {  //Others
                            script.onload = function(){
                                callback();
                            };
                        }

                        script.src = url;
                        document.getElementsByTagName("head")[0].appendChild(script);
                    }


                    // <div id="app" >
                    //   </div>

                    $( document ).ready(function() {
                        loadScript("/js/app.js", function(){

                        });

                    });


                }
                else
                {
                }
            });
        });

    </script>
@endsection



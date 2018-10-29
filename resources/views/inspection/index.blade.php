<?php


    if(empty($customer_name_send_back)){
        $customer_name_send_back = "";
    }

    if(empty($factory_name_send_back)){
        $factory_name_send_back = "";
    }

    if(empty($size_send_back)){
        $size_send_back = "";
    }

    if(empty($retest_date_send_back)){
        $retest_date_send_back = "";
    }




?>

@extends('layouts.app')

@section('content')
<div class="container">

        @include ('layouts._messages')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2 class="text-center">Inspection Data </h2>
                        <div class="ml-auto">
                            {{--  <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>  --}}
                        </div>
                    </div>

                </div>
                <div class="card-body">

                        {{--  @include ("inspection._form", ['buttonText' => "Submit Data"])  --}}

                        <form action="{{ route('inspection.store') }}" method="post">
                            @csrf

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Customer</font></strong> <font color='red'>*</font></legend>
                                    <div class="col-sm-10">
                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="customer_name" id="customer_name" value="PTT"  {{ $customer_name_send_back === "PTT" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                PTT
                                            </label>
                                        </div>
                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="customer_name" id="customer_name" value="WG" {{ $customer_name_send_back === "WG" ? "checked" : "" }} >
                                            <label class="form-check-label" for="gridRadios1">
                                                WG
                                            </label>
                                        </div>
                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="customer_name" id="customer_name" value="NS" {{ $customer_name_send_back === "NS" ? "checked" : "" }} >
                                            <label class="form-check-label" for="gridRadios1">
                                                NS
                                            </label>
                                        </div>

                                        <!-- Amnonia -->

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="customer_name" id="customer_name" value="เพชรไทย" {{ $customer_name_send_back === "เพชรไทย" ? "checked" : "" }} >
                                            <label class="form-check-label" for="gridRadios1">
                                                เพชรไทย
                                            </label>
                                        </div>
                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="customer_name" id="customer_name" value="กมลจักรวาล" {{ $customer_name_send_back === "กมลจักรวาล" ? "checked" : "" }} >
                                            <label class="form-check-label" for="gridRadios1">
                                                กมลจักรวาล
                                            </label>
                                        </div>
                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="customer_name" id="customer_name" value="จตุรงค์" {{ $customer_name_send_back === "จตุรงค์" ? "checked" : "" }} >
                                            <label class="form-check-label" for="gridRadios1">
                                                จตุรงค์
                                            </label>
                                        </div>
                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="customer_name" id="customer_name" value="Brenntag" {{ $customer_name_send_back === "Brenntag" ? "checked" : "" }} >
                                            <label class="form-check-label" for="gridRadios1">
                                                Brenntag
                                            </label>
                                        </div>
                                    </div>

                                </div>

                            </fieldset>



                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Factory</font></strong> <font color='red'>*</font></legend>
                                        <div class="col-sm-10">
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="factory_name" id="factory_name1" value="Bangpla"  {{ $factory_name_send_back === "Bangpla" ? "checked" : "" }} required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Bangpla
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="factory_name" id="factory_name" value="Surat" {{ $factory_name_send_back === "Surat" ? "checked" : "" }} >
                                                <label class="form-check-label" for="gridRadios1">
                                                    Surat
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                </fieldset>
                                @if ($errors->has('factory_name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('factory_name') }}</strong>
                                </div>
                                @endif


                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Size</font></strong> <font color='red'>*</font></legend>
                                        <div class="col-sm-10">
                                            <div class="form-check  custom-control-inline">
                                                <input class="form-check-input" type="radio" name="size" id="size1"  value="4" {{ $size_send_back === "4" ? "checked" : "" }} required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    4 Kgs
                                                </label>
                                            </div>
                                            <div class="form-check  custom-control-inline">
                                                <input class="form-check-input" type="radio" name="size" id="size2" value="7" {{ $size_send_back === "7" ? "checked" : "" }} >
                                                <label class="form-check-label" for="gridRadios1">
                                                    7 Kgs
                                                </label>
                                            </div>
                                            <div class="form-check  custom-control-inline">
                                                <input class="form-check-input" type="radio" name="size" id="size3" selected value="15" {{ $size_send_back === "15" ? "checked" : "" }} >
                                                <label class="form-check-label" for="gridRadios1">
                                                    15 Kgs
                                                </label>
                                            </div>
                                            <div class="form-check  custom-control-inline">
                                                <input class="form-check-input" type="radio" name="size" id="size4" value="48" {{ $size_send_back === "48" ? "checked" : "" }} >
                                                <label class="form-check-label" for="gridRadios1">
                                                    48 Kgs
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                </fieldset>
                                @if ($errors->has('size'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('size') }}</strong>
                                </div>
                                @endif

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="retest_date" class=" col-form-label"><strong><font color="blue">Retest Date</font></strong> <font color='red'>*</font></label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name="retest_date" value="{{$retest_date_send_back}}" id="retest_date" class="form-control {{ $errors->has('retest_date') ? 'is-invalid' : '' }}" required>
                                        @if ($errors->has('retest_date'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('retest_date') }}</strong>
                                        </div>
                                        @endif
                                        <div class="invalid-feedback">
                                            <strong>ABC</strong>
                                        </div>
                                    </div>
                                </div>



                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Manufaturer Name</font></strong> <font color='red'>*</font></legend>
                                        <div class="col-sm-10">
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="manufacturer_name" id="manufacturer_name1" value="MTM" required >
                                                <label class="form-check-label" for="gridRadios1">
                                                    MTM
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="manufacturer_name" id="manufacturer_name2" value="LIHN" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    LIHN
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="manufacturer_name" id="manufacturer_name3" value="SMPC" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    SMPC
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="manufacturer_name" id="manufacturer_name4" value="Hackey" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    Hackey
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="manufacturer_name" id="manufacturer_name5" value="PCI" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    PCI
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                </fieldset>
                                @if ($errors->has('manufacturer_name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('manufacturer_name') }}</strong>
                                </div>
                                @endif

                                <div class="form-group row">
                                    <label for="serial_number" class="col-sm-2 col-form-label"><strong><font color="blue">SERIAL NUMBER</font></strong> <font color='red'>*</font></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="serial_number" value="" id="serial_number" class="form-control serialmask {{ $errors->has('serial_number') ? 'is-invalid' : '' }}" required>
                                    </div>
                                </div>
                                @if ($errors->has('serial_number'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('serial_number') }}</strong>
                                </div>
                                @endif


                                <div class="form-group row">
                                    <label for="manu_month_year" class="col-sm-2 col-form-label"><strong><font color="blue">Manufacturing Date</font></strong> <font color='red'>*</font></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="manu_month_year" value="" id="manu_month_year" class="form-control manu_month_year {{ $errors->has('manu_month_year') ? 'is-invalid' : '' }}" required>
                                    </div>
                                </div>
                                @if ($errors->has('manu_month_year'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('manu_month_year') }}</strong>
                                </div>
                                @endif

                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Test Type</font></strong> <font color='red'>*</font></legend>
                                        <div class="col-sm-10">
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="hydro_or_expand" id="hydro_radio" value="hydro" required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Hydro
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="hydro_or_expand" id="expand_radio" value="expand" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    Expand
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                </fieldset>

                                @if ($errors->has('pass_or_not'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('pass_or_not') }}</strong>
                                </div>
                                @endif





                                <div id="expand_div">
                                    <div class="form-group row">
                                        <label for="volumn1" class="col-sm-2 col-form-label"><strong><font color="green">V1</font></strong></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="volumn1" value="" id="volumn1" class="form-control numeric_number {{ $errors->has('volumn1') ? 'is-invalid' : '' }}">
                                        </div>
                                    </div>
                                    @if ($errors->has('volumn1'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('volumn1') }}</strong>
                                    </div>
                                    @endif

                                    <div class="form-group row">
                                        <label for="volumn2" class="col-sm-2 col-form-label"><strong><font color="green">V2</font></strong></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="volumn2" value="" id="volumn2" class="form-control numeric_number {{ $errors->has('volumn2') ? 'is-invalid' : '' }}">
                                        </div>
                                    </div>
                                    @if ($errors->has('volumn2'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('volumn2') }}</strong>
                                    </div>
                                    @endif
                                </div>


                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Repair Type</font></strong> <font color='red'>*</font></legend>
                                        <div class="col-sm-10">
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="repair_part" id="repair_part" value="P" checked required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    P
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="repair_part" id="repair_part" value="C" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    C
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="repair_type" id="repair_part" value="C+F" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    C+F
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="repair_part" id="repair_part" value="B" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    B
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="repair_part" id="repair_part" value="C+B" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    C+B
                                                </label>
                                            </div>
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="repair_part" id="repair_part" value="F" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    F
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                </fieldset>

                                <div class="form-group row">
                                    <label for="volumn2" class="col-sm-2 col-form-label"><strong><font color="green">Tare Weight</font></strong></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tare_weight" value="" id="tare_weight" class="form-control  {{ $errors->has('tare_weight') ? 'is-invalid' : '' }}" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>


                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Result</font></strong> <font color='red'>*</font></legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pass_or_not" id="pass_or_not1" value="pass" checked required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Pass
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pass_or_not" id="pass_or_not2" value="not_pass" >
                                                <label class="form-check-label" for="gridRadios1">
                                                    Not Pass
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                </fieldset>
                                @if ($errors->has('pass_or_not'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('pass_or_not') }}</strong>
                                </div>
                                @endif


                                <div class="form-group ">
                                    <button type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
                                    {{--  <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonText }}</button>  --}}
                                </div>
                            </form>


                </div>
            </div>
        </div>
    </div>
    @if(!empty($inspectionArray))
        <div class="mt-3">
            <h2>Results (Last 10 records)</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-warning">
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Facotry</th>
                    <th class="text-center" scope="col">Size</th>
                    <th class="text-center" scope="col">Retest Date</th>
                    <th class="text-center" scope="col">Manu. Name</th>
                    <th class="text-center" scope="col">Serial Nr.</th>
                    <th class="text-center" scope="col">Manu. Date</th>
                    <th class="text-center" scope="col">Test Type</th>
                    <th class="text-center" scope="col">V1</th>
                    <th class="text-center" scope="col">V2</th>
                    <th class="text-center" scope="col">Pass</th>
                    <th class="text-center" scope="col">Del</th>
                </tr>
                </thead>
                <tbody>

                        @foreach ($inspectionArray as  $indexKey => $inspectionInLoop)
                            <tr>
                                <th class="text-center" scope="row">{{++$indexKey}}</th>
                                <td class="text-center">{{$inspectionInLoop->factory_name}}</td>
                                <td class="text-center">{{$inspectionInLoop->size}}</td>
                                <td class="text-center">{{date('d-m-Y', strtotime($inspectionInLoop->retest_date))}}</td>
                                <td class="text-center">{{$inspectionInLoop->manufacturer_name}}</td>
                                <td class="text-center">{{$inspectionInLoop->serial_number}}</td>
                                <td class="text-center">{{$inspectionInLoop->manu_month_year}}</td>
                                <td class="text-center">{{$inspectionInLoop->hydro_or_expand}}</td>
                                <td class="text-center">{{$inspectionInLoop->volumn1}}</td>
                                <td class="text-center">{{$inspectionInLoop->volumn2}}</td>
                                <td class="text-center">{{$inspectionInLoop->pass_or_not}}</td>
                                <td class="text-center">
                                        {{-- <button type="button" class="btn btn-danger btn-sm">x</button> --}}
                                        <form class="form-delete" method="post" action="{{ route('inspection.delete', [$inspectionInLoop->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">x</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach


                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

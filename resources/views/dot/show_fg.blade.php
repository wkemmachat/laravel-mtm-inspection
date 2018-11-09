<?php


    if(empty($customer_id_send_back)){
        $customer_id_send_back = "";
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
                        <h2 class="">Add FG Data <span class="ml-auto"><font color="blue"> {{$dateShow->format('d M Y')}} </font></span> </h2>
                        <div class="ml-auto">
                        </div>
                    </div>

                </div>
                <div class="card-body">

                        <form action="{{ route('dot.fg_store') }}" method="post">
                            @csrf

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Customer</font></strong> <font color='red'>*</font></legend>
                                    <div class="col-sm-10">
                                        @foreach ($customerActiveArray as  $indexKey => $customerActiveArrayInLoop)
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="customer_id" id="customer_id" value="{{$customerActiveArrayInLoop->id}}"  {{ $customer_id_send_back == $customerActiveArrayInLoop->id ? "checked" : "" }} required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    {{$customerActiveArrayInLoop->customer_name}} <font color="brown">Size: {{$customerActiveArrayInLoop->size}} </font>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </fieldset>

                            <div class="form-group row">
                                <label for="serial_number" class="col-sm-2 col-form-label"><strong><font color="blue">SERIAL NUMBER</font></strong> <font color='red'>*</font></label>
                                <div class="col-sm-10">
                                    <input type="text" name="serial_number" value="" id="serial_number" class="form-control serialmask {{ $errors->has('serial_number') ? 'is-invalid' : '' }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tare_weight" class="col-sm-2 col-form-label"><strong><font color="blue">Tare Weight</font></strong> <font color='red'>*</font></label>
                                <div class="col-sm-10">
                                    <input type="text" name="tare_weight" value="" id="tare_weight" class="form-control  {{ $errors->has('tare_weight') ? 'is-invalid' : '' }}" required onkeypress="return isNumberKey(event)">
                                </div>
                            </div>




                            <div class="form-group ">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
                            </div>
                        </form>


                </div>
            </div>
        </div>
    </div>
    @if(!empty($dotArray))
        <div class="mt-3">
            <h2>Results (Last 10 records)</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-warning">
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Customer</th>
                    <th class="text-center" scope="col">Serial Nr.</th>
                    <th class="text-center" scope="col">Welding Date</th>

                    <th class="text-center" scope="col">Top</th>
                    <th class="text-center" scope="col">Bottom</th>
                    <th class="text-center" scope="col">Spud</th>
                    <th class="text-center" scope="col">Collar</th>
                    <th class="text-center" scope="col">Footring</th>
                    <th class="text-center" scope="col">Circle</th>
                    <th class="text-center" scope="col">Longitudinal</th>
                    <th class="text-center" scope="col">Fg Date</th>
                    <th class="text-center" scope="col">Weight</th>
                    <th class="text-center" scope="col">User Weld</th>
                    <th class="text-center" scope="col">User FG</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>

                        @foreach ($dotArray as  $indexKey => $dotInLoop)
                            <tr>
                                <th class="text-center" scope="row">{{++$indexKey}}</th>
                                <td class="text-center">{{$dotInLoop->customer->customer_name}}</td>
                                <td class="text-center">{{$dotInLoop->serial_number}}</td>
                                <td class="text-center">{{date('d-m-Y H:i', strtotime($dotInLoop->weld_date))}}</td>

                                <td class="text-center">{{$dotInLoop->top}}</td>
                                <td class="text-center">{{$dotInLoop->bottom}}</td>
                                <td class="text-center">{{$dotInLoop->spud}}</td>
                                <td class="text-center">{{$dotInLoop->collar}}</td>
                                <td class="text-center">{{$dotInLoop->footring}}</td>
                                <td class="text-center">{{$dotInLoop->circle}}</td>
                                <td class="text-center">{{ ($dotInLoop->longitudinal>0)?$dotInLoop->longitudinal:""}}</td>
                                <td class="text-center">{{ ($dotInLoop->fg_date!=null)?date('d-m-Y H:i', strtotime($dotInLoop->fg_date)):""}}</td>
                                <td class="text-center">{{ ($dotInLoop->tare_weight>0)?$dotInLoop->tare_weight:""}}</td>
                                <td class="text-center">{{$dotInLoop->user->name}}</td>
                                <td class="text-center">
                                    {{$dotInLoop->user_key_fg->name}}

                                </td>
                                <td class="text-center">
                                        <form class="form-delete" method="post" action="{{ route('dot.delete', [$dotInLoop->id]) }}">
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

<script>


    function c1_select(){
        document.getElementById('C1').style.display ='block';
        document.getElementById('C2').style.display ='none';
        document.getElementById('CM1').style.display ='none';
        document.getElementById('CM2').style.display ='none';
    }
    function c2_select(){
        document.getElementById('C1').style.display ='none';
        document.getElementById('C2').style.display ='block';
        document.getElementById('CM1').style.display ='none';
        document.getElementById('CM2').style.display ='none';
    }
    function cm1_select(){
        document.getElementById('C1').style.display ='none';
        document.getElementById('C2').style.display ='none';
        document.getElementById('CM1').style.display ='block';
        document.getElementById('CM2').style.display ='none';
    }
    function cm2_select(){
        document.getElementById('C1').style.display ='none';
        document.getElementById('C2').style.display ='none';
        document.getElementById('CM1').style.display ='none';
        document.getElementById('CM2').style.display ='block';
    }

    function f1_select(){
        document.getElementById('F1').style.display ='block';
        document.getElementById('F2').style.display ='none';
        document.getElementById('FM1').style.display ='none';
        document.getElementById('FM2').style.display ='none';
    }

    function f2_select(){
        document.getElementById('F1').style.display ='none';
        document.getElementById('F2').style.display ='block';
        document.getElementById('FM1').style.display ='none';
        document.getElementById('FM2').style.display ='none';
    }

    function fm1_select(){
        document.getElementById('F1').style.display ='none';
        document.getElementById('F2').style.display ='none';
        document.getElementById('FM1').style.display ='block';
        document.getElementById('FM2').style.display ='none';
    }

    function fm2_select(){
        document.getElementById('F1').style.display ='none';
        document.getElementById('F2').style.display ='none';
        document.getElementById('FM1').style.display ='none';
        document.getElementById('FM2').style.display ='block';
    }

    function s1_select(){
        document.getElementById('S1').style.display ='block';
        document.getElementById('S2').style.display ='none';
    }

    function s2_select(){
        document.getElementById('S1').style.display ='none';
        document.getElementById('S2').style.display ='block';
    }


</script>

@endsection

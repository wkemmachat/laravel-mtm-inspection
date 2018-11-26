<?php


    if(empty($circle_send_back)){
        $circle_send_back = "";
    }
    if(empty($customer_id_send_back)){
        $customer_id_send_back = "";
    }
    if(empty($top_send_back)){
        $top_send_back = "";
    }
    if(empty($bottom_send_back)){
        $bottom_send_back = "";
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
                        <h2 class="">Add DOT Data <span class="ml-auto"><font color="blue"> {{$dateShow->format('d M Y')}} </font></span> </h2>
                        <div class="ml-auto">
                        </div>
                    </div>

                </div>
                <div class="card-body">

                        <form action="{{ route('dot.store') }}" method="post">
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

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Top</font></strong> <font color='red'>*</font></legend>
                                    <div class="col-sm-10">

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="top" id="top" value="blue" {{ $top_send_back == "blue" ? "checked" : "" }}  required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="blue">Blue</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="top" id="top" value="red" {{ $top_send_back == "red" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="red">Red</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="top" id="top" value="green" {{ $top_send_back == "green" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">Green</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="top" id="top" value="white" {{ $top_send_back == "white" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="black">White</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="top" id="top" value="grey" {{ $top_send_back == "grey" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="grey">Grey</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="top" id="top" value="orange" {{ $top_send_back == "orange" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="orange">Orange</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="top" id="top" value="yellow" {{ $top_send_back == "yellow" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="yellow">Yellow</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="top" id="top" value="yellow" {{ $top_send_back == "yellow" ? "checked" : "" }}  required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="purple">Purple</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="top" id="top" value="pink"  {{ $top_send_back == "pink" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="pink">Pink</font>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                            </fieldset>

                            <hr/>

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Bottom</font></strong> <font color='red'>*</font></legend>
                                    <div class="col-sm-10">

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="bottom" id="bottom" value="blue" {{ $bottom_send_back == "blue" ? "checked" : "" }}  required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="blue">Blue</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="bottom" id="bottom" value="red" {{ $bottom_send_back == "red" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="red">Red</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="bottom" id="bottom" value="green" {{ $bottom_send_back == "green" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">Green</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="bottom" id="bottom" value="white" {{ $bottom_send_back == "white" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="black">White</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="bottom" id="bottom" value="grey" {{ $bottom_send_back == "grey" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="grey">Grey</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="bottom" id="bottom" value="orange"  {{ $bottom_send_back == "orange" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="orange">Orange</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="bottom" id="bottom" value="yellow" {{ $bottom_send_back == "yellow" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="yellow">Yellow</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="bottom" id="bottom" value="purple" {{ $bottom_send_back == "purple" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="purple">Purple</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="bottom" id="bottom" value="pink" {{ $bottom_send_back == "pink" ? "checked" : "" }} required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="pink">Pink</font>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                            </fieldset>

                            <hr/>

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
            <h2>Last 15 hrs results -  ( <font color='red'>{{$dotArray->count()}}</font> records) by <font color='blue'> {{Auth::user()->name}} </font></h2>
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
                    <th class="text-center" scope="col">User</th>
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






@endsection

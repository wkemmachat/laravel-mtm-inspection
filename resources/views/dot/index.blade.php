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


                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Spud</font></strong> <font color='red'>*</font></legend>
                                    <div class="col-sm-10">

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="spud_radio" onclick="s1_select();"  value="" >
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">S1</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="spud_radio" onclick="s2_select();" value="" >
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="brown">S2</font>
                                            </label>
                                        </div>
                                        <br/>
                                        <br/>
                                        <div id="S1">
                                        @for ($i = 1; $i <= 8; $i++)
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="spud" id="spud" value="S1-{{$i}}"  required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    <font color="green">S1-{{$i}}</font>
                                                </label>
                                            </div>
                                        @endfor
                                        <br/>
                                        </div>
                                        <div id="S2">
                                        @for ($i = 1; $i <= 8; $i++)
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="spud" id="spud" value="S2-{{$i}}"  required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    <font color="brown">S2-{{$i}}</font>
                                                </label>
                                            </div>
                                        @endfor
                                        </div>
                                    </div>

                                </div>

                            </fieldset>

                            <hr/>

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Collar</font></strong> <font color='red'>*</font></legend>
                                    <div class="col-sm-10">

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="collar_radio" onclick="c1_select();"  value="" >
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">C1</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="collar_radio" onclick="c2_select();" value="" >
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="brown">C2</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="collar_radio" onclick="cm1_select();" value="" >
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="blue">M1</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="collar_radio" onclick="cm2_select();" value="" >
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="orange">M2</font>
                                            </label>
                                        </div>

                                        <br/>
                                        <br/>
                                        <div id="C1">
                                            @for ($i = 1; $i <= 8; $i++)
                                                <div class="form-check custom-control-inline">
                                                    <input class="form-check-input" type="radio" name="collar" id="collar" value="C1-{{$i}}"  required>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        <font color="green">C1-{{$i}}</font>
                                                    </label>
                                                </div>
                                            @endfor
                                            <br/>
                                        </div>

                                        <div id="C2">
                                            @for ($i = 1; $i <= 8; $i++)
                                                <div class="form-check custom-control-inline">
                                                    <input class="form-check-input" type="radio" name="collar" id="collar" value="C2-{{$i}}"  required>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        <font color="brown">C2-{{$i}}</font>
                                                    </label>
                                                </div>
                                            @endfor
                                            <br/>
                                        </div>

                                        <div id="CM1">
                                            @for ($i = 1; $i <= 4; $i++)
                                                <div class="form-check custom-control-inline">
                                                    <input class="form-check-input" type="radio" name="collar" id="collar" value="M1-{{$i}}"  required>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        <font color="blue">M1-{{$i}}</font>
                                                    </label>
                                                </div>
                                            @endfor
                                            <br/>
                                        </div>

                                        <div id="CM2">
                                        @for ($i = 1; $i <= 4; $i++)
                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="collar" id="collar" value="M2-{{$i}}"  required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="orange">M2-{{$i}}</font>
                                            </label>
                                        </div>
                                        @endfor
                                        </div>
                                    </div>

                                </div>
                            </fieldset>

                            <hr/>

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Footring</font></strong> <font color='red'>*</font></legend>
                                    <div class="col-sm-10">


                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="footring_radio" onclick="f1_select();"  value="" >
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">F1</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="footring_radio" onclick="f2_select();" value="" >
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="brown">F2</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="footring_radio" onclick="fm1_select();" value="" >
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="blue">M1</font>
                                            </label>
                                        </div>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="footring_radio" onclick="fm2_select();" value="" >
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="orange">M2</font>
                                            </label>
                                        </div>

                                        <br/>
                                        <br/>
                                        <div id="F1">
                                            @for ($i = 1; $i <= 8; $i++)
                                                <div class="form-check custom-control-inline">
                                                    <input class="form-check-input" type="radio" name="footring" id="footring" value="F1-{{$i}}"  required>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        <font color="green">F1-{{$i}}</font>
                                                    </label>
                                                </div>
                                            @endfor
                                            <br/>
                                        </div>

                                        <div id="F2">
                                        @for ($i = 1; $i <= 8; $i++)
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="footring" id="footring" value="F2-{{$i}}"  required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    <font color="brown">F2-{{$i}}</font>
                                                </label>
                                            </div>
                                        @endfor
                                        <br/>
                                        </div>

                                        <div id="FM1">
                                        @for ($i = 5; $i <= 9; $i++)
                                            <div class="form-check custom-control-inline">
                                                <input class="form-check-input" type="radio" name="footring" id="footring" value="M1-{{$i}}"  required>
                                                <label class="form-check-label" for="gridRadios1">
                                                    <font color="blue">M1-{{$i}}</font>
                                                </label>
                                            </div>
                                        @endfor
                                        <br/>
                                        </div>

                                        <div id="FM2">
                                        @for ($i = 5; $i <= 9; $i++)
                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="footring" id="footring" value="M2-{{$i}}"  required>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="orange">M2-{{$i}}</font>
                                            </label>
                                        </div>
                                        @endfor
                                        </div>
                                    </div>

                                </div>
                            </fieldset>

                            <hr/>

                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0"><strong><font color="blue">Circular</font></strong> <font color='red'>*</font></legend>
                                    <div class="col-sm-10">

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="1"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">1</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="2"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">2</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="6"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">6</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="7"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">7</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="8"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">8</font>
                                            </label>
                                        </div>




                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="9"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">9</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="10"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">10</font>
                                            </label>
                                        </div>

                                        <br/>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="11"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">11</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="12"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">12</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="13"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">13</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="21"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">21</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="22"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">22</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="23"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">23</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="24"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">24</font>
                                            </label>
                                        </div>

                                        <br/>

                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="26"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">26</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="27"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">27</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="28"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">28</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="29"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">29</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="31"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">31</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="32"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">32</font>
                                            </label>
                                        </div>



                                        <div class="form-check custom-control-inline">
                                            <input class="form-check-input" type="radio" name="circle" id="circle" value="33"  required {{($circle_send_back==$i) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridRadios1">
                                                <font color="green">33</font>
                                            </label>
                                        </div>

                                    </div>

                                </div>
                            </fieldset>

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

<script type="text/javascript">

    /*
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
    */

</script>

@endsection

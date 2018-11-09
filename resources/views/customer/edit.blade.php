<?php





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
                        <h2 class="text-center"><font color="red">Edit</font> Customer Data </h2>
                        <div class="ml-auto">
                        </div>
                    </div>

                </div>
                <div class="card-body">
                        <form action="{{ route('customer.editsave') }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="customer_name" class="col-form-label"><strong><font color="blue">Edit Customer Name</font></strong> <font color='red'>*</font></label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="customer_name" value="{{$customer->customer_name}}" id="customer_name" class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="size" class=" col-form-label"><strong><font color="blue">Size</font></strong> <font color='red'>*</font></label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="size" value="{{$customer->size}}" id="size" class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="remark1" class=" col-form-label"><strong><font color="blue">Remark1</font></strong> </label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="remark1" value="{{$customer->remark1}}" id="remark1" class="form-control {{ $errors->has('remark1') ? 'is-invalid' : '' }}" >


                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="remark2" class=" col-form-label"><strong><font color="blue">Remark2</font></strong> </label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="remark2" value="{{$customer->remark2}}" id="remark2" class="form-control {{ $errors->has('remark2') ? 'is-invalid' : '' }}" >

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="remark3" class=" col-form-label"><strong><font color="blue">Remark3</font></strong> </label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="remark3" value="{{$customer->remark3}}" id="remark3" class="form-control {{ $errors->has('remark3') ? 'is-invalid' : '' }}" >

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="isActive" class=" col-form-label"><strong><font color="blue">isActive</font></strong> </label>
                                </div>
                                <div class="col-sm-10">
                                    <select name="isActive" id="isActive" class="form-control" >
                                        <option value="Y" {{($customer->isActive=='Y')?'selected':""}}>Y</option>
                                        <option value="N" {{($customer->isActive=='N')?'selected':""}}>N</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group ">
                                <button type="submit" class="btn btn-outline-danger btn-lg">Edit</button>
                            </div>

                            <input type="hidden" name="editId" value="{{$customer->id}}"/>
                            </form>


                </div>
            </div>
        </div>
    </div>

</div>
@endsection

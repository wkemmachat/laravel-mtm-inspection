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
                        <h2 class="text-center">Add Customer Data </h2>
                        <div class="ml-auto">
                        </div>
                    </div>

                </div>
                <div class="card-body">

                        <form action="{{ route('customer.store') }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="customer_name" class="col-form-label"><strong><font color="blue">Customer Name</font></strong> <font color='red'>*</font></label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="customer_name" value="" id="customer_name" class="form-control {{ $errors->has('customer_name') ? 'is-invalid' : '' }}" required>
                                    @if ($errors->has('customer_name'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('customer_name') }}</strong>
                                    </div>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="size" class=" col-form-label"><strong><font color="blue">Size</font></strong> <font color='red'>*</font></label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="size" value="" id="size" class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" required>
                                    @if ($errors->has('size'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </div>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="remark1" class=" col-form-label"><strong><font color="blue">Remark1</font></strong> </label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="remark1" value="" id="remark1" class="form-control {{ $errors->has('remark1') ? 'is-invalid' : '' }}" >
                                    @if ($errors->has('remark1'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('remark1') }}</strong>
                                    </div>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="remark2" class=" col-form-label"><strong><font color="blue">Remark2</font></strong> </label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="remark2" value="" id="remark2" class="form-control {{ $errors->has('remark2') ? 'is-invalid' : '' }}" >
                                    @if ($errors->has('remark2'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('remark2') }}</strong>
                                    </div>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label for="remark3" class=" col-form-label"><strong><font color="blue">Remark3</font></strong> </label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="remark3" value="" id="remark3" class="form-control {{ $errors->has('remark3') ? 'is-invalid' : '' }}" >
                                    @if ($errors->has('remark3'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('remark3') }}</strong>
                                    </div>
                                    @endif

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
    @if(!empty($customerArray))
        <div class="mt-3">
            <h2>Results Customer (Last 10 records)</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-warning">
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Customer Name</th>
                    <th class="text-center" scope="col">Size</th>
                    <th class="text-center" scope="col">isActive</th>
                    <th class="text-center" scope="col">Remark1</th>
                    <th class="text-center" scope="col">Remark2</th>
                    <th class="text-center" scope="col">Remark3</th>
                    <th class="text-center" scope="col">User</th>
                    <th class="text-center" scope="col">Update At</th>
                    <th class="text-center" scope="col">Edit</th>
                </tr>
                </thead>
                <tbody>

                        @foreach ($customerArray as  $indexKey => $customerInLoop)
                            <tr>
                                <th class="text-center" scope="row">{{++$indexKey}}</th>
                                <td class="text-center">{{$customerInLoop->customer_name}}</td>
                                <td class="text-center">{{$customerInLoop->size}}</td>
                                <td class="text-center">{{$customerInLoop->isActive}}</td>
                                <td class="text-center">{{$customerInLoop->remark1}}</td>
                                <td class="text-center">{{$customerInLoop->remark2}}</td>
                                <td class="text-center">{{$customerInLoop->remark3}}</td>
                                <td class="text-center">{{$customerInLoop->user->name}}</td>
                                <td class="text-center">{{date('d-m-Y', strtotime($customerInLoop->updated_at))}}</td>
                                <td class="text-center">
                                    <a class="dropdown-item" href="{{ route('customer.edit', [$customerInLoop->id]) }}" onclick="return confirm('Are you sure?')"><font color='brown'>edit</font></a>

                                </td>
                            </tr>
                        @endforeach


                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

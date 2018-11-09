<?php



?>

@extends('layouts.app')

@section('content')
<div class="container">

        @include ('layouts._messages')

    {{-- <div class="card">
        <h5 class="card-header">Export To Excel</h5>
        <div class="card-body">
            <form action="{{ route('customer.exportCustomer') }}" method="post">
                <button class="btn btn-primary" type="submit">Export All</button>
            </form>
        </div>
    </div> --}}



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
            {{ $customerArray->links() }}
        </div>
    @endif


</div>
@endsection

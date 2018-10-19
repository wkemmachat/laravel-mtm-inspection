<?php
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

    <div class="card">
        <h5 class="card-header">Export To Excel</h5>
        <div class="card-body">
            <form action="{{ route('inspection.exportInspection') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault01">Start Date</label>
                        <input type="text" class="form-control datepicker" id="startDate" name="startDate" placeholder="Start Date" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault02">End Date</label>
                        <input type="text" class="form-control datepicker" id="endDate" name="endDate" placeholder="End Date" value="" required>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
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
                    <th class="text-center" scope="col">User</th>
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
                                <td class="text-center">{{$inspectionInLoop->user->name}}</td>

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
            {{ $inspectionArray->links() }}
        </div>
    @endif


</div>
@endsection

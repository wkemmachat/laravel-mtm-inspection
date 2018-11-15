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
            <form action="{{ route('dot.exportDot') }}" method="post">
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
                    <th class="text-center" scope="col">Del</th>
                </tr>
                </thead>
                <tbody>

                        @foreach ($dotArray as  $indexKey => $dotInLoop)
                            <tr>
                                <td class="text-center" scope="row">{{++$indexKey}}</td>
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

                                    @if (empty($dotInLoop->user_key_fg))

                                    @else
                                        $dotInLoop->user_key_fg->id
                                    @endif
                                </td>
                                <td class="text-center">
                                        {{-- <button type="button" class="btn btn-danger btn-sm">x</button> --}}
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
            {{ $dotArray->links() }}
        </div>
    @endif


</div>
@endsection

@extends('app')
@section('content')
@if(Auth::check())
    <h1>Fund</h1>
    <a href="{{url('/funds/create')}}" class="btn btn-success">Create Fund</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Cust No</th>
            <th>Cust Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Pooled with</th>
            <th>Acquired Net Asset Value</th>
            <th>Purchase Date</th>
            <th>Estimated Growth per Year</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($funds as $fund)
            <tr>
                <td>{{ $fund->customer->cust_number }}</td>
                <td>{{ $fund->customer->name }}</td>
                <td>{{ $fund->category }}</td>
                <td>{{ $fund->description }}</td>
                <td>{{ $fund->pooled_with }}</td>
                <td>{{ $fund->acquired_net_asset_value }}</td>
                <td>{{ $fund->acquired_date }}</td>
                <td>{{ $fund->estimated_yield_over_two_yrs }}</td>
                <td><a href="{{url('funds',$fund->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{route('funds.edit',$fund->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['funds.destroy', $fund->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endif
@if(Auth::guest())
    <a class="btn btn-info" href="{{ url('/login') }} ">You need to LOGIN.</a>
@endif
@endsection


@extends('app')
@section('content')
@if(Auth::check())
    <h1>Immobilia</h1>
    <a href="{{url('/immobilias/create')}}" class="btn btn-success">Create Immobilia</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Address</th>
            <th>Acquired Value</th>
            <th>Acquired Date</th>
            <th>Recent Value</th>
            <th>Recent Date</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($immobilias as $immobilia)
            <tr>
                <td>{{ $immobilia->customer->cust_number }}</td>
                <td>{{ $immobilia->customer->name }}</td>
                <td>{{ $immobilia->category }}</td>
                <td>{{ $immobilia->description }}</td>
                <td>{{ $immobilia->address }}</td>
                <td>{{ $immobilia->acquired_value }}</td>
                <td>{{ $immobilia->acquired_date }}</td>
                <td>{{ $immobilia->recent_value }}</td>
                <td>{{ $immobilia->recent_date }}</td>
                <td><a href="{{url('immobilias',$immobilia->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{route('immobilias.edit',$immobilia->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['immobilias.destroy', $immobilia->id]]) !!}
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


@extends('app')
@section('content')
@if(Auth::check())
    <h1>Customer</h1>
    <a href="{{url('/customers/create')}}" class="btn btn-success">Create Customer</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th> Cust Number</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Primary Email</th>
            <th>Home Phone</th>
            <th>Cell Phone</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->cust_number }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->city }}</td>
                <td>{{ $customer->state }}</td>
                <td>{{ $customer->zip }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->home_phone }}</td>
                <td>{{ $customer->cell_phone }}</td>
                <td><a href="{{url('customers',$customer->id)}}" class="btn btn-primary">Financial Summary</a></td>
                <td><a href="{{route('customers.edit',$customer->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['customers.destroy', $customer->id]]) !!}
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


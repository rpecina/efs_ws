@extends('app')
@section('content')
@if(Auth::check())
    <h1>Fund </h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Category</td>
                <td><?php echo ($immobilia['category']); ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo ($immobilia['description']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($immobilia['address']); ?></td>
            </tr>
            <tr>
                <td>Acquired value </td>
                <td><?php echo ($immobilia['acquired_value']); ?></td>
            </tr>
            <tr>
                <td>Date Purchased</td>
                <td><?php echo ($immobilia['acquired_date']); ?></td>
            </tr>
            <tr>
                <td>Recent value </td>
                <td><?php echo ($immobilia['recent_value']); ?></td>
            </tr>
            <tr>
                <td>Recent Date</td>
                <td><?php echo ($immobilia['recent_date']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@endif
@if(Auth::guest())
    <a class="btn btn-info" href="{{ url('/login') }} ">You need to LOGIN.</a>
@endif
@stop


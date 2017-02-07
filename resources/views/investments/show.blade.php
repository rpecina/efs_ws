@extends('app')
@section('content')
@if(Auth::check())
    <h1>Investment </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Category</td>
                <td><?php echo ($investment['category']); ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo ($investment['description']); ?></td>
            </tr>
            <tr>
                <td>Acquired Value</td>
                <td><?php echo ($investment['acquired_value']); ?></td>
            </tr>
            <tr>
                <td>Acquired Date</td>
                <td><?php echo ($investment['acquired_date']); ?></td>
            </tr>
            <tr>
                <td>Recent Value</td>
                <td><?php echo ($investment['recent_value']); ?></td>
            </tr>
            <tr>
                <td>Recent Date</td>
                <td><?php echo ($investment['recent_date']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@endif
@if(Auth::guest())
    <a class="btn btn-info" href="{{ url('/login') }} ">You need to LOGIN.</a>
@endif
@stop



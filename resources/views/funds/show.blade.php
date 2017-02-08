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
                <td><?php echo ($fund['category']); ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo ($fund['description']); ?></td>
            </tr>
            <tr>
                <td>Pooled with</td>
                <td><?php echo ($fund['pooled_with']); ?></td>
            </tr>
            <tr>
                <td>Acquired net asset value </td>
                <td><?php echo ($fund['acquired_net_asset_value']); ?></td>
            </tr>
            <tr>
                <td>Date Purchased</td>
                <td><?php echo ($fund['acquired_date']); ?></td>
            </tr>
            <tr>
                <td>Estimated Growth per Year</td>
                <td><?php echo ($fund['estimated_yield_over_two_yrs']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@endif
@if(Auth::guest())
    <a class="btn btn-info" href="{{ url('/login') }} ">You need to LOGIN.</a>
@endif
@stop


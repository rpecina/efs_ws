@extends('app')
@section('content')
@if(Auth::check())
    <h1>Stock </h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Stock Symbol</td>
                <td><?php echo ($stock['symbol']); ?></td>
            </tr>
            <tr>
                <td>Stock Name</td>
                <td><?php echo ($stock['name']); ?></td>
            </tr>
            <tr>
                <td>Number of Shares</td>
                <td><?php echo ($stock['shares']); ?></td>
            </tr>
            <tr>
                <td>Purchase Price </td>
                <td><?php echo ($stock['purchase_price']); ?></td>
            </tr>
            <tr>
                <td>Date Purchased</td>
                <td><?php echo ($stock['purchased']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@endif
@if(Auth::guest())
    <a class="btn btn-info" href="{{ url('/login') }} ">You need to LOGIN.</a>
@endif
@stop


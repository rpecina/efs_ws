@extends('app')
@section('content')
@if(Auth::check())
    <h1>Update Fund</h1>
    {!! Form::model($fund,['method' => 'PATCH','route'=>['funds.update',$fund->id]]) !!}
    <div class="form-group">
        {!! Form::label('category', 'Category:') !!}
        {!! Form::text('category',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('pooled_with', 'Pooled with:') !!}
        {!! Form::text('pooled_with',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('acquired_net_asset_value', 'Acquired net asset value:') !!}
        {!! Form::text('acquired_net_asset_value',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('acquired_date', 'Purchase Date:') !!}
        {!! Form::text('acquired_date',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('estimated_yield_over_two_yrs', 'Estimated Growth Rate per Year:') !!}
        {!! Form::text('estimated_yield_over_two_yrs',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endif
@if(Auth::guest())
    <a class="btn btn-info" href="{{ url('/login') }} ">You need to LOGIN.</a>
@endif
@stop


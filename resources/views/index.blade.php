@extends('navbar-guest-template')

@section('title', 'index')
    
@section('content')

<div class="card border-card mt-5 d-flex mx-auto" style="max-width: 100rem; justify-content:center; align-items:center;">
    <div class="card-body text-center mt-5 ">
        <h1>{{ trans('dicts.Find and Buy Your Groceries Here!')}}</h1>
    </div>
</div>
<br>
<br>

<style>
    .border-card{
        width: 500px;
        height: 500px;
        border: 3px solid #f0ad4e;
        -moz-border-radius: 250px; 
        -webkit-border-radius: 250px; 
        border-radius: 250px;
    }
</style>

@endsection
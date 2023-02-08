@extends('user.navbar')

@section('title', 'success')

@section('content')

<div class="card border-card mt-5 d-flex mx-auto" style="max-width: 100rem; justify-content:center; align-items:center;">
    <div class="card-body mt-5">
        <div class="text-center" style="margin: auto;">
            <h1 class="">{{ trans('dicts.Success !')}}</h1>
            <h5 class="">{{ trans('dicts.We will contact you 2x24 hours')}}</h5>
            <a href="/home" class="btn btn-warning">{{ trans('dicts.Back to Home')}}</a>
        </div>
    </div>
</div>
<br>
<br>

<style>
    .border-card{
        width: 500px;
        height: 500px;
        border: 3px solid #5cb85c;
        -moz-border-radius: 250px; 
        -webkit-border-radius: 250px; 
        border-radius: 250px;
    }
</style>

@endsection
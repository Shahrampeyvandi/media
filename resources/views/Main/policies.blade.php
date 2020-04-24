@extends('layout.Main.template')

@section('content')

<div class="col-md-12 p-3">
    <div class="tab-wrapper">
        <a href="{{route('Policies','s')}}"  @if (request()->path() == "policies/s")
        class="btn btn-info d-inline-block mb-3" @else class="btn btn-light d-inline-block mb-3"  @endif >دانشجویان </a>
        <a href="{{route('Policies','t')}}" @if (request()->path() == "policies/t")
        class="btn btn-info  d-inline-block mb-3" @else class="btn btn-light d-inline-block mb-3"  @endif> اساتید</a>
    </div>
    <div class="tab-contents clear mx-2">
        <div id="" class="">
            <div id="staticContainer">
                <div class="rules-section  grey lighten-4  p-3">
                   {!! $content !!}
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
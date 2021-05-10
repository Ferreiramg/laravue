@extends('layouts.app')

@section('content')
<dash  url_logout="{{url('/logout')}}" user='{{ Auth::user()->name }}'></dash>
@endsection
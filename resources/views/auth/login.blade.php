@extends('layouts.blank')

@section('content')
<login-app post="{{ route('login') }}" redirect="{{ route('password.request') }}"></login-app>
@endsection

@extends('layouts.app')

@section('content')
<login-app post="{{ route('login') }}" redirect="{{ route('password.request') }}"></login-app>
@endsection

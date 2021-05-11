@extends('layouts.app')

@section('content')
<form action="{{route('perm.save')}}" method="POST">
    @include('acl::_forms.users.add-permission')
    <md-button type="submit" class="md-raised md-primary">Save</md-button>
</form>
@endsection
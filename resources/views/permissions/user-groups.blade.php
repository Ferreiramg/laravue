@extends('layouts.app')

@section('content')
<form action="{{route('user-group.save')}}" method="POST">
    @include('acl::_forms.users.add-group')
    <md-button type="submit" class="md-raised md-primary">Save</md-button>
</form>
@endsection
@extends('layouts.app')

@section('content')
<form action="{{route('group.save')}}" method="POST">
    @include('acl::_forms.groups.group')
    <md-button type="submit" class="md-raised md-primary">Save</md-button>
</form>
@endsection
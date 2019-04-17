@extends('backend.installation.layout')
@section('content')
<h4 class="header-title">Congratulations!!!</h4>
<p>
    You have successfully completed the installation process. Please Login to continue.
</p>
<p class="text-muted font-13">
<a href="{{ route('proceed.to.login') }}" class="btn btn-success">Login</a>
</p>
@endsection

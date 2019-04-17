@extends('backend.installation.layout')
@section('content')
<h4 class="header-title">System Settings</h4>
<p class="text-muted font-13">
    <form method="POST" action="{{ route('system_settings') }}">
        @csrf
        <div class="form-group">
            <label for="system_name">System Name</label>
            <input type="text" class="form-control" id="system_name" name = "system_name">
            <small id="system_name_help" class="form-text text-muted">Provide a system name here.</small>
        </div>

        <div class="form-group">
            <label for="system_email">System Mail</label>
            <input type="email" class="form-control" id="system_email" name = "system_email">
            <small id="system_email_help" class="form-text text-muted">Provide a system mail here.</small>
        </div>

        <div class="form-group">
            <label for="school_name">School Name</label>
            <input type="text" class="form-control" id="school_name" name = "school_name">
            <small id="school_name_help" class="form-text text-muted">Provide default school name here.</small>
        </div>

        <div class="form-group">
            <label for="running_session">Running Session</label>
            <input type="text" class="form-control" id="running_session" name = "running_session">
            <small id="running_session_help" class="form-text text-muted">Provide Running Session here.</small>
        </div>

        <div class="form-group">
            <label for="running_session">Set TimeZone</label>
            <select class="form-control select2" data-toggle="select2" name="timezone">
                @php
                    $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
                @endphp
                @foreach ($tzlist as $tz)
                    <option value="{{ $tz }}" @if(env('TIMEZONE') == $tz) selected @endif>{{ $tz }}</option>
                @endforeach
            </select>
            <small id="timezone_help" class="form-text text-muted">Provide Current TimeZone here.</small>
        </div>

        <div class="form-group">
            <label for="admin_email">Admin Email</label>
            <input type="email" class="form-control" id="admin_email" name = "admin_email">
            <small id="admin_email_help" class="form-text text-muted">Provide Admin email here.</small>
        </div>

        <div class="form-group">
            <label for="admin_password">Password</label>
            <input type="password" class="form-control" id="admin_password" name = "admin_password">
            <small id="admin_password_help" class="form-text text-muted">Provide a strong Password here.</small>
        </div>

        <div class="form-group">
            <label for="admin_name">Admin Name</label>
            <input type="text" class="form-control" id="admin_name" name = "admin_name">
            <small id="admin_name_help" class="form-text text-muted">Provide Admin name here.</small>
        </div>

        <button type="submit" class="btn btn-info">Set Me Up</button>
    </form>
</p>
@endsection

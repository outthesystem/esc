@extends('backend.installation.layout')
@section('content')
    <h4 class="header-title">Checking file permissions</h4>
    <p class="text-muted font-13">
        We ran diagnosis on your server. Review the items that have a red mark on it. If everything is green, you are good to go to the next step.
    </p>
    <p class="text-muted">
        @php
            $phpVersion = number_format((float)phpversion(), 2, '.', '');
        @endphp
       @if ($phpVersion >= 7.20)
           <i class="dripicons-checkmark success_icon"></i> Php Version {{ phpversion() }}
       @else
           <i class="dripicons-cross failed_icon" style="color: red;"></i> Php version is lower than 7.2
       @endif
    </p>
    <p class="text-muted">
       @if ($permission['curl_enabled'])
           <i class="dripicons-checkmark success_icon"></i> Curl Enabled
       @else
           <i class="dripicons-cross failed_icon" style="color: red;"></i> Curl Enabled
       @endif
    </p>
    <p class="text-muted">
            @if ($permission['db_file_write_perm'])
                <i class="dripicons-checkmark success_icon"></i> <b>.env</b> File Permission
            @else
                <i class="dripicons-cross failed_icon" style="color: red;"></i> <b>.env</b> File Permission
            @endif
    </p>
    <p class="text-muted">
        @if ($permission['routes_file_write_perm'])
            <i class="dripicons-checkmark success_icon"></i> <b>RouteServiceProvider.php</b> File Permission
        @else
            <i class="dripicons-cross failed_icon" style="color: red;"></i> <b>RouteServiceProvider.php</b> File Permission
        @endif
    </p>
    <p>
        @if ($permission['curl_enabled'] == 1 && $permission['db_file_write_perm'] == 1 && $permission['routes_file_write_perm'] == 1 && $phpVersion >= 7.20)
            @if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1')
                <a href = "{{ route('step3') }}" class="btn btn-info">Go To Next Step</a>
            @else
                <a href = "{{ route('step2') }}" class="btn btn-info">Go To Next Step</a>
            @endif
        @endif
    </p>
@endsection

<style>
.success_icon {
    color: green;
    font-weight: bold;
    font-size: 18px;
}
.failed_icon {
    color: red;
    font-weight: bold;
    font-size: 18px;
}
</style>

@extends('backend.installation.layout')
@section('content')
    <h4 class="header-title">Installation Instructtions</h4>
    <p class="text-muted font-13">
        <p style="font-size: 14px;">
                    Welcome to Escuela Installation. You will need to know the following items before
                    proceeding.
                  </p>
                  <ol>
                    <li>Codecanyon purchase code</li>
                    <li>Database Name</li>
                    <li>Database Username</li>
                    <li>Database Password</li>
                    <li>Database Hostname</li>
                  </ol>
                  <p style="font-size: 14px;">
                    We are going to use the above information to write database.php file which will connect the application to your
                    database. During the installation process, we will check if the files that are needed to be written
                    (<strong>.env file</strong>) have
                    <strong>write permission</strong>. We will also check if <strong>curl</strong> are enabled on your server or not.
                  </p>
                  <p style="font-size: 14px;">
                    Gather the information mentioned above before hitting the start installation button. If you are ready....
                  </p>
                  <br>
                  <p>
                    <a href="{{ route('step1') }}" class="btn btn-info">
                      Start Installation Process
                    </a>
                  </p>
    </p>
@endsection

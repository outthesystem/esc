@extends('backend.installation.layout')
@section('content')
    <h4 class="header-title">Database setup</h4>

    @if (isset($error))
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
          <div class="alert alert-danger">
            <strong>Invalid Database Credentials!! </strong>Please check your database credentials carefully
          </div>
        </div>
      </div>
    @endif

    <p class="text-muted font-13">
            <form method="POST" action="{{ route('install.db') }}">
                    @csrf
                    <div class="form-group">
                        <label for="db_host">Database Host</label>
                        <input type="text" class="form-control" id="db_host" name = "DB_HOST" required>
                        <input type="hidden" name = "types[]" value="DB_HOST">
                        <small id="DB_HOST_HELP" class="form-text text-muted">Provide the database host here.</small>
                    </div>
                    <div class="form-group">
                        <label for="db_name">Database Name</label>
                        <input type="text" class="form-control" id="db_name" name = "DB_DATABASE" required>
                        <input type="hidden" name = "types[]" value="DB_DATABASE">
                        <small id="DB_NAME_HELP" class="form-text text-muted">Provide the database name here.</small>
                    </div>
                    <div class="form-group">
                        <label for="db_user">Database Username</label>
                        <input type="text" class="form-control" id="db_user" name = "DB_USERNAME" required>
                        <input type="hidden" name = "types[]" value="DB_USERNAME">
                        <small id="DB_USER_HELP" class="form-text text-muted">Provide the database username here.</small>
                    </div>
                    <div class="form-group">
                        <label for="db_pass">Database Password</label>
                        <input type="password" class="form-control" id="db_pass" name = "DB_PASSWORD">
                        <input type="hidden" name = "types[]" value="DB_PASSWORD">
                        <small id="DB_PASSWORD_HELP" class="form-text text-muted">Provide the database password here.</small>
                    </div>
                    <button type="submit" class="btn btn-info">Continue</button>
                </form>
    </p>
@endsection

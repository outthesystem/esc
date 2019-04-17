@extends('backend.installation.layout')
@section('content')
    <h4 class="header-title">Purchase Code</h4>
    <p class="text-muted font-13">
            <form method="POST" action="{{ route('purchase.code') }}">
                    @csrf
                    <div class="form-group">
                        <label for="purchase_code">Purchase Code</label>
                        <input type="text" class="form-control" id="purchase_code" name = "purchase_code" value="Valid">
                        <small id="purchase_code_help" class="form-text text-muted">Provide your codecanyon purchase code.</small>
                        <small id="purchase_code_link" class="form-text text-muted"><a href=""><a target="_blank" href="https://bit.ly/2QCCRlD">FREE SCRIPT'S</a></a></small>
                    </div>
                    <button type="submit" class="btn btn-info">Continue</button>
                </form>
    </p>
@endsection

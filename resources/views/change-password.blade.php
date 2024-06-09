@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>



                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @elseif (session('error'))
                                <div class="alert alert-error" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        <div class="mb-3">
                            <label for="oldPasswordInput" class="form-label">Old Password</label>
                            <input name="old_password" type="password" class="form-control
                            @error('old_password') is-invalid @enderror" id="oldPasswordInput" placeholder="Old Password">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="newPasswordInput" class="form-label @error('new_password') is-invalid @enderror">New Password</label>
                            <input name="new_password" type="password" class="form-control" id="newPasswordInput" placeholder="New Password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                            <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput" placeholder="Confirm New Password">
                          </div>
                          <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

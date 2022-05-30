@extends('layouts.app')

@section('content')
<div class="container mt-4 pb-5">
    <div class="row justify-content-center">
        <div class="card mt-3 p-4" style="background: #212121; color:#fff;">
            <form method="POST" action="{{ route('updateProfileData') }}" enctype="multipart/form-data">
                @csrf
                <div class="avatar-profile mt-3 mb-4" style="width:150px; height:150px; border-radius:50%; margin-left:auto; margin-right:auto;">
                    @if(session('avatar'))
                      <img src="{{asset('storage/'.session('avatar'))}}" alt="" class="rounded-circle me-2" style="width:100%; height:100%;">
                    @else
                      <div class="rounded-circle" style="width:100%; height:100%; text-align:center; line-height:150px; background:brown; font-size:76px; font-weight:600;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    @endif
                </div>
                <div class="row mb-3">
                    <label for="avatar" class="col-md-4 col-form-label text-md-end">Avatar</label>
                    <div class="col-md-6">
                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}">

                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Nazwa</label>

                    <div class="col-md-6">
                        <input id="name" type="text" maxlength="40" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Adres email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" maxlength="255" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if(session('email'))
                        <span style="color:red;">
                            <strong>Taki email już istnieje!</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Zapisz zmiany
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card mt-4 p-5" style="background: #212121; color:#fff;">
            <form method="POST" action="{{ route('updatePassword') }}">
                @csrf
                <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-form-label text-md-end">Aktualne hasło</label>

                    <div class="col-md-6">
                        <input id="currentPassword" minlength="8" type="password" class="form-control @error('currentPassword') is-invalid @enderror" name="currentPassword" required>

                        @error('currentPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">Nowe hasło</label>

                    <div class="col-md-6">
                        <input id="password" type="password" minlength="8" class="form-control @error('password') is-invalid @enderror" name="password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Powtórz nowe hasło</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" minlength="8" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Zmień hasło
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

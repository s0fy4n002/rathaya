@extends('fe.members.layouts.panel')
@section('panel')
    <p class="font-semibold text-2xl">{{ __('fem04pass.title') }}</p>
    <form method="POST" action="{{ route('member_password_update') }}">
        @csrf
        @method("PUT")
        <div class="mt-4 flex flex-col gap-4">
            <div class="form-panel">
                <label for="">{{ __('fem04pass.passold') }}</label>
                <div class="input-group">
                    <input type="password" name="old_password" class="form-akm @error('old_password') is-invalid @enderror">
                    @error('old_password')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem04pass.passnew') }}</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-akm @error('password') is-invalid @enderror">
                    @error('password')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-panel">
                <label for="">{{ __('fem04pass.passconfirm') }}</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" class="form-akm @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

        </div>
        <div class="w-full flex justify-end">
            <button class="akm-btn bg-primary rounded text-white mt-4">{{ __('fem04pass.btnSave') }}</button>
        </div>
    </form>
@endsection

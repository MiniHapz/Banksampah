@extends('layouts.app', ['title' => 'Halaman Edit Profil', 'section_header' => 'Edit Profil'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-3 py-3">
            <div class="p-4 sm:p-8 bg-white">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
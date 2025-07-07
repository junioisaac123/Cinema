@extends('admin.layout')
@section('content')
<h1 class="h3 mb-4 text-gray-800">User Details</h1>

<div class="row">
    @include('components.form-input',[
        'name'=>'username',
        'type'=>'text',
        'label'=>'Username',
        'classes'=>'col-6',
        'required'=>'disabled',
        'value'=>$user->username,
    ])
    @include('components.form-input',[
        'name'=>'email',
        'type'=>'text',
        'label'=>'Email',
        'classes'=>'col-6',
        'required'=>'disabled',
        'value'=>$user->email,
    ])
</div>

<div class="row">
    @include('components.form-input',[
        'name'=>'first_name',
        'type'=>'text',
        'label'=>'First Name',
        'classes'=>'col-6',
        'required'=>'disabled',
        'value'=>$user->first_name,
    ])
    @include('components.form-input',[
        'name'=>'last_name',
        'type'=>'text',
        'label'=>'Last Name',
        'classes'=>'col-6',
        'required'=>'disabled',
        'value'=>$user->last_name,
    ])
</div>

<div class="row">
    @include('components.form-input',[
        'name'=>'phone',
        'type'=>'text',
        'label'=>'Phone',
        'classes'=>'col-6',
        'required'=>'disabled',
        'value'=>$user->phone,
    ])
    @include('components.form-input',[
        'name'=>'role',
        'type'=>'text',
        'label'=>'Role',
        'classes'=>'col-6',
        'required'=>'disabled',
        'value'=>$user->role->title,
    ])
</div>

@include('components.flash-message')
<!-- Estilos personalizados -->
<style>
    .container table {
        margin-left: auto !important;
        margin-right: auto !important;
        /* text-align: center; */
        width: auto;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
</style>

<!-- Contenedor para centrar todo el contenido -->
<div style="margin-top: 2rem; display: flex; justify-content: center;">
    <div style="width: 100%; max-width: 900px; text-align: center;">
        <div class="reservations-wrapper mt-5">
            @include('user.reservations')
        </div>
    </div>
</div>


@endsection

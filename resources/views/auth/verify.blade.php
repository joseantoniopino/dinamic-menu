@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Confirma tu dirección de correo</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nuevo email ha sido enviado para que lo verifiques.
                        </div>
                    @endif

                    Comprueba tu email
                    Si no recibes el email, <a href="{{ route('verification.resend') }}">Pulsa aquí para recibir otro</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts/template')
@section('titulo', 'CORREO')

@section('contenido')
<div class="card  mb-3">
    <div class="card-body"> 

        <form action="{{route('contactanos.store')}}" method="POST" class="needs-validation" novalidate>
        @csrf
            <div class="mb-3">
              <label for="asunto" class="form-label fw-bold text-primary">Asunto:</label>
              <input class="form-control" type="text" name="asunto"id="asunto" placeholder="Ingrese el Asunto" required>
              <div class="invalid-feedback">
                Por favor ingrese el asunto.
              </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label fw-bold text-primary">Nombre:</label>
                <input class="form-control" type="text" name="name"id="name" placeholder="Ingrese su nombre" required>
                <div class="invalid-feedback">
                   Por favor ingrese su nombre.
                </div>
            </div>

            @error('name')
                <p><strong>{{$message}}</strong></p>
            @enderror

            <div class="mb-3">
                <label for="correo" class="form-label fw-bold text-primary">Correo remitente:</label>
                <input class="form-control" type="email" name="correo"id="correo" placeholder="Ingrese su correo" required>
                <div class="invalid-feedback">
                    Por favor ingrese su correo.
                 </div>
            </div>

            @error('correo')
                <p><strong>{{$message}}</strong></p>
            @enderror

          <div class="mb-3">
              <label for="correodestino" class="form-label fw-bold text-primary">Correo destinatario:</label>
              <input class="form-control" type="email" name="correodestino"id="correodestino" placeholder="Ingrese su correo" required>
              <div class="invalid-feedback">
                  Por favor ingrese el correo destino.
               </div>
          </div>

            @error('correodestino')
                <p><strong>{{$message}}</strong></p>
            @enderror

            <div class="mb-3">
                <label for="mensaje" class="form-label fw-bold text-primary">Mensaje:</label>
                <textarea class="form-control" id="mensaje" type="text" name="mensaje" placeholder="Ingrese su Mensaje."rows="3" required></textarea>
                {{-- <div class="invalid-feedback"> --}}
                <div class="invalid-feedback">
                    Introduzca un mensaje en el área de texto.
                </div>
            </div>

            @error('mensaje')
                <p><strong>{{$message}}</strong></p>
            @enderror
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" onclick="" type="submit">Enviar Mensaje</button>
              </div>
        </form>

            @if (Session::has('info'))
                <div class="alert alert-success my-3 mb-2 alert-dismissible fade show" role="alert">
                    <strong><i class="fa-solid fa-envelope-circle-check"></i> Enviado!</strong> {{Session::get('info')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            @endif

        </div><!--card-body-->
    </div><!--card-->

<script>

 
(function () {
  'use strict'
 
  var forms = document.querySelectorAll('.needs-validation')
  
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

</script>
@endsection
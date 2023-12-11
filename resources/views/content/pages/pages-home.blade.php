@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<header>
    <h1>Bienvenido a la Plataforma Fábrica de contenidos</h1>
    <p>Descubre cómo simplificar la solicitud de virtualización de contenidos.</p>
    <a href="#solicitud" class="btn btn-primary">Solicitar Virtualización</a>
  </header>

  <section class="features">
    <h2>Características Destacadas</h2>
    <ul>
      <li>Variedad de cursos disponibles</li>
      <li>Fácil proceso de solicitud</li>
      <li>Aprendizaje flexible desde cualquier lugar</li>
    </ul>
  </section>


  <section class="faq">
    <h2>Preguntas Frecuentes</h2>
    <!-- Agrega preguntas frecuentes aquí -->
    <div class="question">
      <h3>¿Cómo puedo solicitar la virtualización de un curso?</h3>
      <p>Para solicitar la virtualización de un curso, simplemente haz clic en el botón "Solicitar Virtualización" y sigue los pasos indicados.</p>
    </div>
  </section>
@endsection

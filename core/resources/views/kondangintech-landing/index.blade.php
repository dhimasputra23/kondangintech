@extends('kondangintech-landing.layout')
@section('meta-keywords', "$setting->meta_keywords")
@section('meta-description', "$setting->meta_description")
@section('content')

@include('kondangintech-landing.components.hero')

<main id="main">
  
  @include('kondangintech-landing.components.about-section')
  @include('kondangintech-landing.components.values-section')
  @include('kondangintech-landing.components.counts-section')
  @include('kondangintech-landing.components.features-section')
  @include('kondangintech-landing.components.services-section')
  @include('kondangintech-landing.components.pricing-section')
  @include('kondangintech-landing.components.faq-section')
  @include('kondangintech-landing.components.portfolio-section')
  @include('kondangintech-landing.components.testimonials-section')
  @include('kondangintech-landing.components.team-section')
  @include('kondangintech-landing.components.clients-section')
  @include('kondangintech-landing.components.blogs-section')
  @include('kondangintech-landing.components.contact-section')

  

  

  

  

  

  

  

  

  

  

  

</main><!-- End #main -->

@endsection
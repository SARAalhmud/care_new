@extends('layouts.navigation')
@section('nav')

  <!-- Page Header -->
  <div class="page-header py-5 bg-black">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="display-4 text-white"><span class="golden-text">{{ __('messages.page_title') }}</span></h1>
          <p class="text-muted"> {{ __('messages.page_description') }}</p>
        </div>
        <div class="col-md-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-md-end golden-breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white">{{ __('messages.breadcrumb_home') }}</a></li>
              <li class="breadcrumb-item active golden-text" aria-current="page">{{ __('messages.breadcrumb_current') }}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- About Us Section -->
  <section class="about-us py-5 bg-dark">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1573116402348-929766f46b42?q=80&w=1974&auto=format&fit=crop" class="img-fluid rounded" alt="سيارتي الذهبية">
            <div class="experience-badge golden-bg p-3 rounded position-absolute bottom-0 end-0 mb-4 me-4">
              <h4 class="mb-0 text-black text-center">{{ __('messages.experience_years') }} </h4>
              <p class="mb-0 text-black text-center">{{ __('messages.experience_text') }}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <h2 class="text-white mb-3">{{ __('messages.our_story_title') }}</h2>
          <p class="text-muted">{{ __('messages.our_story_p1') }}</p>

          <p class="text-muted">{{ __('messages.our_story_p2') }}</p>

          <p class="text-muted">{{ __('messages.our_story_p3') }}</p>

          <div class="mt-4">
            <a href="contact.html" class="btn golden-btn me-2">{{ __('messages.btn_contact') }}</a>
            <a href="features.html" class="btn btn-outline-golden">{{ __('messages.btn_services') }}</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Vision & Mission -->
  <section class="vision-mission py-5 bg-black">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
          <div class="vision-card bg-dark rounded p-4 h-100">
            <div class="vision-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-eye text-black"></i>
            </div>
            <h3 class="text-white mb-3">{{ __('messages.vision_title') }}</h3>
            <p class="text-muted">{{ __('messages.vision_p1') }}</p>

            <p class="text-muted">{{ __('messages.vision_p2') }}</p>
            </div>
        </div>
        <div class="col-md-6">
          <div class="mission-card bg-dark rounded p-4 h-100">
            <div class="mission-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-bullseye text-black"></i>
            </div>
            <h3 class="text-white mb-3">{{ __('messages.mission_title') }}</h3>
            <p class="text-muted">{{ __('messages.mission_p1') }}</p>

            <p class="text-muted">{{ __('messages.mission_p2') }}</p>
       </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Values -->
  <section class="our-values py-5 bg-dark">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="text-white">{{ __('messages.values_title') }}</h2>

        <p p class="text-muted mx-auto" style="max-width: 700px;">{{ __('messages.values_desc') }}</p>
    </div>

      <div class="row g-4">
        <!-- Value 1 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-star-fill text-black"></i>
            </div>
            <h3 class="text-white mb-3">{{ __('messages.value_excellence') }}</h3>
            <p class="text-muted">{{ __('messages.value_excellence_desc') }}</p>
          </div>
        </div>

        <!-- Value 2 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-shield-check text-black"></i>
            </div>
            <h3 class="text-white mb-3">{{ __('messages.value_integrity') }}</h3>
            <p class="text-muted">{{ __('messages.value_innovation_desc') }}</p>
         </div>
        </div>

        <!-- Value 3 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-lightbulb text-black"></i>
            </div>
            <h3 class="text-white mb-3">{{ __('messages.value_innovation') }}</h3>
            <p class="text-muted">{{ __('messages.value_innovation_desc') }}</p>
    </div>
        </div>

        <!-- Value 4 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-people-fill text-black"></i>
            </div>
            <h3 class="text-white mb-3">{{ __('messages.value_teamwork') }}</h3>
            <p class="text-muted">{{ __('messages.value_teamwork_desc') }}</p>
      </div>
        </div>

        <!-- Value 5 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-heart-fill text-black"></i>
            </div>
            <h3 class="text-white mb-3">{{ __('messages.value_customers') }}</h3>
            <p class="text-muted">{{ __('messages.value_customers_desc') }}</p>
  </div>
        </div>

        <!-- Value 6 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-graph-up-arrow text-black"></i>
            </div>
            <h3 class="text-white mb-3">{{ __('messages.value_growth') }}</h3>
            <p class="text-muted">{{ __('messages.value_growth_desc') }}</p>
       </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Team -->

@endsection

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>التسجيل | سيارتي الذهبية</title>
  <!-- Bootstrap RTL -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('styles.css') }}">
  <!-- Auth Page Specific Styles -->
  <style>
    .nav-tabs .nav-link.active {
    border-bottom: 3px solid #FFD700; /* الخط تحت التبويب النشط */
    color: #FFD700; /* تغيير لون النص إلى اللون الذهبي */
}

    .auth-container {
      min-height: 100vh;
      display: flex;
      align-items: stretch;
    }
    .auth-form {
      padding: 2rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .auth-hero {
      background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.8)), url('https://images.unsplash.com/photo-1494976388531-d1058494cdd8?q=80&w=2070&auto=format&fit=crop');
      background-size: cover;
      background-position: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
      padding: 2rem;
      color: #fff;
    }
    .auth-tabs .nav-link {
      color: #ffffff;
      border: none;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    .auth-tabs .nav-link.active {
      color: var(--golden-color);
      background-color: transparent;
      border-bottom: 3px solid var(--golden-color);
    }
    footer {
  margin-top: auto; /* هذا سيضمن أن التذييل يبقى في الأسفل */
  background-color: #000;
  color: white;
  text-align: center;
  padding: 1rem;
}
.rtl {
  direction: rtl;
  text-align: right;
}

.ltr {
  direction: ltr;
  text-align: left;
}
  </style>
</head>
<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <span class="text-white">سيارتي</span> <span class="golden-text">الذهبية</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @foreach (config('navigation') as $link)
          <a href="{{ route($link['route']) }}"
             style="text-decoration:none"
             class="{{ request()->routeIs($link['route']) ? 'golden-text' : 'text-white' }} px-4 py-2 rounded"
             data-translate="{{ $link['key'] }}">
             {{ __($link['name']) }}
            </a>
      @endforeach

</div>
<ul class="navbar-nav align-items-center mb-2 mb-lg-0">
    <!-- Language Switcher -->
    <li class="nav-item">
      <div class="d-flex align-items-center px-2 py-1" style="font-size: 0.875rem;">
        <i class="bi bi-globe mx-1 golden-text" style="font-size: 1rem;"></i>
        <a href="{{ route('lang.switch', 'ar') }}"
          class="mx-1 {{ app()->getLocale() == 'ar' ? 'golden-text fw-bold' : 'text-white' }}">
          العربية
        </a>
        <span class="text-white">|</span>
        <a href="{{ route('lang.switch', 'en') }}"
          class="mx-1 {{ app()->getLocale() == 'en' ? 'golden-text fw-bold' : 'text-white' }}">
          English
        </a>
      </div>
    </li>

    <!-- Auth Links -->

  </ul>
</li>
<ul class="navbar-nav align-items-center mb-2 mb-lg-0">
@if(auth()->check())
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-golden" href="#" id="navbarDropdown" role="button"
    data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-person-fill me-1"></i> {{ auth()->user()->name }}
  </a>
  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fas fa-user-cog me-2"></i> الملف الشخصي</a></li>
    <li><hr class="dropdown-divider"></li>
    <li>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="dropdown-item text-danger" type="submit">
          <i class="fas fa-sign-out-alt me-2"></i> تسجيل خروج
        </button>
      </form>
    </li>
  </ul>
</li>
@else
<li class="nav-item">
  <a href="{{ route('login') }}" class="nav-link text-white">
    <i class="bi bi-person-fill me-1"></i> تسجيل / دخول
  </a>
</li>
@endif
</ul>

        </div>
      </div>
    </div>
  </nav>

  <div class="auth-container">


  <div class="col-md-6 auth-form">
    <div class="container">
        <h1 class="mb-4"><span class="golden-text"></span> {{ __('messages.title') }}</h1>
        <p class="text-muted mb-4">{{ __('messages.subtitle') }}</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name"  class="form-control bg-dark text-white border-secondary" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
          <!-- Email Address -->
          <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"  />
            <x-text-input id="email" class="form-control bg-dark text-white border-secondary" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label"> phone</label>
            <input type="tel" class="form-control bg-dark text-white border-secondary" id="phone" name="mobileno" required value="{{ old('mobileno') }}">
        </div>





            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password"  class="form-control bg-dark text-white border-secondary"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation"  class="form-control bg-dark text-white border-secondary"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
<!-- اختيار نوع الحساب -->
<div class="mt-4">
    <x-input-label for="role" :value=" __('messages.select_role')" />
    <div class="d-flex">
        <!-- بائع -->
        <div class="form-check me-4">
            <input class="form-check-input" type="radio" name="role" id="role_seller" value="seller" checked>
            <label class="form-check-label" for="role_seller">
                {{ __('messages.role_seller') }}
            </label>
        </div>
        <!-- مستخدم عادي -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="role_user" value="user">
            <label class="form-check-label" for="role_user">
                {{ __('messages.role_user') }}
            </label>
        </div>
    </div>
</div>




<div class="mb-3 form-check mt-3">
    <input type="checkbox" class="form-check-input border-secondary" id="agreeTerms" required>
    <label class="form-check-label" for="agreeTerms">
        {!! __('messages.agree_terms') !!}
    </label>
</div>


    <x-primary-button class="btn golden-btn">
        {{ __('Register') }}
    </x-primary-button>
</div>
</form>

</div>
</div>

<div class="col-md-6 auth-hero">
    <div class="container">
      <div class="mb-5">
        <h1 class="display-4 mb-4">  <span class="golden-text">{{ __('messages.join_title') }} </span></h1>
        <p class="lead">
            {{ __('messages.join_subtitle') }}</p>    </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-gem fs-1"></i>
            </div>
            <div>
              <h4>    {{ __('messages.quality_title') }} </h4>
              <p class="m-0 text-muted">   {{ __('messages.quality_desc') }}</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-shield-check fs-1"></i>
            </div>
            <div>
                <h4>    {{ __('messages.secure_title') }} </h4>
                <p class="m-0 text-muted">   {{ __('messages.secure_desc') }}</p>
               </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-graph-up-arrow fs-1"></i>
            </div>
            <div>
                <h4>    {{ __('messages.sales_title') }} </h4>
                <p class="m-0 text-muted">   {{ __('messages.sales_desc') }}</p>
             </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-headset fs-1"></i>
            </div>
            <div>
                <h4>    {{ __('messages.support_title') }} </h4>
                <p class="m-0 text-muted">   {{ __('messages.support_desc') }}</p>
             </div>
          </div>
        </div>



</div>
</div>
</div></div>
</div>

<!-- Footer -->

<footer class="footer py-5 bg-black">
    <div class="container">
        <div class="row g-4">
            <!-- Company Info -->
            <div class="col-lg-6 col-md-6">
                <h3 class="text-white mb-4">{{ __('messages.footer_company_name') }}</h3>
                <p class="text-muted">{{ __('messages.footer_description') }}</p>
                <div class="social-icons mt-3">
                    <a href="#" class="golden-text me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="golden-text me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="golden-text me-3"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="golden-text"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-6 col-md-6">
                <h3 class="text-white mb-4">{{ __('messages.footer_contact_title') }}</h3>
                <ul class="list-unstyled footer-contact">
                    <li class="d-flex mb-3">
                        <i class="bi bi-geo-alt-fill golden-text me-3"></i>
                        <span class="text-muted">{{ __('messages.footer_location') }}</span>
                    </li>
                    <li class="d-flex mb-3">
                        <i class="bi bi-telephone-fill golden-text me-3"></i>
                        <span class="text-muted">{{ __('messages.footer_phone') }}</span>
                    </li>
                    <li class="d-flex mb-3">
                        <i class="bi bi-envelope-fill golden-text me-3"></i>
                        <span class="text-muted">{{ __('messages.footer_email') }}</span>
                    </li>
                    <li class="d-flex">
                        <i class="bi bi-clock-fill golden-text me-3"></i>
                        <span class="text-muted">{{ __('messages.footer_working_hours') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-top border-dark mt-4 pt-4 text-center text-muted">
            <p>{{ __('messages.footer_rights') }}</p>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('script.js')}}"></script>

 <script>
    // وظائف معالجة نموذج التسجيل

    // تأثير بطاقات خطط الاشتراك
    document.addEventListener('DOMContentLoaded', function() {
      const planCards = document.querySelectorAll('.plan-card');

      planCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
          this.classList.add('shadow-lg');
        });

        card.addEventListener('mouseleave', function() {
          this.classList.remove('shadow-lg');
        });
      });

      // إضافة تأثير مرئي لاختيار الخطة
      const planSelectors = document.querySelectorAll('.plan-selector');
      planSelectors.forEach(selector => {
        selector.addEventListener('change', function() {
          // تحديث أزرار "اختر الخطة"
          document.querySelectorAll('.plan-card .btn').forEach(btn => {
            btn.textContent = 'اختر الخطة';
            if (document.documentElement.lang === 'en') {
              btn.textContent = 'Select Plan';
            }
            btn.classList.remove('golden-btn');
            btn.classList.add('btn-outline-golden');
          });

          // تحديث الزر المختار
          const selectedBtn = this.nextElementSibling.querySelector('.plan-card .btn');
          selectedBtn.textContent = 'تم الاختيار';
          if (document.documentElement.lang === 'en') {
            selectedBtn.textContent = 'Selected';
          }
          selectedBtn.classList.remove('btn-outline-golden');
          selectedBtn.classList.add('golden-btn');
        });
      });






    });
  </script>
</body>
</html>


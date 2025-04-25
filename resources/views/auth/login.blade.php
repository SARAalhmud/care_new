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
</head>
<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

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


  <!-- Navbar -->
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="{{ route('home') }}">
        <span class="golden-text">{{ __('messages.golc_car') }}</span> <span class="text-white">  {{ __('messages.golc_carsff') }}
        </span>
      </a>

      <!-- Toggler (responsive) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Content -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Navigation Links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @foreach (config('navigation') as $link)
            <li class="nav-item">
              <a href="{{ route($link['route']) }}"
                class="nav-link {{ request()->routeIs($link['route']) ? 'text-golden' : 'text-white' }}">
                {{ __($link['name']) }}

              </a>
            </li>
          @endforeach
        </ul>

        <!-- Right Side (Language + Login/Profile) -->
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
  </nav>

      <div class="auth-container">



        <div class="col-md-6 auth-form">
            <div class="container">
              <h1 class="mb-4"><span class="golden-text"></span> {{ __('messages.title') }}</h1>
              <p class="text-muted mb-4">{{ __('messages.subtitle') }}</p>
        <form method="POST" action="{{ route('login') }}"id="login-form">
          @csrf

          <div class="mb-3">
                   <x-input-label for="email" :value="__('Email')" class="form-label" />
            <x-text-input   class="form-control bg-dark text-white border-secondary" id="loginEmail"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-3">

            <x-input-label for="password" :value="__('Password')" class="form-label" />

            <x-text-input class="form-control bg-dark text-white border-secondary" id="loginPassword"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

     </div>
        <div class="mb-3 form-check">
          <div class="block mt-4">
            <label for="remember_me" class="form-check-label" for="rememberMe">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>    </div>

        <div class="text-center">
          <div  class="golden-text">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('messages.forgot_password') }}
                </a>
            @endif

          </div>
<div>
    <a href="{{ route('register') }}" class="btn golden  " style="color: #ffffff">
        <i class="bi bi-person-circle me-1"></i> {{ __('messages.register') }}
      </a>
</div>
          <button type="submit" class="btn golden-btn"> {{ __('messages.login') }}</button>
        </form>
        </div>
    </div>
</div>
<div class="col-md-6 auth-hero">
    <div class="container">
      <div class="mb-5">
        <h1 class="display-4 mb-4">انضم إلى <span class="golden-text">سيارتي الذهبية</span></h1>
        <p class="lead">المنصة الرائدة لبيع وشراء السيارات الفاخرة في سوريا</p>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-gem fs-1"></i>
            </div>
            <div>
              <h4>جودة مضمونة</h4>
              <p class="m-0 text-muted">نقدم أفضل السيارات بضمان الجودة</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-shield-check fs-1"></i>
            </div>
            <div>
              <h4>منصة آمنة</h4>
              <p class="m-0 text-muted">معاملات آمنة وموثوقة بنسبة 100%</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-graph-up-arrow fs-1"></i>
            </div>
            <div>
              <h4>زيادة المبيعات</h4>
              <p class="m-0 text-muted">ضاعف مبيعاتك مع منصتنا المتميزة</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <div class="golden-text me-3">
              <i class="bi bi-headset fs-1"></i>
            </div>
            <div>
              <h4>دعم متميز</h4>
              <p class="m-0 text-muted">فريق دعم متخصص على مدار الساعة</p>
            </div>
          </div>
        </div>



</div>
</div>
</div></div>
</div>


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


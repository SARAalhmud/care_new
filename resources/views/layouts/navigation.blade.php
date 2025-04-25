<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>سيارتي الذهبية | My Golden Car</title>
  <!-- Bootstrap RTL CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('styles.css' )}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">


<!-- JS for Bootstrap (يجب أن يكون في الأسفل بعد ملفات الـ jQuery إذا كنت تستخدمه) -->

</head>
<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <style>
 .bg-golden {
    background-color: #d4af37 !important; /* لون ذهبي */
}
.rtl {
  direction: rtl;
  text-align: right;
}

.ltr {
  direction: ltr;
  text-align: left;
}
body {
    background-color: #353333; /* رمادي فاتح */
}

.text-golden {
    color: #d4af37 !important;
}
.golden-text {
    color: #d4af37 !important;
}

.text-golden {
    color: #d4af37 !important;
}

.bg-golden {
    background-color: #d4af37 !important;
}
.btn-golden {
    background-color: #d4af37; /* لون ذهبي */
    color: white;              /* النص أبيض */
    border: none;
}

.btn-golden:hover {
    background-color: #c49c28; /* لون ذهبي أغمق عند التمرير */
    color: white;
}
.text-muted {
  color: white !important;
}


    </style>
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


  @yield('nav')

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JavaScript -->
<script src="{{ asset('script.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var dropdownToggle = document.getElementById('navbarDropdown');
    if (dropdownToggle) {
        dropdownToggle.addEventListener('click', function (e) {
            var dropdownMenu = dropdownToggle.nextElementSibling;
            dropdownMenu.classList.toggle('show');
        });
    }
});

function changeLanguage(lang) {
    fetch(`/translations/${lang}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(translations => {
            console.log("Received translations:", translations);

            translations.forEach(translation => {
                try {
                    const translatedText = JSON.parse(translation.translation)?.text || translation.translation;

                    const elements = document.querySelectorAll(`[data-translate="${translation.key}"]`);
                    elements.forEach(element => {
                        element.innerText = translatedText;
                    });
                } catch (error) {
                    console.error('Error parsing translation for key:', translation.key, error);
                }
            });
        })
        .catch(error => {
            console.error('Error fetching translations:', error);
        });
}
</script>

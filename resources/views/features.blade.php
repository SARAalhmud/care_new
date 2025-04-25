@extends('layouts.navigation')
@section('nav')

  <!-- Page Header -->
  <div class="page-header py-5 bg-black">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="display-4 text-white">مميزات <span class="golden-text">خدماتنا</span></h1>
          <p class="text-muted">اكتشف ما يميزنا عن منافسينا من خلال خدماتنا المتميزة</p>
        </div>
        <div class="col-md-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-md-end golden-breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white">الرئيسية</a></li>
              <li class="breadcrumb-item active golden-text" aria-current="page">المميزات</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- Core Features -->
  <section class="core-features py-5 bg-dark">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="text-white mb-3">ما الذي <span class="golden-text">يميزنا</span></h2>
        <p class="text-muted mx-auto" style="max-width: 700px;">نحن نسعى دائمًا لتقديم أفضل الخدمات لعملائنا، وهذا ما يجعلنا الخيار الأول للعديد من محبي السيارات الفاخرة</p>
      </div>

      <div class="row g-4">
        <!-- Feature 1 -->
        <div class="col-md-4">
          <div class="feature-card bg-black rounded p-4 text-center h-100">
            <div class="feature-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-award-fill text-white fs-4"></i>
            </div>
            <h4 class="text-white mb-3">سيارات فاخرة معتمدة</h4>
            <p class="text-muted">جميع سياراتنا معتمدة ومضمونة بشكل كامل، مع فحص شامل لأكثر من 150 نقطة لضمان أعلى معايير الجودة</p>
          </div>
        </div>

        <!-- Feature 2 -->
        <div class="col-md-4">
          <div class="feature-card bg-black rounded p-4 text-center h-100">
            <div class="feature-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-credit-card-fill text-white fs-4"></i>
            </div>
            <h4 class="text-white mb-3">خيارات تمويل مرنة</h4>
            <p class="text-muted">نقدم خيارات تمويل متعددة مع أسعار فائدة تنافسية لمساعدتك في امتلاك سيارة أحلامك بطريقة تناسب ميزانيتك</p>
          </div>
        </div>

        <!-- Feature 3 -->
        <div class="col-md-4">
          <div class="feature-card bg-black rounded p-4 text-center h-100">
            <div class="feature-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-tools text-white fs-4"></i>
            </div>
            <h4 class="text-white mb-3">خدمات صيانة متميزة</h4>
            <p class="text-muted">فريق من الفنيين المعتمدين مع أحدث التقنيات لتقديم خدمات صيانة على أعلى مستوى للحفاظ على أداء سيارتك</p>
          </div>
        </div>

        <!-- Feature 4 -->
        <div class="col-md-4">
          <div class="feature-card bg-black rounded p-4 text-center h-100">
            <div class="feature-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-shield-check text-white fs-4"></i>
            </div>
            <h4 class="text-white mb-3">ضمان شامل</h4>
            <p class="text-muted">نقدم ضمانًا شاملاً لمدة تصل إلى 5 سنوات على جميع سياراتنا الجديدة، وضمان لمدة سنة على السيارات المستعملة</p>
          </div>
        </div>

        <!-- Feature 5 -->
        <div class="col-md-4">
          <div class="feature-card bg-black rounded p-4 text-center h-100">
            <div class="feature-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-car-front-fill text-white fs-4"></i>
            </div>
            <h4 class="text-white mb-3">تجربة قيادة</h4>
            <p class="text-muted">نوفر لك فرصة تجربة قيادة السيارة قبل شرائها للتأكد من أنها تلبي جميع احتياجاتك وتطلعاتك</p>
          </div>
        </div>

        <!-- Feature 6 -->
        <div class="col-md-4">
          <div class="feature-card bg-black rounded p-4 text-center h-100">
            <div class="feature-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-headset text-white fs-4"></i>
            </div>
            <h4 class="text-white mb-3">دعم العملاء</h4>
            <p class="text-muted">فريق خدمة العملاء متاح على مدار الساعة لتلبية جميع استفساراتك وتقديم المساعدة الفورية عند الحاجة</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="why-choose-us py-5 bg-black">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <img src="https://images.unsplash.com/photo-1602777924852-aed00ff53325?q=80&w=1974&auto=format&fit=crop" class="img-fluid rounded" alt="Luxury Car Showroom">
        </div>
        <div class="col-lg-6">
          <h2 class="text-white mb-4">لماذا <span class="golden-text">تختارنا؟</span></h2>

          <div class="choose-item d-flex mb-4">
            <div class="choose-icon golden-bg rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-check2-circle text-white"></i>
            </div>
            <div class="ms-3">
              <h5 class="text-white">خبرة أكثر من 15 عاماً</h5>
              <p class="text-muted mb-0">خبرة طويلة في سوق السيارات الفاخرة تضمن لك التعامل مع محترفين يفهمون احتياجاتك</p>
            </div>
          </div>

          <div class="choose-item d-flex mb-4">
            <div class="choose-icon golden-bg rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-check2-circle text-white"></i>
            </div>
            <div class="ms-3">
              <h5 class="text-white">مجموعة واسعة من الخيارات</h5>
              <p class="text-muted mb-0">نوفر تشكيلة واسعة من أفخم العلامات التجارية العالمية للسيارات لتختار منها ما يناسبك</p>
            </div>
          </div>

          <div class="choose-item d-flex mb-4">
            <div class="choose-icon golden-bg rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-check2-circle text-white"></i>
            </div>
            <div class="ms-3">
              <h5 class="text-white">أسعار منافسة</h5>
              <p class="text-muted mb-0">نحرص على تقديم أسعار منافسة وأفضل من جميع المعارض الأخرى في المنطقة</p>
            </div>
          </div>

          <div class="choose-item d-flex">
            <div class="choose-icon golden-bg rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-check2-circle text-white"></i>
            </div>
            <div class="ms-3">
              <h5 class="text-white">خدمة ما بعد البيع</h5>
              <p class="text-muted mb-0">نهتم بعملائنا حتى بعد إتمام عملية البيع، ونوفر لهم دعماً مستمراً وخدمات صيانة دورية</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Services -->
  <section class="our-services py-5 bg-dark">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="text-white">خدماتنا <span class="golden-text">المتميزة</span></h2>
        <p class="text-muted mx-auto" style="max-width: 700px;">مجموعة متكاملة من الخدمات المتميزة التي نقدمها لعملائنا لضمان تجربة مثالية</p>
      </div>

      <div class="row g-4">
        <!-- Service 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="service-card bg-black rounded p-4 h-100">
            <div class="d-flex align-items-center mb-3">
              <div class="service-icon golden-bg rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                <i class="bi bi-car-front text-white"></i>
              </div>
              <h5 class="ms-3 text-white mb-0">بيع وشراء السيارات</h5>
            </div>
            <p class="text-muted">نوفر خدمات بيع وشراء السيارات الفاخرة الجديدة والمستعملة بأفضل الأسعار وبضمانات حقيقية</p>
            <a href="#" class="golden-text text-decoration-none">اكتشف المزيد <i class="bi bi-arrow-left"></i></a>
          </div>
        </div>

        <!-- Service 2 -->
        <div class="col-md-6 col-lg-4">
          <div class="service-card bg-black rounded p-4 h-100">
            <div class="d-flex align-items-center mb-3">
              <div class="service-icon golden-bg rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                <i class="bi bi-gear text-white"></i>
              </div>
              <h5 class="ms-3 text-white mb-0">الصيانة والإصلاح</h5>
            </div>
            <p class="text-muted">خدمات صيانة وإصلاح متكاملة بأحدث المعدات والتقنيات وبأيدي فنيين معتمدين من الوكلاء الرسميين</p>
            <a href="#" class="golden-text text-decoration-none">اكتشف المزيد <i class="bi bi-arrow-left"></i></a>
          </div>
        </div>

        <!-- Service 3 -->
        <div class="col-md-6 col-lg-4">
          <div class="service-card bg-black rounded p-4 h-100">
            <div class="d-flex align-items-center mb-3">
              <div class="service-icon golden-bg rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                <i class="bi bi-brush text-white"></i>
              </div>
              <h5 class="ms-3 text-white mb-0">العناية بالسيارات</h5>
            </div>
            <p class="text-muted">خدمات متكاملة للعناية بالسيارات تشمل التنظيف الداخلي والخارجي وتلميع وحماية الطلاء</p>
            <a href="#" class="golden-text text-decoration-none">اكتشف المزيد <i class="bi bi-arrow-left"></i></a>
          </div>
        </div>

        <!-- Service 4 -->
        <div class="col-md-6 col-lg-4">
          <div class="service-card bg-black rounded p-4 h-100">
            <div class="d-flex align-items-center mb-3">
              <div class="service-icon golden-bg rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                <i class="bi bi-credit-card text-white"></i>
              </div>
              <h5 class="ms-3 text-white mb-0">التمويل والتقسيط</h5>
            </div>
            <p class="text-muted">حلول تمويلية مرنة تناسب جميع العملاء، مع خيارات تقسيط بأسعار فائدة منخفضة وفترات سداد مرنة</p>
            <a href="#" class="golden-text text-decoration-none">اكتشف المزيد <i class="bi bi-arrow-left"></i></a>
          </div>
        </div>

        <!-- Service 5 -->
        <div class="col-md-6 col-lg-4">
          <div class="service-card bg-black rounded p-4 h-100">
            <div class="d-flex align-items-center mb-3">
              <div class="service-icon golden-bg rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                <i class="bi bi-shield text-white"></i>
              </div>
              <h5 class="ms-3 text-white mb-0">التأمين الشامل</h5>
            </div>
            <p class="text-muted">خدمات تأمين شاملة على السيارات بأفضل الأسعار وبالتعاون مع كبرى شركات التأمين المحلية والعالمية</p>
            <a href="#" class="golden-text text-decoration-none">اكتشف المزيد <i class="bi bi-arrow-left"></i></a>
          </div>
        </div>

        <!-- Service 6 -->
        <div class="col-md-6 col-lg-4">
          <div class="service-card bg-black rounded p-4 h-100">
            <div class="d-flex align-items-center mb-3">
              <div class="service-icon golden-bg rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                <i class="bi bi-truck text-white"></i>
              </div>
              <h5 class="ms-3 text-white mb-0">خدمات النقل</h5>
            </div>
            <p class="text-muted">خدمات نقل السيارات داخل وخارج البلاد بطرق آمنة وموثوقة مع ضمان سلامة السيارة أثناء النقل</p>
            <a href="#" class="golden-text text-decoration-none">اكتشف المزيد <i class="bi bi-arrow-left"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="cta py-5 golden-bg">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-9 mb-4 mb-lg-0">
          <h3 class="mb-2 text-black">هل تبحث عن سيارة أحلامك؟</h3>
          <p class="mb-0 text-black">تواصل معنا الآن وسنساعدك في العثور على السيارة المثالية التي تناسب احتياجاتك وميزانيتك.</p>
        </div>
        <div class="col-lg-3 text-lg-end">
          <a href="contact.html" class="btn btn-dark btn-lg px-4">اتصل بنا الآن</a>
        </div>
      </div>
    </div>
  </section>
  @endsection

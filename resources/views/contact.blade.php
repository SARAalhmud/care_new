@extends('layouts.navigation')
@section('nav')

  <!-- Page Header -->
  <div class="page-header py-5 bg-black">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="display-4 text-white">اتصل <span class="golden-text">بنا</span></h1>
          <p class="text-muted">تواصل معنا للاستفسار أو حجز موعد أو للحصول على المساعدة</p>
        </div>
        <div class="col-md-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-md-end golden-breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white">الرئيسية</a></li>
              <li class="breadcrumb-item active golden-text" aria-current="page">اتصل بنا</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- Contact Information -->
  <section class="contact-info py-5 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="contact-card bg-black rounded p-4 h-100">
            <div class="d-flex align-items-center mb-3">
              <div class="contact-icon golden-bg rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-geo-alt-fill text-black"></i>
              </div>
              <h5 class="text-white ms-3 mb-0">العنوان</h5>
            </div>
            <p class="text-muted mb-0">دمشق، شارع الثورة، بناء رقم 12</p>
            <p class="text-muted mt-2">حلب، شارع الفيصل، مقابل فندق شيراتون</p>
            <p class="text-muted mt-2">اللاذقية، شارع الجمهورية، بناء الملك</p>
          </div>
        </div>
        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="contact-card bg-black rounded p-4 h-100">
            <div class="d-flex align-items-center mb-3">
              <div class="contact-icon golden-bg rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-telephone-fill text-black"></i>
              </div>
              <h5 class="text-white ms-3 mb-0">رقم الهاتف</h5>
            </div>
            <p class="text-muted mb-0">المبيعات: +963 11 123 4567</p>
            <p class="text-muted mt-2">خدمة العملاء: +963 11 765 4321</p>
            <p class="text-muted mt-2">الصيانة: +963 11 987 6543</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="contact-card bg-black rounded p-4 h-100">
            <div class="d-flex align-items-center mb-3">
              <div class="contact-icon golden-bg rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-envelope-fill text-black"></i>
              </div>
              <h5 class="text-white ms-3 mb-0">البريد الإلكتروني</h5>
            </div>
            <p class="text-muted mb-0">المبيعات: sales@mygoldencar.com</p>
            <p class="text-muted mt-2">خدمة العملاء: support@mygoldencar.com</p>
            <p class="text-muted mt-2">الاستعلامات العامة: info@mygoldencar.com</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Form & Map -->
  <section class="contact-form-map py-5 bg-black">
    <div class="container">
      <div class="row gx-5">
        <!-- Contact Form -->
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h3 class="text-white mb-4">أرسل <span class="golden-text">رسالة</span></h3>
          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control bg-dark text-white border-secondary" id="floatingName" placeholder="الاسم">
                  <label for="floatingName" class="text-muted">الاسم</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="email" class="form-control bg-dark text-white border-secondary" id="floatingEmail" placeholder="البريد الإلكتروني">
                  <label for="floatingEmail" class="text-muted">البريد الإلكتروني</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="tel" class="form-control bg-dark text-white border-secondary" id="floatingPhone" placeholder="رقم الهاتف">
                  <label for="floatingPhone" class="text-muted">رقم الهاتف</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select bg-dark text-white border-secondary" id="floatingSelect">
                    <option selected disabled>اختر موضوع الرسالة</option>
                    <option value="1">استفسار عام</option>
                    <option value="2">استفسار عن سيارة</option>
                    <option value="3">حجز موعد</option>
                    <option value="4">شكوى</option>
                    <option value="5">اقتراح</option>
                  </select>
                  <label for="floatingSelect" class="text-muted">موضوع الرسالة</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control bg-dark text-white border-secondary" id="floatingMessage" placeholder="الرسالة" style="height: 150px"></textarea>
                  <label for="floatingMessage" class="text-muted">الرسالة</label>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn golden-btn px-4 py-2">إرسال الرسالة</button>
              </div>
            </div>
          </form>
        </div>

        <!-- Map -->
        <div class="col-lg-6">
          <h3 class="text-white mb-4">موقعنا على <span class="golden-text">الخريطة</span></h3>
          <div class="map-container rounded overflow-hidden">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106456.53429232756!2d36.19804415820314!3d33.51342339999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1518e6dc413cc6a7%3A0x6b9f66ebd1e394f2!2sDamascus%2C%20Syria!5e0!3m2!1sen!2sus!4v1712239100963!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Working Hours -->
  <section class="working-hours py-5 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="hours-card bg-black rounded p-4">
            <h3 class="text-white text-center mb-4">ساعات <span class="golden-text">العمل</span></h3>
            <div class="table-responsive">
              <table class="table table-dark table-borderless mb-0">
                <tbody>
                  <tr>
                    <td class="text-muted">السبت</td>
                    <td class="text-white text-end">9:00 صباحاً - 6:00 مساءً</td>
                  </tr>
                  <tr>
                    <td class="text-muted">الأحد</td>
                    <td class="text-white text-end">9:00 صباحاً - 6:00 مساءً</td>
                  </tr>
                  <tr>
                    <td class="text-muted">الاثنين</td>
                    <td class="text-white text-end">9:00 صباحاً - 6:00 مساءً</td>
                  </tr>
                  <tr>
                    <td class="text-muted">الثلاثاء</td>
                    <td class="text-white text-end">9:00 صباحاً - 6:00 مساءً</td>
                  </tr>
                  <tr>
                    <td class="text-muted">الأربعاء</td>
                    <td class="text-white text-end">9:00 صباحاً - 6:00 مساءً</td>
                  </tr>
                  <tr>
                    <td class="text-muted">الخميس</td>
                    <td class="text-white text-end">9:00 صباحاً - 6:00 مساءً</td>
                  </tr>
                  <tr>
                    <td class="text-muted">الجمعة</td>
                    <td class="golden-text text-end">مغلق</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="faq py-5 bg-black">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="text-white">الأسئلة <span class="golden-text">الشائعة</span></h2>
        <p class="text-muted mx-auto" style="max-width: 700px;">إجابات على الأسئلة الأكثر شيوعاً من عملائنا</p>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="accordion" id="faqAccordion">
            <!-- FAQ Item 1 -->
            <div class="accordion-item bg-dark border-0 mb-3">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                  ما هي خيارات التمويل المتاحة لشراء السيارات؟
                </button>
              </h2>
              <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                  نوفر مجموعة متنوعة من خيارات التمويل بالتعاون مع عدة بنوك محلية. يمكنك الاختيار بين التقسيط على فترات متعددة تصل إلى 5 سنوات، مع أسعار فائدة تنافسية تبدأ من 6٪. كما نقدم خيارات التأجير المنتهي بالتمليك. يرجى التواصل مع قسم المبيعات للحصول على تفاصيل الخطة التي تناسبك.
                </div>
              </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="accordion-item bg-dark border-0 mb-3">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                  هل توفرون خدمة الصيانة لجميع أنواع السيارات؟
                </button>
              </h2>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                  نعم، نوفر خدمات صيانة متكاملة لجميع أنواع السيارات الفاخرة، سواء تم شراؤها من معارضنا أو من جهات أخرى. يتميز مركز الصيانة لدينا بأحدث التقنيات والمعدات، ويضم فريقاً من الفنيين المعتمدين من الوكلاء الرسميين للعلامات التجارية العالمية.
                </div>
              </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="accordion-item bg-dark border-0 mb-3">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                  ما هي مدة الضمان التي تقدمونها على السيارات الجديدة والمستعملة؟
                </button>
              </h2>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                  نقدم ضماناً شاملاً لمدة 5 سنوات أو 100,000 كم (أيهما يأتي أولاً) على السيارات الجديدة، وضماناً لمدة سنة أو 20,000 كم على السيارات المستعملة. يغطي الضمان الأعطال الميكانيكية والكهربائية، ويشمل خدمة المساعدة على الطريق على مدار الساعة.
                </div>
              </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="accordion-item bg-dark border-0 mb-3">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                  كيف يمكنني حجز تجربة قيادة؟
                </button>
              </h2>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                  يمكنك حجز تجربة قيادة من خلال الاتصال بنا على رقم خدمة العملاء، أو زيارة أقرب معرض لدينا، أو من خلال ملء نموذج الاتصال في موقعنا الإلكتروني مع تحديد السيارة التي ترغب في تجربتها والوقت المناسب لك. سيقوم فريقنا بالتواصل معك لتأكيد الموعد.
                </div>
              </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="accordion-item bg-dark border-0">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                  هل تقبلون السيارات المستعملة كجزء من الدفعة الأولى؟
                </button>
              </h2>
              <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                  نعم، نقبل السيارات المستعملة كجزء من الدفعة الأولى لشراء سيارة جديدة أو مستعملة من معارضنا. سيقوم فريق التقييم لدينا بفحص سيارتك وتقديم أفضل سعر ممكن بناءً على حالتها وقيمتها السوقية. هذا يسهل عليك عملية الشراء ويوفر لك الوقت والجهد في بيع سيارتك الحالية.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection

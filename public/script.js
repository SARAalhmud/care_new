

// تغيير اللغة بين العربية والإنجليزية
function toggleLanguage() {
  const htmlElement = document.documentElement;
  const currentLang = htmlElement.lang;

  if (currentLang === 'ar') {
    // تغيير إلى الإنجليزية
    htmlElement.lang = 'en';
    htmlElement.dir = 'ltr';

    // تحديث مؤشرات اللغة في قائمة التنقل
    const arLang = document.getElementById('ar-lang');
    const enLang = document.getElementById('en-lang');
    if (arLang && enLang) {
      enLang.classList.add('golden-text');
      enLang.classList.remove('text-white');
      arLang.classList.add('text-white');
      arLang.classList.remove('golden-text');
    }

    // تحديث نص زر اللغة إذا كان في نموذج آخر
    const langText = document.getElementById('language-text');
    if (langText) {
      langText.textContent = "العربية";
    }

    // تحديث جميع النصوص
    updateTexts('en');

    // تحديث الروابط بين الصفحات لتستخدم الإصدار الإنجليزي
    updatePageLinks('en');

    // إذا كنا في صفحة تسجيل الدخول، قم بالتوجيه إلى النسخة الإنجليزية
    redirectToLocalizedAuthPage('en');

  } else {
    // تغيير إلى العربية
    htmlElement.lang = 'ar';
    htmlElement.dir = 'rtl';

    // تحديث مؤشرات اللغة في قائمة التنقل
    const arLang = document.getElementById('ar-lang');
    const enLang = document.getElementById('en-lang');
    if (arLang && enLang) {
      arLang.classList.add('golden-text');
      arLang.classList.remove('text-white');
      enLang.classList.add('text-white');
      enLang.classList.remove('golden-text');
    }

    // تحديث نص زر اللغة إذا كان في نموذج آخر
    const langText = document.getElementById('language-text');
    if (langText) {
      langText.textContent = "English";
    }

    // تحديث جميع النصوص
    updateTexts('ar');

    // تحديث الروابط بين الصفحات لتستخدم الإصدار العربي
    updatePageLinks('ar');

    // إذا كنا في صفحة تسجيل الدخول، قم بالتوجيه إلى النسخة العربية
    redirectToLocalizedAuthPage('ar');
  }
}

// تحديث روابط الصفحات
function updatePageLinks(language) {
  // القائمة العلوية
  const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
  if (navLinks.length >= 5) {
    updateLink(navLinks[0], 'index', language);
    updateLink(navLinks[1], 'cars', language);
    updateLink(navLinks[2], 'features', language);
    updateLink(navLinks[3], 'about', language);
    updateLink(navLinks[4], 'contact', language);
  }

  // رابط الشعار
  const brandLink = document.querySelector('.navbar-brand');
  if (brandLink) {
    updateLink(brandLink, 'index', language);
  }

  // رابط تسجيل الدخول
  const loginLink = document.querySelector('a.user-account');
  if (loginLink) {
    updateLink(loginLink, 'auth', language);
  }

  // روابط تذييل الصفحة
  const footerLinks = document.querySelectorAll('.footer-links a');
  if (footerLinks.length >= 5) {
    updateLink(footerLinks[0], 'index', language);
    updateLink(footerLinks[1], 'cars', language);
    updateLink(footerLinks[2], 'features', language);
    updateLink(footerLinks[3], 'about', language);
    updateLink(footerLinks[4], 'contact', language);
  }
}

// تحديث رابط واحد بناءً على اللغة
function updateLink(element, pageName, language) {
  let href = element.getAttribute('href');
  if (!href) return;

  if (language === 'en') {
    if (href.indexOf('-en') === -1 && href.indexOf('.html') !== -1) {
      href = href.replace('.html', '-en.html');
    }
  } else {
    href = href.replace('-en.html', '.html');
  }

  element.setAttribute('href', href);
}

// توجيه المستخدم إلى النسخة المترجمة من الصفحة الحالية
function redirectToLocalizedAuthPage(language) {
  const path = window.location.pathname;
  const currentPage = path.split('/').pop() || 'index.html';

  // قائمة بجميع الصفحات المتاحة
  const pages = [
    'index.html', 'cars.html', 'features.html', 'about.html', 'contact.html', 'auth.html'
  ];

  // العثور على الصفحة الحالية بدون -en
  const basePage = currentPage.replace('-en.html', '.html');

  // التحقق مما إذا كانت الصفحة الحالية ضمن قائمة الصفحات المعروفة
  if (pages.includes(basePage)) {
    if (language === 'en' && !currentPage.includes('-en')) {
      // تحويل من صفحة عربية إلى إنجليزية
      const englishPage = basePage.replace('.html', '-en.html');
      window.location.href = englishPage;
    } else if (language === 'ar' && currentPage.includes('-en')) {
      // تحويل من صفحة إنجليزية إلى عربية
      window.location.href = basePage;
    }
  }
}

// قاموس الترجمات
const translations = {
  // Navbar
  navbar: {
    home: {
      ar: 'الرئيسية',
      en: 'Home'
    },
    cars: {
      ar: 'السيارات',
      en: 'Cars'
    },
    features: {
      ar: 'المميزات',
      en: 'Features'
    },
    about: {
      ar: 'من نحن',
      en: 'About'
    },
    contact: {
      ar: 'اتصل بنا',
      en: 'Contact'
    },
    myAccount: {
      ar: 'حسابي',
      en: 'My Account'
    },
    brandName1: {
      ar: 'سيارتي',
      en: 'My'
    },
    brandName2: {
      ar: 'الذهبية',
      en: 'Golden Car'
    }
  },

  // Hero Carousel
  carousel: {
    slide1: {
      title: {
        ar: 'استكشف عالم السيارات الفاخرة',
        en: 'Explore Luxury Cars'
      },
      desc: {
        ar: 'أفضل المركبات بأسعار تنافسية وخدمة متميزة',
        en: 'Best vehicles at competitive prices with premium service'
      },
      btn: {
        ar: 'تصفح السيارات',
        en: 'Browse Cars'
      }
    },
    slide2: {
      title: {
        ar: 'سيارات رياضية بأداء استثنائي',
        en: 'Sports Cars with Exceptional Performance'
      },
      desc: {
        ar: 'اختبر متعة القيادة مع أحدث موديلات السيارات الرياضية',
        en: 'Experience driving pleasure with the latest sports car models'
      },
      btn: {
        ar: 'احجز تجربة قيادة',
        en: 'Book a Test Drive'
      }
    },
    slide3: {
      title: {
        ar: 'سيارات عائلية مريحة وآمنة',
        en: 'Comfortable and Safe Family Cars'
      },
      desc: {
        ar: 'راحة وأمان لكل أفراد العائلة مع خيارات متنوعة',
        en: 'Comfort and safety for the whole family with diverse options'
      },
      btn: {
        ar: 'اكتشف المزيد',
        en: 'Discover More'
      }
    }
  },

  // Advert Banner
  advert: {
    title: {
      ar: 'عروض حصرية على سيارات BMW و مرسيدس',
      en: 'Exclusive Offers on BMW and Mercedes'
    },
    desc: {
      ar: 'خصم يصل إلى 15% على الطرازات الجديدة لفترة محدودة',
      en: 'Up to 15% discount on new models for a limited time'
    },
    btn: {
      ar: 'استفد من العرض الآن',
      en: 'Get the Offer Now'
    }
  },

  // Search Section
  search: {
    title1: {
      ar: 'ابحث عن',
      en: 'Find Your'
    },
    title2: {
      ar: 'سيارتك المثالية',
      en: 'Perfect Car'
    },
    desc: {
      ar: 'استخدم أدوات البحث المتقدمة للعثور على السيارة التي تناسب احتياجاتك',
      en: 'Use advanced search tools to find the car that suits your needs'
    },
    btn: {
      ar: 'بحث',
      en: 'Search'
    }
  },

  // Latest Cars
  latestCars: {
    title1: {
      ar: 'آخر',
      en: 'Latest'
    },
    title2: {
      ar: 'السيارات',
      en: 'Cars'
    },
    viewAll: {
      ar: 'عرض الكل',
      en: 'View All'
    },
    new: {
      ar: 'جديد',
      en: 'New'
    },
    details: {
      ar: 'تفاصيل',
      en: 'Details'
    }
  },

  // Removed Featured and Sold Cars sections

  // Browse Cars Categories
  browseCategories: {
    title1: {
      ar: 'تصفح',
      en: 'Browse'
    },
    title2: {
      ar: 'السيارات',
      en: 'Cars'
    },
    desc: {
      ar: 'اختر الفئة المناسبة لاحتياجاتك واكتشف مجموعتنا المتميزة',
      en: 'Choose the right category for your needs and discover our premium collection'
    },
    luxury: {
      title: {
        ar: 'سيارات فاخرة',
        en: 'Luxury Cars'
      },
      desc: {
        ar: 'استمتع بتجربة القيادة الفاخرة مع مرسيدس، بي إم دبليو وغيرها',
        en: 'Enjoy a luxurious driving experience with Mercedes, BMW and more'
      }
    },
    sports: {
      title: {
        ar: 'سيارات رياضية',
        en: 'Sports Cars'
      },
      desc: {
        ar: 'سيارات رياضية بأداء استثنائي وتصميم انسيابي',
        en: 'Sports cars with exceptional performance and sleek design'
      }
    },
    suv: {
      title: {
        ar: 'سيارات SUV',
        en: 'SUV Cars'
      },
      desc: {
        ar: 'سيارات دفع رباعي مريحة ومناسبة للعائلة والرحلات',
        en: 'Comfortable 4x4 cars suitable for family and trips'
      }
    },
    electric: {
      title: {
        ar: 'سيارات كهربائية',
        en: 'Electric Cars'
      },
      desc: {
        ar: 'سيارات صديقة للبيئة بتكنولوجيا متطورة وأداء متميز',
        en: 'Eco-friendly cars with advanced technology and outstanding performance'
      }
    },
    browse: {
      ar: 'استعراض',
      en: 'Browse'
    }
  },

  // Testimonials
  testimonials: {
    title1: {
      ar: 'ماذا يقول',
      en: 'What Our'
    },
    title2: {
      ar: 'عملاؤنا',
      en: 'Customers Say'
    },
    desc: {
      ar: 'تجارب حقيقية من عملائنا الكرام',
      en: 'Real experiences from our valued customers'
    }
  },

  // Auth page
  auth: {
    title1: {
      ar: 'البائعين',
      en: 'Professional'
    },
    title2: {
      ar: 'المحترفين',
      en: 'Sellers'
    },
    desc: {
      ar: 'انضم إلى منصة سيارتي الذهبية واعرض سياراتك أمام آلاف العملاء المحتملين',
      en: 'Join My Golden Car platform and showcase your cars to thousands of potential customers'
    },
    login: {
      ar: 'تسجيل الدخول',
      en: 'Login'
    },
    register: {
      ar: 'التسجيل',
      en: 'Register'
    },
    email: {
      ar: 'البريد الإلكتروني',
      en: 'Email Address'
    },
    password: {
      ar: 'كلمة المرور',
      en: 'Password'
    },
    rememberMe: {
      ar: 'تذكرني',
      en: 'Remember me'
    },
    forgotPassword: {
      ar: 'نسيت كلمة المرور؟',
      en: 'Forgot password?'
    },
    firstName: {
      ar: 'الاسم الأول',
      en: 'First Name'
    },
    lastName: {
      ar: 'الاسم الأخير',
      en: 'Last Name'
    },
    phoneNumber: {
      ar: 'رقم الهاتف',
      en: 'Phone Number'
    },
    confirmPassword: {
      ar: 'تأكيد كلمة المرور',
      en: 'Confirm Password'
    },
    choosePlan: {
      ar: 'اختر خطة الاشتراك',
      en: 'Choose a Subscription Plan'
    },
    termsAgree: {
      ar: 'أوافق على',
      en: 'I agree to the'
    },
    terms: {
      ar: 'الشروط والأحكام',
      en: 'Terms and Conditions'
    },
    createAccount: {
      ar: 'إنشاء حساب',
      en: 'Create Account'
    },
    join: {
      ar: 'انضم إلى',
      en: 'Join'
    },
    platform: {
      ar: 'المنصة الرائدة لبيع وشراء السيارات الفاخرة في سوريا',
      en: 'The leading platform for buying and selling luxury cars in Syria'
    },
    features: {
      quality: {
        title: {
          ar: 'جودة مضمونة',
          en: 'Guaranteed Quality'
        },
        desc: {
          ar: 'نقدم أفضل السيارات بضمان الجودة',
          en: 'We offer the best cars with quality guarantee'
        }
      },
      secure: {
        title: {
          ar: 'منصة آمنة',
          en: 'Secure Platform'
        },
        desc: {
          ar: 'معاملات آمنة وموثوقة بنسبة 100%',
          en: '100% secure and reliable transactions'
        }
      },
      sales: {
        title: {
          ar: 'زيادة المبيعات',
          en: 'Increase Sales'
        },
        desc: {
          ar: 'ضاعف مبيعاتك مع منصتنا المتميزة',
          en: 'Double your sales with our premium platform'
        }
      },
      support: {
        title: {
          ar: 'دعم متميز',
          en: 'Premium Support'
        },
        desc: {
          ar: 'فريق دعم متخصص على مدار الساعة',
          en: 'Specialized support team available 24/7'
        }
      }
    },
    plans: {
      free: {
        title: {
          ar: 'مجاني',
          en: 'Free'
        },
        price: {
          ar: '$0 / مجاناً',
          en: '$0 / Free'
        },
        feature1: {
          ar: 'سيارة واحدة فقط',
          en: 'Only one car'
        },
        feature2: {
          ar: 'ميزات أساسية',
          en: 'Basic features'
        },
        feature3: {
          ar: 'دعم عن طريق البريد الإلكتروني',
          en: 'Email support'
        },
        feature4: {
          ar: 'بدون ميزات مميزة',
          en: 'No premium features'
        }
      },
      weekly: {
        title: {
          ar: 'أسبوعي',
          en: 'Weekly'
        },
        price: {
          ar: '$25 / أسبوعياً',
          en: '$25 / weekly'
        },
        feature1: {
          ar: '5 سيارات',
          en: '5 cars'
        },
        feature2: {
          ar: 'ميزات متقدمة',
          en: 'Advanced features'
        },
        feature3: {
          ar: 'دعم عن طريق الهاتف',
          en: 'Phone support'
        },
        feature4: {
          ar: 'بدون ميزات مميزة',
          en: 'No premium features'
        }
      },
      monthly: {
        title: {
          ar: 'شهري',
          en: 'Monthly'
        },
        price: {
          ar: '$75 / شهرياً',
          en: '$75 / monthly'
        },
        feature1: {
          ar: '12 سيارة',
          en: '12 cars'
        },
        feature2: {
          ar: 'ميزات متقدمة',
          en: 'Advanced features'
        },
        feature3: {
          ar: 'دعم بالأولوية',
          en: 'Priority support'
        },
        feature4: {
          ar: 'ميزة الترويج لسيارة واحدة',
          en: 'Promotion for one car'
        }
      },
      premium: {
        title: {
          ar: 'مميز',
          en: 'Premium'
        },
        price: {
          ar: '$150 / شهرياً',
          en: '$150 / monthly'
        },
        feature1: {
          ar: 'عدد غير محدود من السيارات',
          en: 'Unlimited cars'
        },
        feature2: {
          ar: 'جميع الميزات المتقدمة',
          en: 'All advanced features'
        },
        feature3: {
          ar: 'دعم على مدار الساعة',
          en: '24/7 support'
        },
        feature4: {
          ar: 'ميزات حصرية للعرض',
          en: 'Exclusive display features'
        }
      },
      selectPlan: {
        ar: 'اختر الخطة',
        en: 'Select Plan'
      }
    }
  },

  // Footer
  footer: {
    quickLinks: {
      ar: 'روابط سريعة',
      en: 'Quick Links'
    },
    contactInfo: {
      ar: 'معلومات الاتصال',
      en: 'Contact Info'
    },
    newsletter: {
      ar: 'النشرة البريدية',
      en: 'Newsletter'
    },
    newsletterText: {
      ar: 'اشترك في نشرتنا البريدية للحصول على آخر العروض والأخبار',
      en: 'Subscribe to our newsletter to receive the latest offers and news'
    },
    emailPlaceholder: {
      ar: 'بريدك الإلكتروني',
      en: 'Your Email'
    },
    subscribe: {
      ar: 'اشتراك',
      en: 'Subscribe'
    },
    workingHours: {
      ar: 'السبت - الخميس: 9:00 - 18:00',
      en: 'Sat - Thu: 9:00 - 18:00'
    },
    rights: {
      ar: 'جميع الحقوق محفوظة &copy; 2024 سيارتي الذهبية',
      en: 'All Rights Reserved &copy; 2024 My Golden Car'
    }
  }
};

// تحديث النصوص بناء على اللغة المختارة
function updateTexts(language) {
  // تحديث عنوان الموقع
  document.title = language === 'ar' ? 'سيارتي الذهبية | My Golden Car' : 'My Golden Car | سيارتي الذهبية';

  // تحديث اسم العلامة التجارية
  const brandParts = document.querySelector('.navbar-brand').childNodes;
  brandParts[0].textContent = translations.navbar.brandName1[language];
  brandParts[2].textContent = translations.navbar.brandName2[language];

  // تحديث روابط القائمة
  const navLinks = document.querySelectorAll('.nav-link');
  navLinks[0].textContent = translations.navbar.home[language];
  navLinks[1].textContent = translations.navbar.cars[language];
  navLinks[2].textContent = translations.navbar.features[language];
  navLinks[3].textContent = translations.navbar.about[language];
  navLinks[4].textContent = translations.navbar.contact[language];

  // تحديث حساب المستخدم
  const userAccount = document.querySelector('.user-account span');
  if (userAccount) {
    userAccount.textContent = language === 'ar' ? 'تسجيل الدخول' : 'Login';
  }

  // تحديث البحث
  const searchTitle = document.querySelector('.search-section h2');
  if (searchTitle) {
    searchTitle.innerHTML = `${translations.search.title1[language]} <span class="golden-text">${translations.search.title2[language]}</span>`;
  }

  // تحديث صفحة تسجيل الدخول والتسجيل إذا كنا في تلك الصفحة
  updateAuthPage(language);

  // تحديث أقسام تصفح السيارات
  updateBrowseCategories(language);

  // تحديث أقسام السيارات
  updateCarSections(language);

  // تحديث مقطع الشهادات
  updateTestimonials(language);

  // تحديث تذييل الصفحة
  updateFooter(language);
}

// تحديث صفحة تسجيل الدخول والتسجيل
function updateAuthPage(language) {
  // التحقق مما إذا كنا في صفحة تسجيل الدخول والتسجيل
  const authTitle = document.querySelector('.auth-form h1');
  if (!authTitle) return;

  // تحديث العنوان
  authTitle.innerHTML = `<span class="golden-text">${translations.auth.title1[language]}</span> ${translations.auth.title2[language]}`;

  // تحديث الوصف
  const authDesc = document.querySelector('.auth-form p.text-muted');
  if (authDesc) {
    authDesc.textContent = translations.auth.desc[language];
  }

  // تحديث علامات التبويب
  const loginTab = document.getElementById('login-tab');
  const registerTab = document.getElementById('register-tab');
  if (loginTab && registerTab) {
    loginTab.textContent = translations.auth.login[language];
    registerTab.textContent = translations.auth.register[language];
  }

  // تحديث نموذج تسجيل الدخول
  const loginForm = document.getElementById('loginForm');
  if (loginForm) {
    // تحديث تسميات الحقول
    const loginLabels = loginForm.querySelectorAll('.form-label');
    loginLabels[0].textContent = translations.auth.email[language];
    loginLabels[1].textContent = translations.auth.password[language];

    // تحديث تذكرني
    const rememberMe = loginForm.querySelector('.form-check-label');
    if (rememberMe) {
      rememberMe.textContent = translations.auth.rememberMe[language];
    }

    // تحديث زر تسجيل الدخول
    const loginButton = loginForm.querySelector('button[type="submit"]');
    if (loginButton) {
      loginButton.textContent = translations.auth.login[language];
    }

    // تحديث نسيت كلمة المرور
    const forgotPassword = loginForm.querySelector('a.golden-text');
    if (forgotPassword) {
      forgotPassword.textContent = translations.auth.forgotPassword[language];
    }
  }

  // تحديث نموذج التسجيل
  const registerForm = document.getElementById('registerForm');
  if (registerForm) {
    // تحديث تسميات الحقول
    const registerLabels = registerForm.querySelectorAll('.form-label');
    if (registerLabels.length >= 6) {
      registerLabels[0].textContent = translations.auth.firstName[language];
      registerLabels[1].textContent = translations.auth.lastName[language];
      registerLabels[2].textContent = translations.auth.email[language];
      registerLabels[3].textContent = translations.auth.phoneNumber[language];
      registerLabels[4].textContent = translations.auth.password[language];
      registerLabels[5].textContent = translations.auth.confirmPassword[language];
    }

    // تحديث عنوان خطط الاشتراك
    const planTitle = registerForm.querySelector('h4');
    if (planTitle) {
      planTitle.textContent = translations.auth.choosePlan[language];
    }

    // تحديث خطط الاشتراك
    updateSubscriptionPlans(language);

    // تحديث الموافقة على الشروط
    const agreeTerms = registerForm.querySelector('.form-check-label');
    if (agreeTerms) {
      const termsLink = agreeTerms.querySelector('a');
      agreeTerms.textContent = translations.auth.termsAgree[language] + ' ';
      agreeTerms.appendChild(termsLink);
      termsLink.textContent = translations.auth.terms[language];
    }

    // تحديث زر إنشاء الحساب
    const registerButton = registerForm.querySelector('button[type="submit"]');
    if (registerButton) {
      registerButton.textContent = translations.auth.createAccount[language];
    }
  }

  // تحديث قسم الترحيب
  const heroTitle = document.querySelector('.auth-hero h1');
  if (heroTitle) {
    heroTitle.innerHTML = `${translations.auth.join[language]} <span class="golden-text">${translations.navbar.brandName1[language]} ${translations.navbar.brandName2[language]}</span>`;
  }

  const heroDesc = document.querySelector('.auth-hero p.lead');
  if (heroDesc) {
    heroDesc.textContent = translations.auth.platform[language];
  }

  // تحديث ميزات الموقع
  const featureTitles = document.querySelectorAll('.auth-hero h4');
  const featureDesc = document.querySelectorAll('.auth-hero p.m-0');
  if (featureTitles.length >= 4 && featureDesc.length >= 4) {
    featureTitles[0].textContent = translations.auth.features.quality.title[language];
    featureDesc[0].textContent = translations.auth.features.quality.desc[language];

    featureTitles[1].textContent = translations.auth.features.secure.title[language];
    featureDesc[1].textContent = translations.auth.features.secure.desc[language];

    featureTitles[2].textContent = translations.auth.features.sales.title[language];
    featureDesc[2].textContent = translations.auth.features.sales.desc[language];

    featureTitles[3].textContent = translations.auth.features.support.title[language];
    featureDesc[3].textContent = translations.auth.features.support.desc[language];
  }
}

// تحديث خطط الاشتراك
function updateSubscriptionPlans(language) {
  // خطة مجانية
  const freePlanTitle = document.querySelector('label[for="freePlan"] h5');
  const freePlanPrice = document.querySelector('label[for="freePlan"] .plan-price');
  const freePlanFeatures = document.querySelectorAll('label[for="freePlan"] li');
  const freePlanButton = document.querySelector('label[for="freePlan"] .btn');

  if (freePlanTitle && freePlanPrice && freePlanFeatures.length >= 4 && freePlanButton) {
    freePlanTitle.textContent = translations.auth.plans.free.title[language];
    freePlanPrice.innerHTML = translations.auth.plans.free.price[language];
    freePlanFeatures[0].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.free.feature1[language]}`;
    freePlanFeatures[1].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.free.feature2[language]}`;
    freePlanFeatures[2].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.free.feature3[language]}`;
    freePlanFeatures[3].innerHTML = `<i class="bi bi-x-circle-fill text-danger me-2"></i> ${translations.auth.plans.free.feature4[language]}`;
    freePlanButton.textContent = translations.auth.plans.selectPlan[language];
  }

  // خطة أسبوعية
  const weeklyPlanTitle = document.querySelector('label[for="weeklyPlan"] h5');
  const weeklyPlanPrice = document.querySelector('label[for="weeklyPlan"] .plan-price');
  const weeklyPlanFeatures = document.querySelectorAll('label[for="weeklyPlan"] li');
  const weeklyPlanButton = document.querySelector('label[for="weeklyPlan"] .btn');

  if (weeklyPlanTitle && weeklyPlanPrice && weeklyPlanFeatures.length >= 4 && weeklyPlanButton) {
    weeklyPlanTitle.textContent = translations.auth.plans.weekly.title[language];
    weeklyPlanPrice.innerHTML = translations.auth.plans.weekly.price[language];
    weeklyPlanFeatures[0].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.weekly.feature1[language]}`;
    weeklyPlanFeatures[1].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.weekly.feature2[language]}`;
    weeklyPlanFeatures[2].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.weekly.feature3[language]}`;
    weeklyPlanFeatures[3].innerHTML = `<i class="bi bi-x-circle-fill text-danger me-2"></i> ${translations.auth.plans.weekly.feature4[language]}`;
    weeklyPlanButton.textContent = translations.auth.plans.selectPlan[language];
  }

  // خطة شهرية
  const monthlyPlanTitle = document.querySelector('label[for="monthlyPlan"] h5');
  const monthlyPlanPrice = document.querySelector('label[for="monthlyPlan"] .plan-price');
  const monthlyPlanFeatures = document.querySelectorAll('label[for="monthlyPlan"] li');
  const monthlyPlanButton = document.querySelector('label[for="monthlyPlan"] .btn');

  if (monthlyPlanTitle && monthlyPlanPrice && monthlyPlanFeatures.length >= 4 && monthlyPlanButton) {
    monthlyPlanTitle.textContent = translations.auth.plans.monthly.title[language];
    monthlyPlanPrice.innerHTML = translations.auth.plans.monthly.price[language];
    monthlyPlanFeatures[0].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.monthly.feature1[language]}`;
    monthlyPlanFeatures[1].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.monthly.feature2[language]}`;
    monthlyPlanFeatures[2].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.monthly.feature3[language]}`;
    monthlyPlanFeatures[3].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.monthly.feature4[language]}`;
    monthlyPlanButton.textContent = translations.auth.plans.selectPlan[language];
  }

  // خطة مميزة
  const premiumPlanTitle = document.querySelector('label[for="premiumPlan"] h5');
  const premiumPlanPrice = document.querySelector('label[for="premiumPlan"] .plan-price');
  const premiumPlanFeatures = document.querySelectorAll('label[for="premiumPlan"] li');
  const premiumPlanButton = document.querySelector('label[for="premiumPlan"] .btn');

  if (premiumPlanTitle && premiumPlanPrice && premiumPlanFeatures.length >= 4 && premiumPlanButton) {
    premiumPlanTitle.textContent = translations.auth.plans.premium.title[language];
    premiumPlanPrice.innerHTML = translations.auth.plans.premium.price[language];
    premiumPlanFeatures[0].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.premium.feature1[language]}`;
    premiumPlanFeatures[1].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.premium.feature2[language]}`;
    premiumPlanFeatures[2].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.premium.feature3[language]}`;
    premiumPlanFeatures[3].innerHTML = `<i class="bi bi-check-circle-fill golden-text me-2"></i> ${translations.auth.plans.premium.feature4[language]}`;
    premiumPlanButton.textContent = language === 'ar' ? 'اختر الخطة' : 'Select Plan';
  }
}

// تحديث قسم تصفح السيارات
function updateBrowseCategories(language) {
  // تحديث عنوان القسم
  const browseCatTitle = document.querySelector('.browse-cars h2');
  if (browseCatTitle) {
    browseCatTitle.innerHTML = `${translations.browseCategories.title1[language]} <span class="golden-text">${translations.browseCategories.title2[language]}</span>`;
  }

  // تحديث وصف القسم
  const browseCatDesc = document.querySelector('.browse-cars p.text-muted');
  if (browseCatDesc) {
    browseCatDesc.textContent = translations.browseCategories.desc[language];
  }

  // تحديث بطاقات الفئات
  const categoryCards = document.querySelectorAll('.category-card');
  if (categoryCards.length >= 4) {
    // سيارات فاخرة
    categoryCards[0].querySelector('h4').textContent = translations.browseCategories.luxury.title[language];
    categoryCards[0].querySelector('p').textContent = translations.browseCategories.luxury.desc[language];
    categoryCards[0].querySelector('a').textContent = translations.browseCategories.browse[language];

    // سيارات رياضية
    categoryCards[1].querySelector('h4').textContent = translations.browseCategories.sports.title[language];
    categoryCards[1].querySelector('p').textContent = translations.browseCategories.sports.desc[language];
    categoryCards[1].querySelector('a').textContent = translations.browseCategories.browse[language];

    // سيارات SUV
    categoryCards[2].querySelector('h4').textContent = translations.browseCategories.suv.title[language];
    categoryCards[2].querySelector('p').textContent = translations.browseCategories.suv.desc[language];
    categoryCards[2].querySelector('a').textContent = translations.browseCategories.browse[language];

    // سيارات كهربائية
    categoryCards[3].querySelector('h4').textContent = translations.browseCategories.electric.title[language];
    categoryCards[3].querySelector('p').textContent = translations.browseCategories.electric.desc[language];
    categoryCards[3].querySelector('a').textContent = translations.browseCategories.browse[language];
  }
}

// تحديث أقسام السيارات
function updateCarSections(language) {
  // نظراً لحذف أقسام السيارات المميزة والمباعة، تم تبسيط هذه الدالة
  // وتم الاحتفاظ بالتحقق من وجود العناصر لمنع الأخطاء في حالة إعادة إضافة أي أقسام في المستقبل

  // أحدث السيارات (ملاحظة: تم حذف هذا القسم أيضاً)
  const latestTitle = document.querySelector('.latest-cars h2');
  if (latestTitle) {
    latestTitle.innerHTML = `${translations.latestCars.title1[language]} <span class="golden-text">${translations.latestCars.title2[language]}</span>`;
  }

  const latestViewAll = document.querySelector('.latest-cars a.golden-text');
  if (latestViewAll) {
    latestViewAll.innerHTML = `${translations.latestCars.viewAll[language]} <i class="bi ${language === 'ar' ? 'bi-arrow-left' : 'bi-arrow-right'}"></i>`;
  }

  // تحديث وسم "جديد"
  const newTags = document.querySelectorAll('.latest-cars .car-tag');
  newTags.forEach(tag => {
    tag.textContent = translations.latestCars.new[language];
  });
}

// تحديث قسم الشهادات
function updateTestimonials(language) {
  const testimonialsTitle = document.querySelector('.testimonials h2');
  if (testimonialsTitle) {
    testimonialsTitle.innerHTML = `${translations.testimonials.title1[language]} <span class="golden-text">${translations.testimonials.title2[language]}</span>`;
  }

  const testimonialsDesc = document.querySelector('.testimonials p.text-muted');
  if (testimonialsDesc) {
    testimonialsDesc.textContent = translations.testimonials.desc[language];
  }
}

// تحديث تذييل الصفحة
function updateFooter(language) {
  const footerTitles = document.querySelectorAll('.footer h3');
  if (footerTitles.length >= 4) {
    footerTitles[1].textContent = translations.footer.quickLinks[language];
    footerTitles[2].textContent = translations.footer.contactInfo[language];
    footerTitles[3].textContent = translations.footer.newsletter[language];
  }

  const newsletterText = document.querySelector('.footer p.text-muted');
  if (newsletterText) {
    newsletterText.textContent = translations.footer.newsletterText[language];
  }

  const emailInput = document.querySelector('.footer input[type="email"]');
  if (emailInput) {
    emailInput.placeholder = translations.footer.emailPlaceholder[language];
  }

  const subscribeBtn = document.querySelector('.footer .golden-btn');
  if (subscribeBtn) {
    subscribeBtn.textContent = translations.footer.subscribe[language];
  }

  // تحديث روابط التذييل
  const footerLinks = document.querySelectorAll('.footer-links a');
  if (footerLinks.length >= 5) {
    footerLinks[0].textContent = translations.navbar.home[language];
    footerLinks[1].textContent = translations.navbar.cars[language];
    footerLinks[2].textContent = translations.navbar.features[language];
    footerLinks[3].textContent = translations.navbar.about[language];
    footerLinks[4].textContent = translations.navbar.contact[language];
  }

  // تحديث ساعات العمل
  const workingHours = document.querySelector('.footer-contact li:last-child span');
  if (workingHours) {
    workingHours.textContent = translations.footer.workingHours[language];
  }

  // تحديث حقوق النشر
  const copyright = document.querySelector('.footer .text-center p');
  if (copyright) {
    copyright.innerHTML = translations.footer.rights[language];
  }
}

// اضافة استجابة للبطاقات عند مرور الماوس
document.addEventListener('DOMContentLoaded', function() {
  const carCards = document.querySelectorAll('.car-card');

  carCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.classList.add('shadow-lg');
    });

    card.addEventListener('mouseleave', function() {
      this.classList.remove('shadow-lg');
    });
  });
});

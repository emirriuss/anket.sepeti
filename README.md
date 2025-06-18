
# 📊 AnketOluşturmaSitesi

## 📝 Proje Hakkında

**AnketOluşturmaSitesi**, bireylerin ya da kurumların çeşitli kategorilerde anketler oluşturabilmesi ve bu anketlere kullanıcıların katılım sağlayabilmesi için hazırlanmış basit ama fonksiyonel bir web uygulamasıdır. Proje; kullanıcı kayıt ve giriş sistemi, kullanıcı dostu arayüzler ve çeşitli anket şablonlarını bir araya getirerek dijital veri toplama sürecini kolaylaştırmayı hedefler.

Uygulama, **HTML, CSS ve JavaScript** teknolojileri ile front-end tarafı hazırlanmış, **PHP** ile back-end işlemleri desteklenmiştir. Proje içerisinde ayrıca temel bir kullanıcı kimlik doğrulama sistemi de bulunmaktadır.

---

## 🎯 Projenin Amacı

- Kullanıcıların kendilerine uygun anketleri çevrim içi ortamda doldurmasını sağlamak  
- Kayıt/giriş sistemi ile kişisel deneyime dayalı sonuçlar oluşturmak  
- Front-end (HTML/CSS/JS) ve back-end (PHP/MySQL) teknolojilerini bir araya getirerek tam işlevli bir proje sunmak  
- Geliştirici adayları için referans teşkil edecek kapsamlı bir örnek uygulama hazırlamak  

---

## 🚀 Uygulama Özellikleri

- 🔐 **Kayıt ve Giriş Sistemi:** `register.php` ve `login.php` API dosyaları ile kullanıcılar kayıt olabilir, giriş yapabilir  
- 🆔 **Oturum Yönetimi:** `localStorage` kullanılarak oturum bilgileri tarayıcıda tutulur ve `current_user.php` ile kullanıcı doğrulaması yapılır  
- 📄 **Çeşitli Anket Sayfaları:**
  - İş Anketi  
  - Kişisel Değerlendirme  
  - Kurumsal Değerlendirme  
  - Müşteri Memnuniyeti  
- 💡 **Kullanıcı Dostu Arayüz:** Giriş ve kayıt formları arasında geçiş, formların doğrulanması, hata mesajları ve uyarılar dinamik olarak yönetilir  
- 🌐 **Tamamen Web Tabanlı:** Tüm veriler HTML formları üzerinden girilir, sunucuya JSON formatında gönderilir  

---

## 🧰 Kullanılan Teknolojiler

| Teknoloji     | Açıklama                                                         |
|---------------|------------------------------------------------------------------|
| **HTML5**     | Sayfaların yapısal yapısını oluşturmak için kullanılmıştır       |
| **CSS3**      | Tasarım, renkler ve sayfa düzenini sağlamak için kullanılmıştır  |
| **JavaScript**| Form etkileşimleri ve kullanıcı giriş/çıkış işlemleri için       |
| **PHP**       | Sunucu tarafında kullanıcı bilgilerini işlemek için              |
| **MySQL**     | Kullanıcı verilerinin saklandığı veritabanı                      |

---

## 📂 Dosya Yapısı

```
emircangöktaş_030422037_anketoluşturmasitesi/
├── index.html                    → Anasayfa
├── giris.html                    → Kullanıcı giriş ekranı
├── uye-ol.html                   → Yeni kullanıcı kayıt ekranı
├── is-anketi.html                → İş memnuniyetine yönelik anket
├── kisisel-anket.html            → Bireysel değerlendirme formu
├── kurumsal-anket.html           → Kurumsal geri bildirim anketi
├── musteri-anketi.html           → Müşteri memnuniyeti anketi
├── birinci.css                   → Ortak stil dosyası
├── script.js                     → Giriş, kayıt, oturum yönetimi ve form kontrolleri
├── api/
│   ├── db_connect.php            → Veritabanı bağlantısı
│   ├── login.php                 → Giriş işlemi
│   ├── register.php              → Yeni kullanıcı kaydı
│   └── current_user.php          → Mevcut kullanıcı verisi
├── görseller/
│   ├── adobe.webp, verizon.png   → Sayfalarda kullanılan görseller
│   ├── aharfi.jpg, bir.jpg, ...  → Diğer medya dosyaları
├── Rapor/
│   └── emircangöktaş_030422037_anketoluşturmasitesi.docx → Yazılı rapor
```

---

## 🔄 Nasıl Çalışır?

1. `giris.html` veya `uye-ol.html` sayfası üzerinden kullanıcı sisteme giriş yapar ya da kayıt olur  
2. Giriş başarılı olursa `localStorage` içine kullanıcı bilgileri kaydedilir  
3. `index.html` veya diğer anket sayfalarına erişim sağlanabilir  
4. Kullanıcı, sayfadaki anketi doldurur ve veriler backend'e gönderilmeye hazırdır  
5. "Çıkış Yap" butonuna basıldığında `localStorage` temizlenir ve oturum sonlanır  

---

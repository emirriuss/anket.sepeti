document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('loginForm');
  const registerForm = document.getElementById('registerForm');
  const showRegister = document.getElementById('showRegister');
  const showLogin = document.getElementById('showLogin');

  // Formlar arası geçiş
  if (showRegister && showLogin && loginForm && registerForm) {
    showRegister.addEventListener('click', () => {
      loginForm.classList.add('hidden');
      registerForm.classList.remove('hidden');
    });

    showLogin.addEventListener('click', () => {
      registerForm.classList.add('hidden');
      loginForm.classList.remove('hidden');
    });
  }

  // Kayıt işlemi
  if (registerForm) {
    registerForm.addEventListener('submit', async function(event) {
      event.preventDefault();

      const name = document.getElementById('registerName').value.trim();
      const email = document.getElementById('registerEmail').value.trim().toLowerCase();
      const password = document.getElementById('registerPassword').value;
      const confirmPassword = document.getElementById('registerConfirmPassword').value;

      if (!name || !email || !password || !confirmPassword) {
        alert('Lütfen tüm alanları doldurun.');
        return;
      }

      if (password !== confirmPassword) {
        alert('Şifreler eşleşmiyor.');
        return;
      }

      try {
        const response = await fetch('http://localhost/emircangöktaş_030422037_anketoluşturmasitesi/api/register.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ name, email, password })
        });

        const data = await response.json();
        if (!response.ok) {
          alert(data.message);
          return;
        }

        alert(data.message);
        registerForm.reset();
        registerForm.classList.add('hidden');
        if (loginForm) loginForm.classList.remove('hidden');
        else window.location.href = 'giris.html';
      } catch (error) {
        console.error(error);
        alert('Bir hata oluştu.');
      }
    });
  }

  // Giriş işlemi
  if (loginForm) {
    loginForm.addEventListener('submit', async function(event) {
      event.preventDefault();

      const email = document.getElementById('loginEmail').value.trim().toLowerCase();
      const password = document.getElementById('loginPassword').value;

      if (!email || !password) {
        alert('Lütfen e-posta ve şifreyi girin.');
        return;
      }

      try {
        const response = await fetch('http://localhost/emircangöktaş_030422037_anketoluşturmasitesi/api/login.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ email, password })
        });

        const data = await response.json();
        if (!response.ok) {
          alert(data.message);
          return;
        }

        localStorage.setItem('currentUser', JSON.stringify(data.user));
        alert(`Hoşgeldiniz, ${data.user.name}!`);
        loginForm.reset();
        window.location.href = 'index.html';
      } catch (error) {
        console.error(error);
        alert('Bir hata oluştu.');
      }
    });
  }

  // Sayfa yüklendiğinde kullanıcı durumunu kontrol et
  const currentUser = localStorage.getItem('currentUser');
  const loginBtn = document.getElementById('loginBtn');
  const signupBtn = document.getElementById('signupBtn');
  const welcomeMessage = document.getElementById('welcomeMessage');

  if (currentUser && loginBtn && signupBtn && welcomeMessage) {
    const user = JSON.parse(currentUser);

    fetch('http://localhost/emircangöktaş_030422037_anketoluşturmasitesi/api/current_user.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ user })
    })
      .then(response => response.json())
      .then(data => {
        if (response.ok) {
          loginBtn.textContent = 'Çıkış Yap';
          loginBtn.href = '#';
          signupBtn.style.display = 'none';
          welcomeMessage.textContent = `Hoşgeldiniz, ${data.name}`;
          welcomeMessage.style.display = 'inline';

          loginBtn.addEventListener('click', function(e) {
            e.preventDefault();
            localStorage.removeItem('currentUser');
            window.location.reload();
          });
        } else {
          localStorage.removeItem('currentUser');
        }
      })
      .catch(error => {
        console.error(error);
        localStorage.removeItem('currentUser');
      });
  }
});
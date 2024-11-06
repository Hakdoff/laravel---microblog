var shareButton = document.querySelector('#shareButton');
var postContent = document.querySelector('#postContent');


if (shareButton && postContent) {
  shareButton.addEventListener('click', function() {
      shareButton.disabled = true;
      this.innerHTML = `
        <div class="d-dashboard__spinner">
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V2.5"></path>
            </svg>
        </div>`;

      postContent.submit();

      setTimeout(() => {
        shareButton.disabled = false
        this.innerHTML = 'Share';
      }, 3000);
  });
}

const loginButton = document.getElementById('loginButton');
var loginContent = document.querySelector('#loginContent');

if (loginButton) {
  loginButton.addEventListener('click', loginButtonClick);
}

function loginButtonClick() {
  if (loginButton.disabled) return;
  loginButton.disabled = true;
  loginButton.classList.add('animate-pulse');
  loginContent.submit();

  setTimeout(() => {
      loginButton.classList.remove('animate-pulse');
      loginButton.disabled = false;
  }, 2000);
}

const registerButton = document.getElementById('registerButton');
var registerContent = document.querySelector('#registerContent');

if (registerButton) {
  registerButton.addEventListener('click', registerButtonClick);
}

function registerButtonClick() {
  if (registerButton.disabled) return;
  registerButton.disabled = true;
  registerButton.classList.add('animate-pulse');
  registerContent.submit();

  setTimeout(() => {
      registerButton.classList.remove('animate-pulse');
      registerButton.disabled = false;

  }, 2000);
}

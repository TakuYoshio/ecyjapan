// emailjsの初期化
emailjs.init({
  publicKey: 'NqO-u-L0zrd2dvHVs', // 可能であれば.envなどで管理する
});

window.onload = function () {
  document.getElementById('contact-form').addEventListener('submit', function (event) {
    event.preventDefault();

    var isValid = true;

    // ラジオボタンのバリデーション
    var radios = document.getElementsByName('plan'); // ラジオボタンのname属性を指定
    var radioError = document.getElementById('radio-error');
    var isRadioSelected = false;

    for (var i = 0; i < radios.length; i++) {
      if (radios[i].checked) {
        isRadioSelected = true;
        break;
      }
    }

    if (!isRadioSelected) {
      radioError.textContent = 'Tour Plan selection is required.';
      radios[0].focus(); // ラジオボタンの最初の項目にフォーカス
      isValid = false;
    } else {
      radioError.textContent = '';
    }
   

    // 名前のバリデーション
    var name = document.getElementsByName('user_name')[0];
    var nameError = document.getElementById('name-error');
    if (name.value.trim() === '') {
      nameError.textContent = 'Name is required.';
      name.focus();
      isValid = false;
    } else {
      nameError.textContent = '';
    }

    // メールアドレスのバリデーション
    var email = document.getElementsByName('user_email')[0];
    var emailError = document.getElementById('email-error');
    if (email.value.trim() === '') {
      emailError.textContent = 'E-mail is required.';
      email.focus();
      isValid = false;
    } else {
      emailError.textContent = '';
    }

    // メールアドレス再確認のバリデーション
    var confirmEmail = document.getElementsByName('confirm_email')[0];
    var confirmEmailError = document.getElementById('confirm-email-error');
    if (confirmEmail.value.trim() === '') {
      confirmEmailError.textContent = 'E-mail confirmation is required.';
      if (isValid) {
        confirmEmail.focus();
      }
      isValid = false;
    } else if (email.value.trim() !== confirmEmail.value.trim()) {
      confirmEmailError.textContent = 'E-mail addresses do not match.';
      if (isValid) {
        confirmEmail.focus();
      }
      isValid = false;
    } else {
      confirmEmailError.textContent = '';
    } 

    if (!isValid) {
      return;
    }

    emailjs.sendForm('service_c87ec1t', 'template_a071swg', this)
      .then(function () {
        window.location.href = 'thanks.html#thanks';
      }, function (error) {
        alert('FAILED...');
      });
  });
};

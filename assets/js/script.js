let proceedBtn = document.getElementById('proceedBtn');
let registrationForm = document.getElementById('registration');
let verificationForm = document.getElementById('verification');

proceedBtn.addEventListener('click', (e) => {
    e.preventDefault();
    registrationForm.style.display = 'none';
    verificationForm.style.display = 'block';
})
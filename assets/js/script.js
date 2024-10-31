let proceedBtn = document.getElementById('proceedBtn');
let registrationForm = document.getElementById('registration');
let verificationForm = document.getElementById('verification');

proceedBtn.addEventListener('click', (e) => {
    e.preventDefault();
    registrationForm.style.display = 'none';
    verificationForm.style.display = 'block';
})


/* 

let allNavTab = document.querySelector('.all-btn');
let breakfastNavTab = document.querySelector('.breakfast-btn');
let lunchNavTab = document.querySelector('.lunch-btn');
let beveragesNavTab = document.querySelector('.beverages-btn');


let allMenuItems = document.querySelector('.all-items');
let breakfastItems = document.querySelector('.breakfast-items');
let lunchItems = document.querySelector('.lunch-items');
let beveragesItems = document.querySelector('.beverages-items');


function clearActive(){
    // removes all blue highlights, regardeless of where it is
    allNavTab.classList.remove('active');
    breakfastNavTab.classList.remove('active');
    lunchNavTab.classList.remove('active');
    beveragesNavTab.classList.remove('active');

    allMenuItems.display = 'none';
    breakfastItems.display = 'none';
    lunchItems.display = 'none';
    beveragesItems.display = 'none';
}

allNavTab.addEventListener('click', (e) => {
    clearActive();
    allNavTab.classList.add('active');
    allMenuItems.style.display = 'block';
})

breakfastNavTab.addEventListener('click', (e) => {
    clearActive();
    breakfastNavTab.classList.add('active');
    breakfastItems.style.display = 'block';
})

lunchNavTab.addEventListener('click', (e) => {
    clearActive();
    lunchNavTab.classList.add('active');
    lunchItems.style.display = 'block';
})

beveragesNavTab.addEventListener('click', (e) => {
    clearActive();
    beveragesNavTab.classList.add('active');
    beveragesItems.style.display = 'block';
})
 */
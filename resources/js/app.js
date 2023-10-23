// import './bootstrap';

$('.showPassword').on('click', function () {
    const x = document.querySelector('#passwordLogin');
    const y = document.querySelector('#passwordRegist');
    const z = document.querySelectorAll('.pwShowicon');

    const a = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-closed" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4"></path><path d="M3 15l2.5 -3.8"></path><path d="M21 14.976l-2.492 -3.776"></path><path d="M9 17l.5 -4"></path><path d="M15 17l-.5 -4"></path></svg>';
    const b = '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /> <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>';

    if (x.type === 'password' || y.type === 'password') {
        x.type = 'text';
        y.type = 'text';
        for (let i of z) {
            i.innerHTML = b;
        }
    } else {
        x.type = 'password';
        y.type = 'password';
        for (let i of z) {
            i.innerHTML = a;
        }
    }
})

$(document).ready(function () {

    $('.sign_up').hide();
    $('.sign_in_li').addClass('active');
    $('.textHead').text('Login to your account');


    $('.sign_up_li').on('click', function () {
        $(this).addClass('active');
        $('.sign_in_li').removeClass('active');
        $('.textHead').text('Create new account');
        $('.sign_up').show();
        $('.sign_in').hide();
    })

    $('.sign_in_li').on('click', function () {
        $(this).addClass('active');
        $('.sign_up_li').removeClass('active');
        $('.textHead').text('Login to your account');
        $('.sign_in').show();
        $('.sign_up').hide();
    })

    $('.signUp').on('click', function () {
        $('.sign_up_li').addClass('active');
        $('.sign_in_li').removeClass('active');
        $('.sign_up').show();
        $('.sign_in').hide();
    })

    $('.signIn').on('click', function () {
        $('.sign_in_li').addClass('active');
        $('.sign_up_li').removeClass('active');
        $('.sign_in').show();
        $('.sign_up').hide();
    })
})

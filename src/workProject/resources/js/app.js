require('./bootstrap');

document.addEventListener('DOMContentLoaded', function () {
    const logoutLink = document.getElementById('logout');
    const logoutForm = document.getElementById('logout-form');

    document.getElementById('logout').addEventListener('click', function (event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
});

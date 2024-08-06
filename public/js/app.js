const elemToggleFunc = function (elem) {
    elem.classList.toggle('active')
}
const adminBtn = document.getElementById('admin-btn')

document.addEventListener('DOMContentLoaded', function () {
    const eventRoot = document.getElementById('event-alert');

    window.eventProduct = function (msg, cls) {
        if (!eventRoot) return;

        eventRoot.innerHTML = "";
        let fav = document.createElement('div');
        fav.setAttribute('class', `${cls}`);
        fav.innerHTML = msg;
        eventRoot.appendChild(fav);

        setTimeout(function () {
            fav.remove();
        }, 2500);
    }

    // Add Livewire listeners
    if (window.Livewire) {
        window.Livewire.on('fav-event', (data) => {
            let cls = data[0]['cls'];
            let msg = data[0]['msg'];
            window.eventProduct(msg, cls);
        });

        window.Livewire.on('cart-event', (data) => {
            let cls = data[0]['cls'];
            let msg = data[0]['msg'];
            window.eventProduct(msg, cls);
        });

        window.Livewire.on('notAuth', () => {
            let cls = 'notAuth';
            let msg = 'يجب عليك تسجيل الدخول للحصول على هذه الميزة';
            window.eventProduct(msg, cls);
        });
    }
});

// window.addEventListener('scroll', function () {
//     if (window.scrollY > 10) {
//         adminBtn.classList.add('active');
//         adminBtn.classList.toggle('active');
//     } else {
//         adminBtn.classList.remove('active');
//     }
// });
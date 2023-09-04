import './bootstrap';

const buttons = document.querySelectorAll('#group-button');
const options = document.querySelectorAll('#block-options');

buttons.forEach(function (button) {
    button.addEventListener('click', function () {
        const targetOption = this.nextElementSibling;

        options.forEach(function (option) {
            if (option !== targetOption && option.classList.contains('open')) {
                option.classList.remove('open');
            }
        });

        targetOption.classList.toggle('open');
    });
});

document.addEventListener('click', function (event) {
    const isButtonClick = Array.from(buttons).some(button => button.contains(event.target));
    const isBlockOptionClick = Array.from(options).some(option => option.contains(event.target));

    if (!isButtonClick && !isBlockOptionClick) {
        options.forEach(function (option) {
            option.classList.remove('open');
        });
    }
});

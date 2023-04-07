import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
import 'flatpickr/dist/l10n/id.js';
import 'flatpickr/dist/themes/confetti.css';

document.addEventListener('DOMContentLoaded', function () {
    flatpickr('.flatpickr', {
        locale: 'id',
        enableTime: true,
        dateFormat: 'Y-m-d H:i',
    });
});

import $ from 'jquery';

window.$ = window.jQuery = $;

import 'bootstrap';

$(function () {
    const $course = $('#course');
    const $availability = $('#courseAvailability');

    $course.on('change', function () {
        const selectedCourse = $(this).val();

        $availability.empty();

        if (!selectedCourse) {
            return;
        }

        $availability.html(
            '<div class="alert alert-info">Memeriksa ketersediaan kursi...</div>'
        );

        $.ajax({
            url: `/api/course-availability/${encodeURIComponent(selectedCourse)}`,
            method: 'GET',
            dataType: 'json',

            success: function (data) {
                const alertClass = data.available
                    ? 'alert-success'
                    : 'alert-warning';

                const message = `
                    <div class="alert ${alertClass} mb-0">
                        <h6 class="alert-heading">${escapeHtml(data.name)}</h6>
                        <div>Status: <strong>${escapeHtml(data.status)}</strong></div>
                        <div>Kuota: ${Number(data.quota)}</div>
                        <div>Sudah terdaftar: ${Number(data.registered)}</div>
                        <div>Sisa kursi: <strong>${Number(data.remaining)}</strong></div>
                    </div>
                `;

                $availability.html(message);
            },

            error: function () {
                $availability.html(
                    '<div class="alert alert-danger mb-0">' +
                    'Gagal mengambil data kursus. Silakan coba lagi.' +
                    '</div>'
                );
            }
        });
    });

    function escapeHtml(value) {
        return String(value).replace(/[&<>"']/g, function (character) {
            const entities = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };

            return entities[character];
        });
    }
});
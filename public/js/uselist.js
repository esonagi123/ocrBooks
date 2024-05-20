$(document).ready(function() {
    const calendarIcon = $('#calendar-icon');
    const dateRangePicker = $('#date-range-picker');

    dateRangePicker.daterangepicker({
        autoUpdateInput: false,
        locale: {
            format: 'YYYY. MM. DD hh:mm A',
            applyLabel: '적용',
            cancelLabel: '취소',
            daysOfWeek: moment.locale('ko')._weekdaysMin,
            monthNames: moment.locale('ko')._months,
        }
    });

    dateRangePicker.on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY. MM. DD') + ' - ' + picker.endDate.format('YYYY. MM. DD'));
    });

    dateRangePicker.on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    calendarIcon.on('click', function() {
        dateRangePicker.data('daterangepicker').toggle();
    });
});

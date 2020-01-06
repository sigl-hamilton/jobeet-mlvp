$(document).ready(function() {
    $('#user_type').on('change', function () {
        if ($(this).val() == 'recruiter') {
            $('#company').show();
        } else {
            $('#company').hide();
        }
    });
});

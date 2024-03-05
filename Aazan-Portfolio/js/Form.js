$(document).ready(function() {
    $('[aria-controls="mobile-menu"]').click(function() {
        $('#mobile-menu').toggleClass('hidden');
        var expanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !expanded);
    });

    $('#user-menu-button').click(function() {
        $('#user-menu').toggleClass('hidden');
        var expanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !expanded);
    });

    $(document).click(function(event) {
        if (!$(event.target).closest('#user-menu-button').length && !$(event.target).closest('#user-menu').length) {
            $('#user-menu').addClass('hidden');
            $('#user-menu-button').attr('aria-expanded', 'false');
        }
    });
});
window.addEvent('domready', function() {
    document.formvalidator.setHandler('name',
        function (value) {
            regex=/^[\w_]+$/;
            return regex.test(value);
        });
});
window.addEvent('domready', function() {
    document.formvalidator.setHandler('body',
        function (value) {
            regex=/^.+$/;
            return regex.test(value);
        });
});

window.addEvent('domready', function() {
    document.formvalidator.setHandler('position',
        function (value) {
            regex=/^[\d.,]+$/;
            return regex.test(value);
        });
});
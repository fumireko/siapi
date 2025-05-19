// JavaScript source code
$(document).ready(function () {

    $('#campo').change(function () {

        $('form').change(function () {
            var dados = $(this).serialize();

            $.ajax({
                url: 'proc_plaqueta.php',
                method: 'post',
                dataType: 'html',
                data: dados,
                success: function (data) {
                    $('#resultado').empty().html(data);
                }
            });

            return false;
        });

        $('form').trigger('change');

    });
});




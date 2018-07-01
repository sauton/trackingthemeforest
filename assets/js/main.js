jQuery(function ($) {
    var thang = {};
    thang.getlistLink_ajax_each = function () {
        $("form").on("submit", function (e) {
            e.preventDefault();
            var array_link_url = $(this).serializeArray();
            console.log(array_link_url);
            var sort = '';
            var date = '';
            var top = '';
            $.each(array_link_url, function (index, value) {

                // console.log(index);
                // console.log(value);
                switch (value.name) {
                    case 'sort':
                        sort = value.value;
                        return;
                        break;
                    case 'date':
                        date = value.value;
                        return;
                        break;
                    case 'top':
                        top = value.value;
                        return;
                        break;
                }
                var data = {themes: value.value, sort: sort, date: date, top: top};
                $.ajax({
                    url: "controller/ajax.php",
                    data: data,
                    error: function () {
                        console.log('error');
                    },
                    success: function (res) {
                        console.log(res);
                        if (res == 'Error_CURL') {
                            $.ajax(this);
                        }
                    },
                    type: 'GET'
                });
            });

        });
        $("input").on("change", function () {
            $("#get_list_category").append($(this).parent());
            // console.log($(this).val());
        });
    };

    function getAllInputValues(inputValues) {
        $('.listcategory :input').map(function () {
            var type = $(this).prop("type");

            // checked radios/checkboxes
            if ((type == "checkbox" || type == "radio") && this.checked) {
                inputValues.push({name: "themes[]", value: $(this).val()});
            }
        });
        return inputValues;
    }

    thang.getlistLink_server_each = function () {
        $("form").on("submit", function (e) {
            e.preventDefault();
            var array_link_url = $(this).serializeArray();
            array_link_url = getAllInputValues(array_link_url);
            console.log(array_link_url);
            that = $(this);
            $.ajax({
                url: "controller/ajax.php",
                data: array_link_url,
                error: function () {
                    console.log('error');
                },
                success: function (res) {
                    console.log(res);
                    that.find('.show_detail_themes').html(res);
                },
                type: 'GET'
            });
        });
        $(".get_weekly_sale").on('click', function () {
            var array_link_url = [{name: 'type', value: 'weekly_sale'}];
            array_link_url = getAllInputValues(array_link_url);
            console.log(array_link_url);
            that = $(this).parent();
            $.ajax({
                url: "controller/ajax.php",
                data: array_link_url,
                error: function () {
                    console.log('error');
                },
                success: function (res) {
                    console.log(res);
                    that.find('.show_detail_themes').html(res);
                },
                type: 'GET'
            });


        });

    };

    $(document).ready(function () {
        console.log('ready');
        //thang.getlistLink_ajax_each();
        thang.getlistLink_server_each();
    })
});
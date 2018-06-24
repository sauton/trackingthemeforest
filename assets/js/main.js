$(function () {
    var thang = {};
    thang.getlistLink = function () {
        $("form").on("submit", function (e) {
            e.preventDefault();
            var array_link_url = $(this).serializeArray();
            console.log(array_link_url);
            var sort = '';
            var date = '';
            var top = '';
            $.each(array_link_url, function (index, value) {

                console.log(index);
                console.log(value);
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
                var data = {themes: value.value + "?sort=" + sort + "&date=" + date + "&top=" + top};
                console.log(data);
                $.ajax({
                    url: "controller/ajax.php",
                    data: data,
                    error: function () {
                        console.log('error');
                    },
                    success: function (res) {
                        console.log(res);
                    },
                    type: 'GET'
                });
            });

        });
        $("input").on("change", function () {
            $("#get_list_category").append($(this).parent());
            console.log($(this).val());
        });
    };

    $(document).ready(function () {
        console.log('ready');
        thang.getlistLink();
    })
});
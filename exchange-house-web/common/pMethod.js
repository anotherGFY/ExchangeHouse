
if (typeof (pMethod) == "undefined")
    var pMethod = function (uri, data, type, success, fail)
    {
        var data = $.trim(data) == "" ? "{}" : data;
        $.ajax({
            "url": uri,
            "cache": true,
            "headers": {
                "X-APICloud-AppId": USERINFO.APP,
                "X-APICloud-AppKey": USERINFO.KEY,
                "authorization": USERINFO.TOKEN
            },
            "data": data,
            "type": (type == "POST") ? "POST" : "GET"
        }).success(function (data, status, header) {
            if ($.isFunction(success))
                success(data, status, header);
        }).fail(function (header, status, errorThrown) {
            if ($.isFunction(fail))
                fail(header, status, errorThrown);
        });
    };

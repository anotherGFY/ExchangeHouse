$(function () {
    //根据页数读取数据
    function getData(pagenumber,pagesize) {
        debugger;
        debugger;
        var now = parseInt(Date.now() / 1000);
        var appKey = SHA1("baiusrjgd" + "UZ" + "d88ffe814c720fef41a7b29a88bbf0b1" + "UZ" + now) + "." + now;//haoren2016

            
        $.ajax({
            
            "url": "https://jdapi.izcds.com/v1/new_customer/name,crm_phonenumber,origin,customer_id,rating,update_time/true limit "+pagenumber+","+pagesize+"/",
            "cache": false,
            "headers": {
                "X-APICloud-AppId": "baiusrjgd",
                "X-APICloud-AppKey": appKey,
                "ACCEPT": "application/json"
            },
            "type": "GET",
            "contentType": "text/html",
            beforeSend: function () {
                    $(".loaddiv").show();
                },
            complete: function (XHR, TS) {
                    debugger;
                    // $(".title").html(JSON.stringify(XHR));
                },
            success: function (data1, textStatus, jqXHR) {
                    debugger;
                    debugger;
                    $(".loaddiv").hide();
                    if (data1.length > 0) {
                        var jsonObj = data1;
                        insertDiv(data1);
                    }else{
                        $(".div_null").show();
                        $("#btn_Page").hide();
                    }                       
                },
            error: function (header, status, errorThrown) {
                    $(".loaddiv").hide();

                }
        });
    }
    //初始化加载第一页数据


    //生成数据html,append到div中
    function insertDiv(json) {
        var $mainDiv = $(".mainDiv");
        var html = '';
        for (var i = 0; i < json.length; i++) {

            html += '<tr>';
            html +=     '<td class="center">';
            html +=         '<label class="pos-rel">';
            html +=             '<input type="checkbox" class="ace" />';
            html +=             '<span class="lbl">';
            html +=             '</span>';
            html +=         '</label>';
            html +=     '</td>';

            html +=     '<td class="center">';
            html +=         '<a href="#">' + json[i].name + '</a>';
            html +=     '</td>';
            html +=     '<td class="hidden-480 center">' + '26' + '</td>';
            html +=     '<td class="center">' + '666' + '</td>';

            html +=     '<td class="center">';
            html +=         '<span class="label label-sm label-success">' + json[i].crm_phonenumber.substring(0,3) + '****' +json[i].crm_phonenumber.substring(7,11) + '</span>';
            html +=     '</td>';
            html +=     '<td class="hidden-480 center">' + json[i].rating + '</td>';
            html +=     '<td class="hidden-480 center">' + json[i].update_time + '</td>';
            html +=     '<td class="hidden-480 center">' + json[i].origin + '</td>';

            html +=     '<td class="center">';

            html +=         '<button class="btn btn-xs btn-info btn-round">';
            html +=             '<i class="ace-icon fa fa-shopping-cart bigger-110">';
            html +=             '</i>';

            html +=                         '购买';
            html +=         '</button>';

            html +=     '</td>';
            html += '</tr>';





        }
        $mainDiv.append(html);
    }

    $(document).ready(function(){
 
        getData(0,20);
                //$(window).unbind('scroll');
                $("#btn_Page").show();
    });

    var pagesize=5,pagenumber=20;
    //==============核心代码=============
    var scrollHandler = function () {
        debugger;
        debugger;
		var scrollTop = $(document).scrollTop(); //滚动条滚动高度
		var documentH = $(document).height();  //滚动条高度 
		var windowH = $(window).height(); //窗口高度       
       if (scrollTop  >= documentH - windowH) {
                pagenumber+=pagesize;
                getData((pagenumber-1),pagesize);
                //$(window).unbind('scroll');
                $("#btn_Page").show();

        }
    }
    //定义鼠标滚动事件
    $(window).scroll(scrollHandler);
    //继续加载按钮事件
    $("#btn_Page").click(function () {
        //getData(i);
        $(window).scroll(scrollHandler);
    });
});
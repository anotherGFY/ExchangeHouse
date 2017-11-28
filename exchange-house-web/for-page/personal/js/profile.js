/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var loaduserform = function () {
    $.ajax({
        "url": "https://d.apicloud.com/mcm/api/user/" + USERINFO.ID,
        "cache": true,
        "headers": {
            "X-APICloud-AppId": USERINFO.APP,
            "X-APICloud-AppKey": USERINFO.KEY,
            "authorization": USERINFO.TOKEN
        },
        "type": "GET"
    }).success(function (data, status, header) {
        $("#form-field-name").val(data.username);//用户名
        $("#form-field-phone").val(data.mobile);//电话
        $("#form-field-qq").val(data.QQ);//QQ
        $("#form-field-email").val(data.email);//邮箱
    }).fail(function (header, status, errorThrown) {
        alert("获取用户信息失败:" + JSON.stringify(errorThrown));
    });
};



$(function () {
    loaduserform();
});


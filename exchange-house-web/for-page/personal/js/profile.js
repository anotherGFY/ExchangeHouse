/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (typeof (Entity_profile) == "undefined")
    var Entity_profile = {
        loaduserform: function () {
            pMethod("https://d.apicloud.com/mcm/api/user/" + USERINFO.ID, "{}", "GET"
                    , function (d, s, h) {
                        $("#form-field-name").val(d.username);//用户名
                        $("#form-field-phone").val(d.mobile);//电话
                        $("#form-field-qq").val(d.QQ);//QQ
                        $("#form-field-email").val(d.email);//邮箱
                    }, function (h, s, e) {
                alert("获取用户信息失败:" + JSON.stringify(e));
            });
        },
        editEntity: function () {
            var data = {
                "username": $("#form-field-name").val(),
                "mobile": $("#form-field-phone").val(),
                "QQ": $("#form-field-qq").val(),
                "email": $("#form-field-email").val(),
                "_method": "PUT"
            };
            if ($.trim($("#form-field-pwd").val()) != "")
                data.password = $("#form-field-pwd").val();
            pMethod("https://d.apicloud.com/mcm/api/user/" + USERINFO.ID, data, "POST"
                    , function (d, s, h) {
                        $("#form-field-name").val(d.username);//用户名
                        $("#form-field-phone").val(d.mobile);//电话
                        $("#form-field-qq").val(d.QQ);//QQ
                        $("#form-field-email").val(d.email);//邮箱
                        $("#form-field-pwd").val("");
                        alert("更新成功!");
                    }, function (h, s, e) {
                alert("修改用户信息失败:" + JSON.stringify(e));
            });

        }
    };




$(function () {
    Entity_profile.loaduserform();
    $("#edituser").click(function (e) {
        Entity_profile.editEntity();
    });
});


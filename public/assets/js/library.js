var base_lib = {
    checkRegister:()=>{
        $("register_form").submit(function(e) {
            e.preventDefault();
            login.submit();
        });
        var register = {
            $formDom: $("#register_form"),

            submit: function() {
                var data = this.$formDom.getFormObject();
                console.log(data);
                if (this.checkForm(data)) return;
                baseFunction.ajaxPost("login/login", data).then(
                    (res) => {

                        if (res.status == 0) {
                            let returnErr = res.msg;
                            errTemplate = '';
                            for (var prop in returnErr) {
                                errTemplate += ` <li>${returnErr[prop]}</li>`
                            }
                            Swal.fire(
                                "error",
                                errTemplate,
                                "error"
                            );
                        } else if (res.status == 1) {
                            Swal.fire("success", res.msg, "success").then(
                                (result) => {
                                    if (result) {
                                        window.location.reload();
                                    } else {
                                        window.location.reload();
                                    }
                                }
                            );
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            Swal.fire(
                                "error",
                                res.msg,
                                "error"
                            );
                            return true;
                        }



                    },
                    (err) => {
                        console.log(err);
                    }
                );
            },
            stringValid: function(string) {
                return string.length;
            },
            checkForm: function(formData) {
                var reg = /^[0-9]+$/; //正則驗證數字
                console.log(formData);
                if (formData.email == "") {
                    Swal.fire("error", "Email cannot be empty.", "error");
                    return true;
                } else if (formData.password == "") {
                    Swal.fire("error", "Password cannot be empty.", "error");
                    return true;
                }

            },
        };
    }
}
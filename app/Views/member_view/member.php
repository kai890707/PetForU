<?= $this->extend('layout/member_layout') ?>

<?= $this->section('css') ?>
    <?= $this->include('base_view/css') ?>
    <link rel="stylesheet" href="<?php echo base_url('public')?>/assets/css/member_view.css">
<?= $this->endSection() ?>
<?= $this->section('main') ?>
    <?= $this->include('base_view/nav') ?>
    <?= $this->include('member_view/member_main') ?>
    <?= $this->include('base_view/footer') ?>
    
<?= $this->endSection() ?>
<?= $this->section('js') ?>
    <?= $this->include('base_view/js') ?>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
    <script>
        var UserFun = {
            getUserInfo:()=>{
                BaseLib.Get("/public/userInfo").then(
                (res)=>{
                    UserFun.drawUserInfo(res.data);
                },
                (err)=>{
                    console.log(err);
                })
            },
            getPetCollect:()=>{
                BaseLib.Get("/public/selectCollet").then(
                (res)=>{
                    UserFun.drawCollectList(res);
                },
                (err)=>{
                    console.log(err);
                })
            },
            drawUserInfo:(data)=>{
                if(data.user_gender == "male"){
                    data.user_gender = "男"
                }else if(data.user_gender == "female"){
                    data.user_gender = "女"
                }else{
                    data.user_gender = "不願透漏"
                }
                $('#user_email').text(data.user_email);
                $('#show_name').text(data.user_name);
                $('#profile_username').text(data.user_name);
                $('#name_input').val(data.user_name);
                $('#show_phone').text(data.user_phone);
                $('#phone_input').val(data.user_phone);
                $("#user_gender").text(data.user_gender);
                $("#preview").attr('src',`${BaseLib.base_Url}/public${data.user_photo}`);
                $("#profile_photo").attr('src',`${BaseLib.base_Url}/public${data.user_photo}`);
            },
            drawCollectList:(data)=>{
                str = '';
                console.log('data',data);
                data.forEach(e => {
                    str += `
                    <div class="row mb-3 p-3 shadow rounded collect_content" >
                        <div class="col-12">
                            <div class="row">
                                <div class="col-8 d-flex align-items-center">
                                    <h4 class="font-weight-bold text-dark text-start m-0">
                                        <i class="fa fa-paw mr-2"></i>浪浪資訊
                                    </h4>
                                </div>
                            
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12 d-flex justify-content-center">
                            <img class="img-fluid img-thumbnail" src="${e.pet_photo=="無"?BaseLib.base_Url+'/public/assets/img/custom/main.png':e.pet_photo}" alt="" width="150px" height="100px">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-sm-center mt-sm-2">
                            <div class="row">
                                <div class="col-md-3 col-6"><i class="ti-tag mr-2"></i>編號</div>
                                <div class="col-md-9 col-6 text-md-left">${e.pet_id}</div>
                            </div>
                            <hr >
                            <div class="row">
                                <div class="col-md-3 col-6"><i class="fa fa-venus-mars mr-2" aria-hidden="true"></i>性別</div>
                                <div class="col-md-9 col-6 text-md-left">${e.pet_gender}</div>
                            </div>
                            <hr >
                            <div class="row">
                                <div class="col-md-3 col-6"><i class="fa fa-info mr-2" aria-hidden="true"></i>體型</div>
                                <div class="col-md-9 col-6 text-md-left">${e.pet_bodytype}</div>
                            </div>
                            <hr >
                        </div>
                        <div class="col-lg-3 col-md-3 col-12 mt-sm-2 border-left">
                            <div class="row justify-content-start align-items-center mb-2">
                                <div class="col mb-2 "><button class="btn btn-outline-info" onclick="UserFun.toPetInfo(${e.pet_id})">查看詳細資訊</button></div>
                                <div class="col  mb-2 "><button class="btn btn-outline-danger" onclick="UserFun.removePetInList(${e.pet_id})">結束收藏</button></div>
                            </div>
                        </div>
                    </div>    
                    `;
                });
                $('#collectList').html(str);
            },
            removePetInList:(pet_id)=>{
                Swal.fire({
                    title: '確定要刪除嗎?',
                    showDenyButton: true,
                    confirmButtonText: '是! 我要刪除',
                    denyButtonText: `不! 目前不需要`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        data = new FormData();
                        data.append("pet_id",pet_id);
                        BaseLib.Post("/public/deleteCollet",data).then(
                        (res)=>{ 
                            BaseLib.ResponseCheck(res).then(()=>{
                                window.location.reload();
                            })
                        },
                        (err)=>{
                            console.log(err);
                        })
                    } else if (result.isDenied) {
                        Swal.fire('資料尚未刪除', '', 'info')
                    }
                   
                })
              
            },
            toPetInfo:(pet_id)=>{
                window.location = BaseLib.base_Url+'/public/pet/'+pet_id;
            },
            checkUpdateForm:(data)=>{
                if(data.get('name_input').length === 0){
                    Swal.fire(
                        '輸入錯誤!',
                        '使用者名稱不得為空!',
                        'info'
                        )
                    return true;
                }
                if(data.get('phone_input').length === 0){
                    Swal.fire(
                        '輸入錯誤!',
                        '手機號碼不得為空!',
                        'info'
                        )
                    return true;
                }
                if(!Number(data.get('phone_input'))){
                    Swal.fire(
                        '輸入錯誤!',
                        '手機號碼必須為數字!',
                        'info'
                        )
                    return true;
                }
                return false;
            },
            checkRegister:(formData)=> {
            if(formData.get('updatePassword')!== formData.get('updatePassword2')){
                Swal.fire(
                    '輸入錯誤!',
                    '二次輸入的密碼不符合!',
                    'info'
                )
                return true;
            }
            if(formData.get('updatePassword').length<=6){
                Swal.fire(
                    '提醒!',
                    '密碼必須大於6個英文字!',
                    'info'
                )
                return true;
            }
            return false;
            },
            updateUserData:(formData)=>{
                BaseLib.Post("/public/updateUserData",formData).then(
                (res)=>{
                    BaseLib.ResponseCheck(res).then(()=>{
                        if(res.status =="success"){
                            window.location.reload();
                        }
                    })
                    
                },
                (err)=>{
                    console.log(err);
                })
            },
            rePassword:(formData)=>{
                BaseLib.Post("/public/rePassword",formData).then(
                (res)=>{
                    BaseLib.ResponseCheck(res).then(()=>{
                        if(res.status =="success"){
                            window.location=BaseLib.base_Url+"/public/login"
                        }
                    })
                    
                },
                (err)=>{
                    console.log(err);
                })
            }
        }
        var PetFun={
            selectPublish:()=>{
                BaseLib.Get("/public/selectPublish").then(
                (res)=>{
                    PetFun.drawPublishList(res);
                },
                (err)=>{
                    console.log(err);
                })
            },
            createPublish:(formData)=>{
                BaseLib.Post("/public/createPublish",formData).then(
                (res)=>{
                    BaseLib.ResponseCheck(res).then(()=>{
                        if(res.status =="success"){
                            window.location.reload();
                        }
                      
                    })
                    
                },
                (err)=>{
                    console.log(err);
                })
            },
            editPublish:(formID)=>{
                console.log('before',formID);
               
                    var formData = new FormData(document.getElementById(formID));
                    
                
                    BaseLib.Post("/public/editPublish",formData).then(
                    (res)=>{
                        BaseLib.ResponseCheck(res).then(()=>{
                            if(res.status =="success"){
                                window.location.reload();
                            }
                        
                        })
                        
                    },
                    (err)=>{
                        console.log(err);
                    })
            
                
            },
            deletePublish:(id)=>{
                Swal.fire({
                    title: '確定要刪除嗎?',
                    showDenyButton: true,
                    confirmButtonText: '是! 我要刪除',
                    denyButtonText: `不! 目前不需要`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        data = new FormData();
                        data.append("published_id",id);
                        BaseLib.Post("/public/deletePublish",data).then(
                        (res)=>{
                            BaseLib.ResponseCheck(res).then(()=>{
                                window.location.reload();
                            })
                        },
                        (err)=>{
                            console.log(err);
                        })
                    } else if (result.isDenied) {
                        Swal.fire('資料尚未刪除', '', 'info')
                    }
                   
                })
            },
            drawPublishList:(data)=>{
                str = "";
                data.forEach(e => {
                    str+=`
                    <div class="row mb-3 p-3 shadow rounded collect_content" >
                        <div class="col-12">
                            <div class="row">
                                <div class="col-8 d-flex align-items-center">
                                    <h4 class="font-weight-bold text-dark text-start m-0">
                                        <i class="fa fa-paw mr-2"></i>浪浪資訊
                                    </h4>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12 d-flex justify-content-center">
                            <img class="img-fluid img-thumbnail" src="${BaseLib.base_Url+'/public/'+e.published_photo}" alt="" width="150px" height="100px">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-sm-center mt-sm-2">
                            <div class="row">
                                <div class="col-md-3 col-6"><i class="ti-tag mr-2"></i>編號</div>
                                <div class="col-md-9 col-6 text-md-left">${e.published_id}</div>
                            </div>
                            <hr >
                            <div class="row">
                                <div class="col-md-3 col-6"><i class="fa fa-venus-mars mr-2" aria-hidden="true"></i>性別</div>
                                <div class="col-md-9 col-6 text-md-left">${e.published_gender}</div>
                            </div>
                            <hr >
                            <div class="row">
                                <div class="col-md-3 col-6"><i class="fa fa-info mr-2" aria-hidden="true"></i>體型</div>
                                <div class="col-md-9 col-6 text-md-left">${e.published_bodytype}</div>
                            </div>
                            <hr >
                        </div>
                        <div class="col-lg-3 col-md-3 col-12 mt-sm-2 border-left">
                            <div class="row justify-content-start align-items-center mb-2">
                                <div class="col mb-2 "><button class="btn btn-outline-info"  data-toggle="modal" data-target="#editPostModal${e.published_id}">編輯資料</button></div>
                                <div class="col  mb-2 "><button class="btn btn-outline-danger" onclick="PetFun.deletePublish(${e.published_id})">刪除</button></div>
                            </div>
                        </div>
                    </div>
                    `;
                    str += `
                    <div class="modal fade" id="editPostModal${e.published_id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title font-weight-bold" id="exampleModalLongTitle">修改寵物資訊</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                
                            </div>
                            <form id="post-edit-form${e.published_id}">
                                <div class="modal-body">
                                    <input type="text" class="form-control" id="published_id"name="published_id" value="${e.published_id}" hidden>
                                    <p><span class="text-danger">*</span>為必填欄位</p>
                                    <div class="form-group row">
                                        <label for="publish_name" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物名字</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="publish_name"name="publish_name" value="${e.published_name}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publish_kind" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物類型</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="publish_kind" name="publish_kind" value="${e.published_kind}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publish_variet" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物品種</label>
                                        <div class="col-sm-7">
                                        <input type="text" class="form-control" id="publish_variet" name="publish_variet" value="${e.published_variet}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publish_gender" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物性別</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="publish_gender"name="publish_gender" value="${e.published_gender}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publish_bodytype" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物體型</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="publish_bodytype" name="publish_bodytype" value="${e.published_bodytype}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publish_colour" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物毛色</label>
                                        <div class="col-sm-7">
                                        <input type="text" class="form-control" id="publish_colour"  name="publish_colour" value="${e.published_colour}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publish_age" class="col-sm-5 col-form-label"><span class="text-danger">*</span>寵物年紀</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="publish_age" value="${e.published_age}" name="publish_age">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publish_sterilization" class="col-sm-5 col-form-label"><span class="text-danger">*</span>是否絕育</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="publish_sterilization" value="${e.published_sterilization=="yes"?'yes':'no'}">
                                            <option value="yes" ${e.published_sterilization=="yes"?'selected':''}>是</option>
                                                <option value="no" ${e.published_sterilization=="no"?'selected':''}>否</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publish_sterilization" class="col-sm-5 col-form-label"><span class="text-danger">*</span>是否施打狂犬病疫苗</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control" name="publish_bacterin" value="${e.published_bacterin=="yes"?'yes':'no'}">
                                                <option value="yes"${e.published_bacterin=="yes"?'selected':''}>是</option>
                                                <option value="no" ${e.published_bacterin=="no"?'selected':''}>否</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city_id" class="col-sm-5 col-form-label"><span class="text-danger">*</span>所在地</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control"  id="city_id" name="city_id" value="${e.city_id}">
                                                <option value="1"${e.city_id=="1"?'selected':''}>基隆市</option>
                                                <option value="2"${e.city_id=="2"?'selected':''}>臺北市</option>
                                                <option value="3" ${e.city_id=="3"?'selected':''}>新北市</option>
                                                <option value="4" ${e.city_id=="4"?'selected':''}>桃園縣</option>
                                                <option value="5" ${e.city_id=="5"?'selected':''}>桃園市</option>
                                                <option value="6" ${e.city_id=="6"?'selected':''}>新竹市</option>
                                                <option value="7" ${e.city_id=="7"?'selected':''}>新竹縣</option>
                                                <option value="8" ${e.city_id=="8"?'selected':''}>苗栗縣</option>
                                                <option value="9" ${e.city_id=="9"?'selected':''}>臺中市</option>
                                                <option value="10"${e.city_id=="10"?'selected':''}>彰化縣</option>
                                                <option value="11"${e.city_id=="11"?'selected':''}>彰化市</option>
                                                <option value="12"${e.city_id=="12"?'selected':''}>南投縣</option>
                                                <option value="13"${e.city_id=="13"?'selected':''}>雲林縣</option>
                                                <option value="14"${e.city_id=="14"?'selected':''}>嘉義市</option>
                                                <option value="15"${e.city_id=="15"?'selected':''}>嘉義縣</option>
                                                <option value="16"${e.city_id=="16"?'selected':''}>臺南市</option>
                                                <option value="17"${e.city_id=="17"?'selected':''}>高雄市</option>
                                                <option value="18"${e.city_id=="18"?'selected':''}>屏東縣</option>
                                                <option value="19"${e.city_id=="19"?'selected':''}>屏東市</option>
                                                <option value="20"${e.city_id=="20"?'selected':''}>臺東縣</option>
                                                <option value="21"${e.city_id=="21"?'selected':''}>花蓮縣</option>
                                                <option value="22"${e.city_id=="22"?'selected':''}>宜蘭縣</option>
                                                <option value="23"${e.city_id=="23"?'selected':''}>澎湖縣</option>
                                                <option value="24"${e.city_id=="24"?'selected':''}>金門縣</option>
                                                <option value="25"${e.city_id=="25"?'selected':''}>連江縣</option>
                                            </select>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="publish_remark" class="col-sm-12 col-form-label"><span class="text-danger">*</span>寵物備註</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" id="publish_remark" rows="3" name="publish_remark" >${e.published_remark}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publish_remark" class="col-sm-12 col-form-label"><span class="text-danger">*</span>寵物圖片</label>
                                        <div class="input-group col-sm-12">
                                        <input type="file" accept="image/*" name="publish_photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class=" col-sm-12">
                                            <img id="pic" src="${BaseLib.base_Url}/public/${e.published_photo}" class="img-thumbnail">
                                        </div>    
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                    <button id="edit-submit" type="button" class="btn btn-primary" onclick="PetFun.editPublish('post-edit-form${e.published_id}')">修改</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('#PostList').html(str);
            }
            
        }
        $(document).ready(()=>{
            UserFun.getUserInfo();
            UserFun.getPetCollect();
            PetFun.selectPublish();
        })
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

       
        $('#name_change').click(()=>{
            $('#name_input').removeClass('d-none');
            $('#name_save').removeClass('d-none');
            $('#show_name').addClass('d-none');
            $("#name_change").addClass('d-none');
            
        })
        $('#name_save').click(()=>{
            $('#name_input').addClass('d-none');
            $('#name_save').addClass('d-none');
            $('#show_name').removeClass('d-none');
            $("#name_change").removeClass('d-none');
            if($('#name_input').val().replace(/(^s*)|(s*$)/g, "").length !==0){
                $('#show_name').text($('#name_input').val());
            }else{
                $('#name_input').val($('#show_name').text());
            }
          
        })
        $('#phone_change').click(()=>{
            $('#phone_input').removeClass('d-none');
            $('#phone_save').removeClass('d-none');
            $('#show_phone').addClass('d-none');
            $("#phone_change").addClass('d-none');
            
        })
        $('#phone_save').click(()=>{
            $('#phone_input').addClass('d-none');
            $('#phone_save').addClass('d-none');
            $('#show_phone').removeClass('d-none');
            $("#phone_change").removeClass('d-none');
            if($('#phone_input').val().replace(/(^s*)|(s*$)/g, "").length !==0){
                $('#show_phone').text($('#phone_input').val());
            }else{
                $('#phone_input').val($('#show_phone').text());
            }
        })
          /**
         * 個人資訊修改
         */
        $("form[id='updateUserInfo-form']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById('updateUserInfo-form'));
            if (UserFun.checkUpdateForm((formData))) return;
            UserFun.updateUserData(formData);
        })
        /**
         * 修改密碼
         */
        $("form[id='change-password-form']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById('change-password-form'));
            if (UserFun.checkRegister(formData)) return;
            UserFun.rePassword(formData);
        })
      
        /**
         * 刊登寵物
         */
        $("form[id='post-pet-form']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById('post-pet-form'));
            PetFun.createPublish(formData);
        })
       
        
    </script>
<?= $this->endSection() ?>


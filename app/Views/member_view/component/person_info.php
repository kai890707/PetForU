<div class="p-4 tab_profile">
    <h3 class="font-weight-bold">我的檔案</h3>
    <small class="text-muted font-weight-bold">管理你的檔案以保護你的帳戶</small>
</div>    
<div class="p-4">
    <form id="updateUserInfo-form">
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10 d-flex align-items-center">
                <p class="m-0" id="user_email">example@example.com</p>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">使用者名稱</label>
            <div class="col-sm-10">
                <p class="m-0 d-flex align-items-center"> 
                    <span id="show_name">example</span>
                    <input type="text" class="form-control d-none" id="name_input" name="name_input">
                    <button type="button" id="name_save" class="btn btn-outline-success ml-3 exchange-btn d-none">保存</button>
                    <button type="button" id="name_change" class="btn btn-outline-secondary ml-3 exchange-btn">變更</button>
                </p>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">手機</label>
            <div class="col-sm-10">
            <p class=" d-flex align-items-center">
                <span id="show_phone">09****123*</span>
                <input type="text" class="form-control d-none" id="phone_input" name="phone_input">
                <button type="button" id="phone_save" class="btn btn-outline-success ml-3 exchange-btn d-none">保存</button>
                <button type="button" id="phone_change"  class="btn btn-outline-secondary ml-3 exchange-btn">變更</button>
            </p>
            </div>
        </div>
        <div class="form-group row ">
            <label for="user_gender" class="col-sm-2 col-form-label">性別</label>
            <div class="col-sm-10  d-flex align-items-center">
                <p class=" m-0" id="user_gender" ><span></span></p>
            </div>
        </div>
        <div class="form-group row ">
            <label for="phone" class="col-sm-2 col-form-label">個人照片</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class=" col-sm-6">
                        <div id="msg"></div>
                            <input type="file" name="img" class="file" accept="image/*">
                            <div class="input-group my-3">
                                <input type="text" class="form-control" disabled placeholder="Upload File" id="file" name="file">
                                <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">上傳</button>
                                </div>
                            </div>
                   
                    </div>
                    <div class=" col-sm-12">
                        <img src="" id="preview" class="img-thumbnail" width="200px">
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="form-group row m-1">
            <button id="info-submit" type="submit" class="btn btn-outline-success">儲存</button>
        </div>
    </form>  
</div>
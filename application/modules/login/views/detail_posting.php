<div class="modal-dialog modal-xl" style="width: 100%;" role="document">
    <input id="id_detail" type="hidden" />
    <div class="modal-content">
        <div class="modal-body p-0">
            <div class="row">
                <div class="col-md-7 p-0" style="background-color: black;">
                    <div class="height-img" style="height: 130px; display:none;"></div>
                    <img style="width: 100%;max-height:800px;" id="img_detail" src=""alt="">
                    <div class="height-img" style="height: 130px; display:none;"></div>
                </div>
                <div class="col-md-5 p-3">
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-md-2 ">
                                <img style="border-radius: 50%; width:100%; border:1px solid grey;"
                                    src="https://joeschmoe.io/api/v1/random" />
                            </div>
                            <div class="col-md-10 p-0 pl-2 pt-2">
                                <h5 class="show-user-posting"></h5>
                                <p class="show-user-email"></p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div  style="height: 550px; overflow:auto; margin-bottom:35px;">
                        <p style="color:black">
                            <b class="mr-2 show-user-posting"></b>
                            <div class="show-user-caption"></div>
                        </p>
                        <div>
                            <table class="table mt-4">
                                <tbody class="detail-komen"></tbody>
                            </table>
                        </div>
                    </div>
                    <div style="bottom: 0; position: absolute; width: 90%;">
                        <div class="input-group mb-3">
                            <input style="border-top:none; border-left:none; border-right:none;" type="text" placeholder="Comment" class="form form-control text-komen-detail" />
                            <div class="input-group-append" onclick="ajax_action_comment_detail()">
                                <span class="input-group-text text-primary" style="background-color: white; border:none; cursor:pointer;" >Post</span>
                            </div>
                        </div>           
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
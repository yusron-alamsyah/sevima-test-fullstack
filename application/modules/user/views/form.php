<div class="modal-dialog modal-lg" style="width: 100%;" role="document">
    <div class="modal-content">
        <div class="modal-header bg-danger">
            <center>
                <h4 style="color: white;" class="modal-title" id="title-tambah">Form User</h4>
            </center>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
            <form method="post" id="form-add" onsubmit="return ajax_action_add();">
                <input type="text" style="display: none;" id="id" name="id">
                <div class="modal-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <label>Username :</label>
                                    <input type="text" name="username" id="username" class="form-control">
                                </td>
                                <td>
                                    <label>Password :</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    <small class="d-none info-password">Kosongi Password jika tidak diubah</small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Email :</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </td>
                                <td>
                                    <label>Role :</label>
                                    <select name="role" class="form-control" id="role">
                                        <option value=""></option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Access :</label><br>
                                    <div class="form-check">
                                        <input value="true" name="akses[comment]" type="checkbox" class="form-check-input mt-1" id="comment">
                                        <label class="form-check-label" for="comment">Comment</label>
                                    </div>
                                    <div class="form-check">
                                        <input value="true" name="akses[like]" type="checkbox" class="form-check-input mt-1" id="like">
                                        <label class="form-check-label" for="like">Like</label>
                                    </div>
                                    <div class="form-check">
                                        <input value="true" name="akses[posting]" type="checkbox" class="form-check-input mt-1" id="posting">
                                        <label class="form-check-label" for="posting">Posting</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                </div>
                <div class="modal-footer">
                    <a ><button type="button" data-dismiss="modal" class="btn btn-danger">Back</button></a>
                    <button type="submit" id="btn_admin" class="btn btn-primary">Save</button>
                </div>
        </form>
    </div>
</div>
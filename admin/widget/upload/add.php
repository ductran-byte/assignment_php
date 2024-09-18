<div class="content">
    <div class="container-fluid">
        <style>.btn-prev {color: white;font-weight: 600;width: 120px;height: 35px;background-color: teal;border: none;border-radius: 5px;}</style>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="btn-group btn-group-justified">
                            <div style="padding: 10px 10px 10px 0"><a href="/admin/upload-file"><button class="btn-prev"><i class="ti-angle-double-left"></i> Quay về</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style="color: white;"><b>Edit file</b></h4> </h4>
                        <hr>
                    </div>
                    <div class="content"> 
                        <?php include('./error.php'); ?>
                        <?php include('./success.php'); ?>
                        <form action="/admin/truy-van-upload" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="type_gift" value="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Chọn loại file</label>
                                        <select class="form-control border-input" name="type">
                                            <option value="" disabled selected>--- Chọn loại file ---</option>
                                            <option value="0" >File TXT</option>
                                            <option value="1" >File JAR</option>
                                            <option value="2" >File APK</option>
                                            <option value="3" >File ZIP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tên file:</label>
                                        <input type="text" class="form-control border-input" id="title" name="title" value="" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nội dung file:</label>
                                        <input type="text" class="form-control border-input" id="content" name="content" value="" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Chọn đường dẫn mới</label>
                                        <input type="file" name="linknew" class="custom-file border-input" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr>
                                <button type="submit" name="addFile" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
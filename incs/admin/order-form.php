<div class="list-group">
    <div class="list-group-item active">
        <h2 class="list-group-item-heading">填写你的简历需要呈现的信息</h2>
        <p class="list-group-item-text">通过使用我们提供给大家的简单模板，按照要求填写简历的详细内容（研究表明：详细和结构化的建立更能帮助求职者），然后通过提交该文档由我们的设计师完成排版和设计。</p>
    </div>
    <form id="tbContactForm" class="list-group-item form-horizontal" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">姓名</label>
            <div class="col-sm-10">
                <input type="text" placeholder="你的姓名" id="name" name="name" class="form-control">
                <span id="helpBlock2" class="help-block">你的填写有误</span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">邮箱地址</label>
            <div class="col-sm-10">
                <input type="email" placeholder="Your Email" id="email" name="email" class="form-control">
                <span id="helpBlock2" class="help-block">你的填写有误</span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">信息</label>
            <div class="col-sm-10">
                <textarea placeholder="Your Message" id="message" name="message" class="form-control"></textarea>
                <span id="helpBlock2" class="help-block">你的填写有误</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <label for="file-uploader">上传文件</label>
                <input type="file" id="file-uploader">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default tb-btn">提交</button>
            </div>
        </div>
        <div class="text-center">
            <div class="alert alert-success" role="alert">正在提交中……</div>
            <div class="alert alert-success" role="alert">提交成功你将很快收到我们的回复！</div>
            <div class="alert alert-danger" role="alert">对不起，请仔细看看所填写的内容。</div>
        </div>

    </form>
    </div>
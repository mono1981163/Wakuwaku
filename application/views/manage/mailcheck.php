<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/manage/delivery.css');?>"/>
<div class="content">
    <div class="main-content">
        <div class="input_contain">
            <div class="input_area">
                <div class="box">
                    <h2 class="text-center" style="margin-bottom: 30px">メール定型文確認</h2>
                    <div class="error-message"></div>
                    <div class="form-box">
                        <div class="item-title">
                            <div>発送メール設定(日本)</div>
                        </div>
                        <div class="item-input">
                            <textarea id="send_ja" name="send_ja" class="form-control" style="resize: none;" rows="3" disabled><?php echo $send_ja?><?php echo $send_ja_tail?></textarea>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div>発送メール設定(中国)</div>
                        </div>
                        <div class="item-input">
                            <textarea id="send_cn" name="send_cn" class="form-control" style="resize: none;" rows="3" disabled><?php echo $send_cn?><?php echo $send_cn_tail?></textarea>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div>キャンセルメール設定(日本)</div>
                        </div>
                        <div class="item-input">
                            <textarea id="cancel_ja" name="cancel_ja" class="form-control" style="resize: none;" rows="3" disabled><?php echo $cancel_ja?><?php echo $cancel_ja_tail?></textarea>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div>キャンセルメール設定(中国)</div>
                        </div>
                        <div class="item-input">
                            <textarea id="cancel_cn" name="cancel_cn" class="form-control" style="resize: none;" rows="3" disabled><?php echo $cancel_cn?><?php echo $cancel_cn_tail?></textarea>
                        </div>
                    </div>
                    <div class="form-box"></div>
                    <div class="button-group">
                        <button class="btn btn-custom" style="margin-top: 50px" onclick="window.location.href = '<?php echo base_url('MailSetting')?>'">戻る</button>
                        <button class="btn btn-custom" style="margin-top: 50px" onclick="mailSetting()">定型文設定</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function mailSetting() {
        var url = "<?php echo base_url('MailSetting/doSetting')?>";
        
        var send_ja = "<?php echo trim(preg_replace('/\s\s+/', ' ', $send_ja));?>";
        var send_cn = "<?php echo trim(preg_replace('/\s\s+/', ' ', $send_cn));?>";
        var cancel_ja = "<?php echo trim(preg_replace('/\s\s+/', ' ', $cancel_ja));?>";
        var cancel_cn = "<?php echo trim(preg_replace('/\s\s+/', ' ', $cancel_cn));?>";
        $.ajax({
            url: url,
            type: "post",
            data: {
                send_ja: send_ja,
                send_cn: send_cn,
                cancel_ja: cancel_ja,
                cancel_cn: cancel_cn,
            },
            success: function(response) 
            {
                if(response=="success") {
                    window.location.href="<?php echo base_url()?>"+"Purchase_detail/detailView/"+"<?php echo $this->session->userdata['purchase_id']?>";
                } else {

                }
            },
            error: function(err) {
                console.log();
            }
        })
    }
</script>
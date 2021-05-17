<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/manage/delivery.css');?>"/>
<style>
    .error-message {
        color: red;
        font-size: 12px;
    }
</style>
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
                            <textarea id="send_ja" name="send_ja" placeholder="" class="form-control" style="resize: none;" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div>発送メール設定(中国)</div>
                        </div>
                        <div class="item-input">
                            <textarea id="send_cn" name="send_cn" placeholder="" class="form-control" style="resize: none;" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div>キャンセルメール設定(日本)</div>
                        </div>
                        <div class="item-input">
                            <textarea id="cancel_ja" name="cancel_ja" placeholder="" class="form-control" style="resize: none;" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="item-title">
                            <div>キャンセルメール設定(中国)</div>
                        </div>
                        <div class="item-input">
                            <textarea id="cancel_cn" name="cancel_cn" placeholder="" class="form-control" style="resize: none;" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-box"></div>
                    <div class="button-group">
                        <button class="btn btn-custom" style="margin-top: 50px" onclick="fixedPhrase()">定型文確認</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
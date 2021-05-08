<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/manage/gacha_manage.css');?>"/>
<div class="content">
    <div class="main-content">
        <div class="current-gacha-list">
            <div class="add">
                <button onclick="window.location.href='<?php echo base_url('Gacha/Gacha_manage/new_gacha');?>'" class="btn btn-green">新しいガチャ</button>
            </div>
            <table id="gacha-list" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th class="thumbnail">image</th>
                    <th>ガチャ名前</th>
                    <th>価格</th>
                    <th>販売開始</th>
                    <th>販売締め切り</th>
                    <th>配送料金</th>
                    <th>配送時間</th>
                    <th>備考</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    var base_url = "<?php echo base_url(); ?>";
    var table = $('#gacha-list').DataTable({
        "ajax": {
            url : "<?php echo base_url('Gacha/Gacha_manage/get_gacha'); ?>",
            type : 'GET'
        },
        "pageLength": 10,
        "lengthChange": false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Japanese.json'
        },
        "columnDefs": [ { "targets": -1, "data": null, "defaultContent": "<div class='btn-container'><button class='btn btn-green editbtn'>編集</button></div>"}, 
        { "targets": 0, visible: false }]
    });

    $("#gacha-list").on('click','.editbtn',function(){
        var id = table.row($(this).closest('tr')).data()[0];
        window.location.href='<?php echo base_url()?>Gacha/Gacha_manage/edit_gacha/'+id;
    });
</script>
<style>
  #modal-trigger {
    display: none;
  }
  .modal-content {
      background-color: #EFFEFF;
  }
  .modal-body {
    width: 100%;
    text-align: center;
    margin: auto;
  }
  .modal-dialog {
    top: 30%;
  }
  .modal-title {
    font-weight: bold;
  }
</style>
<link rel="stylesheet" href="<?= base_url("assets/css/main.css");?>">
<!-- =============================        Modal       =============================== -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button id="ensure" type="button" class="btn btn-custom"><?php echo lang('confirmation')?></button>
      </div>
    </div>
  </div>
</div>

<button type="button" id="modal-trigger" data-toggle="modal" data-target="#Modal">Launch Modal</button>

<script>
    function launchModal(title, message, url) {
        $(".modal-body").html(message);
        $(".modal-title").html(title);
        $("#Modal").modal({
            backdrop: 'static',
            keyboard: false
        });
        document.getElementById("ensure").addEventListener('click', function() {
            window.location.href = url;
        });
    }
</script>
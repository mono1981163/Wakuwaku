<style>
  #modal-trigger {
    display: none;
  }
  .btn-custom {
      margin: auto;
      width: 100px;
      background-color: #03c9b0;
      border-color: white;
      color: #EFFEFF;
  }
  .modal-content {
      background-color: #EFFEFF;
  }
  .modal-body {
    width: 80%;
  }
  .modal-footer {
      border-top: none;
  }
  .modal-body {
      margin: auto;
  }
  .modal-dialog {
    top: 10%;
    height: 500px;
    max-width: 50%;
  }
  .modal-content {
    min-height: 220px;
    text-align: center;
  }
  .modal-title {
    font-weight: bold;
  }
</style>
<!-- <link rel="stylesheet" href="<?= base_url("assets/css/main.css");?>"> -->
<!-- =============================        Modal       =============================== -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>

<button type="button" id="modal-trigger" data-toggle="modal" data-target="#Modal">Launch Modal</button>

<script>
    function launchModal(title ,message, url) {
        $(".modal-title").html(title);
        $(".modal-body").html(message);
        $("#Modal").modal({
            backdrop: 'static',
            keyboard: false
        });
    }
</script>
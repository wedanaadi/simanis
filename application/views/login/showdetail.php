<!-- modal -->
<div class="modal fade" id="show" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">Detail Perbaikan</h5>
        </div>
        <div class="modal-body">
          <form id="form1" class="form-horizontal" data-toggle="validator" action="" autocomplete="off">
            <div class="box-body">
              <!-- <div class="box-body"> -->
                <div class="table-responsive">
                  <table id="tabel12" class="table table-bordered table-striped" >
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Service</th>
                          <th>Qty</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
  $(function () {
    var tabel = $("#tabel12").DataTable({
      paging:false, searching:false
    });
  });
</script>
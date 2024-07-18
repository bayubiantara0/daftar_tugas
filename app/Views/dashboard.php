<section class="section">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Request</h5>
              <button type="button" id="btnadd" data-bs-toggle="modal" data-bs-target="#modaltugas" class="mt-2 mb-2 btn btn-primary btn-sm">Add Tugas</button>

              <!-- Table with stripped rows -->
              <table class="table" id="ttugas" style="font-size: 13px;">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
    </div>
</section>

<div class="modal fade" id="modaltugas" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 13px;">Add Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formaddmtugas">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label" style="font-size: 13px;">Judul</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control inputbox" id="addjudul" name="addjudul" style="font-size: 13px;" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label" style="font-size: 13px;">Status</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control inputbox" id="addstatus" name="addstatus" style="font-size: 13px;" >
                        </div>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnaddmtugas" class="btn btn-primary" style="font-size: 13px;">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-size: 13px;">Close</button>
            </div>
        </div>
    </div>
</div><!-- End Basic Modal-->

<div class="modal fade" id="modaledit" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 13px;">Edit Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formedittugas">
                    <input type="hidden" id="id" name="id">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label" style="font-size: 13px;"><b>Judul</b></label>
                        <div class="col-sm-10">
                        <input type="teks" class="form-control inputbox" id="edtjudul" name="edtjudul" style="font-size: 13px;">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label" style="font-size: 13px;"><b>Status</b></label>
                        <div class="col-sm-10">
                        <input type="teks" class="form-control inputbox" id="edtstatus" name="edtstatus" style="font-size: 13px;">
                        </div>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
            <div class="modal-footer">
                <button type="submit" id="btneditsubmit" class="btn btn-primary" style="font-size: 13px;">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-size: 13px;">Close</button>
            </div>
        </div>
    </div>
</div><!-- End Basic Modal-->

<div class="modal fade" id="modalview" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 13px;">View Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3 col-md-4 label " style="font-size: 13px;">Judul</div>
                    <div class="col-lg-1 col-md-4 label " style="font-size: 13px;">:</div>
                    <div class="col-lg-8 col-md-8" name="vjudul" style="font-size: 13px;"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label " style="font-size: 13px;">Tugas</div>
                    <div class="col-lg-1 col-md-4 label " style="font-size: 13px;">:</div>
                    <div class="col-lg-8 col-md-8" name="vstatus" style="font-size: 13px;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-size: 13px;">Close</button>
            </div>
        </div>
    </div>
</div><!-- End Basic Modal-->

<script>
    var retable;
    
    $(document).ready(function() {
      retable = $('#ttugas').DataTable({ 
          // processing: true,
          serverSide: true,
          order: [], //init datatable not ordering
          ajax: {
            "url": "<?php echo base_url('/daftartugas/datatables')?>",
            "type": "POST",
            // "data": function ( d ) {
            //     d.status_label = $('#btncategory').val();
            // }
          },
          columnDefs: [
            {
                "targets": [3],
                "searchable": false,
                "orderable": false,
                "render": function(data, type, row, meta) {
                    $controlls = '<button type="button" class="btn btn-primary btn-sm" id="btnview" data-bs-toggle="modal" data-bs-target="#modalview" data-id="'+ row[3] +'"><i class="bi bi-eye"></i></button>&nbsp;';
                    $controlls += '<button type="button" class="btn btn-warning btn-sm"id="btnedit" data-id="'+ row[3] +'"><i class="bi bi-pen"></i></button>&nbsp;';
                    $controlls += '<button type="button" class="btn btn-danger btn-sm"id="btndelete" data-id="'+ row[3] +'"><i class="bi bi-trash"></i></button>';
                    return $controlls;
                },
            },
        ],
      });
    });

    function reload_table()
    {
      retable.ajax.reload(null,false);
    }

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    $(document).ready(function(){
        $(document).on('click','#btnaddmtugas',function(){
            var url = '<?= base_url('/daftartugas/addtugas') ?>';
            var formdata = new FormData($('#formaddmtugas')[0]);
            var valid;
            $.ajax({
                url : url,
                type : 'post',
                data : formdata,
                dataType : 'JSON',
                cache : false,
                contentType : false,
                processData : false,
                success : function(data){
                    if(data.status){
                        reload_table();
                        $('#formaddmtugas')[0].reset();
                        $("#modaltugas").modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: 'Successfully added tugas',
                        })
                    }
                },
                error : function(){
                    Toast.fire({  
                        icon: 'error',
                        title: 'Failed to adding tugas'
                    })
                }
            })
        })
    })

    $(document).ready(function(){
        $(document).on('click','#btndelete',function(){
          var id =  $(this).data('id');
            Swal.fire({
              title: 'Are you sure?',
              text: "Deleted data cannot be recovered!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Delete this!',
          }).then((result) => {
              if (result.value) {
                  $.ajax({
                      url: "<?php echo base_url('/daftartugas/delete'); ?>",
                      type: "POST",
                      data: {id : id},
                      cache: false,
                      dataType: 'json',
                      success: function(data) {
                          reload_table();
                          Swal.fire(
                              'Delete',
                              'Successfully Deleted',
                              'success'
                          )

                      }
                  });
              } else if (result.dismiss === swal.DismissReason.cancel) {
                  Swal.fire(
                      'Cancelled',
                      'Your data is safe :)',
                      'error'
                  )
              }
          })
        })
    })

    $(document).ready(function(){
      $(document).on('click','#btnedit',function(){
        var id =  $(this).data('id');

        $.ajax({
          url: "<?php echo site_url('/daftartugas/getedit'); ?>/" + id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {

              $('[name="id"]').val(data.id);
              $('[name="edtjudul"]').val(data.judul);
              $('[name="edtstatus"]').val(data.status);
              $("#modaledit").modal('show');

          },
          error: function(){
            Toast.fire({  
              icon: 'error',
              title: 'Failed to edit tugas'
            })
          }
      });
      })
    })

    $(document).ready(function(){
      $("#btneditsubmit").click(function(){
        BtnSubmit();
      })
    })

    function BtnSubmit(){
      var url ="<?= base_url('/daftartugas/update')?>";
      var formdata = new FormData($('#formedittugas')[0]);
      
      $.ajax({
        url : url,
        type : 'post',
        data : formdata,
        dataType : "JSON",
        cache : false,
        contentType : false,
        processData : false,
        success: function(data){
          if (data.status)
          {
            $("#modaledit").modal('hide');
            reload_table();
            Toast.fire({  
              icon: 'success',
              title: 'Successfully update tugas'
            })
          }
        },
        error : function(){
          Toast.fire({  
            icon: 'error',
            title: 'Failed to update tugas'
          })
        }
      })
      
    }

    $(document).ready(function(){
      $(document).on('click','#btnview',function(){
        var id =  $(this).data('id');

        $.ajax({
          url: "<?php echo site_url('/daftartugas/getview')?>/" + id,
          type: "GET",
          dataType: "JSON",
          success: function(data) {
              $('[name="vjudul"]').text(data.judul);
              $('[name="vstatus"]').text(data.status);
              $("#modalview").modal('show');
          },
        });
      })
    })

</script>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Request</h5>

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

</script>
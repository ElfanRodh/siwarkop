    <script type="text/javascript">
      $(document).ready(function(){
        $('#warkop').DataTable({
          "processing":true,
          "serverSide":true,
          "lengthMenu":[[5,10,100,-1],[5,10,100,"All"]],
          "ajax":{
            url : "<?php echo site_url('warkop/data_server') ?>",
            type : "POST"
          },

          "columnDefs":
          [
            {
              "targets":0,
              "data":"id_warkop"
            },
            {
              "targets":1,
              "data":"nama_warkop"
            },
            {
              "targets":2,
              "data":"alamat"
            },
            {
              "targets":3,
              "data": null,
              "searchable": false,
              "render":function(data,tipe,full,meta){
                return '<a type="button" href="<?php echo site_url("/warkop/detail/") ?>'+data["id_warkop"]+'" title="<?php echo 'Detail' ?> '+data["nama_warkop"]+'" class="btn btn-warning"><i class="fa fa-eye"></i></a>'
              }
            },
            {
              "targets":4,
              "data": null,
              "searchable": false,
              "render":function(data,tipe,full,meta){
                return '<a type="button" href="<?php echo site_url("/warkop/edit/") ?>'+data["id_warkop"]+'" title="<?php echo 'Edit' ?> '+data["nama_warkop"]+'" class="btn btn-success"><i class="fa fa-pencil"></i></a>'
              }
            },
            {
              "targets":5,
              "data": null,
              "searchable": false,
              "render":function(data,tipe,full,meta){
                return '<a type="button" href="<?php echo site_url("/warkop/hapus/") ?>'+data["id_warkop"]+'" title="<?php echo 'Detail' ?> '+data["nama_warkop"]+'" onclick="return confirm("Apakah Anda Yakin Ingin Menghapus")'+data['nama_warkop']+'"?";" class="btn btn-danger"><i class="hi hi-trash"></i></a>'
              }
            }
          ],
        });
      });
    </script>
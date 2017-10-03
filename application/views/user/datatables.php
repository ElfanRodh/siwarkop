
    <script type="text/javascript">
      $(document).ready(function(){
        $('#user').DataTable({
          "processing":true,
          "serverSide":true,
          "lengthMenu":[[5,10,100,-1],[5,10,100,"All"]],
          "ajax":{
            url : "<?php echo site_url('user/data_server') ?>",
            type : "POST"
          },

          "columnDefs":
          [
            {
              "targets":0,
              "data":"id_user"
            },
            {
              "targets":1,
              "data":"nama_user"
            },
            {
              "targets":2,
              "data":"jk"
            },
            {
              "targets":3,
              "data":"alamat"
            },
            {
              "targets":4,
              "data": null,
              "searchable": false,
              "render":function(data,tipe,full,meta){
                return '<a type="button" href="<?php echo site_url("user/detail/") ?>'+data["id_user"]+'" title="<?php echo 'Detail' ?> '+data["nama_user"]+'" class="btn btn-warning"><i class="fa fa-eye"></i></a>'
              }
            },
            {
              "targets":5,
              "data": null,
              "searchable": false,
              "render":function(data,tipe,full,meta){
                return '<a type="button" href="<?php echo site_url("user/edit/") ?>'+data["id_user"]+'" title="<?php echo 'Edit' ?> '+data["nama_user"]+'" class="btn btn-success"><i class="fa fa-pencil"></i></a>'
              }
            },
            {
              "targets":6,
              "data": null,
              "searchable": false,
              "render":function(data,tipe,full,meta){
                return '<a type="button" href="<?php echo site_url("user/hapus/") ?>'+data["id_user"]+'" title="<?php echo 'Detail' ?> '+data["nama_user"]+'" onclick="return confirm("Apakah Anda Yakin Ingin Menghapus")'+data['nama_user']+'"?";" class="btn btn-danger"><i class="hi hi-trash"></i></a>'
              }
            }
          ],
        });
      });
    </script>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul; ?></title>
    <style type="text/css">
      table{
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
      }
      table th{
        border: 1px solid #000;
        padding: 3px;
        font-weight: bold;
        text-align: center;
      }
      table td{
        border: 1px solid #000;
        padding: 3px;
        vertical-align: top;
      }
    </style>
  </head>
  <body>
    <img src="<?php echo base_url('assets/kop1.jpg')?>" align="center" width="100%">
    <p style="text-align: center"> <strong>Tabel User</strong></p>
    <br><br>
    <table style="width: 100%; border: 1; border-collapse: collapse;">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>E-mail</th>
        <th>No. Telp</th>
        <th>Foto</th>
      </tr>
      <?php $no = 0; foreach ($user as $row): $no++; ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->nama_user; ?></td>
        <td><?php if($row->jk == 'L'){echo "Laki-laki";}else{echo "Perempuan";} ?></td>
        <td><?php echo $row->alamat; ?></td>
        <td><?php echo $row->email; ?></td>
        <td><?php echo $row->no_telp; ?></td>
        <td>
          <img src="<?php echo base_url('assets/images/user/'.$row->foto) ?>" style="width: 150px;" align ="center">
        </td>
      </tr>
    <?php endforeach; ?>
    </table>
  </body>
</html>

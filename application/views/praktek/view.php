<div class="right_col" role="main">

  <div class="row">
  </div>
  <br />

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><strong><?php echo $subtitle; ?></strong></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Provinsi</th>
                <th>Kode Pos</th>
                <th>Foto</th>
                <th>Edit</th>
                <th>Hapus</th>
              </tr>
            </thead>
            <tbody>
            <?php
            foreach($list as $row): ?>
              <tr>
                <td><?php echo $row->IDTPraktek ?></td>
                <td><?php echo $row->NamaTPraktek ?></td>
                <td><?php echo $row->Alamat ?></td>
                <td><?php echo $row->Kota ?></td>
                <td><?php echo $row->Provinsi ?></td>
                <td><?php $kodepos = ((empty($row->KodePos)) ? "-" : $row->KodePos);
                  echo $kodepos ?></td>
                <td><?php echo $row->Foto ?></td>
                <td>
                  <div class="center-button" style="text-align: center;"><a href="<?php echo base_url()?>tempatpraktik/edit/<?php echo $row->IDTPraktek ?>"><button class="btn btn-info" type="button" name="button">Edit</button></a></div>
                </td>
                <td>
                  <div class="center-button" style="text-align: center;"><a href="<?php echo base_url()?>tempatpraktik/delete/<?php echo $row->IDTPraktek ?>"><button align="center" class="btn btn-danger" type="button" name="button">Hapus</button></a></div>
                </td>
              </tr>

            <?php
              endforeach;
            ?>
            </tbody>
          </table>

        </div>
        <div class="clearfix"></div>
      </div>
  </div>
</div>
</div>

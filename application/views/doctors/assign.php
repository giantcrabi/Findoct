
<!-- page content -->
<div class="right_col" role="main">

  <br />
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><strong><?php echo $subtitle; ?></strong></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Dokter </label>
            <div class="col-md-5 col-sm-5 col-xs-12">
              <select id="dokter" name="dokter" class="select2_single form-control" tabindex="-1">
                <optgroup label="Nama Dokter">
                  <option></option>
                  <?php

                  foreach($listdokter as $row): ?>
                  <option value="<?php echo $row->Email ?>"><?php echo $row->Nama ?></option>
                  <?php endforeach; ?>
                </optgroup>
              </select>
            </div>
          </div>
          <br /><br /><br/>

          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Tempat Praktek </label>
            <div class="col-md-5 col-sm-5 col-xs-12">
              <select id="tpraktek" name="tpraktek" class="select2_single form-control" tabindex="-1">
                <optgroup label="Nama Tempat Praktek">
                  <option></option>
                  <?php

                  foreach($listpraktek as $row): ?>
                  <option value="<?php echo $row->IDTPraktek ?>"><?php echo $row->NamaTPraktek ?></option>
                <?php endforeach; ?>
              </optgroup>
            </select>
          </div>
        </div>
        <br /><br />

        <div id="isijadwal">
          <div class="form-group">
            <label class="col-md-2 col-sm-2 col-xs-12">Senin </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <span class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="seninopen">From </label>
                <input type="text" id="seninopen" name="seninopen" class="form-control">
              </span>
              <span class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="seninclosed">To </label>
                <input type="text" id="seninclosed" name="seninclosed" class="form-control">
              </span>
            </div>
          </div><br /><br /><br /><br />
          <div class="form-group">
            <label class="col-md-2 col-sm-2 col-xs-12">Selasa </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <span class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="selasaopen">From </label>
                <input type="text" id="selasaopen" name="selasaopen" class="form-control">
              </span>
              <span class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="selasaclosed">To </label>
                <input type="text" id="selasaclosed" name="selasaclosed" class="form-control">
              </span>
            </div>
          </div><br /><br /><br /><br />
          <div class="form-group">
            <label class="col-md-2 col-sm-2 col-xs-12">Rabu </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <span class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="rabuopen">From </label>
                <input type="text" id="rabuopen" name="rabuopen" class="form-control">
              </span>
              <span class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="rabuclosed">To </label>
                <input type="text" id="rabuclosed" name="rabuclosed" class="form-control">
              </span>
            </div>
          </div><br /><br /><br /><br />
          <div class="form-group">
            <label class="col-md-2 col-sm-2 col-xs-12">Kamis </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <span class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="kamisopen">From </label>
                <input type="text" id="kamisopen" name="kamisopen" class="form-control">
              </span>
              <span class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="kamisclosed">To </label>
                <input type="text" id="kamisclosed" name="kamisclosed" class="form-control">
              </span>
            </div>
          </div><br /><br /><br /><br />
          <div class="form-group">
            <label class="col-md-2 col-sm-2 col-xs-12">Jumat </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <span class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="jumatopen">From </label>
                <input type="text" id="jumatopen" name="jumatopen" class="form-control">
              </span>
              <span class="col-md-2 col-sm-2 col-xs-12">
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="jumatclosed">To </label>
                <input type="text" id="jumatclosed" name="jumatclosed" class="form-control">
              </span>
            </div>
          </div><br /><br /><br /><br />
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="add"></label>
            <div class="col-md-5 col-sm-5 col-xs-12">
              <button type="button" name="add" class="btn btn-success addButton">Assign</button>
            </div>
          </div><br /><br />
        </div>

        <div class="ln_solid"></div>

        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tempat Praktek</th>
              <th>Senin</th>
              <th>Selasa</th>
              <th>Rabu</th>
              <th>Kamis</th>
              <th>Jumat</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody id="listjadwal">
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
  var wrapper         = $("#listjadwal"); //Fields wrapper
  var add_button      = $(".addButton"); //Add button ID
  var remove_button   = $(".removeButton");
  var dokter          = $("#dokter");
  var tpraktek        = $("#tpraktek");
  var table           = $('#datatable-responsive').DataTable();

  var value = $(dokter).val();

  $("#isijadwal").hide();

  $(tpraktek).change(function(){
    if ($(this).val() == "") {
      $("#isijadwal").hide();
    } else {
      $("#isijadwal").show();
    }
  });

  function addRow(idtpraktek,inputvalue) {
    if(value != "") {
      var senin = "-";
      if($("#seninopen").val() != "" && $("#seninclosed").val() != "") {
        senin = $("#seninopen").val() + " - " + $("#seninclosed").val();
      }
      var selasa = "-";
      if($("#selasaopen").val() != "" && $("#selasaclosed").val() != "") {
        selasa = $("#selasaopen").val() + " - " + $("#selasaclosed").val();
      }
      var rabu = "-";
      if($("#rabuopen").val() != "" && $("#rabuclosed").val() != "") {
        rabu = $("#rabuopen").val() + " - " + $("#rabuclosed").val();
      }
      var kamis = "-";
      if($("#kamisopen").val() != "" && $("#kamisclosed").val() != "") {
        kamis = $("#kamisopen").val() + " - " + $("#kamisclosed").val();
      }
      var jumat = "-";
      if($("#jumatopen").val() != "" && $("#jumatclosed").val() != "") {
        jumat = $("#jumatopen").val() + " - " + $("#jumatclosed").val();
      }
      table.row.add( [
        idtpraktek,
        inputvalue,
        senin,
        selasa,
        rabu,
        kamis,
        jumat,
        '<div class="center-button" style="text-align: center;"><button class="btn btn-danger removeButton" type="button" name="button">Hapus</button></a></div>'
        ] ).draw(false);

      $.post("<?php echo base_url()?>doctors/addJadwal", {email: value, idtpraktek: idtpraktek, senin: senin, selasa: selasa, rabu: rabu, kamis: kamis, jumat: jumat});
    }
  }

  function getTable() {
    $.post("<?php echo base_url()?>doctors/getJadwal", {email: value}, function(data, status){
      var listjadwal = $.parseJSON(data);

      $(wrapper).empty();
      for (var key in listjadwal) {
        if (listjadwal.hasOwnProperty(key)) {
          table.row.add( [
            listjadwal[key]["idtpraktek"],
            listjadwal[key]["namatpraktek"],
            listjadwal[key]["senin"],
            listjadwal[key]["selasa"],
            listjadwal[key]["rabu"],
            listjadwal[key]["kamis"],
            listjadwal[key]["jumat"],
            '<div class="center-button" style="text-align: center;"><button class="btn btn-danger removeButton" type="button" name="button">Hapus</button></a></div>'
            ] ).draw();
        }
      }
    });
  }

  $(dokter).change(function(){
    table.clear();
    value = $(this).val();
    getTable();
  });

  $(add_button).click(function(){
    var idtpraktek = $(tpraktek).val();
    var inputvalue = $("#tpraktek :selected").text();

    $.post("<?php echo base_url()?>doctors/checkJadwal", {email: value, idtpraktek: idtpraktek}, function(data,status){
      var obj = $.parseJSON(data);
      if (obj == null) {
        addRow(idtpraktek,inputvalue);
      } else {
        alert('Input sudah terpakai');
      }
    });
  });

  $(wrapper).on("click",".removeButton", function(e){ //user click on remove text
    e.preventDefault();
    var idtpraktek = $(this).closest('tr').find("td:first").text();

    $.post("<?php echo base_url()?>doctors/delJadwal", {email: value, idtpraktek: idtpraktek});

    table.row( $(this).closest('tr') ).remove().draw(false);
  })

});
</script>

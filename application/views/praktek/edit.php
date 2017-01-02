
            <!-- page content -->

            <div class="right_col" role="main">

                <div class="row">
                </div>
                <br />

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><strong><?php echo $subtitle; ?></strong></h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <?php
                            if (validation_errors() != "") {
                                echo "<div class=\"well well-sm\">";
                                    echo validation_errors();
                                echo "</div>";
                            }
                        ?>
                        
                        <?php echo form_open(base_url('tempatpraktik/edit/'.$values->IDTPraktek)) ?>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Nama <span class="required">*</span></label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input type="text" name="name" value="<?php echo $values->NamaTPraktek ?>" required="required" class="form-control">
                                </div>
                            </div><br /><br /><br />

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="alamat">Alamat <span class="required">*</span></label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input type="text" name="alamat" value="<?php echo $values->Alamat ?>" required="required" class="form-control">
                                </div>
                            </div><br /><br /><br />

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="kota">Kota <span class="required">*</span></label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input type="text" name="kota" value="<?php echo $values->Kota ?>" required="required" class="form-control">
                                </div>
                            </div><br /><br /><br />

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="provinsi">Provinsi <span class="required">*</span></label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input type="text" name="provinsi" value="<?php echo $values->Provinsi ?>" required="required" class="form-control">
                                </div>
                            </div><br /><br /><br />

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="kodepos">Kode Pos </label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input type="text" name="kodepos" value="<?php $kodepos = ((empty($values->KodePos)) ? "-" : $values->KodePos); echo $kodepos ?>" class="form-control">
                                </div>
                            </div><br /><br /><br />

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="foto">Foto </label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input type="text" name="foto" value="<?php echo $values->Foto ?>" class="form-control">
                                </div>
                            </div><br /><br />

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="reset" name="cancel" class="btn btn-primary">Cancel</button>
                                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>

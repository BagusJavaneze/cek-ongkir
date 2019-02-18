<!DOCTYPE HTML>
<html>
    <head>
        <title>Cek Ongkos Kirim Pos Indonesia &mdash; Created by BAGOS ANGGARA</title>
        <!-- Bootstrap core CSS -->
        <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
        <!-- jQuery UI CSS -->
        <link href="<?=base_url('assets/css/jquery-ui.css')?>" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?=base_url('assets/css/custom.css')?>" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    </head>
    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Cek Ongkir via Pos Indonesia</h2>
                    <form id="cekOngkirForm">
                        <div class="form-group">
                          <label for="asal">Kota/Kabupaten Asal: <span class="text-danger"><strong>*</strong></span></label>
                          <select class="form-control" id="kota-asal">
                            <option value="">&mdash; Pilih Kota/Kabupaten Asal &mdash;</option>
                            <?php foreach ($city as $c): ?>
                                <option value="<?=$c['city_id']?>"><?=$c['type']?> <?=$c['city_name']?></option>
                            <?php endforeach; ?>   
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="tujuan">Kota/Kabupaten Tujuan: <span class="text-danger"><strong>*</strong></span></label>
                          <select class="form-control" id="kota-tujuan">
                            <option value="">&mdash; Pilih Kota/Kabupaten Tujuan &mdash;</option>
                            <?php foreach ($city as $c): ?>
                                <option value="<?=$c['city_id']?>"><?=$c['type']?> <?=$c['city_name']?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="berat">Berat Barang: <span class="text-danger"><strong>*</strong></span></label>
                          <input type="text" class="form-control" id="berat" placeholder="Berat barang (dalam satuan gram)">
                        </div>
                        <p><span class="text-danger"><strong>*</strong></span>) wajib diisi</p>
                        <div id="btn-cek-ongkir" class="btn btn-primary">Cek Ongkir</div>
                    </form>
                </div>
            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col-md-12" id="hasil-ongkir-wrapper"></div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h2>Cek Resi via Pos Indonesia</h2>
                    <form id="cekResiForm">
                        <div class="form-group">
                          <label for="resi">Nomor Resi: <span class="text-danger"><strong>*</strong></span></label>
                          <input type="text" class="form-control" id="resi" placeholder="Masukkan nomor resi Pos Indonesia" autocomplete="off">
                        </div>
                        <p><span class="text-danger"><strong>*</strong></span>) wajib diisi</p>
                        <div id="btn-cek-resi" class="btn btn-success">Cek Resi</div>
                    </form>
                </div>
            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col-md-12" id="hasil-resi-wrapper"></div>
            </div>
        </div>
        <footer>
            <!--Copyright-->
            <div class="footer-copyright py-3 text-center">
                © 2018<br>
                Powered by <a href="https://rajaongkir.com" target="_blank">RajaOngkir API</a> and <a href="https://www.aftership.com/" target="_blank">AfterShip API</a>
            </div>
            <!--/.Copyright-->
        </footer>
		
		<!-- jQuery UI JavaScript -->
        <script src="<?=base_url('assets/js/jquery-ui.min.js')?>"></script>
        <!-- Bootstrap core JavaScript -->
        <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
        <!-- Custom -->
        <script src="<?=base_url('assets/js/custom.js')?>"></script>
    </body>
</html>
<html lang="en">
<head>
    <title><?=$page?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?=site_url()?>assets/css/bootstrap.css"/>
</head>
<body <?=$promise_print != 'active' ? 'onload="window.print()"' : null ?>>
    <div class="col-lg-12">
        <table border="0" align="center" style="width: 800px; border: none; margin-top: 20px;">
            <tr >
                <td style="width: 140px">
                    <img src="<?=site_url()?>assets/images/muh.png" style="width: 80px; height: 80px; margin-left : 30px">
                </td>
                <td colspan="2" style="width:800px">
                    <center style="margin-top: 2px">
                        <h3><?=$page?></h3>
                        <h3><?=$this->fungsi->user_login()->nama_ranting?></h3>
                        <h4><?=$this->fungsi->user_login()->alamat_ranting?></h4>
                        </div>
                    </center><br/>
                </td>
            </tr>            
        </table>
        <center>    
            <div style="border-style:inset; width: 60%; border-bottom-width:0px"></div>
        </center>
        <!-- Isi Laporan -->
        <div style="margin-top: 20px; margin-left: 200px; margin-right: 200px">
            <?php 
                foreach($instansi->result() as $data){?>
                    Nama Instansi : <?=$data->nama_ranting?> <br>
                    <table class="table table-bordered" style="margin-bottom: 50px" width="">
                        <thead>
                            <tr>
                                <td width="3%">No</td>
                                <td>Nama Wakif</td>
                                <td>Lokasi Tanah</td>
                                <td>Luas Tanah</td>
                                <td>Status Tanah</td>
                                <td>Penggunaan Tanah</td>
                                <td>Luas Bangunan</td>
                                <td>Lokasi Sertifikat</td>
                                <td>Nilai Tanah</td>
                                <td>Tanggal Wakaf</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $no = 1;
                            foreach ($row->result() as $key => $data_barang) {
                                if($data_barang->id_ranting == $data->id_ranting){?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$data_barang->nama_wakif?></td>
                                    <td><?=$data_barang->lokasi_tanah?></td>
                                    <td><?=$data_barang->luas_tanah ?></td>
                                    <td><?=$data_barang->status_tanah?></td>
                                    <td><?=$data_barang->penggunaan_tanah?></td>
                                    <td><?=$data_barang->luas_bangunan?></td>
                                    <td><?=$data_barang->tempat_arsip?></td>
                                    <td><?=$this->money->rupiah($data_barang->harga_tanah)?></td>
                                    <td><?=$this->fungsi->tgl_indo($data_barang->tgl_wakaf)?></td>
                                </tr>
                            <?php } 
                            } ?>
                        </tbody>
                    </table>
            <?php } ?>
        </div>
        <!-- Akhir Isi Laporan -->
        <table align="center" style="width:800px; border:none;margin-top:15px;margin-bottom:20px;">
            <tr>
                <td align="right"><?=$this->fungsi->user_login()->nama_ranting?>, <?=date('d M Y')?></td>
            </tr>
            <tr>
                <td align="right" style="padding-right: 50px">
                    <p>Kepala Instansi</p>
                    <div style="padding-top : 80px">
                    </div>
                </td>
            </tr>    
            <tr>
                <td align="right" style="padding-right : 10px">( <?=$this->fungsi->user_login()->pimpinan?> )</td>
            </tr>
        </table>

      
    </div>
</body>
</html>

<div class="content-wrapper">
    <div class="container-pills">
        <div id="list" class="w3-container pills">
            <!-- Content Header (Page header) --> 
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                            <button class="btn bg-warning btn-sm" onclick="openPills('add')"><i class="fas fa-plus"></i> Tambah Produk</button>
                            </li>
                        </ol>
                    </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title">Daftar Produk</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-warning">
                                <tr>
                                    <th style="width: 1%">
                                        NO
                                    </th>
                                    <th style="width: 1%">
                                        Foto
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th style="width: 10%" class="text-center">
                                        Harga
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        Kategori
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        Vendor
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        Stok
                                    </th>
                                    <th class="text-center">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <?php 
                            $no=1;
                            foreach($products as $p){ ?>
                            <tbody>
                                <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td class="text-center">
                                    <img class="brand-image rounded" width="100px" src="<?= base_url()?>gambar/<?php echo $p['prod_img'];?>" alt="foto">
                                    <span class="badge badge-light">ID = <?php echo $p['prod_id']; ?></span>
                                </td>
                                <td>
                                    <a href="#" style="font-size:20px;"><b><?php echo $p['prod_name']; ?></b></a>
                                    <br/>
                                    <small>
                                        <?php echo $p['prod_desc']; ?>
                                    </small>
                                </td>
                                <td class="text-center">
                                    Rp. <?php echo number_format($p['prod_price']) ?>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-success"><?php echo $p['cat_name']; ?></span>
                                </td>
                                <td class="text-center">
                                    <?php echo $p['vend_id']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $p['stock']; ?>
                                </td>
                                <td class="project-actions text-center">
                                <a 
                                    href="javascript:;"
                                    data-prod_id="<?php echo $p['prod_id']; ?>"
                                    data-prod_name="<?php echo $p['prod_name']; ?>"
                                    data-prod_price="<?php echo $p['prod_price']; ?>"
                                    data-prod_desc="<?php echo $p['prod_desc']; ?>"
                                    data-cat_id="<?php echo $p['cat_id']; ?>"
                                    data-vend_id="<?php echo $p['vend_id']; ?>"
                                    data-stock="<?php echo $p['stock']; ?>"
                                    data-toggle="modal" data-target="#edit-data">
                                    <button  data-toggle="modal" data-target="#ubah-data" class="mb-2 btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                </a>
                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('dataproduk/hapus/'.$p['prod_id'])?>" onclick="return confirm('Yakin untuk menghapus data produk ini?')"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-right">Data Produk K⍜PIKU</div>
                </div>
            </section>
        </div>


        <div id="add" class="w3-container pills" style="display:none;"> 
            <!-- Content Header (Page header) --> 
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                            <button class="btn bg-warning btn-sm" onclick="openPills('list')"><i class="fas fa-book"></i> Data Produk</button>
                            </li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title">Tambah Produk</h3>
                    </div>
                    <div class="card-body">
                        <?php echo form_open_multipart('dataproduk/tambah_aksi');?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ID Vendor</label>
                                <div class="col-sm-2">
                                    <input type="text" name="vend_id" class="form-control" placeholder="ID Vendor">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-5">
                                    <input type="text" name="prod_name" class="form-control" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Harga Produk</label>
                                <div class="col-sm-3">
                                    <input type="text" name="prod_price" class="form-control" placeholder="Harga" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stock" class="form-control" placeholder="Stok" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-3">
                                <select class="form-control" name="cat_id" id="cat_id">
                                    <option disabled selected> Pilih </option>
                                    <option value="Kopi Arabika">Kopi Arabika</option> 
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="prod_desc" class="form-control" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-3">
                                    <input type="file" id="userfile" name="userfile" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <input class="btn btn-danger" type="submit" value="Tambah Produk">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">Input Data Produk K⍜PIKU</div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Edit Data Produk</h4>
                <button aria-hidden="true" data-dismiss="modal" class="text-white close" type="button">×</button>
            </div>
            
            <form class="form-horizontal" action="<?php echo base_url('dataproduk/update')?>" method="post" enctype="multipart/form-data" role="form">
             <div class="modal-body">
                    <div class="input-group">
                        <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">ID Vendor</label>
                            <div class="col-lg-12">
                                <input type="hidden" id="prod_id" name="prod_id">
                                <input type="text" class="form-control" id="vend_id" name="vend_id">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Nama</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="prod_name" name="prod_name">
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Harga</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="prod_price" name="prod_price">
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Stok</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="stock" name="stock">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Deskripsi</label>
                        <div class="col-lg-12">
                            <textarea class="form-control" id="prod_desc" name="prod_desc"></textarea>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Kategori</label>
                            <div class="col-lg-12">
                                <select class="form-control" name="cat_id" id="cat_id">
                                    <option value="<?=$data['cat_id']?>"> Pilih </option>
                                    <?php mysqli_connect("localhost","root","");
                                    mysqli_select_db("orderentry");
                                    ?>
                                    <?php 
                                    $sql=mysqli_query("SELECT * FROM category");
                                    while ($data=mysqli_fetch_array($sql)) {
                                    ?>
                                    <option value="<?=$data['cat_id']?>"><?=$data['cat_id']?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Foto</label>
                            <div class="col-lg-12">
                                <input type="file" id="userfile" name="userfile"/>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                     <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                 </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Ubah -->
@extends('karyawan.base')
	@section('content')
		<section class="content-header">
	        <h1>
	            Stock
	            <small>Lihat Persediaan</small>
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-shopping-cart"></i> Home</a></li>
	            <li class="active">Stock</li>
	        </ol>
    	</section>
    	<section class"content">
    		<div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tabel List Persediaan</h3>
                        <div class="box-tools">
                            <div class="input-group">
                                <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Item</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                            <tr>
                         </thead>
                         <tbody>
                         @foreach($stock as $isi)
                         	<tr>
                         	<td>{{$isi['id']}}</td>
                  				<td>{{$isi['nama_item']}}</td>
                  				<td>{{$isi['jumlah']}}/{{$isi['max_stock']}}</td>
                          <td>{{$isi['satuan']}}</td>
                  				<td>{{$isi['harga']}}</td>
                         	</tr>
                         @endforeach
                         </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
      	</div>
    	</section>

	@endsection
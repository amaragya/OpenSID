<script src="<?= base_url()?>assets/bootstrap/js/jquery.min.js"></script>
<script>
	$(document).ready(function()
	{
		<?php if ($layarpenuh==1):?>
			$('#box-full-screen').addClass("panel-fullscreen")
		<?php endif?>
		<?php if ($layarpenuh==2):?>
			$('#box-full-screen').removeClass("panel-fullscreen")
		<?php endif?>
	});
</script>
<script>
	$(function(){
		var op_item_width = (parseInt($('#op_item').width())/2-10);
		var label_width = (parseInt($('#op_item').width())/2)-42;
		// $('#op_item div').css('clear','both');
		// $('#op_item div').css('float','left');
		$('#op_item div').css('width',op_item_width);
		$('#op_item label').css('width',label_width);
		$('#op_item input:checked').parent().css({'background':'#c9cdff','border':'1px solid #7a82eb'});
		$('#op_item input').change(function()
		{
			if ($(this).is('input:checked'))
			{
				$('#op_item input').parent().css({'background':'#ffffff','border':'1px solid #ddd'});
				$('#op_item input:checked').parent().css({'background':'#c9cdff','border':'1px solid #7a82eb'});
				$(this).parent().css({'background':'#c9cdff','border':'1px solid #7a82eb'});
			}
			else
			{
				$(this).parent().css({'background':'#fafafa','border':'1px solid #ddd'});
			}
		});
		$('#op_item label').click(function()
		{
			$(this).prev().trigger('click');
		})
	});
</script>
<style>
	.form-horizontal .checkbox,
	.form-horizontal .checkbox-inline,
	.form-horizontal .radio,
	.form-horizontal .radio-inline
	{
			padding: 4px;
	}
	.panel-fullscreen
	{
		display: block;	z-index: 999999; position: fixed;	width: 100%;
		height: 100%;	top: 0;	right: 0;	left: 0;bottom: 0;overflow: auto;
	}
	#op_item div
	{
		margin:1px 0;
		background:#fafafa;
		border:1px solid #ddd;
	}
	#op_item input
	{
		vertical-align:middle;
		margin:0px 2px;
	}
	#op_item label
	{
		padding:4px 10px 0px 2px;
		font-size:11px;
		line-height:14px;
		font-weight:normal;
	}
	table.head
	{
		font-size:14px;
		font-weight:bold;
	}
	.atas {vertical-align: top;}
	.checkbox input[type="checkbox"],
	.checkbox-inline input[type="checkbox"],
	.radio input[type="radio"],
	.radio-inline input[type="radio"]
	{
    position: inherit;
	}
	#op_item div
	{
		margin:1px 0;
		background:#fafafa;
		border:1px solid #ddd;
	}
	#op_item input
	{
		vertical-align:middle;
		margin:0px 2px;
	}
	#op_item label
	{
		padding:4px 10px 0px 2px;
		font-size:11px;
		line-height:14px;
		font-weight:normal;
	}
	table.head
	{
		font-size:14px;
		font-weight:bold;
	}
	.atas {vertical-align: top;}
	.form-inline .form-control
	{
    width: 100%;
	}
	.form-horizontal .control-label {
    text-align: left;
	}
</style>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Input Data Sensus - <?= $analisis_master['nama']?></h1>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_desa')?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=site_url('analisis_master')?>"> Master Analisis</a></li>
			<li><a href="<?=site_url()?>analisis_respon/leave"><?= $analisis_master['nama']?></a></li>
			<li><a href="<?=site_url()?>analisis_respon">Data Sensus</a></li>
			<li class="active">Input Data</li>
		</ol>
	</section>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-4 col-lg-3">
					<?php $this->load->view('analisis_master/left',$data);?>
				</div>
				<div class="col-md-8 col-lg-9">
					<div id="box-full-screen" class="box box-info">
            <div class="box-header with-border">
						<?php if (isset($_SESSION['fullscreen'])):?>
							<a id="toggle-btn" href="<?= current_url()?>/2" class="btn btn-social btn-flat bg-navy btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
								<i class="fa fa-search-minus"></i>Normal
            	</a>
						<?php else: ?>
							<a id="toggle-expand-btn" href="<?= current_url()?>/1" class="btn btn-social btn-flat bg-navy btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
								<i class="fa fa-search-plus"></i>Full Screen
            	</a>
						<?php endif; ?>
							<a href="<?= site_url()?>analisis_respon" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left "></i> Kembali Ke Data Sensus</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-striped table-hover" >
														<tr>
															<td width="150">Form Pendataan</td>
															<td width="1">:</td>
														<td><a href="<?= site_url()?>analisis_master/menu/<?= $_SESSION['analisis_master']?>"><?= $analisis_master['nama']?></a></td>
														</tr>
														<tr>
															<td>Nomor Identitas</td>
															<td>:</td>
															<td><?= $subjek['nid']?></td>
														</tr>
														<tr>
															<td>Nama Subjek</td>
															<td>:</td>
															<td><?= $subjek['nama']?></td>
														</tr>
													</table>
												</div>
												<?php if ($list_anggota):?>
													<div class="table-responsive">
														<table class="table table-bordered dataTable table-hover nowrap">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th>No</th>
																<?php if ($analisis_master['id_child']!=0):?>
																		<th>Aksi</th>
																	<?php endif;?>
																<th>NIK</th>
																<th>Nama</th>
																	<th>Tanggal Lahir</th>
																	<th>Jenis Kelamin</th>
																</tr>
															</thead>
															<tbody>
																<?php $i=1; foreach ($list_anggota AS $ang): ?>
																	<tr>
																		<td><?= $i?></td>
																		<?php if ($analisis_master['id_child']!=0):?>
																			<td nowrap>
																				<a href="<?= site_url("analisis_respon/kuisioner_child/$p/$o/$id/$idc")?>" class="btn bg-purple btn-flat btn-sm"  title="Input Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="<?= $ang['nik']?> <?= $ang['nama']?>"><i class='fa fa-check-square-o'></i></a>
																			</td>
																		<?php endif;?>
																		<td><?= $ang['nik']?></td>
																		<td nowrap><?= $ang['nama']?></td>
																		<td nowrap><?= tgl_indo($ang['tanggallahir'])?></td>
																		<td><?php if ($ang['sex'] == 1):?>LAKI-LAKI<?php endif;?><?php if ($ang['sex'] == 2):?> PEREMPUAN<?php endif;?></td>
																	</tr>
															<?php $i++; endforeach; ?>
															</tbody>
														</table>
													</div>
												<?php endif; ?>
												<div class="table-responsive">
													<table class="table" >
														<?php $new=1;$last=0; foreach ($list_jawab AS $data):$data['no']="";?>
															<?php
																if ($data['id_kategori']!=$last OR $last == 0):
																	$new = 1;
																endif;
																if ($new == 1):?>
																	<tr>
																		<th colspan="2" class="bg-aqua"><strong><?= $data['kategori']?></strong></th>
																	</tr>
																	<?php
																		$new=0;
																		$last = $data['id_kategori'];
																endif;
															?>
															<tr>
																<td colspan="2"><label><?= $data['nomor']?> ) <?= $data['pertanyaan']?></label></td>
															</tr>
															<?php if ($data['id_tipe']==1):?>
																<tr>
																	<td width="35px;"></td>
																	<td class="col-xs-12 col-sm-6 pull-left">
																		<select class="form-control input-sm" name="kategori" onchange="formAction('mainform', '<?=site_url('analisis_indikator/kategori')?>')">
																			<option value="">Pilih Jawaban</option>
																			<?php foreach ($data['parameter_respon'] AS $data2):?>
																				<option value="<?= $data['id']?>.<?= $data2['id_parameter']?>" <?php if ($data2['cek']):?>selected<?php endif?>><?= $data2['kode_jawaban']?>. <?= $data2['jawaban']?></option>
																			<?php endforeach;?>
																		</select>
																	</td>
																</tr>
															<?php elseif ($data['id_tipe']==2):?>
																<tr>
																	<td></td>
																	<td id="op_item">
																		<?php foreach ($data['parameter_respon'] AS $data2):?>
																			<div class="checkbox">
																				<label>
																					<input name="cb[<?= $data2['id_parameter']?>_<?= $data['id']?>]" value="<?= $data['id']?>.<?= $data2['id_parameter']?>" <?php if ($data2['cek']):?> checked<?php endif;?> type="checkbox">
																					<?= $data2['kode_jawaban']?>. <?= $data2['jawaban']?>
																				</label>
																			</div>
																		<?php endforeach;?>
																	</td>
																</tr>
															<?php elseif ($data['id_tipe']==3):?>
																<div class="form-group">
																	<tr>
																		<td></td>
																		<td>
																			<?php if ($data['parameter_respon']):?>
																				<?php $data2=$data['parameter_respon'];?>
																				<input class="form-control input-sm" name="ia[<?= $data['id']?>]" value="<?= $data2['jawaban']?>" type="text">
																			<?php else:?>
																				<input class="form-control input-sm" name="ia[<?= $data['id']?>]" value="" type="text">
																			<?php endif;?>
																		</td>
																	</tr>
																</div>
															<?php elseif ($data['id_tipe']==4):?>
																<div class="form-group">
																	<tr>
																		<td></td>
																		<td>
																			<?php if ($data['parameter_respon']):?>
																				<?php $data2=$data['parameter_respon'];?>
																				<textarea id="it[<?= $data['id']?>]" name="it[<?= $data['id']?>]" class="form-control input-sm" style="width:100%"><?= $data2['jawaban']?></textarea>
																			<?php else:?>
																				<textarea id="it[<?= $data['id']?>]" name="it[<?= $data['id']?>]" class="form-control input-sm" style="width:100%"></textarea>
																			<?php endif;?>
																		</td>
																	</tr>
																</div>
															<?php endif;?>
														<?php endforeach;?>
												</table>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<label class="control-label" for="upload">Unggah Berkas Form Pendataan</label>
													<div class="input-group input-group-sm">
														<input type="text" class="form-control" id="file_path">
														<input id="file" type="file" class="hidden" name="pengesahan">
														<span class="input-group-btn">
															<button type="button" class="btn btn-info btn-flat"  id="file_browser"><i class="fa fa-search"></i> Browse</button>
														</span>
													</div>
													<p><label class="control-label">*) Format file harus *.jpg</label></p>
													<p><label class="control-label">*) Berkas form pendataan digunakan sebagai penguat / bukti pendataan maupun untuk verifikasi data yang sudah terinput.</label></p>
													<p><label class="control-label">*) Berkas Bukti / pengesahan harus berupa file gambar dengan format .jpg, dengan ukuran maksimal 1 Mb (1 megabyte)</label></p>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
					<div class='box-footer'>
						<div class='col-xs-12'>
							<button type='reset' class='btn btn-social btn-flat btn-danger btn-sm' ><i class='fa fa-times'></i> Batal</button>
								<button type='submit' class='btn btn-social btn-flat btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>


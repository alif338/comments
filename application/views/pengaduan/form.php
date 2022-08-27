<div class="row">
	<div class="col-12">
		<div class="card">
			<form action="#" id="form-pengaduan" method="post" enctype="multipart/form-data">
				<div class="card-header">
					<div class="card-title">Form Pengaduan</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-12 col-lg-3">
									<label for="inlineinput" class="col-form-label" style="text-align:left !important; display: block;">
										Kolom Konten / Aduan	
									</label>
									<em class="text-danger text-small">*Keterangan aduan perihal permasalahan</em>
								</div>
								<div class="col-12 col-lg-6">
									<input type="text" required class="form-control input-full" id="aduan-perihal" placeholder="Perihal Pengaduan">
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-12 col-lg-3">
									<label for="inlineinput" class="col-form-label" style="text-align:left !important; display: block;">
										Tanggal Pengaduan	
									</label>
									<em class="text-danger text-small">*Tanggal dilakukannya pengaduan</em>
								</div>
								<div class="col-12 col-lg-4">
									<input type="date" id="aduan-tanggal" required class="form-control input-full" id="inlineinput" placeholder="Tanggal Pengaduan">
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-12 col-lg-3">
									<label for="inlineinput" class="col-form-label" style="text-align:left !important; display: block;">
										PIC	
									</label>
									<em class="text-danger text-small">*Penanggung jawab terkait permasalahan</em>
								</div>
								<div class="col-12 col-lg-6">
									<input type="text" required id="aduan-pic" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-12 col-lg-3">
									<label for="inlineinput" class="col-form-label" style="text-align:left !important; display: block;">
										Pemohon	
									</label>
								</div>
								<div class="col-12 col-lg-6">
									<select required id="aduan-pemohon" class="form-control">
										<option value="<?= INDV ?>"><?= INDV ?></option>
										<option value="<?= HUKUM ?>"><?= HUKUM ?></option>
										<option value="<?= KELOMPOK ?>"><?= KELOMPOK ?></option>
									</select>
								</div>
							</div>
						</div>
					
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-12 col-lg-3">
									<label for="inlineinput" class="col-form-label" style="text-align:left !important; display: block;">
										Media	
									</label>
									<em class="text-danger text-small">*Media yang digunakan untuk pengaduan</em>
								</div>
								<div class="col-12 col-lg-6">
									<div class="selectgroup selectgroup-secondary selectgroup-pills d-flex flex-column">
										<div class='radio-group d-flex mb-2'>
											<?php
											$i = 0;
											foreach($media as $val){
												?>
											<label class="selectgroup-item">
												<input type="radio" name="icon-input" value="<?= $val->media_id; ?>" class="selectgroup-input" <?= $i == 0 ? "checked" : "" ?>>
												<span  data-toggle="tooltip" data-placement="top" title="<?= $val->media_nama ?>" class="selectgroup-button selectgroup-button-icon">
													<i class="<?= $val->media_icon; ?>"></i>
												</span>
											</label>
											<?php
												$i++;
											}
											?>
										</div>
										<input type="text" placeholder="link profile" required id="sosmed-link" class="form-control mt-1">
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-12 col-lg-3">
								</div>
								<div class="col-12 col-lg-6">
									<select class="form-control" id="aduan-fitur">
										<option value="<?= KOMENTAR ?>"><?= KOMENTAR ?></option>
										<option value="<?= DM ?>"><?= DM ?></option>
										<option value="<?= LAINNYA ?>"><?= LAINNYA ?></option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-12 col-lg-3">
									Gambar<br>
									<em class="text-danger text-small">*Rekomendasi ukuran : <b>640px X 426px</b></em>
								</div>
								<div class="col-12 col-lg-6">
									<input type="file" accept="image/png, image/jpeg, , image/jpg" required id="aduan-gambar" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-12 col-lg-3">
									Keterangan
								</div>
								<div class="col-12 col-lg-6">
									<textarea id="aduan-keterangan" placeholder="Keterangan lain" class="form-control" rows="6" style="width: 100%;"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="reset" class="btn btn-warning ml-2">Bersihkan</button>
					<button onclick="history.back()" class="btn btn-default ml-2">Kembali</button>
				</div>
			</form>
		</div>
	</div>
</div>
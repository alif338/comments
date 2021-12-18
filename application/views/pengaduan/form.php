<div class="row">
	<div class="col-12">
		<div class="card">
			<form action="#" id="form-pengaduan" enctype="multipart">
				<div class="card-header">
					<div class="card-title">Form Pengaduan</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-3">
									<label for="inlineinput" class="col-form-label" style="text-align:left !important; display: block;">
										Kolom Konten / Aduan	
									</label>
									<em class="text-danger text-small">*Keterangan aduan perihal permasalahan</em>
								</div>
								<div class="col-6">
									<input type="text" required class="form-control input-full" id="aduan-perihal" placeholder="Perihal Pengaduan">
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-3">
									<label for="inlineinput" class="col-form-label" style="text-align:left !important; display: block;">
										Tanggal Pengaduan	
									</label>
									<em class="text-danger text-small">*Tanggal dilakukannya pengaduan</em>
								</div>
								<div class="col-4">
									<input type="date" id="aduan-tanggal" required class="form-control input-full" id="inlineinput" placeholder="Tanggal Pengaduan">
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-3">
									<label for="inlineinput" class="col-form-label" style="text-align:left !important; display: block;">
										PIC	
									</label>
									<em class="text-danger text-small">*Penanggung jawab terkait permasalahan</em>
								</div>
								<div class="col-6">
									<select required id="aduan-pic" class="form-control">
										<?php
											foreach($pic as $value){
												echo "<option value='{$value->pic_id}'>{$value->pic_nama}</option>";
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-3">
									<label for="inlineinput" class="col-form-label" style="text-align:left !important; display: block;">
										Pemohon	
									</label>
								</div>
								<div class="col-6">
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
								<div class="col-3">
									<label for="inlineinput" class="col-form-label" style="text-align:left !important; display: block;">
										Media	
									</label>
									<em class="text-danger text-small">*Media yang digunakan untuk pengaduan</em>
								</div>
								<div class="col-6">
									<div class="selectgroup selectgroup-secondary selectgroup-pills">
										<label class="selectgroup-item">
											<input type="radio" name="icon-input" value="1" class="selectgroup-input" checked="">
											<span class="selectgroup-button selectgroup-button-icon">
												<i class="fab fa-twitter" data-toggle="tooltip" data-placement="top" title="Twitter"></i>
											</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="icon-input" value="2" class="selectgroup-input">
											<span class="selectgroup-button selectgroup-button-icon">
												<i class="fab fa-instagram" data-toggle="tooltip" data-placement="top" title="Instagram"></i>
											</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="icon-input" value="3" class="selectgroup-input">
											<span class="selectgroup-button selectgroup-button-icon">
												<i class="fab fa-facebook" data-toggle="tooltip" data-placement="top" title="Facebook"></i>
											</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="icon-input" value="4" class="selectgroup-input">
											<span class="selectgroup-button selectgroup-button-icon">
												<i class="fas fa-grip-horizontal" data-toggle="tooltip" data-placement="top" title="Lainnya"></i>
											</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group form-inline">
								<div class="col-3">
								</div>
								<div class="col-6">
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
								<div class="col-3">
									Gambar
								</div>
								<div class="col-6">
									<input type="file" id="aduan-gambar" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="reset" class="btn btn-default">Bersihkan</button>
				</div>
			</form>
		</div>
	</div>
</div>
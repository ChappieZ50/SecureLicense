<?php get_header(); ?>
    <main class="page-content">
        <div class="container-fluid p-0">
			<?php
			if ( isset( $insert ) ) {
				if ( isset( $insert['success'] ) ) {
					echo $insert['text'];
					/*header( "Refresh:2;url=" . URL . "licenses/" );*/
				} else {
					echo $insert;
				}
			}
			if ( isset( $edit ) && ! empty( $edit ) ) {
				echo $edit;
				/*header( "Refresh:1.5" );*/
			}
			?>
            <h3>Lisans Ekle</h3>
            <hr>
            <div class="sl-add-license col-lg-8 col-md-10 col-sm-12">
				<?php if ( ! get( "edit" ) ): ?>
                    <form action="<?= URL . 'add-license' ?>" method="POST">
                        <div class="form-group row">
                            <label for="domain" class="col-sm-2 col-form-label">Alan Adı: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-1" id="domain" name="domain">
                                <span class="note">http https www</span> olmadan giriniz. <span style="color:green"> örn( domain.com, domain.org ) </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end-date" class="col-2 col-form-label">Bitiş Tarihi</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="end-date" name="end_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="button button-inline button-primary button-small" name="submit" value="Lisans Ekle">
                            </div>
                        </div>
                    </form>
				<?php else: ?>
					<?php if ( isset( $license["success"] ) ): ?>
						<?php foreach ( $license['data'] as $data ): ?>
                            <form action="<?= URL . 'add-license/?edit='.get('edit') ?>" method="POST">
                                <div class="form-group row">
                                    <label for="domain" class="col-sm-2 col-form-label">Alan Adı: </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control mb-1" id="domain" name="domain" value="<?=$data['sl_domain']?>">
                                        <span class="note">http https www</span> olmadan giriniz. <span style="color:green"> örn( domain.com, domain.org ) </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end-date" class="col-2 col-form-label">Bitiş Tarihi</label>
                                    <div class="col-10">
                                        <input class="form-control" type="date" id="end-date" name="end_date" value="<?=$data['sl_end_date'] == '1970-01-01 00:00:00' ? null :custom_date_format($data['sl_end_date'],'Y-m-d');?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="submit" class="button button-inline button-primary button-small" name="update_submit" value="Güncelle">
                                    </div>
                                </div>
                            </form>
						<?php endforeach; ?>
					<?php else: ?>
						<?= $license ?>
					<?php endif; ?>
				<?php endif; ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
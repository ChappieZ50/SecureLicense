<?php get_header(); ?>
    <main class="page-content">
        <div class="container-fluid p-0">
            <h3>Profil</h3>
            <hr>
			<?= isset( $msg ) ? $msg : null ?>
            <div class="sl-add-license col-lg-8 col-md-10 col-sm-12">
				<?php if ( isset( $get_profile ) && ! empty( $get_profile ) ): ?>
                <?php foreach($get_profile as $data): ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Adınız: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-1" id="firstname" name="name" value="<?=$data['sl_firstname']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-2 col-form-label">Soyadınız: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-1" id="last_name" name="last_name" value="<?=$data['sl_lastname']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site_name" class="col-sm-2 col-form-label">Site Adı: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-1" id="site_name" name="site_name" value="<?=$data['sl_site_name']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="userimg" class="col-sm-2 col-form-label">Fotoğraf: </label>
                            <div class="col-sm-10">
                                <input type="file" id="userimg" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="button button-inline button-primary button-small" name="submit" value="Kaydet">
                            </div>
                        </div>
                    </form>
					<?php endforeach; ?>
				<?php else: ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-2 col-form-label">Adınız: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-1" id="firstname" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-2 col-form-label">Soyadınız: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-1" id="last_name" name="last_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site_name" class="col-sm-2 col-form-label">Site Adı: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-1" id="site_name" name="site_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="userimg" class="col-sm-2 col-form-label">Fotoğraf: </label>
                            <div class="col-sm-10">
                                <input type="file" id="userimg" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="button button-inline button-primary button-small" name="submit" value="Kaydet">
                            </div>
                        </div>
                    </form>
				<?php endif; ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
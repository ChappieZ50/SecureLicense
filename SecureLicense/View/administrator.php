<?php get_header(); ?>
    <main class="page-content">
        <div class="container-fluid p-0">
            <h3>Yönetici</h3>
            <hr>
	        <?= isset( $update_admin ) ? $update_admin : null ?>
            <div class="sl-add-license col-lg-8 col-md-10 col-sm-12">
				<?php foreach ( $get_admin as $data ): ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Kullanıcı Adı: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-1" id="username" name="username" value="<?= $data['sl_username'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Şifre: </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control mb-1" id="password" name="password" value="#password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="button button-inline button-primary button-small" name="submit" value="Kaydet">
                            </div>
                        </div>
                    </form>
				<?php endforeach; ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
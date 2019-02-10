<?php get_header();?>
    <main class="page-content">
        <div class="container-fluid p-0">
            <h3>Sorgulanmış Lisanslar</h3>
            <hr>
	        <?php
	        if(isset($delete) &&  !empty($delete)){
		        echo $delete;
		        header("Refresh: 1.5; url=".URL."licenses/");
	        }
	        ?>
	        <?php if ( isset( $licenses ) && $licenses != false ): ?>
                <div class="sl-licenses-table">
                    <table class="mdl-data-table mdl-shadow--2dp col-xl-10 col-md-12 mx-auto">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Alan Adları</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
				        <?php foreach ( $licenses['licenses'] as $license ): ?>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric"><?= $license["sl_domain"] ?></td>
                                <td><?= custom_date_format( $license["sl_start_date"], "Y.m.d" ) ?></td>
                                <td><?= $license["sl_end_date"] == "1970-01-01 00:00:00" ? "Süresiz" : custom_date_format( $license["sl_end_date"], "Y.m.d" ) ?></td>
                                <td>
                                    <a href="<?=URL.'add-license/?edit='.$license['id']?>"><i class="fas fa-pen-square fa-2x edit_license"></i></a>
                                    <a href="?delete=<?=$license['id']?>" onClick="confirm('Bu lisansı silmek istediğinizden emin misin?')"><i class="fas fa-times-circle fa-2x delete_license"></i></a>
                                </td>
                            </tr>
				        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
		        <?php
		        $paginate = pagination( $licenses['per_page'] ,$licenses['page']);
		        foreach ( $paginate as $write ) {
			        echo $write;
		        }
		        ?>
	        <?php else: ?>
                <div class="no-license text-center" style="display:block;"><h5>Ekli bir lisans bulunamadı</h5></div>
	        <?php endif; ?>
            <div class="clearfix"></div>
        </div>
    </main>
<?php get_footer();?>
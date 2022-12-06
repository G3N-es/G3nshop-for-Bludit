<!-- Begin Site Title
================================================== -->
<div class="container">
	<!-- Begin List Posts DOMAIN_CATEGORIES
	================================================== -->
	<section class="recent-posts row">
		
		<div class="section-title col-12">
			<h2><span>
					<a href="<?php echo DOMAIN_CATEGORIES.$catecoriaG3Nshop; ?>">
						<?php echo $NcategoriaG3Nshop; ?>
					</a>
				<?php if ($WHERE_AM_I=='tag') {
					if ((strpos($url->slug(), "p-") !== false) || (strpos($url->slug(), "c-") !== false) || (strpos($url->slug(), "t-") !== false) ){
						if(strpos($url->slug(), "p-") !== false){ $tipoMoneda=" ".$moneda;}
						echo "/".ucwords(substr($url->slug(), 2)).$tipoMoneda;
					}else{
					echo "/".ucwords($url->slug());
					}
				} ?>	
				</span>
			</h2>
		</div>
		
		<?php include(THEME_DIR_PHP.'side-filters.php'); ?>
		
		<div class="card-columns listrecent col-md-9 col-xs-12">
			<?php if (empty($content)) { $language->p('No pages found'); } ?>
			<?php foreach ($content as $page):
					$getTienda="";
					if (strpos($page->tags(), "{") !== false ){ $getTienda="?GS"; }
			?>
			<!-- begin post -->
			<div class="card">
				<a href="<?php echo $page->permalink(); ?>">
					<div style="background-image:url(<?php echo ($page->coverImage()?$page->coverImage():Theme::src('img/noimage.png')) ?>); background-size: cover; background-position: center; width:100%; height:250px;"></div>
				</a>
				<div class="card-block p-3">
					<h2 class="card-title"><a href="<?php echo $page->permalink(); ?>"><?php echo $page->title(); ?></a></h2>
					<h4 class="card-text"><?php echo (empty($page->description())?$language->p('Complete the description of the article'):$page->description()) ?></h4>
					<div class="metafooter">
						<div class="wrapfooter">
							<!-- Begin Tags -->
								<?php include(THEME_DIR_PHP.'tags-bucle.php'); ?>
							<!-- End Tags -->
						</div>
					</div>
				</div>
			</div>
			<!-- end post -->
			<?php endforeach ?>

		</div>
	</section>
	<!-- End List Posts
	================================================== -->

	<?php if (Paginator::numberOfPages()>1): ?>
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			<?php if (Paginator::showPrev()): ?>
			<li class="page-item"><a class="page-link" href="<?php echo Paginator::previousPageUrl() ?>" tabindex="-1">&#9664; <?php $language->p('Previous page') ?></a></li>
			<?php endif ?>

			<?php if (Paginator::showNext()): ?>
			<li class="page-item"><a class="page-link" href="<?php echo Paginator::nextPageUrl() ?>"><?php $language->p('Next page') ?> &#9658;</a></li>
			<?php endif ?>
		</ul>
	</nav>
	<?php endif ?>



<!-- Begin Site Title
================================================== -->
<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle"><?php echo $site->title(); ?></h1>
		<p class="lead"><?php echo $site->description(); ?></p>
	</div>
<!-- End Site Title
================================================== -->
</div>
<div class="sticky destacadosPortada jumbotron">
	
	<!-- Begin Featured
	================================================== -->
	<section class="featured-posts container">

	<div class="card-columns listfeaturedtag">

		<?php
			// Get the first and second page from the content
			$featured = array_slice($content, 0, 2);
			$content = array_slice($content, 2);
			foreach ($featured as $page):
				$getTienda="";
				if (strpos($page->tags(), "{") !== false ){ $getTienda="?GS"; }
		?>
		<!-- begin post -->
		<div class="card">
			<div class="row">
				<div class="col-md-5 wrapthumbnail">
					<a href="<?php echo $page->permalink(); ?>">
						<div class="thumbnail" style="background-image:url(<?php echo ($page->coverImage()?$page->coverImage():Theme::src('img/noimage.png')) ?>);"></div>
					</a>
				</div>
				<div class="col-md-7">
					<div class="card-block">
						<h2 class="card-title"><a href="<?php echo $page->permalink(); ?>"><?php echo $page->title(); ?></a></h2>
						<h4 class="card-text"><?php echo (empty($page->description())?'Complete the description of the article for a correct work of the theme':$page->description()) ?></h4>
						
					</div>
				</div>
			</div>
		</div>
		<!-- end post -->
		<?php endforeach ?>

	</div>
	</section>
</div>
	<!-- End Featured
	================================================== -->
<div class="container">
<?php
    $items = getCategories();

    foreach ($items as $category) {
    
?>	

	<!-- Begin List Posts
	================================================== -->
	<section class="recent-posts row">
		
		<div class="section-title col-12">
			<h2><span>
				<a href="<?php echo $category->permalink(); ?>"><?php echo $category->name() ?></a>
				</span>
			</h2>
		</div>
		

		<div class="card-columns listrecent col-md-12 col-xs-12">
			
		<?php	foreach ($category->pages() as $pageKey) {
					$getTienda="";
					$conT++;
					$page = new Page($pageKey);
					if($category->key() == $catecoriaG3Nshop){$getTienda="?GS";}else{$getTienda="";}
					if($conT === 4 ){ $conT = 0; break; }
					
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
			<?php  } ?>

		</div>
	</section>
	<!-- End List Posts
	================================================== -->
	<?php } ?>




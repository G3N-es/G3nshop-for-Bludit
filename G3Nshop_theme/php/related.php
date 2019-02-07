	<!-- Begin relacionados
	================================================== -->
	<section class="recent-posts relacionados">
<hr>
	<div class="section-title">
		<h4><small><?php echo $language->p('relacionados') ?></small></h4>
	</div>
	<div class="card-columns listrecent">
<?php
		$tagDeRelacion = $tagKey;
		$tagRelacionadas = getTag($tagDeRelacion);
		$relacionadas = $tagRelacionadas->pages();
?>
		<?php foreach ($relacionadas as $pageKey):
			$pageRelacionada = new Page($pageKey);
			if ($pageRelacionada->permalink() !== $page->permalink()){
?>
		<!-- begin post -->
		<div class="card">
			<a href="<?php echo $pageRelacionada->permalink(); ?>">
				<img alt="G3N <?php echo $pageRelacionada->title(); ?>" title="G3N <?php echo $pageRelacionada->title(); ?>" class="img-fluid" src="<?php echo ($pageRelacionada->coverImage()?$pageRelacionada->coverImage():Theme::src('img/noimage.png')) ?>" alt="">
			</a>

			<div class="card-block p-3">
			<h2 class="card-title"><a href="<?php echo $pageRelacionada->permalink(); ?>"><?php echo $pageRelacionada->title(); ?></a></h2>				
			<?php if (!empty($pageRelacionada->tags(true))): ?>
			<div class="after-post-tags">
				<ul class="tags">
					<?php foreach ($pageRelacionada->tags(true) as $tagKey=>$tagName):
							
							if (strpos($tagName, "{") !== false ){
								
								if (strpos($tagName, "P{") !== false ){
									$tagName= substr(trim($tagName), 2)." ".$moneda;
									$liclass= 'precio';
								}
								if (strpos($tagName, "T{") !== false ){
									$tagName= substr(trim($tagName), 2);
									$liclass= 'talla';	
								}
								if (strpos($tagName, "C{") !== false ){
									$tagName= substr(trim($tagName), 2);
									$liclass= 'producto-color-'.$tagName;
								}
											
							}else{
								$liclass=$tagKey;
							}
					?>
					<li class="<?php echo $liclass ?>" ><a href="<?php echo DOMAIN_TAGS.$tagKey.$getTienda ?>"><?php echo $tagName; ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
			<?php endif; ?>
			
			</div>
		</div>
		<!-- end post -->
		<?php } endforeach ?>

	</div>
	</section>

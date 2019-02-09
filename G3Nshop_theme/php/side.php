<!-- Begin Filtros -->
		<div class="col-md-3 col-xs-12 lateral">
			<!-- Begin Tags -->

			<div class="after-post-tags">
				
				<h4><?php echo $language->p('tags'); ?></h4>
				<div class="after-post-tags">
					<ul class="tags">
						<?php foreach ($etiquetasBlog as $tagKey=>$tagName): ?>
						<li><a href="<?php echo DOMAIN_TAGS.$tagKey ?>"><?php echo $tagName; ?></a></li>
						<?php endforeach ?>
					</ul>
				</div>
				
			</div>
			<?php Theme::plugins('siteSidebar') ?>
		</div>
<!-- End Filtros -->

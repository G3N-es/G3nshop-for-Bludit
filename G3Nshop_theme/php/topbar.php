<!-- Begin Nav
================================================== -->

<nav class="fixed-top mediumnavigation pt-1">

<div class="container">
	
	<div class="row">

		<!-- Begin Menu -->
		<ul class="nav menu-arriba">		
			<li class="nav-item">
                <a class="navbar-brand" href="<?php echo $site->url(); ?>">
                    <img src="<?php echo Theme::src('img/logo.png'); ?>" title="Volver a Portada G3N.es | TecnoCreaciones + Marketing y Comunicación" alt="G3N.es | Diseño Web | Desarrollo APP">
                </a>
            </li>
            <!-- Categorias -->
            
            <?php if(array_key_exists($catecoriaG3Nshop, $categories->db)){
				$category = new Category($catecoriaG3Nshop);
			?>
			<li class="nav-item g3nshop<?php echo (($getTienda === "?GS") ? ' active' :'') ?>" >
				<a title="<?php echo $category->description(); ?>" class="nav-link <?php $category->name(); ?>" href="<?php echo DOMAIN_CATEGORIES.$catecoriaG3Nshop; ?>"><?php echo $category->name(); ?></a>
			</li>
			<?php } ?>
			<?php foreach ($categories->db as $key=>$fields){ ?>
				<?php if ($key !== $catecoriaG3Nshop){ ?>
			<li class="nav-item <?php echo (($getTienda === "" && ($url->slug()==$key)) ? 'active' :'') ?>" >
				<a title="<?php echo $fields['description']; ?>" class="nav-link <?php echo $fields['name']; ?>" href="<?php echo DOMAIN_CATEGORIES.$key; ?>"><?php echo $fields['name']; ?></a>
			</li>
				<?php } ?>
			<?php } ?>
			<?php if (pluginActivated('pluginSearch')): ?>
			<li class="nav-item buscador">
				<div class="form-inline my-2 my-lg-0">
					<input id="search-input" class="form-control mr-sm-2" type="text" placeholder="Search">
					<span onClick="searchNow()" class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>
					<script>
						function searchNow() {
							var searchURL = "<?php echo Theme::siteUrl(); ?>search/";
							window.open(searchURL + document.getElementById("search-input").value, "_self");
						}
						var elem = document.getElementById('search-input');
						elem.addEventListener('keypress', function(e){
							if (e.keyCode == 13) {
								searchNow();
							}
						});
					</script>
				</div>
			</li>
		<?php endif ?>
			
		</ul>
		<!-- End Menu -->
		

	</div>
</div>
</nav>
<!-- End Nav
================================================== -->

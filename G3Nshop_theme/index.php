<!DOCTYPE html>
<html lang="<?php echo Theme::lang() ?>">
<head>
<?php include(THEME_DIR_PHP.'head.php'); ?>
</head>
<body>

	<!-- Load Bludit Plugins: Site Body Begin -->
	<?php Theme::plugins('siteBodyBegin'); ?>

	<!-- Navbar -->
	<?php include(THEME_DIR_PHP.'topbar.php'); ?>

	<!-- Content -->
	<?php
		
		if ($WHERE_AM_I == 'page') {
			if ($page->template() !== ""){
				$PageTemplate = $page->template();
			}else{
				$PageTemplate = "page";
			}

		}
		if ($WHERE_AM_I == 'home') {
				$PageTemplate = "home";
		}
		if ($WHERE_AM_I == 'category' || $WHERE_AM_I == 'tag' || $WHERE_AM_I == 'search') {
				$PageTemplate = "category";
				if ($WHERE_AM_I == 'tag') {
					//categoría asociada al tag segun contenido
					$tagActual = new Tag($url->slug());
					foreach ($tagActual->pages() as $pageKey) {
						$paginaDelTag = new Page($pageKey);
						$arrayPaginaDelTag = (array) $paginaDelTag;
						$nombreCategoriaTag = $paginaDelTag->category();
						foreach ($arrayPaginaDelTag as $id => $contenido){
							$arrayPaginaDelTag= $arrayPaginaDelTag[$id];
						}
						$enlaceCategoriaTag = $arrayPaginaDelTag['category'];
						break;
					}
					
				}
		}
		if (pluginActivated('pluginG3Nshop')){
			
			$pluginG3Nshop=new  pluginG3Nshop();
			if ( $pluginG3Nshop->getValue('modoPruebas') === "1" ){
				$urlPaypal ="https://www.sandbox.paypal.com/cgi-bin/webscr";
			}else{
				$urlPaypal ="https://www.paypal.com/cgi-bin/webscr";
			}
			$cuentaPaypal = $pluginG3Nshop->getValue('cuentaPaypal');
			$catecoriaG3Nshop= $pluginG3Nshop->getValue('categoria');
			$moneda= $pluginG3Nshop->getValue('moneda');
			
			//Crear Filtro de tags para la tienda
			
			//Obtenemos todos los tags de la tienda en un listado separado por comas
			$items = $pages->getList(1, -1, true);
			foreach ($items as $key) {
				// buildPage function returns a Page-Object
				$pagina =  buildPage($key);
				
				$arrayPagina= (array) buildPage($key);
				foreach($arrayPagina as $id => $contenido){
					$arrayPagina = $arrayPagina[$id];
				}
				
				//Si son de la categoria de la tienda
				if($catecoriaG3Nshop===$arrayPagina['category']){
					$etiquetasTienda.= $pagina->tags().", ";
					$NcategoriaG3Nshop=$pagina->category();
				}
			}
			$etiquetasTienda= substr($etiquetasTienda, 0, -2);
			
			//Recorremos las tags generales y si se encuentran en el listado tienda creamos un array con ellos
			
			    $items = getTags();
				foreach ($items as $tag) {
					// Each tag is an Tag-Object
					if (strpos($etiquetasTienda, $tag->name()) !== false ){
						//los repartimos por Etiquetas, Color, Precios, Tallas
						if (strpos($tag->name(), "{") !== false ){
							if (strpos($tag->name(), "P{") !== false ){
								$filtrosPrecio[$tag->key()]= substr($tag->name(), 2);
							}
							if (strpos($tag->name(), "T{") !== false ){
								$filtrosTalla[$tag->key()]= substr($tag->name(), 2);
							}
							if (strpos($tag->name(), "C{") !== false ){
								$filtrosColor[$tag->key()]= substr($tag->name(), 2);
							}
						}else{
							$filtrosEtiqueta[$tag->key()]= $tag->name();
						}
					}else{
						$etiquetasBlog[$tag->key()]=$tag->name();
					}
				}
			
			
			if ($WHERE_AM_I=='category') {
				
				$NombreCategoriaActual= $url->slug();
				
				if ($NombreCategoriaActual==$catecoriaG3Nshop){
					$PageTemplate = "shop";
				}
			}
			if (($WHERE_AM_I == 'category' || $WHERE_AM_I == 'tag') && isset ($_GET['GS'])) {
				$PageTemplate = "shop";
				
			}
			if ($WHERE_AM_I == 'page') {
				if ($page->template() !== ""){
					$PageTemplate = $page->template();
				}else{
					$PageTemplate = "page";
				}
				$DatospaginaActual= $page;
				$arrayPagina= (array) $DatospaginaActual;
				foreach($arrayPagina as $id => $contenido){
					$arrayPagina = $arrayPagina[$id];
				}
				if($catecoriaG3Nshop === $arrayPagina['category']){
					$PageTemplate = "product";
					
				}else{
					$PageTemplate = "page";
				}
			}
			if($PageTemplate === "product" || $PageTemplate === "shop"){$getTienda="?GS";}else{$getTienda="";}
		}	
		include(THEME_DIR_PHP.$PageTemplate.'.php');
	?>
	
	<!-- Footer -->
	<?php include(THEME_DIR_PHP.'footer.php'); ?>
	
	<!-- Javascript -->
	<?php
		// Include Jquery file from Bludit Core
		echo Theme::jquery();
		echo Theme::js('js/tether.min.js');

		// Include javascript Bootstrap file from Bludit Core
		echo Theme::jsBootstrap();
	if (pluginActivated('pluginG3Nshop')){	
		echo Theme::js('js/minicart.min.js');
	}	
		echo Theme::js('js/ie10-viewport-bug-workaround.js');
	?>

	<!-- Load Bludit Plugins: Site Body End -->
	<?php Theme::plugins('siteBodyEnd'); ?>
	<?php if (pluginActivated('pluginG3Nshop')){ ?>
	<script>
        paypal.minicart.render({
        	action: '<?php echo $urlPaypal; ?>',
        	//styles: '', (para incluir estilos propios)
       		strings: {
        		button: '<?php echo $language->p("pague-con"); ?> <img src="<?php echo Theme::src('img/'); ?>PP_logo_h_100x26.png" width="100" height="26" alt="PayPal" />',
              	subtotal: 'Total:',
              	empty: '<?php echo $language->p("el-carrito-esta-vacio"); ?>'
    		}  
        });
    </script>
    <script>
		$('#filtroOnOf').click(function(){
			$('#caja-de-filtros').toggle('slow');;
		});
	</script>
	<?php } ?>
</body>
</html>

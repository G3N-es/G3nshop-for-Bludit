<!-- Begin Filtros -->
		<div class="col-md-3 col-xs-12 filtros">
			<!-- Begin Tags -->

			<div class="after-post-tags">
				<?php if (pluginActivated('pluginG3Nshop')): ?>
		
			<div class="pb-3">
				<form action="<?php echo $urlPaypal; ?>" method="post" id="viewButton">
					<fieldset>
						<input type="hidden" name="business" value="<?php echo $cuentaPaypal; ?>" />
						<input type="hidden" name="cmd" value="_cart" />
						<input type="hidden" name="display" value="1" />
						<button type="submit" name="submit" value="<?php echo $language->p('carrito'); ?>" class="btn btn-success form-control" >± <?php echo $language->p('carrito'); ?></button>
					</fieldset>
				</form>
			</div>
		
		<?php endif ?>
				<h4><?php echo $language->p('tags'); ?></h4>					
				<ul class="tags tienda">
				<?php foreach ($filtrosEtiqueta as $tagKey=>$tagName):?>
					<li class="tienda" ><a href="<?php echo DOMAIN_TAGS.$tagKey."?GS" ?>"><?php echo $tagName; ?></a></li>
				<?php endforeach ?>
				</ul>
				
				<h4><?php echo $language->p('precios'); ?></h4>	
				<ul class="tags precios">
			<?php	ksort($filtrosPrecio);
					foreach ($filtrosPrecio as $tagKey=>$tagName):?>
					<li class="precio" ><a href="<?php echo DOMAIN_TAGS.$tagKey."?GS" ?>"><?php echo $tagName." ".$moneda; ?></a></li>
			<?php endforeach ?>
				</ul>
				
				<h4><?php echo $language->p('tallas'); ?></h4>	
				<ul class="tags tallas">
				<?php foreach ($filtrosTalla as $tagKey=>$tagName):?>
					<li class="talla" ><a href="<?php echo DOMAIN_TAGS.$tagKey."?GS" ?>"><?php echo $tagName; ?></a></li>
				<?php endforeach ?>
				</ul>
				
				<h4><?php echo $language->p('colores'); ?></h4>	
				<ul class="tags colores">
				<?php foreach ($filtrosColor as $tagKey=>$tagName):?>
					<li class="producto-color-<?php echo $tagName?>" ><a href="<?php echo DOMAIN_TAGS.$tagKey."?GS" ?>"><?php echo $tagName; ?></a></li>
				<?php endforeach ?>
				</ul>
				
			</div>
		</div>
<!-- End Filtros -->

<!-- Begin Filtros -->
		<div class="col-md-3 col-xs-12 filtros">
			<!-- Begin Tags -->

		   <div class="tags sidebar">
				<?php if (pluginActivated('pluginG3Nshop')): ?>
		
			<div class="pb-3">
				<form action="<?php echo $urlPaypal; ?>" method="post" id="viewButton">
					<fieldset>
						<input type="hidden" name="business" value="<?php echo $cuentaPaypal; ?>" />
						<input type="hidden" name="cmd" value="_cart" />
						<input type="hidden" name="display" value="1" />
						<button style="width:100%; font-size:18px; font-weight: bold" type="submit" name="submit" value="<?php echo $language->p('carrito'); ?>" class="btn btn-success form-control" ><?php echo $language->p('carrito'); ?> ±</button>
					</fieldset>
				</form>
			</div>
		
		<?php endif ?>
			<div class="pb-3">
				<button style="width:100%; font-size:18px; font-weight: bold" id="filtroOnOf" class="btn btn-secondary" ><?php echo $language->p('filtros'); ?> ⬍</button>
			</div>

			<div id="caja-de-filtros">
			<?php if(empty($filtrosEtiqueta) === false ){ ?>
				<h4><?php echo $language->p('tags'); ?></h4>					
				<ul class="tags genericas">
				<?php foreach ($filtrosEtiqueta as $tagKey=>$tagName):?>
					<li class="<?php echo $tagKey; if($url->slug() === $tagKey) echo " active"; ?>" ><a href="<?php echo DOMAIN_TAGS.$tagKey."?GS" ?>"><?php echo $tagName; ?></a></li>
				<?php endforeach ?>
				</ul>
			<?php } ?>
			<?php if(empty($filtrosPrecio) === false ){ ?>	
				<h4><?php echo $language->p('precios'); ?></h4>	
				<ul class="tags precios">
			<?php	ksort($filtrosPrecio);
					foreach ($filtrosPrecio as $tagKey=>$tagName):?>
					<li class="<?php echo "precio ".$tagKey; if($url->slug() === $tagKey) echo " active"; ?>" ><a href="<?php echo DOMAIN_TAGS.$tagKey."?GS" ?>"><?php echo $tagName." ".$moneda; ?></a></li>
			<?php endforeach ?>
				</ul>
			<?php } ?>
			<?php if(empty($filtrosTalla) === false ){ ?>	
				<h4><?php echo $language->p('tallas'); ?></h4>	
				<ul class="tags tallas">
				<?php foreach ($filtrosTalla as $tagKey=>$tagName):?>
					<li class="<?php echo "talla ".$tagKey; if($url->slug() === $tagKey) echo " active"; ?>" ><a href="<?php echo DOMAIN_TAGS.$tagKey."?GS" ?>"><?php echo $tagName; ?></a></li>
				<?php endforeach ?>
				</ul>
			<?php } ?>
			<?php if(empty($filtrosColor) === false ){ ?>	
				<h4><?php echo $language->p('colores'); ?></h4>	
				<ul class="tags colores">
				<?php foreach ($filtrosColor as $tagKey=>$tagName):?>
					<li class="<?php echo "color ".$tagKey; if($url->slug() === $tagKey) echo " active"; ?>" ><a href="<?php echo DOMAIN_TAGS.$tagKey."?GS" ?>"><?php echo $tagName; ?></a></li>
				<?php endforeach ?>
				</ul>
			<?php } ?>
			</div>
		  </div>
		</div>
<!-- End Filtros -->

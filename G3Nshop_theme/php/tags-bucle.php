<?php if (!empty($page->tags(true))): ?>
								<div class="after-post-tags">
									
									<ul class="tags">
									<?php foreach ($page->tags(true) as $tagKey=>$tagName):
										if (strpos($tagName, "{") !== false ){
											if (strpos($tagName, "P{") !== false ){
												$tagName= substr(trim($tagName), 2)." ".$moneda;
												$liclass= "precio ".$tagKey;
											}
											if (strpos($tagName, "T{") !== false ){
												$tagName= substr(trim($tagName), 2);
												$liclass= "talla ".$tagKey;	
											}
											if (strpos($tagName, "C{") !== false ){
												$tagName= substr(trim($tagName), 2);
												$liclass= "color ".$tagKey;
											}		
										}else{
											$liclass= $tagKey;
										}
									?>
										<li class="<?php echo $liclass ?>" ><a href="<?php echo DOMAIN_TAGS.$tagKey.$getTienda ?>"><?php echo $tagName; ?></a></li>
									<?php endforeach ?>
									</ul>
								</div>
								<?php endif; ?>
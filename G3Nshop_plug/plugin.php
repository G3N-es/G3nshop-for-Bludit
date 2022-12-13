<?php
/* Para próximas versiones:
 * 
 * Vaciar style (el estilo por defecto del carrito) en el pie de index template
 * Crear un nuevo estilo mas adaptable
 * 
 */
class pluginG3Nshop extends Plugin {
	
	// Instalar plugin
	public function init() {
		$this->dbFields = array(
		  'categoria'	=> '',
		  'moneda' => 'EUR',
		  'cuentaPaypal'	=> '',
		  'modoPruebas' => '1',
          'cssPersonalizado' => '
/* Ofertas: Si quieres incluir ofertas, crea una etiqueta oferta y aplica el estilo  */
/* Offers: If you want to include offers, create an offer tag and apply the style */
.oferta a,  .offer a{
  color: #ee0 !important;
  background: #e00  !important;
  border: 4px solid #ee0  !important;
}
.after-post-tags .oferta a, .after-post-tags .offer a {
  position: absolute;
  top: -8px;
  right:-6px;
  font-size: 1.3em;
  box-shadow: 0px 5px 10px #00000055;
  border-radius: 0px 0px 0px 10px !important;
}
.related .after-post-tags .oferta a, .related  .after-post-tags .offer a {
  font-size: 0.9em;
}

 /* Colores personalizados para Productos. Si creas nuevos colores, este es el sitio para asignarlos */
 /* Custom colors for Products. If you create new colors, this is the place to assign them */

.c-negro a, .c-black a {
  color: #fff !important;
  background: #333 !important;
}

.c-gris a, .c-grey a {
  color: #fff !important;
  background: #777 !important;
}

.c-blanco a, .c-white a {
  color:  #777 !important;
  background: #fff !important;
  border: 1px solid #aaa;
}

.c-cian a, .c-cyan a {
  color:  #fff !important;
  background: #1bc !important;
}

.c-magenta a {
  color:  #fff !important;
  background: #f08 !important;
}

.c-amarillo a, .c-yellow a {
  color:  #000 !important;
  background: #fd0 !important;
}

.c-rojo a, .c-red a {
  color:  #fff !important;
  background: #c00 !important;
}

.c-rosa a, .c-ping a {
  color:  #fff !important;
  background: #e89 !important;
}

.c-verde a, .c-green a {
  color:  #fff !important;
  background: #383 !important;
}

.c-azul a, .c-blue a {
  color:  #fff !important;
  background: #00c !important;
}

.c-morado a, .c-purple a {
  color:  #fff !important;
  background: #808 !important;
}

.c-naranja a, .c-orange a {
  color:  #fff !important;
  background: #f60 !important;
}

.c-marron a, .c-brown a {
  color:  #fff !important;
  background: #840 !important;
}

 /* Precios |  Prizes */
.precio a {
	color: #f60  !important;
	background: transparent !important;
	border: none !important;
}

 /* Tallas |  Sizes */
.talla a {
	border:1px dashed #aaa !important;
	background: #fff !important;
}
             
'
		);
	}
	// Formulario de Configuración 
	public function form() {
		
		global $L, $pages;
		
		if ($this->getValue('modoPruebas') === "1") {
			$pruebasSeleccionado="selected";
			$ventasSeleccionado="";
		}else{
			$pruebasSeleccionado="";
			$ventasSeleccionado="selected";
		}
		// Crea las opciones de página;
		$pageOptions = array();
		
		
		// Toma categorías
		foreach (getCategories() as $categoria) {
		$categoriaOptions[$categoria->key()] = $categoria->name();
		}
		// Las ordena por nombre
		ksort($categoriaOptions);

		$html = '';

		// Html Selector de página
		$html .= '<div>';
		$html .= '<label>'.$L->get('categoria-tienda').'</label>';
		$html .= '<select name="categoria">'.PHP_EOL;
		$html .= '<option value="">- '.$L->get('categorias').' -</option>'.PHP_EOL;
		foreach ($categoriaOptions as $key => $value) {
			$html .= '<option value="'.$key.'" '.($this->getValue('categoria')==$key?'selected':'').'>'.$value.'</option>'.PHP_EOL;
		}
		$html .= '</select>';
		$html .= '</div>'.PHP_EOL;
		
		// Selector de Moneda
		$html .='
<div>
	<label>'.$L->get('moneda').'</label>
	<select name="moneda">';
		$html .='<option value="'.$this->getValue('moneda').'" selected>'.$this->getValue('moneda').'</option>';
		$html .='
		<option value="EUR">EUR</option>
		<option value="USD">USD</option>
		<option value="AED">AED</option>
		<option value="ARS">ARS</option>
		<option value="AUD">AUD</option>
		<option value="AWG">AWG</option>
		<option value="BAM">BAM</option>
		<option value="BBD">BBD</option>
		<option value="BDT">BDT</option>
		<option value="BGN">BGN</option>
		<option value="BHD">BHD</option>
		<option value="BMD">BMD</option>
		<option value="BOB">BOB</option>
		<option value="BRL">BRL</option>
		<option value="BSD">BSD</option>
		<option value="CAD">CAD</option>
		<option value="CHF">CHF</option>
		<option value="CLP">CLP</option>
		<option value="CNY">CNY</option>
		<option value="COP">COP</option>
		<option value="CZK">CZK</option>
		<option value="DKK">DKK</option>
		<option value="DOP">DOP</option>
		<option value="EGP">EGP</option>
		<option value="FJD">FJD</option>
		<option value="GBP">GBP</option>
		<option value="GHS">GHS</option>
		<option value="GMD">GMD</option>
		<option value="GTQ">GTQ</option>
		<option value="HKD">HKD</option>
		<option value="HRK">HRK</option>
		<option value="HUF">HUF</option>
		<option value="IDR">IDR</option>
		<option value="ILS">ILS</option>
		<option value="INR">INR</option>
		<option value="IRR">IRR</option>
		<option value="ISK">ISK</option>
		<option value="JMD">JMD</option>
		<option value="JOD">JOD</option>
		<option value="JPY">JPY</option>
		<option value="KES">KES</option>
		<option value="KHR">KHR</option>
		<option value="KRW">KRW</option>
		<option value="KWD">KWD</option>
		<option value="LAK">LAK</option>
		<option value="LBP">LBP</option>
		<option value="LKR">LKR</option>
		<option value="MAD">MAD</option>
		<option value="MDL">MDL</option>
		<option value="MGA">MGA</option>
		<option value="MKD">MKD</option>
		<option value="MUR">MUR</option>
		<option value="MVR">MVR</option>
		<option value="MXN">MXN</option>
		<option value="MYR">MYR</option>
		<option value="NAD">NAD</option>
		<option value="NGN">NGN</option>
		<option value="NOK">NOK</option>
		<option value="NPR">NPR</option>
		<option value="NZD">NZD</option>
		<option value="OMR">OMR</option>
		<option value="PAB">PAB</option>
		<option value="PEN">PEN</option>
		<option value="PHP">PHP</option>
		<option value="PKR">PKR</option>
		<option value="PLN">PLN</option>
		<option value="PYG">PYG</option>
		<option value="QAR">QAR</option>
		<option value="RON">RON</option>
		<option value="RSD">RSD</option>
		<option value="RUB">RUB</option>
		<option value="SAR">SAR</option>
		<option value="SCR">SCR</option>
		<option value="SEK">SEK</option>
		<option value="SGD">SGD</option>
		<option value="SYP">SYP</option>
		<option value="THB">THB</option>
		<option value="TND">TND</option>
		<option value="TRY">TRY</option>
		<option value="TWD">TWD</option>
		<option value="UAH">UAH</option>
		<option value="UGX">UGX</option>
		<option value="UYU">UYU</option>
		<option value="VES">VES</option>
		<option value="VND">VND</option>
		<option value="XAF">XA</option>
		<option value="XCD">XCD</option>
		<option value="XOF">XOF</option>
		<option value="XPF">XPF</option>
		<option value="ZAR">ZAR</option>
	</select>
</div>
<div>
	<label>'.$L->get('cuenta-paypal').'</label>
	<input type="text" name="cuentaPaypal" value="'.$this->getValue('cuentaPaypal').'" />
</div>
<div>
	<label>'.$L->get('modo-paypal').'</label>
	<select name="modoPruebas" >
		<option value="1" '.$pruebasSeleccionado.'>'.$L->get('pruebas').'</option>
		<option value="2" '.$ventasSeleccionado.'>'.$L->get('ventas').'</option>
	</select>
</div>
<div>
	<label>'.$L->get('css-personalizado').'</label>
	<textarea name="cssPersonalizado">'.$this->getValue('cssPersonalizado').'</textarea>
</div>
<hr>
<div id="donar">
	<div id="texto">'.$L->get('donar').'</div>
	<ul>
		<li id="primero">
			<a target="black" href="https://PayPal.Me/g3nWebAPPs/10">10€</a>
		</li>
		<li id="segundo">
			<a target="black" href="https://PayPal.Me/g3nWebAPPs/20">20€</a>
		</li>
		<li id="tercero">
			<a target="black" href="https://PayPal.Me/g3nWebAPPs/40">40€</a>
		</li>
		<li id="cuarto">
			<a target="black" href="https://PayPal.Me/g3nWebAPPs/">'.$L->get('otros').'</a>
		</li>
	</ul>
</div>
<br>
';      
		return $html;
	} // Fin form()
	

	// Crea los elementos necesarios en el admin
  	public function adminSidebar() {
	global $site;	
	$sitioURL= $site->url();
	if (substr($sitioURL, -1) === "/"){ $sitioURL= substr($sitioURL,0,-1); }
    echo '
      <li class="nav-item">
      	<a class="nav-link" href="'.$sitioURL.'/admin/configure-plugin/pluginG3Nshop"><span class="fa fa-shopping-cart"></span>G3Nshop</a>
      </li>
';	
    }
	public function adminBodyEnd() {
		
		global $L, $pages, $site;
		$urlEdicion=$_SERVER['REDIRECT_URL'];
		$sitioURL= $site->url();
		if (substr($sitioURL, -1) === "/"){ $sitioURL= substr($sitioURL,0,-1); }
		$paginaAdmin= explode( "/", $urlEdicion);
		$paginaAdmin= end($paginaAdmin);
		$categoriaDeTienda= $this->getValue('categoria');
      
		$L_Tienda=$L->get('tienda');
		$L_Producto=$L->get('producto');
		$L_Productos_Publicados=$L->get('productos-publicados');
		$L_Precio=$L->get('precio');
		$L_Tallas=$L->get('tallas');
		$L_Colores=$L->get('colores');
		$L_Separar_por_comas=$L->get('separar-x-comas');
		$L_ColoresDeEjemplo=$L->get('colores-ejemplo');
		$L_Buscar=$L->get('buscar');
		$L_resultados=$L->get('resultados');
			
		// capturamos datos que nos son necesarios
		// Si es configure-plugin/pluginG3Nshop
		if(stripos($urlEdicion, 'configure-plugin/pluginG3Nshop') !== false ){
        echo '
<style>
#donar {
  border: 5px solid  #fd0;
  margin: 0 0 100px 0;
  background-image: linear-gradient(#fd8, #ffc);
}
#donar #texto{
  padding: 20px;
  font-size: 1.2em;
  text-align: center;
  background-image: linear-gradient(#ffffffaa, #ffffff55);
}
#donar ul{
  display: flex;
  justify-content: center;
  margin: 0;
  padding: 45px 0 60px 0;
}
#donar li{
  list-style: none;
}
#donar li a{
  color: #00000099;
  font-size: 1.5em;
  font-weight: bold;
  padding: 20px;
  margin: 10px;
  background: #fe0;
  box-shadow: 0px 5px 10px #00000055;
  border: 1px solid #eee;
  border-radius: 10px !important;
  }
  #donar li a:hover{
  filter: brightness(1.2);
  box-shadow: 5px 10px 20px #00000055;
}

</style>
';
        }
		// Si es editar
		if(stripos($urlEdicion, 'edit-content') !== false ){
			$paginaEditar= explode( "/", $urlEdicion);
			$paginaEditar= end($paginaEditar);
			$pagina= new Page($paginaEditar);
		
			//Lo convertimos en array
			//y acceder a los datos reales de la base de datos
			$ListaPagina= (array) $pagina;
			foreach ($ListaPagina as  $valor){ 
				foreach ($valor as $llave => $valores ){
				$propiedadesPagina[$llave]=$valores;
				}
			}
				
			if ($propiedadesPagina['category'] == $categoriaDeTienda){
				$esEdicionProducto= 'loEs';
			}
		}

		$html="";
		$html.=<<<EOT
<script>
	$(document).ready(function(){
		$("li > a[href*='/admin/new-content']").after(
			'<li class="nav-item ml-3">'
		+		'<a class="nav-link" href="$sitioURL/admin/new-content?GS"><span style="color: #0078D4;" class="fa fa-plus-circle"></span><span class="fa fa-shopping-cart"></span>$L_Producto</a>'
		+	'</li>'
		);
EOT;
	
	//Capturar el key de la Session URL
	//Si captura "edit-content" debe cumplimentar los campos
	//$page= new Page('desarrollo-a-medida');//(key)
	//$page->cumstom() // dar formato y añadir al html que inyecta jquery
			
		if($esEdicionProducto == 'loEs'){
			//Extraemos las etiquetas y las filtramos
			$propiedadesPersonales = explode(',', $pagina->tags());
			foreach ($propiedadesPersonales as $valores){
				if (strpos($valores, "{") !== false ){
					if (strpos($valores, "P{") !== false ){
						$precio= substr(trim($valores), 2);
					}
					if (strpos($valores, "T{") !== false ){
						$tallas.= substr(trim($valores), 2).", ";	
					}
					if (strpos($valores, "C{") !== false ){
						$colores.= substr(trim($valores), 2).", ";
                      	$arrayColores[]=substr(trim($valores), 2);
					}
				}else{
				  $etiquetasNormales .= $valores.", ";
				}
			}
		
			$tallas= substr($tallas, 0, -2);
			$colores= substr($colores, 0, -2);
			$etiquetasNormales= substr($etiquetasNormales, 0, -2);
		}
		$verArrayColores= implode(" ", $arrayColores);
		if($esEdicionProducto == 'loEs' || isset($_GET['GS'])){	
			$categoriaTienda=$this->getValue('categoria');
          $html.=<<<EOT
          $("#jstypeSelector").parent().hide();
          $("#jstitle").after(
              '<small class="form-text">$L_Precio</small><input  type="number" placeholder="0,00" min="0"  step="0.01" id="precio" class="form-control mt-1" value="$precio" />'
          +	'<small class="form-text">$L_Tallas ($L_Separar_por_comas)</small><input type="text" id="tallas" class="form-control mt-1" value="$tallas" placeholder="M, L, XL" />'
          +	'<small class="form-text">$L_Colores ($L_Separar_por_comas)</small><input type="text" id="colores" class="form-control mt-1" value="$colores" placeholder="$L_ColoresDeEjemplo"/><br>'
          );

          $("#jstags").val("$etiquetasNormales");
          $("#jsbuttonSave").mouseup(function() {
              var Precio = "";
              var Tallas = "";
              var Colores = "";
              var Etiquetas= "";

              if( $("#precio").val() !== "" ) { Precio = 'P{'+$("#precio").val().replace(/ /g, ""); }
              if( $("#tallas").val() !== "" ) { Tallas = ',T{'+$("#tallas").val().replace(/ /g, "").replace(/,/g, ",T{"); }
              if( $("#colores").val() !== "" ){ Colores= ',C{'+$("#colores").val().replace(/ /g, "").replace(/,/g, ",C{"); }
              if( $("#jstags").val() !== "" ) { Etiquetas= ','+$("#jstags").val(); }

              var propiedadesProducto= Precio+Tallas+Colores+Etiquetas;
              $("#jstags").val(propiedadesProducto)
          })
EOT;

		}
		//Si estamos en contenido
		if( $paginaAdmin === 'content' ){
			
			$html.=<<<EOT
		
		
		$("ul.nav.nav-tabs").after(
			'<div id="contenedor-form-busqueda" class="row mt-4">'
		+	'  <div class="col-lg-12">'
		+	'	<div id="form-busqueda" class="input-group">'
		+	'	  <span class="input-group-btn">'
		+	'		<button id="btn-filtrar" class="btn btn-primary" type="button">$L_Buscar</button>'
		+	'	  </span>'
		+	'	  <input id="busqueda" type="text" class="form-control">'
        +	'		<div id="borrarBusqueda" class="input-group-append">'
		+	'	  		<button style="color: #fff" class="btn btn-outline-secondary btn-danger" type="button"><span class="fa fa-times-circle"></span></button>'
		+	'		</div>'
		+	'	</div>'

		+	'  </div>'
		+	'</div>'
		);
		    
		$("#btn-filtrar").click(function() {			
			var busqueda= $("#busqueda").val().toLowerCase().trim();
			if(busqueda !== ""){
				$("tbody tr").css("background-color", "transparent");
              	$("tbody tr").hide();
				$("tbody tr:contains('"+ busqueda +"')" ).css("background-color", "#ddffcc");
                $("tbody tr:contains('"+ busqueda +"')" ).show("slow");
              	if($("tbody tr:contains('"+ busqueda +"')" ).length == 0) {
                  	$(".resultado0").remove();
                	$("thead" ).hide();
                  	$(".tab-content").after('<p class="mt-4 text-muted resultado0">0 $L_resultados</p>');
                }
			}else{
                $("tbody tr:contains('"+ busqueda +"')" ).show("slow");
              	$("tbody tr").css("background-color", "transparent");
              	$("thead" );
            }
		});		
EOT;
			foreach ($pages->db as $key => $value){
              	$titulo= strtolower($value['title']);
              	$html.=<<<EOT
              $("div > a[href='/admin/edit-content/$key']").prepend("<span style='display:none' >$titulo</span>");
EOT; 
				if($value['category'] === $this->getValue('categoria') ){
				$etiquetas= htmlentities(str_replace("{",": ",strtolower(implode(", ",$value['tags'])))).",";
				$etiquetaProducto= strtolower($L_Producto);
				$html.=<<<EOT
		$("div > a[href='/admin/edit-content/$key']").prepend("<sup class='fa fa-shopping-cart'></sup>");
		$("div > a[href='/admin/edit-content/$key']").parent().append("<br><small style='text-transform: capitalize'>$etiquetaProducto: $etiquetas</small>");
EOT; 
				}
			}
			$html.=<<<EOT
			$("a[role='tab']").add("#borrarBusqueda > button").click(function() {
              	$(".resultado0").remove();
              	$("#busqueda").val("");
              	$("tbody tr").show();
				$("tbody tr").css("background-color", "transparent");
			});
		
			
EOT;
		}
		$html.=<<<EOT
		
	});
</script>
EOT;

		return $html;		
		
	}
    public function siteHead() {
      echo "<style>".$this->getValue('cssPersonalizado')."</style>";
      
    }
	
	
}

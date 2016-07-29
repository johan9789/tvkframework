<?php
/*
 ======================================================================
 SimpleHighlighter v1.0 para PHP 5 
 
 Clase para colorear código 
 
 por panino (mobius@disegnocentell.com.ar)
 http://www.disegnocentell.com.ar/

 Ejemplo de uso:
 
 <?php
 include 'SimpleHighlighter5.class.php';
 echo SimpleHighlighter::highlight('[code]<script type="text/javascript">alert("Hola mundo");</script>[/code]');
 ?>

 
  ----------------------------------------------------------------------
 LICENSE

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License (GPL)
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 To read the license please visit http://www.gnu.org/copyleft/gpl.html
 ======================================================================
*/ 

class SimpleHighlighter{
	private function noHighlight($code,$bol){
    	$code="<?  ?>".$code;
		$code=highlight_string($code, $bol);
		$trad=array(
			'&lt;?'=>'',
			'?&gt;'=>'',
			'<font color="#0000bb">&nbsp;&nbsp;</font>'=>'',
			'<font color="#0000BB">&nbsp;&nbsp;</font>'=>'',
			'<font'=>'<span',
			'</font>'=>'</span>',
			'color="'=>'style="color:',
			'<br />'=>'<br/>',
			'#000000">'=>'#000">',
			'#0000BB">'=>'#00B">',
			'#007700">'=>'#070">',
			'#ff8000">'=>'#800080">',
			'#DD0000">'=>'#D00">'
		);
    	$code = strtr($code,$trad);
		$code=preg_replace('/'.preg_quote('<span style="color:#000"></span><span style="color:#00B"></span>','/').'/is','',$code);
		return $code;
	}

	private function highlightCode($code,$bol) {
		$s=array('/\<script/i','/\<\/script\>/i');
		$r=array('<zcript','</zcript>');
		$s2=array('/\>zcript/i','/\/zcript/i');
		$r2=array('>script','/script');
		$code=preg_replace($s,$r,$code);
		$code = "<?\n".$code."\n?>";
		$code = highlight_string($code, $bol);
		if(substr($code, 0, 6) == '<code>') {
			$code = substr($code, 6, (strlen($code) - 13));
		}
		$trad = array(
			'<font'=>'<span',
			'</font>'=>'</span>',
			'color="'=>'style="color:',
			'<br />'=>'<br/>',
			'#000000">'=>'#000">',
			'#0000BB">'=>'#00B">',
			'#007700">'=>'#070">',
			'#ff8000">'=>'#800080">',
			'#DD0000">'=>'#D00">'
		);
		$code = strtr($code, $trad);
		$code = substr($code, 25, (strlen($code) -33));
		$code = substr($code, 0, 26).substr($code, 36, (strlen($code) - 74));
		$code=preg_replace($s2,$r2,$code);
		if(substr($code,0,1)=='>')
			$code=substr($code,1);
		if(substr($code,-1)=='<')
			$code=substr($code,0,strlen($code)-1);
		$nreeemp=array(
			'<span style="color: #000/>'=>'<span style="color: #000">',
			'<span style="color: #00B/>'=>'<span style="color: #00B">',
			'<span style="color: #070/>'=>'<span style="color: #070">',
			'<span style="color: #800080/>'=>'<span style="color: #800080">',
			'<span style="color: #D00/>'=>'<span style="color: #D00">'
		);
		$code = strtr($code, $nreeemp);
		$code=preg_replace("/".preg_quote('<span style="color:#000"></span><span style="color:#00B"></span>',"/")."/is",'',$code);
		if(substr($code,-42)=='<span style="color: #070">&gt;<br/></span>')
			$code=substr($code,0,-42).'<span style="color: #070">&gt;</span>';
		if(substr($code,-41)=='<span style="color:#070">&gt;<br/></span>')
			$code=substr($code,0,-41).'<span style="color:#070">&gt;</span>';
		return $code;
		
	}
	
	private function defineCode($code,$bol){
		$tagCodes=array('<code>','</code>');
		$code=preg_replace('/script/is','script',$code);
		if(strpos($code,'<?')!==false) {
			return highlight_string($code,$bol);
		}else if(strpos($code,'<script')!==false){
			$vecCodes=explode('<script',$code);
			for($i=0;$i<count($vecCodes);$i++){
				if(($i%2)!=0){
					$aux=explode('</script>',$vecCodes[$i]);
					$vecCodes[$i]= self::highlightCode('<script'.$aux[0].'</script>',$bol).str_replace($tagCodes,array('',''),self::noHighlight($aux[1],$bol));
				}else
					$vecCodes[$i]=str_replace($tagCodes,array('',''),self::noHighlight($vecCodes[$i],$bol));
			}
			$code=implode('',$vecCodes);
			$code=preg_replace('/'.preg_quote('<span style="color:#000"></span><span style="color:#00B"></span>','/').'/is','',$code);
			return '<code>'.$code.'</code>';
		}else{
			return '<code>'.self::highlightCode($code,$bol).'</code>';
		}
	}
	
	private function fixBugOpera($code){
		$code=preg_replace('/'.preg_quote('<span style="color:#000"></span>','/').'/is','',$code);
		$code=preg_replace('/'.preg_quote('<span style="color:#00B"></span>','/').'/is','',$code);
		$code=preg_replace('/'.preg_quote('<span style="color: #00B">&nbsp;&nbsp;</span>','/').'/is','',$code);
		$code=preg_replace('/'.preg_quote('<span style="color:#00B">&nbsp;&nbsp;</span>','/').'/is','',$code);
		$code=preg_replace('/'.preg_quote('<span style="color: #000"></span><span style="color: #00B"></span>','/').'/is','',$code);
		$code=preg_replace('/'.preg_quote('<span style="color: #000"></span>','/').'/is','',$code);
		$code=preg_replace('/'.preg_quote('<span style="color: #00B"></span>','/').'/is','',$code);
			if((substr($code,-19))=='<br/></span></code>')
				$code=substr($code,0,-19).'</span></code>';
			return $code;	
		}
		
	public static function highlight($texto) {
		$texto = nl2br(htmlentities($texto));
		$texto = str_replace("\\", "\\\\", $texto); 
		$texto = str_replace("[code]", "<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\"><tr><td><div align=\"center\" style=\"padding:5px;margin:5px;\"><div style=\"text-align:right;width:700px; font-size:10px;padding-bottom:3px;\"><a href=\"javascript:void(0);\" onclick=\"codeFullScreen(this);\">Pantalla Completa</a> | <a href=\"javascript:void(0);\" onclick=\"seleccionarCode(this);\">Seleccionar</a></div><div style=\" background-color:#F0F0F0;border-color:#808080;border-style:solid;border-width:1px;font-size:11px;margin:0px;overflow:auto;padding:6px;text-align:left;width:700px;\">[code]", $texto);
		$texto = str_replace("[/code]", "[/code]<br /></div></div></td></tr></table>", $texto);
		$texto = str_replace("[basicCode]", "<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\"><tr><td><div align=\"center\" style=\"padding:5px;margin:5px;\"><div style=\"text-align:right;width:700px; font-size:10px;padding-bottom:3px;\"><a href=\"javascript:void(0);\" onclick=\"codeFullScreen(this);\">Pantalla Completa</a> | <a href=\"javascript:void(0);\" onclick=\"seleccionarCode(this);\">Seleccionar</a></div><div style=\" background-color:#F0F0F0;border-color:#808080;border-style:solid;border-width:1px;font-size:11px;margin:0px;overflow:auto;padding:6px;text-align:left;width:700px;\">[basicCode]", $texto);
		$texto = str_replace("[/basicCode]", "[/basicCode]<br /></div></div></td></tr></table>", $texto);
		$texto = str_replace('&quot;','"',$texto); 
		$simple_search = array(
			'#\[code\](.*?)\[\/code\]#se',
			'#\[basicCode\](.*?)\[\/basicCode\]#se'
		); 
		$simple_replace = array(
			"self::fixBugOpera(str_replace('> <','><',ereg_replace('[[:space:]]+',' ',self::defineCode(stripslashes(trim(html_entity_decode(str_replace('<br />','','$1')))), true))))",
			"str_replace('> <','><',ereg_replace('[[:space:]]+',' ',highlight_string(stripslashes(trim(html_entity_decode(str_replace('<br />','','$1')))), true)))"
		);
		$texto = preg_replace ($simple_search, $simple_replace, $texto); 
		return $texto; 
	} 
}
?>
<?php 
//////// @tag begins					
	$atag = "@";
	$arr= explode(" ",$body);
	$arrc= count($arr);
	$i = 0;
	while ($i < $arrc)	{
	if (substr($arr[$i], 0 , 1) === $atag) {
	$par = $arr[$i];
	$par = str_replace("@", "", $par);
	$arr[$i] = "<a href='$par'>".$arr[$i]."</a>";
	}
	$i++;
	}		
	$body = implode(" ",$arr );		
/////// @tag ends	
	

        
/////// *tag begins        
	$stag = "*";
	$srr= explode(" ",$body);
	$srrc= count($srr);
	$i = 0;
	while ($i < $srrc)	{
	if (substr($srr[$i], 0 , 1) === $stag) {
	$par = $srr[$i];
	$par = str_replace("*", "", $par);
	$srr[$i] = "<a href='$par.trade'>".$srr[$i]."</a>";
	}
	$i++;
	}		
	$body = implode(" ",$srr );
/////// *tag ends        
	
	
	
/////// #tag begins        
	$htag = "#";
	$hrr= explode(" ",$body);
	$hrrc= count($hrr);
	$i = 0;
	while ($i < $hrrc)	{
	if (substr($hrr[$i], 0 , 1) === $htag) {
	$par = $hrr[$i];
	$par = str_replace("#", "", $par);
	$hrr[$i] = "<a href='hashtag?term=$par'>".$hrr[$i]."</a>";
	}
	$i++;
	}		
	$body = implode(" ",$hrr );
/////// #tag ends        
        
	
	
	
/////// html_link begins	
	$ptag = "_";
	$prr= explode(" ",$body);
        $prr = str_replace(array("https://", 'http://'), "", $prr);
	$prrc= count($prr);
	$i = 0;
	while ($i < $prrc)	{
	if (substr($prr[$i], 0 , 1) === $ptag) {
	$par = $prr[$i];
	$par = str_replace("_", "", $par);
        $prr[$i] = "https://sp_r.co";
	$prr[$i] = "<a href='http://$par' target='_ext'>".$prr[$i]."</a>";
	}
	$i++;
	}
        
	$body = implode(" ",$prr );	
////// html_link ends


?>
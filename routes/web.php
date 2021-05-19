<?php
Route::get('/', function(){
	return "<h1 style='margin: 0 auto 0; padding:10px;'>SITIO EN MANTENIMIENTO... VOLVEVEMOS PRONTO!!!</h1>";
});
Route::get('apps/dian/rut-consult/{cc}', 'DianAppController@rutConsult');
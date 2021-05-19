<?php
Route::get('/', function(){
	return "<h1>SITIO EN MANTENIMIENTO... VOLVEVEMOS PRONTO!!!</h1>";
});
Route::get('apps/dian/rut-consult/{cc}', 'DianAppController@rutConsult');
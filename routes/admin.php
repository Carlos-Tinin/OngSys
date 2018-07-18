<?php

Route::group(['prefix' => 'admin'], function() {
	
	// C. R. U. D. de pessoas
	Route::group(['prefix' => 'pessoa', 'namespace' => 'Pessoas'], function() {
		// Create   -------
		Route::get('registrar', 'PessoaController@create')->name('admin.create.pessoa');
		Route::post('registrar', 'PessoaController@store');

		// Read 	-------
		Route::get('listar', 'PessoaController@index')->name('admin.read.all_pessoas');
		Route::get('listar/{id}', 'PessoaController@show')->name('admin.read.pessoa');

		// Update 	-------
		Route::get('atualizar/{id}', 'PessoaController@edit')->name('admin.update.pessoa');
		Route::post('atualizar/{id}', 'PessoaController@update');

		// Delete 	-------
		Route::get('deletar/{id}', 'PessoaController@destroy')->name('admin.remove.pessoa');

		// Demais operações...
		Route::get('inativar/{id}', 'PessoaController@inativar')->name('admin.inativar.pessoa');
		Route::get('ativar/{id}', 'PessoaController@ativar')->name('admin.ativar.pessoa');
	});

	// C. R. U. D. de cargos
	Route::group(['prefix' => 'cargo', 'namespace' => 'Cargos'], function() {
		// Create   -------
		Route::get('registrar', 'CargoController@create')->name('admin.create.cargo');
		Route::post('registrar', 'CargoController@store');

		// Read 	-------
		Route::get('listar', 'CargoController@index')->name('admin.read.all_cargos');
		Route::get('listar/{id}', 'CargoController@show')->name('admin.read.cargo');

		// Update 	-------
		Route::get('atualizar/{id}', 'CargoController@edit')->name('admin.update.cargo');
		Route::post('atualizar/{id}', 'CargoController@update');

		// Delete 	-------
		Route::get('deletar/{id}', 'CargoController@destroy')->name('admin.remove.cargo');
	});
	
	// C. R. U. D. de serviços
	Route::group(['prefix' => 'servico', 'namespace' => 'Servicos'], function() {
		// Create 	-------
		Route::get('registrar', 'ServicoController@create')->name('admin.create.servico');
		Route::post('registrar', 'ServicoController@store');
		
		// Read 	-------
		Route::get('listar', 'ServicoController@index')->name('admin.read.all_servicos');
		Route::get('lsitar/{id}', 'ServicoController@show')->name('admin.read.servico');

		// Update 	-------
		Route::get('atualizar/{id}', 'ServicoController@edit')->name('admin.update.servico');
		Route::post('atualizar/{id}', 'ServicoController@update');

		// Delete 	-------	
		Route::get('deletar/{id}', 'ServicoController@destroy')->name('admin.remove.servico');	
		
		// Demais operações...
		Route::get('reabrir/{id}', 'ServicoController@reabrir')->name('admin.servico.abrir');
		Route::get('fechar/{id}', 'ServicoController@fechar')->name('admin.servico.fechar');
	});

	// C. R. U. D. de usuários
	Route::group(['prefix' => 'usuario', 'namespace' => 'Admin'], function() {
		// Create 	-------
		// Use the laravel user registration controller
		
		// Read 	-------
		Route::get('listar', 'AdminController@index')->name('admin.read.all_usuarios');
		Route::get('lsitar/{id}', 'AdminController@show')->name('admin.read.usuario');

		// Update 	-------
		Route::get('atualizar/{id}', 'AdminController@edit')->name('admin.update.usuario');
		Route::post('atualizar/{id}', 'AdminController@update');

		// Delete 	-------	
		Route::get('deletar/{id}', 'AdminController@destroy')->name('admin.remove.usuario');
	});
});
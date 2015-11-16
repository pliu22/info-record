<?php

class init{

	public function __construct(){
		self::connect();
	}

	protected function  connect(){
		$link = mysql_connect('hostname','username','password');

		if($link){
			mysql_select_db('database_name');
			mysql_query('set names utf8');
		}
	}

}
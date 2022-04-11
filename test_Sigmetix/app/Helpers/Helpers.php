<?php

use App\Classies\WorkWithSql;
use App\Classies\WorkWithSqlite;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Session;

if (!function_exists('getDataSource')) {
    function getDataSource():string
    {
        if(Session::exists('dataSource')){
            return Session::get('dataSource');
        }
        else
            return 'mysql';
    }
}

if (!function_exists('getDataSourceForRoute')) {
    function getDataSourceForRoute():array|string
    {
        if(Session::exists('dataSource')){
            return Session::get('dataSource') == 'sqlite' ? ['alternative_storage'=>'1'] : '' ;
        }
        else
            return '';
    }
}

if(!function_exists('getTestController')){
    function getTestController():TestController{
        $dataSource = getDataSource() == "sqlite" ? new WorkWithSqlite('sqlite') : new WorkWithSql('mysql');

        $controller = new TestController();
        $controller->setWorkWithDataInterface($dataSource);
        return  $controller;
    }
}

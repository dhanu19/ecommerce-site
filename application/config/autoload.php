<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$autoload['packages'] = array();


$autoload['libraries'] = array('database','session','cart','form_validation','table','pdf');


$autoload['drivers'] = array();


$autoload['helper'] = array('url','form');


$autoload['config'] = array();


$autoload['language'] = array();


$autoload['model'] = array('Admin_model','Auth_model','Product','User');

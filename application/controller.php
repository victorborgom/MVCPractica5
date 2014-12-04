<?php
class Controller{
    public static function capturar_event() {
        $vista = '';
        if($_GET) {
            if(array_key_exists('vista', $_GET)) {
            $vista = $_GET['vista'];
            }
        }
        return $vista;
    }
    public static function invocar_model($model) {
        
        if($model) {
            require_once('model.php');
            switch ($model){
                case 'ModelUn':
                    $prop[]=array('propietat'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra hendrerit metus eget bibendum. Mauris consectetur non eros aliquam gravida. Curabitur nibh nisl, aliquam nec vestibulum eu, aliquam at leo. Donec commodo lacus feugiat tristique consequat. Quisque tristique nibh odio, eget pellentesque quam interdum sed. Pellentesque vulputate tristique tellus in eleifend. Pellentesque vitae quam arcu. Phasellus congue nibh et lorem dignissim, a commodo risus fringilla. Curabitur ut leo volutpat, mollis nisi et, lobortis ex. Proin hendrerit scelerisque cursus.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc at velit orci. Nam ac ipsum nec nisi iaculis molestie a id tellus. Proin tincidunt arcu vel lacus luctus, in eleifend magna semper. Curabitur quis lorem at diam finibus lobortis sit amet fermentum neque. Nullam vestibulum pellentesque molestie. Curabitur ornare dictum est.

Morbi ut tristique justo. Sed neque leo, aliquam a urna eget, pellentesque faucibus nulla. Proin consequat sapien eu lacus vulputate, sit amet aliquam ipsum elementum. Cras commodo pretium metus eu viverra. Phasellus egestas ex sit amet nisi placerat congue. Aliquam rhoncus bibendum elit id tempor. Ut dapibus sagittis nunc ac dapibus. Nulla elementum efficitur nunc non luctus. Pellentesque tristique elementum lacus vitae malesuada. Quisque rhoncus libero a nisi consequat auctor. Sed tempor nibh urna, sodales sollicitudin ex lobortis vel.');
                    break;
                case 'ModelDos':
                    $prop[]=array('propietat_1'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra hendrerit metus eget bibendum. Mauris consectetur non eros aliquam gravida. Curabitur nibh nisl, aliquam nec vestibulum eu, aliquam at leo. Donec commodo lacus feugiat tristique consequat. Quisque tristique nibh odio, eget pellentesque quam interdum sed. Pellentesque vulputate tristique tellus in eleifend. Pellentesque vitae quam arcu. Phasellus congue nibh et lorem dignissim, a commodo risus fringilla. Curabitur ut leo volutpat, mollis nisi et, lobortis ex. Proin hendrerit scelerisque cursus.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc at velit orci. Nam ac ipsum nec nisi iaculis molestie a id tellus. Proin tincidunt arcu vel lacus luctus, in eleifend magna semper. Curabitur quis lorem at diam finibus lobortis sit amet fermentum neque. Nullam vestibulum pellentesque molestie. Curabitur ornare dictum est.

Morbi ut tristique justo. Sed neque leo, aliquam a urna eget, pellentesque faucibus nulla. Proin consequat sapien eu lacus vulputate, sit amet aliquam ipsum elementum. Cras commodo pretium metus eu viverra. Phasellus egestas ex sit amet nisi placerat congue. Aliquam rhoncus bibendum elit id tempor. Ut dapibus sagittis nunc ac dapibus. Nulla elementum efficitur nunc non luctus. Pellentesque tristique elementum lacus vitae malesuada. Quisque rhoncus libero a nisi consequat auctor. Sed tempor nibh urna, sodales sollicitudin ex lobortis vel.','propietat_2'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra hendrerit metus eget bibendum. Mauris consectetur non eros aliquam gravida. Curabitur nibh nisl, aliquam nec vestibulum eu, aliquam at leo. Donec commodo lacus feugiat tristique consequat. Quisque tristique nibh odio, eget pellentesque quam interdum sed. Pellentesque vulputate tristique tellus in eleifend. Pellentesque vitae quam arcu. Phasellus congue nibh et lorem dignissim, a commodo risus fringilla. Curabitur ut leo volutpat, mollis nisi et, lobortis ex. Proin hendrerit scelerisque cursus.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc at velit orci. Nam ac ipsum nec nisi iaculis molestie a id tellus. Proin tincidunt arcu vel lacus luctus, in eleifend magna semper. Curabitur quis lorem at diam finibus lobortis sit amet fermentum neque. Nullam vestibulum pellentesque molestie. Curabitur ornare dictum est.

Morbi ut tristique justo. Sed neque leo, aliquam a urna eget, pellentesque faucibus nulla. Proin consequat sapien eu lacus vulputate, sit amet aliquam ipsum elementum. Cras commodo pretium metus eu viverra. Phasellus egestas ex sit amet nisi placerat congue. Aliquam rhoncus bibendum elit id tempor. Ut dapibus sagittis nunc ac dapibus. Nulla elementum efficitur nunc non luctus. Pellentesque tristique elementum lacus vitae malesuada. Quisque rhoncus libero a nisi consequat auctor. Sed tempor nibh urna, sodales sollicitudin ex lobortis vel.');
                    break;
                
               case 'ModelTres':
                    $prop[]=array('propietat_1'=>4,'propietat_2'=>12);
                    break;
                default : exit;
            }
            $dataO = new $model($prop);
            //treiem l'array de propietats
            $data=$dataO->getPropietat();
            
            return $data;
        }
        #les modificacions al model es farien aquÃ­
    }
    public static function identificar_model($vista) {
        if($vista) {
            switch ($vista) {
                case 'news':
                    $model = 'ModelUn';
                    break;
                case 'about':
                    $model = 'ModelDos';
                    break;
                case 'home':
                    $model = 'ModelTres';
                    break;
                
                default:
                    exit();
            }
        }
        return $model;
    }
    public static function iniciar() {
            $vista = self::capturar_event();
            if($vista) {
                $model = self::identificar_model($vista);
                if($model) {
                    $data = self::invocar_model($model);
                    if($data) {
                        require_once('load.php');
                        Vista::printar_data($vista, $data);
                    }
                }
            }
        }
 }
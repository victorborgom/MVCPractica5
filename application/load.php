<?php 

class Vista{
/**
 * 
 * @param type $vista
 * @return type
 */

    public static function set_identificadors($vista) {
        $identificadors = array();
        if($vista) {
            switch ($vista) {
                case 'home':
                $identificadors = array('propietat');
                break;
                case 'news':
                $identificadors = array('propietat');
                break;
                case 'about':
                $identificadors = array('propietat_1','propietat_2');
                break;
            }

        return $identificadors;
        }
    }
    /**
     * 
     * @param type $vista
     * @param type $data
     * @return type
     */
    public static function poblar_diccionari($vista, $data) {
        $diccionari = array();
        $identificadors =self:: set_identificadors($vista);
        if($identificadors) {
            foreach ($identificadors as $identificador) {
            if(array_key_exists($identificador, $data)) {
            $diccionari[$identificador] = $data[$identificador];}
            }
        }
        return $diccionari;
    }
        public static function printar_data($vista,$data) {
               $html = '';
                if(($vista)&&($data)) {
                    $diccionari =self::poblar_diccionari($vista, $data);
                    if($diccionari) {
                        $html = file_get_contents('views/'.$vista.'.html');
                        foreach ($diccionari as $clau=>$valor) {
                    $html = str_replace('{'.$clau.'}', $valor, $html);
                    }
                    }
                }
            print $html;
        }
}
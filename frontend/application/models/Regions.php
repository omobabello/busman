<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Regions
 *
 * @author Omoba
 */
class Regions extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_regions(){
        return array(
            '0' =>'Select Region',
            'Ashanti' => 'Ashanti',
            'Brong-Ahafo' => 'Brong-Ahafo',
            'Greater Accra' => 'Greater Accra',
            'Central' => 'Central',
            'Eastern' => 'Eastern',
            'Northern' => 'Northern',
            'Western' => 'Western',
            'Upper East' => 'Upper East',
            'Upper West' => 'Upper West',
            'Volta' => 'Volta'
        );
    }
    
    public function get_cities(){
        return array(
            '0' => 'Select City',
                    'Aboso' => 'Aboso','Aburi' => 'Aburi',  'Accra' => 'Accra',
                    'Adenta East' => 'Adenta East', 'Aflao' => 'Aflao',
                    'Agogo' => 'Agogo','Akim Oda' => 'Akin Oda',
                    'Akim Swedru' => 'Akim Swedru',   'Akosombo' => 'Akosombo',
                    'Akropong' => 'Akropong','Akwatia' => 'Akwatia',
                    'Anloga' => 'Anloga', 'Anomabu' => 'Anomabu','Apam' => 'Apam',
                    'Asamankese' => 'Asamankese','Ashiaman' => 'Ashiaman',
                    'Axim' => 'Axim','Banda Ahenkro' => 'Banda Ahenkro',
                    'Bawku' => 'Bawku', 'Bechem' => 'Bechem','Begoro' => 'Begoro',
                    'Bekwai' => 'Bekwai','Berekum' => 'Berekum','Bibiani' => 'Bibiani',
                    'Bolgatanga' => 'Bolgatanga','Cape Coast' => 'Cape Coast',
                    'Dome' => 'Dome','Effiakuma' => 'Tarkwa',
                    'Ejura' => 'Ejura','Elmina' => 'Elmina',  'Foso' => 'Foso',
                    'Gbawe' => 'Gbawe','Ho' => 'Ho', 'Hohoe' => 'Hohoe',
                    'Japekrom' => 'Japekrom','Kade' => 'Kade','Keta' => 'Keta', 
                    'Kete-Krachi' => 'Kete-Krachi','Kibi' => 'Kibi', 
                    'Kintampo' => 'Kintampo','Kintampo' => 'Kintampo', 
                    'Koforidua' => 'Koforidua','Konongo' => 'Konogo','Kpandae' => 'Kpandae',
                    'Kpandu' => 'Kpandu','Kumasi' => 'Kumasi','Lashibi' => 'Lashibi',
                    'Madina' => 'Madina','Mampong' => 'Mampong','Mpraeso' => 'Mpraeso',
                    'Mumford' => 'Mumford','Navrongo' => 'Navrongo','New Town' => 'New Town',
                    'Nkawkaw' => 'Nkawkaw','Nkwanta' => 'Nkwanta',
                    'Nsawam' => 'Nsawam','Nungua' => 'Nungua',
                    'Nyakrom' => 'Nyakrom','Obuasi' => 'Obuasi',
                    'Odunponkpehe' => 'Odunponkpehe','Offin' => 'Offin',
                    'Prestea' => 'Prestea','Salaga' => 'Salaga',
                    'Saltpond' => 'Saltpond','Savelugu' => 'Savelugu','Shama' => 'Shama',
                    'Somanya' => 'Somanya','Suhum' => 'Suhum','Sunyani' => 'Sunyani',
                    'Swendru' => 'Swendru','Tafo' => 'Tafo','Taifa' => 'Taifa',
                    'Takoradi' => 'Takoradi','Tamale' => 'Tamale','Techiman' => 'Techiman',
                    'Tema' => 'Tema','Teshie' => 'Teshie','Wa' => 'Wa', 
                    'Wenchi' => 'Wenchi','Winneba' => 'Winneba','Yendi' => 'Yendi'
        );
    }
}

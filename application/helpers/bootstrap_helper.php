<?php

function getLabelColorText($numero) {
    if ($numero > 70) {
        $color = 'label-success';
    } elseif ($numero > 40) {
        $color = 'label-warning';
    } else {
        $color = 'label-danger';
    }

    return $color;
}

function checkDocumentoOK($estado) {
    switch ($estado) {
        case 'KO':
            return 'false';
            break;
        case 'OK':
            return 'checked="true"';
            break;
    }
}

function randomColor(){
    switch (rand(1,12)){
    case 1: 
        return 'label-danger';
        break; 
    case 2: 
        return 'label-primary';
        break; 
    case 3: 
        return 'label-info';
        break; 
    case 4: 
        return 'label-success';
        break;    
    case 5: 
        return 'label-warning';
        break;
    case 6: 
        return 'label-gray';
        break;
    case 7: 
        return 'label-navy';
        break;
    case 8: 
        return 'label-teal';
        break;
    case 9: 
        return 'label-purple';
        break;
    case 10: 
        return 'label-orange';
        break;
    case 11: 
        return 'label-maroon';
        break;
    case 12: 
        return 'label-black';
        break;
    }
    
}

function randomColorLabel(){
    switch (rand(1,5)){
    case 1: 
        return 'label-danger';
        break; 
    case 2: 
        return 'label-primary';
        break; 
    case 3: 
        return 'label-info';
        break; 
    case 4: 
        return 'label-success';
        break;    
    case 5: 
        return 'label-warning';
        break;
    }
    
}

function getColorEstado($estado) {
	switch ($estado) {
	    case 'SI':
	        return 'bg-green';
	        break;
            case 'Vigente':
	        return 'bg-green';
	        break;
	}
}

function getEstadoSelect($estado, $campo){
    if($estado == $campo){
        return 'selected';

    } else{
        return '';
    }
}

?>
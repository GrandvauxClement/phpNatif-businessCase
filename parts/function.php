<?php
    function switchClassFormValid($raison){
        if (!$raison){
             return 'is-valid';
        } else {
            return 'is-invalid';
        }
    }

    function displayValueIfIsValid($field){
        if (!$field['error']){
            return "value=\"".$field['value']."\"";
        } else {
            return "value = ''";
        }
    }

    function displayErrors($field){

        if($field['error']) {
            return '<div id="validationServer05Feedback" class="invalid-feedback">
                                   '.$field['cause'].'
                    </div>';
        } else {
            return '';
        }
    }
<?php

class SqlBuilder{

    public function render(){
        global $smarty;
        $smarty->display('builder.tpl');
    }

}

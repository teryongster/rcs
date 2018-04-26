<?php
function setActive($path){
    if(Request::is($path . '*')){
    	return 'active';
    }
}
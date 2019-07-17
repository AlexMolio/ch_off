<?php
class Validation
{
	public static function checkComment($comment){ 
        if(strip_tags($comment) == $comment){
            
    		if(strlen($comment) >= 6) {
    			return true;
    		}
        }
		return false;
	}
	public static function checkEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}
	
	
	
	public static function checkName($name) 
	{ 
	    if(strip_tags($name) == $name){
	        
    	    if(strlen($name) >= 2){
    	        return true;
    	    } 
	    }   
	    return false;
	    
	}

	public static function checkTel($tel) 
	{ 
	    if(strip_tags($tel) == $tel){
	        
    	    if(strlen($tel) >= 11){
    	        return true;
    	    } 
	    }   
	    return false;
	    
	}
	
	
}
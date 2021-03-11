<?php

	//Fonction permettant d'éviter les failles XSS
	function e($str){
	    return htmlspecialchars($str, ENT_QUOTES);
	}

	//Retourne True si le mail est correct
	function isMail($mail) {
		return preg_match('/^[a-z0-9][a-z0-9._-]*@[a-z0-9_-]{2,}(\.[a-z]{2,4}){1,2}$/', $mail) ; 
	}

	//Retourne true si le numéro de tel est correct
	function isPhone($phone) {
		return preg_match('/^(|06|07)[0-9]{8}$/', $phone) ; 
	}

	//Retroune true si le login est correct
	function isLogin($login){
		return isMail($login) || isPhone($login) ; 
	}


	//Retroune true si la date de naissance est correct. Par exemple 31 Février non correct. 
	function isDate($day, $month, $year) {
		return checkdate(intval($month),intval($day),intval($year)) ; 
	}

	//Retroune true si le nom et prenom sont correct.
	function isName($fname, $lname){
		return preg_match('/^[a-zA-Z]+$/', $fname) && preg_match('/^[a-zA-Z]+$/', $lname)  ; 
	}


	//Retroune true si le formulaire pour s'enregistrer  est correct
	function checkData($data) {
		if (isset($data['fname'], $data['lname'], $data['login'], $data['pass'], $data['day'], $data['month'], $data['year'], $data['gender'])) {
			return  
				isName($data['fname'], $data['lname']) 
				&& isDate($data['day'], $data['month'], $data['year'])
				&& isLogin($data['login']) 
				&& $data['login'] === $data['conflogin'] ;  
		}
		return false ; 
	}











?>

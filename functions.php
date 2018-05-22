<?php
   //Funzione che riceve in ingresso una stringa e restituisce i suoi primi
   //150 caratteri seguiti da 3punti
   function getFirst150($string) {
      $new_str = substr($string, 0, 150);
      $new_str .= ' ...';
      return $new_str;
   }
?>

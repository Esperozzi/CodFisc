<?php

/**
 * Identato male
 * Class Codicecognome
 * @author Alespero
 */
class Codicecognome
{

    private string $codcognome;  //Parte del codice fiscale relativa al cognome

     /**
     * Metodo costruttore che necessita del cognome sotto forma di stringa, accetta spazi,caratteri lowercase e uppercase
     */
    function __construct(string $stri)
    {

        $s = strtoupper($stri);                   //Trasformazione della String in UPPERCASE
        $s = str_split($s, 1);        //Passaggio da stringa ad ARRAY


        $a=array();

        foreach ($s as $arr => $val )             //Eliminazione spazi vuoti
        {
            if ($val == " ")
                unset($s[$arr]);
        }



        foreach ($s as $x)                        //Creazione di un array con le sole consonanti
          if ($x != 'A' && $x != 'E' && $x != 'I' && $x != 'O' && $x != 'U')
              $a[]=$x;

        if (count($a) > 2)                       //Taglio dell'array se ci sono abbastanza consonanti
            $a = array_slice($a, 0, 3);
        else {
            foreach ($s as $x)                  //Aggiunta delle vocali in caso di consonanti insufficienti
                if ($x == 'A' || $x == 'E' || $x == 'I' || $x == 'O' || $x == 'U')
                    $a[]=$x;

            $xxx = array('X','X','X');          //Aggiunta XXX in caso di vocali insufficienti
            $a=array_merge($a,$xxx);

            $a = array_slice($a, 0, 3);  //Taglio dell'array finale
        }

        $this->codcognome=implode($a);          //Trasformazione in Stringa

    }

    /**
     * @return string
     * Metodo ritorna la sola stringa con i caratteri relativi al cognome
     */
    function getcodice(): string
    {
        return $this->codcognome;
    }


     /**
     * Metodo To_String che ritorna lo stato dell'oggetto
     */
    function __tostring(): string
    {
        $a= "Il codice relativo al cognome calcolato è : ".$this->codcognome;
        return $a;
    }


}
?>
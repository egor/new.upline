<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DateOperations
 *
 * @author egorik
 */
class DateOperations {
    //put your code here
    public function dateToUnixTime($date)
    {
        $data = explode('.', $date);
        return mktime(0, 0, 0, $data[1], $data[0], $data[2]);
    }
}

?>

<?php

    function html_td($content){
        return "<td>" . $content . "</td>";
    }
    function html_tr($tds){
        $tr = "<tr>" ;
        foreach($tds as $td)
            $tr .= html_td($td);
        $tr .= "</tr>";
        return $tr;
    }

?>
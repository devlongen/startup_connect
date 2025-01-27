<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function montaMenu(){
    $html = '<p>'
                .'<table border="1">'
                    .'<tr>'
                        .'<td>USUÁRIOS</td>'
                        .'<td>PRODUTOS</td>'
                        .'<td>PERFIL</td>'
                    .'</tr>'      
                .'</table>'
            .'</p>';

    return $html;
}

?>

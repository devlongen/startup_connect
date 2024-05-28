<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function montaMenu(){
    
    $html = '<p>'
                .'<table border="1">'
                    .'<tr>'
                        .'<td>USUÁRIOS</td>';

                        if($_SESSION['idusuario'] == 1){
                            $html .= '<td>PRODUTOS</td>';
                        }
                        
                        $html .=
                        '<td>PERFIL</td>'
                        .'<td>'
                            .'<a href="php/validaLogoff.php">SAIR</a>'
                        .'</td>'
                    .'</tr>'      
                .'</table>'
            .'</p>';

    return $html;
}

?>
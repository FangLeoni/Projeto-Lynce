<?php
                             //local      login  senha   banco
    $conexao = mysqli_connect("localhost","root","","projetoLynce");

    if(mysqli_connect_errno())
    {
        echo "Aconexão MYSQLi apresentou erro: " . mysqli_connect_error();
    }

?>
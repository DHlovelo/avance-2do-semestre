<?php
$termino = trim($_get["termino"]??"");
if ($termino ==="") exit("escribe algo");
$seguro = htmlspecialchars($termino, ent_quotes);
<?php
include_once(__DIR__."/include/header.php");
include_once(__DIR__."/../controller/personagemController.php");
$personagemCont = new PersonagemController();

?>

<div class="container mt-4">
    <div class="row">

<?php
    include_once(__DIR__."/form.php");
    include_once(__DIR__."/include/footer.php");
?>

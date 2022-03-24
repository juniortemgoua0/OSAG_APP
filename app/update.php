<?php

$formData = $_GET['formData'];

$feedback = Utils::update($formData['type'], $formData['operation'], $formData['id'] , $formData['quantite']);

echo $feedback;

?>
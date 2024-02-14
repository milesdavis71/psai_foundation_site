<?php
/* Get the name of the uploaded file */
$filename = $_FILES['file']['name'];

/* Choose where to save the uploaded file */
$location = "uploads/" . $filename;

/* Save the uploaded file */
move_uploaded_file($_FILES['file']['tmp_name'], $location);

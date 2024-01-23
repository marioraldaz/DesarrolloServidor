<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $xmlFile = @simplexml_load_file("books.xml");

    // Check if the XML file was loaded successfully
    if ($xmlFile !== false) {
        // If the file was loaded, use it as the base XML
        $xml = $xmlFile;
    } else {
        // If the file doesn't exist or cannot be loaded, create a new XML
        $xml = new SimpleXMLElement("<catalog></catalog>");
    }

    // Create a new 'book' element and add it to the XML
    $book = $xml->addChild("book");

    // Add a 'title' element to the 'book' element with the value "titulo"
    $book->addChild("title", "titulo");

    // Save the modified XML back to the file (if applicable)
    $success = $xml->asXML("books.xml");

    // Optionally, you can print or var_dump the modified XML
    if ($success) {
        // Read the modified XML content for display
        $modifiedXML = file_get_contents("books.xml");
        echo "Modified XML: <pre>" . htmlspecialchars($modifiedXML) . "</pre>";
    } else {
        echo "Failed to save the modified XML.";
    }
?>
</body>
</html>
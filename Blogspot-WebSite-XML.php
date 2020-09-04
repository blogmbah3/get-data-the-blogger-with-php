<?php
$file = "[URL_BLOGSPOT]/atom.xml";
$xml = simplexml_load_file($file) or die("Unable to load XML file!");
$xml = $xml->entry;

foreach ($xml as $row) : ?>

<?php // Coletando Link dos Posts
echo $row->link[4]['href']; ?>


<?php // Coletando primeira imagem dentro de um HTML.
preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $row->content, $image); ?>
<?php if($image) : ?>					
<img src="<?php echo $image['src']; ?>">
<?php endif; ?>
												
<?php // Título
echo $row->title; ?>

<?php // Autor
echo "Autor: " . $row->author->name; ?>

<?php  // Published
echo "Publicado em: " . date("d/m/Y", strtotime(strtok($row->published, 'T'))); ?>
                            
<?php // Limpando códigos HTML - Summary
echo substr(strip_tags($row->content), 0, 500) . "..."; ?>

<?php endforeach;?>


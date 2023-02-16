<?php
/**
 * ACF Banner Block
 *
 * This is an example of how to create an ACF Banner Block.
 * Make sure that the location (setLocation) exists in the
 * acf/blocks and should match the name in block.json file
 *
 * @package greydientlab
 */

$banner = new StoutLogic\AcfBuilder\FieldsBuilder( 'banner' );
$banner
	->addText( 'title' )
	->addWysiwyg( 'content' )
	->addImage( 'background_image' )
	->setLocation( 'block', '==', 'acf/banner' );

return $banner;

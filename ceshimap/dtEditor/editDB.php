<?php 
	include("editor/php/DataTables.php");

	// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;

    //第二个参数：表名
    // var_dump($editDb);
    // var_dump($sql_details);
    
    Editor::inst( $editDb, "aijiacms_ceshimap" )
    ->fields(
        Field::inst( 'id' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'province' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'city' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'district' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'town' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'address' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'rent' ),
        Field::inst( 'location' ),
        Field::inst( 'area' )
            ->validator( 'Validate::numeric' )
            ->setFormatter( 'Format::ifEmpty', null ),
        Field::inst( 'sellingPrice' )
            ->validator( 'Validate::numeric' )
            ->setFormatter( 'Format::ifEmpty', null ),
        Field::inst( 'updateDate' )

    )
    ->process( $_POST )
    ->json();

?>
<?php
/**
* @version 			SEBLOD 3.x More
* @package			SEBLOD (App Builder & CCK) // SEBLOD nano (Form Builder)
* @url				http://www.seblod.com
* @editor			Octopoos - www.octopoos.com
* @copyright		Copyright (C) 2013 SEBLOD. All Rights Reserved.
* @license 			GNU General Public License version 2 or later; see _LICENSE.php
**/

defined( '_JEXEC' ) or die;

// Plugin
class plgCCK_Field_LiveAuthor_Data extends JCckPluginLive
{
	protected static $type	=	'author_data';
	
	// -------- -------- -------- -------- -------- -------- -------- -------- // Prepare
		
	// onCCK_Field_LivePrepareForm
	public function onCCK_Field_LivePrepareForm( &$field, &$value = '', &$config = array() )
	{
		if ( self::$type != $field->live ) {
			return;
		}
		
		
		// Init
		$live	= JRequest::getInt('id'); 
		$options	=	parent::g_getLive( $field->live_options );
		
		// Prepare
		$variable	=	$options->get( 'variable' );
		if ( $variable ) {
			//
		}
		
                 
                 $db =  JFactory::getDBO();
			$query = ( 'SELECT created_by FROM `#__content` where id = ' .$live );
			$db->setQuery($query);
			$auhtor = $db->loadResult();	
			
                  
                     $query = "SELECT $variable FROM #__users WHERE id = $auhtor"; // verifica no banco
                             $db->setQuery($query);
                             
                             $user_array = $db->loadResult();
                              
                             

			

			//Reurn the Value
                        $value = $user_array;
	}
}
?>

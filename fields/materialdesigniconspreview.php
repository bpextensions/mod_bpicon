<?php

/**
 * @package		aterialDesignIconsPreview
 * @date		2016-05-27
 * @author		Artur Stępień
 * @email		artur.stepien@bestproject.pl
 * @copyright	(C) 2016 Bestproject. All rights reserved.
 * @license		GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 * @link		http://www.bestproject.pl
 */

defined('_JEXEC') or die;
jimport('joomla.form.field');

class JFormFieldMaterialDesignIconsPreview extends JFormField {

	protected $doc;

	/**
	 * Create form element.
	 *
	 * @param   JForm   $form
	 */
	public function __construct($form = null) {

		// Form field type create default method
		parent::__construct($form);

		// Required objects
		$this->doc = JFactory::getDocument();

		// Setup preview script for this fieldtype
		$this->setupFieldType();

	}

	/**
	 * Get field HTML.
	 *
	 * @return   string
	 */
	public function getInput() {
		// Setup instance script for this field id
		$this->setupInstanceScript();

		$html = '<div class="input-prepend input-append">';
		$html.= '<span class="add-on"><i class="material-icons preview" id="'.$this->id.'-preview">'.$this->value.'</i></span>';
		$html.= '<input type="text" name="'.$this->name.'" id="'.$this->id.'" value="'.$this->value.'" readonly />';
		$html.= '<button class="btn" type="button">'.JText::_('JSELECT').'</button>';
		$html.= '</div>';

		return $html;
	}

	/**
	 * Setup a field type
	 */
	protected function setupFieldType(){

		// jQuery is required for this field type to work
		JHTML::_('jquery.framework');

		// If debug is enabled do not use compressed code
		if( JFactory::getApplication()->get('debug') ) {
			$this->doc->addScript(JURI::root().substr($this->getRelativePath(JPATH_ROOT, __DIR__.'/materialdesigniconspreview.js'),1));
			$this->doc->addStyleSheet(JURI::root().substr($this->getRelativePath(JPATH_ROOT, __DIR__.'/materialdesigniconspreview.css'),1));

		// Not debug enabled, use minified code
		} else {
			$this->doc->addScript(JURI::root().substr($this->getRelativePath(JPATH_ROOT, __DIR__.'/materialdesigniconspreview.min.js'),1));
			$this->doc->addStyleSheet(JURI::root().substr($this->getRelativePath(JPATH_ROOT, __DIR__.'/materialdesigniconspreview.min.css'),1));
		}
		$this->doc->addStyleSheet('https://fonts.googleapis.com/icon?family=Material+Icons');
	}

	/**
	 * Setup this field (single instance)
	 */
	protected function setupInstanceScript(){
		
		// Setup icons list data
		$this->doc->addScriptDeclaration('
			jQuery(document).ready(function($){
				$("#'.$this->id.'+.btn").click(function(){
					$(window).MaterialDesignIconsDrawPreview("'.$this->id.'","'.JText::_('JSEARCH_FILTER').'","'.JText::_('JCANCEL').'");
					$("#MaterialDesignIconsPreview input").focus().select();
				});
			});
		');

	}

	/**
     * Return a relative path to a file or directory using base directory.
     * When you set $base to /website and $path to /website/store/library.php
     * this function will return /store/library.php
     *
     * Remember: All paths have to start from "/" or "\" this is not Windows compatible.
     *
     * @param   String   $base   A base path used to construct relative path. For example /website
     * @param   String   $path   A full path to file or directory used to construct relative path. For example /website/store/library.php
     *
     * @return  String
     */
    function getRelativePath($base, $path) {
        // Detect directory separator
        $separator = substr($base, 0, 1);
        $base = array_slice(explode($separator, rtrim($base,$separator)),1);
        $path = array_slice(explode($separator, rtrim($path,$separator)),1);

        return $separator.implode($separator, array_slice($path, count($base)));
    }

}
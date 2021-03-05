<?php
/**
 * containerField - is a plain-text container (of fields) for forms
 *
 * @package rapyd.components.fields
 * @author Felice Ostuni <felix@rapyd.com>
 * @license http://www.fsf.org/licensing/licenses/lgpl.txt LGPL
 * @copyright Copyright (c) 2006 Felice Ostuni - http://www.rapyd.com
 * @version 0.9
 */
 
 
 /**
 * containerField
 *
 * @package    rapyd.components.fields
 * @author     Felice Ostuni
 * @author     Thierry Rey
 * @access     public
 */
class iframeField extends objField{

  var $type = "iframe";

  var $fieldList = array();
  var $iframe = null;
  var $iframe_url = null;
  
  function iframeField($name, $uri, $height="200", $scrolling="auto", $frameborder="0")
  {
    $label = $name;
    parent::objField($label, $name);
    $this->db_name = null;
    $this->iframe_uri = $uri;
    
    if (strpos($uri,"#>")>0){
      $this->_parsePattern($uri);
    }
    $this->iframe = '<IFRAME src="<##>" width="100%" height="'.$height.'" scrolling="'.$scrolling.'" frameborder="'.$frameborder.'" id="'.$name.'">iframe not supported</IFRAME>';
    $this->iframe_url = site_url($uri);
  }

  

  
  
  function _getValue(){
  
    parent::_getValue();
    

    if(count($this->parsed_fields)>0)
    {
      if(isset($this->data) && $this->data->loaded)
      {
        $data = $this->data->get_all();
        foreach ($this->parsed_fields as $field_name)
        {
          if(isset($data[$field_name]))
          {
            $this->iframe_url = str_replace("<#$field_name#>",$data[$field_name],$this->iframe_url);
          }
        }
      }
    }
    $this->value = str_replace("<##>",$this->iframe_url,$this->iframe);
  }
  
  
  
  function build()
  {
    $this->_getValue();
    
    $output = "";
    
    switch ($this->status){
    
      case "show":
      case "create":
      case "modify":
      
        $output = $this->value;
        break;
        
      case "hidden":
      
        $output = "";

        break;
        
      default:
    }
    $this->output = "\n".$output."\n";

  }
    
}
?>
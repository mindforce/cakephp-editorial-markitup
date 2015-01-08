<?php
namespace Editorial\Markitup\View\Helper;

use Editorial\Core\View\Helper\EditorialHelper;
use Cake\Core\Configure;

/**
 * Markitup helper
 */
class MarkitupHelper extends EditorialHelper{

  public function initialize(){
    	$this->Html->script('Editorial/Markitup.jquery.markitup.js', ['block' => true]);
      $this->Html->css('Editorial/Markitup.sets/default/style.css', ['block' => true]);
      $skin = $this->config('options.skin');
      if(empty($skin)){
        $skin = 'markitup';
      }
      $this->Html->css('Editorial/Markitup.skins/'.$skin.'/style.css', ['block' => true]);
  }

  public function connect($content = null){
      if(empty($content)){
        return;
      }
      	$searchRegex = '/(<textarea.*class\=\".*'
    			.Configure::read('Editorial.class').'\"[^>]*>.*<\/textarea>)/isU';
    		$js = '';
    		if(preg_match_all($searchRegex, $content, $matches)){
    			$js .= "window.onload = function() {\n";
    			$editorOptions = $this->js_encode($this->config('options'));
    			foreach ($matches[0] as $input){
    				if(preg_match('/<textarea.*id\=\"(.*)\"[^>]*>.*<\/textarea>/isU', $input, $idMatches)) {
    					$js .= "\t$('#".$idMatches[1]."').markItUp(".$editorOptions.");\n";
    				}
    			}
    			$js .= "};\n";
    		}
    		if(!empty($js)){
    			$this->Html->scriptBlock($js, ['block' => true]);
    		}
  }

  public function js_encode($config = null){
    if(empty($config)){
      return;
    }
    $str = '';
    foreach($config as $key => $value){
      if(is_array($value)){
        $str .= (is_int($key)?'':'"'.$key.'"'.':'). $this->js_encode($value).',';
      }else{
        $str .= (substr($value,0,11) == 'javascript:')? $key.':'.substr($value,11).',': $key.':'.json_encode($value).',';
      }
    }
    if(!$this->key_int($config)){
      return '{'.$str.'}';
    }else{
      return '['.$str.']';
    }
  }

  public function key_int($array){
      foreach($array as $key => $value){
        if(!is_int($key)){
          return false;
        }
      }
    return true;
  }
}

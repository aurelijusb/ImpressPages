<?php
/**
 * @package		Library
 *
 *
 */
namespace Ip\Lib\StdMod\Element;


class Text extends Element{ //data element in area
    var $regExpression;
    var $regExpressionError;
    var $maxLength;

    function __construct($variables){
        if(!isset($variables['order'])){
            $variables['order'] = true;
        }

        parent::__construct($variables);

        if(!isset($variables['dbField']) || $variables['dbField'] == ''){
            $backtrace = debug_backtrace();
            if(isset($backtrace[0]['file']) && $backtrace[0]['line'])
            trigger_error('ElementText dbField parameter not set. (Error source: '.$backtrace[0]['file'].' line: '.$backtrace[0]['line'].' ) ');
            else
            trigger_error('ElementText dbField parameter not set.');
            exit;
        }

        foreach ($variables as $name => $value) {
            switch ($name){
                case 'regExpression':
                    $this->regExpression = $value;
                    break;
                case 'regExpressionError':
                    $this->regExpressionError = $value;
                    break;
                case 'maxLength':
                    $this->maxLength = $value;
                    break;
                case 'dbField':
                    $this->dbField = $value;
                    break;

            }
        }

    }

    function printFieldNew($prefix, $parentId = null, $area = null){
        $html = new \Ip\Lib\StdMod\StdModHtmlOutput();
        $value = null;

        if($this->maxLength)
        $html->input($prefix, $this->defaultValue, $this->disabledOnInsert, $this->maxLength);
        else
        $html->input($prefix, $this->defaultValue, $this->disabledOnInsert);

        return $html->html;

    }



    function printFieldUpdate($prefix, $record, $area){
        $value = null;

        $value = $record[$this->dbField];

        $html = new \Ip\Lib\StdMod\StdModHtmlOutput();
        if($this->maxLength)
        $html->input($prefix, $value, $this->disabledOnUpdate, $this->maxLength);
        else
        $html->input($prefix, $value, $this->disabledOnUpdate);
        return $html->html;



    }

    function getParameters($action, $prefix, $area){
        if($action == 'insert'){
            if($this->visibleOnInsert && !$this->disabledOnInsert && $action == 'insert'){
                return array("name"=>$this->dbField, "value"=>$_REQUEST[''.$prefix]);
            }else{
                return array("name"=>$this->dbField, "value"=>$this->defaultValue);
            }
        }
        if($action == 'update'){
            if($this->visibleOnUpdate && !$this->disabledOnUpdate && $action == 'update'){
                return array("name"=>$this->dbField, "value"=>$_REQUEST[''.$prefix]);
            }
        }
    }


    function previewValue($record, $area){
        require_once \Ip\Config::libraryFile('php/text/string.php');

        $answer = mb_substr($record[$this->dbField], 0, $this->previewLength);
        $answer = htmlspecialchars($answer);
        $answer = \Library\Php\Text\String::mb_wordwrap($answer, 10, "&#x200B;", 1);
        return $answer;

    }

    function checkField($prefix, $action, $area){
        global $parametersMod;


        if($action != 'update' || !$this->disabledOnUpdate && $this->visibleOnUpdate){
            if($action == 'insert' && $this->disabledOnInsert || $action == 'insert' && !$this->visibleOnInsert)
            $_POST[$prefix] = $this->defaultValue;

            if ($this->required && (!isset($_POST[$prefix]) || $_POST[$prefix] == null))
            return __('Required field', 'ipAdmin');

            if($this->maxLength != null){
                if (sizeof($_POST[$prefix]) > $this->maxLength) {
                    return $parametersMod->getValue('StdMod.error_long');
                }
            }


            if($this->regExpression != null){
                if($_POST[$prefix] == null || preg_match($this->regExpression, $_POST[$prefix]))
                return null;
                else
                return $this->regExpressionError.'&nbsp;';
            }

        }

        return null;
    }




    function printSearchField($level, $key, $area){
        if (isset($_REQUEST['search'][$level][$key]))
        $value = $_REQUEST['search'][$level][$key];
        else
        $value = '';
        return '<input name="search['.$level.']['.$key.']" value="'.htmlspecialchars($value).'" />';
    }

    function getFilterOption($value, $area){
        return " `".$this->dbField."` like '%".ip_deprecated_mysql_real_escape_string($value)."%' ";
    }


}

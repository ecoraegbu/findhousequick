<?php
class Validator {
    private $data;
    private $errors = array();
    private $db;
    
    public function __construct($data) {
        $this->data = $data;
        $this->db = Database::getInstance();
    }
    
    public function validate($rules) {
        foreach($rules as $item => $rule) {
            $value = trim($this->data[$item]);
            $rules = explode('|', $rule);

            foreach($rules as $rule) {
                $rule_value = null;
                if(strpos($rule, ':') !== false) {
                    list($rule, $rule_value) = explode(':', $rule, 2);
                }

                switch($rule) {
                    case 'required':
                        if(empty($value)) {
                            $this->addError("{$item} is required.");
                        }
                        break;

                    case 'matches':

                        if($value != $this->data[$rule_value]){
                            $this->addError("{$item}s must match");
                        }
                        break;

                    case 'unique':
                        list($table, $column) = explode(',', $rule_value, 2);
                        $check = $this->db->get($table, array($column, '=', $value));
                        if($check->count()){
                            $this->addError("{$item} already exists.");
                        }
                        break;
                        

                    case 'regex':
                        
                        if(!preg_match($rule_value, $value)) {
                            $this->addError("{$item} must contain a capital letter, a number and a special character");
                        }
                        break;
                        case 'alpha':
                          if(!ctype_alpha($value)){
                              $this->addError("{$item} must only contain letters.");
                          }
                          break;
                      case 'alpha_num':
                          if(!ctype_alnum($value)){
                              $this->addError("{$item} must only contain letters and numbers.");
                          }
                          break;
                      case 'alpha_dash':
                          if(!preg_match('/^[a-zA-Z0-9_\-]+$/', $value)){
                              $this->addError("{$item} must only contain letters, numbers, underscores, and dashes.");
                          }
                          break;
                      case 'numeric':
                          if(!is_numeric($value)){
                              $this->addError("{$item} must be a number.");
                          }
                          break;
                      case 'email':
                          if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                              $this->addError("{$item} is not a valid email address.");
                          }
                          break;
                      case 'url':
                          if(!filter_var($value, FILTER_VALIDATE_URL)){
                              $this->addError("{$item} is not a valid URL.");
                          }
                          break;
                      case 'ip':
                          if(!filter_var($value, FILTER_VALIDATE_IP)){
                              $this->addError("{$item} is not a valid IP address.");
                          }
                          break;
                      case 'alpha_space':
                          if(!preg_match('/^[a-zA-Z\s]+$/', $value)){
                              $this->addError("{$item} must only contain letters and spaces.");
                          }
                          break;
                      case 'min':
                          if(strlen($value) < $rule_value){
                              $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                          }
                          break;
                      case 'max':
                          if(strlen($value) > $rule_value){
                              $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                          }
                          break;

                    default:
                        // do nothing
                        break;
                }
            }
        }

        return $this;
    }
    
    public function passes() {
        return empty($this->errors);
    }
    
    public function fails() {
        return !$this->passes();
    }
    
    public function errors() {
        return $this->errors;
    }
    
    private function addError($error) {
        $this->errors[] = $error;
    }
}

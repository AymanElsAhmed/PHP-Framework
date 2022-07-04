<?php

namespace app\core;


abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public array $errors = [];

    public function loadData($data){
        foreach ($data as $key => $value){
            if (property_exists($this, $key)){
               $this->{$key} = $value;
            }
        }
    }
    abstract public function rules(): array ;

    public function validate(): bool
    {
        foreach ($this->rules() as $attribute => $rules){
            $value = $this->{$attribute};
            foreach ($rules as $rule){
                $ruleName = $rule;
                if (!is_string($ruleName)){
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addError($attribute, self::RULE_REQUIRED);
                 }
            }
        }
        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule)
    {
            $message = $this->errorMessage()[$rule] ?? '';
            $this->errors[$attribute] = $message;
    }

    public function errorMessage(){
        return [
            self::RULE_REQUIRED => 'this field is required'
        ];
    }
}
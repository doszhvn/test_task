<?php

class Validator
{
    //Можно добавить поддержку новых типов путём добавления новых методов в класс
    public function phoneNumber($value)
    {
        $value = preg_replace('/[^0-9]/', '', $value);
        if (strlen($value) !== 11) {
            return "The phone number '$value' must contain 11 digits.";
        } else {
            if (preg_match('/^8[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}$/', $value)) {
                return "7" . substr($value, 1);
            } else {
                return "Phone number '$value' does not follow the format 8 (XXX) XXX-XX-XX.";
            }
        }
    }


    public function integer($value)
    {
        $intVal = filter_var($value, FILTER_VALIDATE_INT);
        if($intVal){
            return intval($intVal);
        } else {
            return "The value '$value' entered is not an integer.";
        }
    }

    public function string($value)
    {
        if (preg_match('/[0-9]/', $value)) {
            return "The string '$value' contains numbers and cannot be accepted.";
        } else {
            return $value;
        }
    }
}

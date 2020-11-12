<?php

/**
 * Classe "abstraite" qui ne peut pas être instanciée.
 *
 * Cette classe décrit un champ générique, sans type particulier.
 * Un champ est un objet qui stocke une valeur. Cette valeur peut être représentée
 * dans une page web (par exemple avec <INPUT>) ou dans une base de données.
 * Cette classe ne décrit pas comment représenter le champ.
 *
 * @author Jean-Bernard HUET
 *
 * @version 1.0.0
 */

abstract class TFormField 
{

    protected $Value;

    protected $RawValue;

    protected $IsMandatory;

    /**
     */
    public function __construct(string $InitialValue = "", bool $MandatoryValue = true)
    {
        $this->RawValue = $InitialValue;
        $this->SetValue($this->RawValue);
        $this->SetIsMandatory($MandatoryValue);
    }
    public function __get($property) {
        return $this->GetValue();
    }
    public function __set($name = "Value", $property){
        $this->SetValue($property);
    }

    abstract protected function Validate($ValueToValidate);

    abstract protected function Sanitize($ValueToSanitize);

    abstract protected function Escape($ValueToEscape);

    public function SetValue($ValueToSet)
    {
        $this->Value = $this->Escape($this->Sanitize($this->Validate($ValueToSet)));
    }

    public function GetValue()
    {
        return $this->Value;
    }

    public function SetIsMandatory($ParamValue)
    {
        $this->IsMandatory = boolval($ParamValue);
    }

    public function GetIsMandatory(): bool
    {
        return boolval($this->IsMandatory);
    }

    public function __toString(): string
    {
        return strval($this->Value);
    }
}

/**
 * Classe "fille" concrète qui peut être instanciée
 *
 * Cette classe décrit un champ de type Texte.
 *
 * @author Jean-Bernard HUET
 *
 * @version 1.0.0
 */
class TTextFormField extends TFormField
{

    /**
     */
    public function __construct(string $ValueToValidate = "", bool $IsMandatoryValue = false)
    {
        parent::__construct($ValueToValidate, $IsMandatoryValue);
        // Here the code of the current constructor
    }

    protected function Validate($ValueToValidate)
    {
        return strval($ValueToValidate);
    }

    protected function Sanitize($ValueToSanitize)
    {
        return filter_var($ValueToSanitize, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    protected function Escape($ValueToEscape)
    {
        return htmlspecialchars($ValueToEscape);
    }
}

class TNameFormField extends TTextFormField
{

    /**
     */
    public function __construct(string $ValueToValidate = "", bool $IsMandatoryValue = false)
    {
        parent::__construct($ValueToValidate, $IsMandatoryValue);
        // Here the code of the current constructor
    }

    protected function Validate($ValueToValidate)
    {   parent::Validate($ValueToValidate);
        return filter_var($ValueToValidate, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z-' ]*$/")));
    }
}

/**
 * Classe "fille" concrète qui peut être instanciée
 *
 * @author Jean-Bernard HUET
 *
 * @version 1.0.0
 */
class TEmailFormField extends TFormField
{

    /**
     */
    public function __construct(string $ValueToValidate = "", bool $IsMandatoryValue = false)
    {
        parent::__construct($ValueToValidate, $IsMandatoryValue);
        // Here the code of the current constructor
    }

    protected function Validate($ValueToValidate)
    {
        return filter_var($ValueToValidate, FILTER_VALIDATE_EMAIL);
    }

    protected function Sanitize($ValueToSanitize)
    {       
        return filter_var($ValueToSanitize, FILTER_SANITIZE_EMAIL);
    }

    protected function Escape($ValueToEscape)
    {
        return sprintf('%s', htmlspecialchars($ValueToEscape));
    }
}

/**
 * Classe "fille" concrète qui peut être instanciée
 *
 * @author Jean-Bernard HUET
 *
 * @version 1.0.0
 */
class TTelFormField extends TFormField
{

    /**
     */
    public function __construct(string $ValueToValidate = "", bool $IsMandatoryValue = false)
    {
        parent::__construct($ValueToValidate, $IsMandatoryValue);
        // Here the code of the current constructor
    }

    protected function Validate($ValueToValidate)
    {
        return filter_var($ValueToValidate, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'#[0][0-7][- \.?]?([0-9][0-9][- \.?]?){4}$#')));
    }

    protected function Sanitize($ValueToSanitize)
    {
        return filter_var($ValueToSanitize, FILTER_SANITIZE_STRING);
    }

    protected function Escape($ValueToEscape)
    {
        return filter_var($ValueToEscape, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
}

/**
 * Classe "fille" concrète qui peut être instanciée
 *
 * @author Jean-Bernard HUET
 *
 * @version 1.0.0
 */
class TTextareaFormField extends TFormField
{
    /**
     */
    public function __construct(string $ValueToValidate = "", bool $IsMandatoryValue = false)
    {
        parent::__construct($ValueToValidate, $IsMandatoryValue);
        // Here the code of the current constructor
    }

    protected function Validate($ValueToValidate)
    {
        return strval($ValueToValidate);
    }

    protected function Sanitize($ValueToSanitize)
    {
        return filter_var($ValueToSanitize, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    protected function Escape($ValueToEscape)
    {
        return sprintf('%s', htmlspecialchars($ValueToEscape));
    }
}

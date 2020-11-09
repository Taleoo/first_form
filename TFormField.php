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
    public function __construct($InitialValue = "", $MandatoryValue = false)
    {
        $this->RawValue = $InitialValue;
        $this->SetValue($this->RawValue);
        $this->SetIsMandatory($MandatoryValue);
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
    public function __construct($ValueParam)
    {
        parent::__construct($ValueParam);
        // Here the code of the current constructor
    }

    protected function Validate($ValueToValidate)
    {}

    protected function Sanitize($ValueToSanitize)
    {}

    protected function Escape($ValueToEscape)
    {}
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
    public function __construct($ValueParam)
    {
        parent::__construct($ValueParam);
        // Here the code of the current constructor
    }

    protected function Validate($ValueToValidate)
    {}

    protected function Sanitize($ValueToSanitize)
    {}

    protected function Escape($ValueToEscape)
    {}
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
    public function __construct($ValueParam)
    {
        parent::__construct($ValueParam);
        // Here the code of the current constructor
    }

    protected function Validate($ValueToValidate)
    {}

    protected function Sanitize($ValueToSanitize)
    {}

    protected function Escape($ValueToEscape)
    {}
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
    public function __construct($ValueParam)
    {
        parent::__construct($ValueParam);
        // Here the code of the current constructor
    }

    protected function Validate($ValueToValidate)
    {}

    protected function Sanitize($ValueToSanitize)
    {}

    protected function Escape($ValueToEscape)
    {}
}

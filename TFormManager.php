<?php
//include "TFormField.php";
/**
 * Classe "abstraite" qui ne peut pas être instanciée
 *
 * Cette classe décrit ce que doit être un formulaire, ce qu'il peut faire et comment.
 * Cette classe ne décrit pas la représentation du formulaire, mais bien son fonctionnement.
 *
 * @author Jean-Bernard HUET
 *
 * @version 1.0.0
 */
abstract class TFormManager
{
    public $TFormList = [];
 /*   protected $TMandatoryFieldList = [];
    protected $TValidatedFieldType = [
            "TextArea",
            "Name",
            "Tel",
            "Email",
            "Address"
    ];
    /**
     */
  //  abstract protected function InitForm();
   // abstract protected function ValidateForm();

    public function __construct(array $ArrayParams)
    {
        foreach($ArrayParams as $ArrayParam){
            array_push($this->TFormList, $ArrayParam);
        }
        
    }
    public function ResetFields(){
        foreach($this->TFormList as $Lala){
            $$Lala = "";
        }
    }
    
  /*  protected function AddField(string $FieldName = "", string $FieldType = "", bool $IsMandatory = false){
    }
    protected function DeleteField(string $FieldName = ""){

    }*/
}

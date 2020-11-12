<?php
include 'TFormField.php';
include 'TFormManager.php';
include 'THTMLOutput.php';

/**
 * Classe "concrète" pour décrire un formulaire de contact particulier
 *
 * Cette classe représente un ensemble de données qui forment un formulaire de contact.
 * Il ne s'agit pas d'un vrai formulaire mais de sa représentation : c'est l'ensemble des informations
 * nécessaires à un formulaire de contact particulier.
 *
 * Cette classe hérite ("extends") de TFormManager : c'est donc un formulaire.
 * Elle utilise le Trait THTMLOutput pour savoir comment représenter ses données dans une page web.
 * Elle est composée d'attributs de types descendants de TFormField qui stockent les données du formulaire.
 *
 * @author Jean-Bernard HUET
 *
 * @version 1.0.0
 */
class TFormulaireContact extends TFormManager
{
    use THTMLOutput;


    /**
     */
    public function __construct($ArrayParams)
    {
        parent::__construct($ArrayParams);
            $TabTemp = [];
            $Count = 0;
            foreach ($this->TFormList as $lala){
                $TabTemp[$Count] = $lala;
                $Count++;
                }
            $this->TFormList = $TabTemp;
            for ($i = 0; $i< count($this->TFormList); $i++ ){
                $Monobj = NULL;                
                switch ($this->TFormList[$i]["Type"]){
                    case "TextArea" :  $Monobj = New TTextareaFormField("");
                break;
                    case "Name": $Monobj = New TNameFormField("");
                break;
                    case "Tel": $Monobj = New TTelFormField("");
                break;
                    case "Email": $Monobj = New TEmailFormField("");
                break;
                    default : $Monobj = New TTextFormField("");
                break;
                }
                $this->TFormList[$i]["obj"] = $Monobj;
            }
    }
}// Si le formulaire est valide, envoyer les infos par mail
$lala = new TFormulaireContact([["Etiquette"=>"Message", "Type"=>"TextArea", "Mandatory" => true], ["Etiquette"=>"Telephone", "Type"=>"Tel", "Mandatory" => false]]);
print '<pre>';
print_r($lala->TFormList);
print '</pre>';

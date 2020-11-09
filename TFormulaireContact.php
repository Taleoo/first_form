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

    /* @var TextFormField Champ "Prénom", de type texte */
    private $Prenom;

    private $Nom;

    private $Email;

    private $Tel;

    private $Sujet;

    private $Message;

    /**
     */
    public function __construct()
    {
        $this->Prenom = new TTextFormField("");
        $this->Nom = new TTextFormField("");
        $this->Email = new TEmailFormField("");
        $this->Tel = new TTelFormField("");
        $this->Sujet = new TTextFormField("");
        $this->Message = new TTextareaFormField("");
    }
}

// Si le formulaire est valide, envoyer les infos par mail
<?

namespace App\lib;

use App\NumerotationParameter;
use App\Parameter;

class ParameterSetter
{
    private  $p;
    private  $n;

    public function __construct($userId = null)
    {
        // inits 
        $this->p = new Parameter();

        // parameter Init
        $this->p->user_id = $userId;
        $this->p->path = "default";
        $this->p->Param_Name = "default";
        $this->p->save();
    }

    public function SetDefaultNumerotation()
    {
        $this->n = new NumerotationParameter();
        $this->n->format = "<doc><aa><cmp>";
        $this->n->parameter_id = $this->p->id;
        $this->n->Min_compteur_Valeur = 5;
        $this->n->save();
    }
}

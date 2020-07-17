<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carsspecialiste extends Model
{
    protected $primaryKey = "id_carsspecialiste";
    protected $fillable=['nom','prenom','dateNaissance','motpass','email','numTel','address','specialiste','image'];
#region relationship:many to many
    public function diagnostics(){
        return $this->hasMany('App\Diagnostic');
    }
}

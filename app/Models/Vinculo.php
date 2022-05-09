<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vinculo extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vinculos';

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'nr_contrato';
    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $fillable = [
        'fk_pac_codigo',
        'fk_plan_codig'
    ];

     public function paciente(){
        return $this->hasOne(Paciente::class, 'pac_codigo', 'fk_pac_codigo');
    }
    public function planoSaude(){
        return $this->hasOne(PlanoSaude::class, 'plan_codig', 'fk_plan_codig');
    }
}

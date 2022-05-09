<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'consultas';

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cons_codigo';
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
        'data',
        'hora',
        'fk_med_codigo',
        'fk_proc_codigo',
        'fk_pac_codigo',
        'fk_nr_contrato',
        'particular'
    ];

     public function procedimento(){
        return $this->hasOne(Procedimento::class, 'proc_codigo', 'fk_proc_codigo');
    }
    public function medico(){
        return $this->hasOne(Medico::class, 'med_codigo', 'fk_med_codigo');
    }
    public function vinculo(){
        return $this->hasOne(Vinculo::class, 'nr_contrato', 'fk_nr_contrato');
    }
    public function paciente(){
        return $this->hasOne(Paciente::class, 'pac_codigo', 'fk_pac_codigo');
    }
}

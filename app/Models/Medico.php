<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
      
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medicos';

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'med_codigo';
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
        'med_nome',
        'med_CRM',
        'fk_espec_codigo'
    ];

     public function especialidade(){
        return $this->hasOne(Especialidade::class, 'espec_codigo', 'fk_espec_codigo');
    }
}

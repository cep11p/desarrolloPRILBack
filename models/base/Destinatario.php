<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "destinatario".
 *
 * @property integer $id
 * @property string $legajo
 * @property integer $calificacion
 * @property string $fecha_ingreso
 * @property string $origen
 * @property string $observacion
 * @property string $deseo_lugar_entrenamiento
 * @property string $deseo_actividad
 * @property string $fecha_presentacion
 * @property integer $personaid
 * @property string $banco_cbu
 * @property string $banco_nombre
 * @property string $banco_alias
 * @property integer $experiencia_laboral
 * @property string $conocimientos_basicos
 *
 * @property \app\models\AreaEntrenamiento[] $areaEntrenamientos
 * @property string $aliasModel
 */
abstract class Destinatario extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'destinatario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['legajo', 'fecha_ingreso', 'fecha_presentacion'], 'required'],
            [['calificacion', 'personaid', 'experiencia_laboral'], 'integer'],
            [['fecha_ingreso', 'fecha_presentacion'], 'safe'],
            [['observacion', 'deseo_lugar_entrenamiento', 'deseo_actividad', 'conocimientos_basicos'], 'string'],
            [['legajo'], 'string', 'max' => 50],
            [['origen', 'banco_cbu', 'banco_nombre', 'banco_alias'], 'string', 'max' => 200],
            [['legajo'], 'unique'],
            [['personaid'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'legajo' => 'Legajo',
            'calificacion' => 'Calificacion',
            'fecha_ingreso' => 'Fecha Ingreso',
            'origen' => 'Origen',
            'observacion' => 'Observacion',
            'deseo_lugar_entrenamiento' => 'Deseo Lugar Entrenamiento',
            'deseo_actividad' => 'Deseo Actividad',
            'fecha_presentacion' => 'Fecha Presentacion',
            'personaid' => 'Personaid',
            'banco_cbu' => 'Banco Cbu',
            'banco_nombre' => 'Banco Nombre',
            'banco_alias' => 'Banco Alias',
            'experiencia_laboral' => 'Experiencia Laboral',
            'conocimientos_basicos' => 'Conocimientos Basicos',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'personaid' => 'Este campo debe ser obligatorio, pero esto se debe obligar mediante una regla de negocio a mano, es decir con codigo puro',
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaEntrenamientos()
    {
        return $this->hasMany(\app\models\AreaEntrenamiento::className(), ['destinatarioid' => 'id']);
    }




}

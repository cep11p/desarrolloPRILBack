<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "ambiente_trabajo".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $calificacion
 * @property integer $personaid
 * @property string $legajo
 * @property string $observacion
 * @property string $cuit
 * @property string $actividad
 * @property integer $tipo_ambiente_trabajoid
 * @property integer $lugarid
 *
 * @property \app\models\TipoAmbienteTrabajo $tipoAmbienteTrabajo
 * @property \app\models\Oferta[] $ofertas
 * @property string $aliasModel
 */
abstract class AmbienteTrabajo extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ambiente_trabajo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'legajo', 'tipo_ambiente_trabajoid'], 'required'],
            [['calificacion', 'personaid', 'tipo_ambiente_trabajoid', 'lugarid'], 'integer'],
            [['observacion', 'actividad'], 'string'],
            [['nombre'], 'string', 'max' => 200],
            [['legajo', 'cuit'], 'string', 'max' => 45],
            [['legajo'], 'unique'],
            [['tipo_ambiente_trabajoid'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\TipoAmbienteTrabajo::className(), 'targetAttribute' => ['tipo_ambiente_trabajoid' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'calificacion' => 'Calificacion',
            'personaid' => 'Personaid',
            'legajo' => 'Legajo',
            'observacion' => 'Observacion',
            'cuit' => 'Cuit',
            'actividad' => 'Actividad',
            'tipo_ambiente_trabajoid' => 'Tipo Ambiente Trabajoid',
            'lugarid' => 'Lugarid',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'personaid' => 'esta personaid esta para identificar al representante del ambiente de trabajo

Este atributo debe ser obligatorio, por lo tanto se debera validar logicamente (regla de negocio)',
            'lugarid' => 'Este atributo debe ser obligatorio, por lo tanto se debera validar logicamente (regla de negocio)',
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoAmbienteTrabajo()
    {
        return $this->hasOne(\app\models\TipoAmbienteTrabajo::className(), ['id' => 'tipo_ambiente_trabajoid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertas()
    {
        return $this->hasMany(\app\models\Oferta::className(), ['ambiente_trabajoid' => 'id']);
    }




}

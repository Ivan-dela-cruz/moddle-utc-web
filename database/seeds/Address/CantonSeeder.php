<?php

use App\Address\Canton;
use Illuminate\Database\Seeder;

class CantonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        #region  AZUAY
        Canton::create([
            'name_canton' => 'CUENCA ', //AZUAY
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'GIRON',
            'province_id' =>1,
        ]);
        Canton::create([
            'name_canton' => 'GUALACEO',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'NABÓN',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'PAUTE',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'PUCARA',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'SAN FERNANDO',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'SANTA ISABEL',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'SIGSIG',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'OÑA',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'CHORDELEG',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'EL PAN',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'SEVILLA DE ORO',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'GUACHAPALA',
            'province_id' => 1,
        ]);
        Canton::create([
            'name_canton' => 'CAMILO PONCE ENRÍQUEZ',
            'province_id' => 1,
        ]);
        #endregion

        #region  BOLIVAR
        Canton::create([
            'name_canton' => 'GUARANDA', //BOLIVAR
            'province_id' => 2,
        ]);
        Canton::create([
            'name_canton' => 'CHILLANES',
            'province_id' => 2,
        ]);
        Canton::create([
            'name_canton' => 'CHIMBO',
            'province_id' => 2,
        ]);
        Canton::create([
            'name_canton' => 'ECHEANDÍA',
            'province_id' => 2,
        ]);
        Canton::create([
            'name_canton' => 'SAN MIGUEL',
            'province_id' => 2,
        ]);
        Canton::create([
            'name_canton' => 'CALUMA',
            'province_id' => 2,
        ]);
        Canton::create([
            'name_canton' => 'LAS NAVES',
            'province_id' => 2,
        ]);
        #endregion

        #region  CAÑAR
        Canton::create([
            'name_canton' => 'AZOGUES', //CAÑAR
            'province_id' => 3,
        ]);
        Canton::create([
            'name_canton' => 'BIBLIÁN',
            'province_id' => 3,
        ]);
        Canton::create([
            'name_canton' => 'CAÑAR',
            'province_id' => 3,
        ]);
        Canton::create([
            'name_canton' => 'LA TRONCAL',
            'province_id' => 3,
        ]);
        Canton::create([
            'name_canton' => 'EL TAMBO',
            'province_id' => 3,
        ]);
        Canton::create([
            'name_canton' => 'DÉLEG',
            'province_id' => 3,
        ]);
        Canton::create([
            'name_canton' => 'SUSCAL',
            'province_id' => 3,
        ]);
        #endregion

        #region  CARCHI
        Canton::create([
            'name_canton' => 'TULCÁN ', //CARCHI
            'province_id' => 4,
        ]);
        Canton::create([
            'name_canton' => 'BOLÍVAR',
            'province_id' => 4,
        ]);
        Canton::create([
            'name_canton' => 'ESPEJO',
            'province_id' => 4,
        ]);
        Canton::create([
            'name_canton' => 'MIRA',
            'province_id' => 4,
        ]);
        Canton::create([
            'name_canton' => 'MONTÚFAR',
            'province_id' => 4
        ]);
        Canton::create([
            'name_canton' => 'SAN PEDRO DE HUACA',
            'province_id' => 4,
        ]);
        #endregion

        #region  COTOPAXI
        Canton::create([
            'name_canton' => 'LATACUNGA', //COTOPAXI
            'province_id' => 5,
        ]);
        Canton::create([
            'name_canton' => 'LA MANÁ',
            'province_id' => 5,
        ]);
        Canton::create([
            'name_canton' => 'PANGUA',
            'province_id' => 5,
        ]);
        Canton::create([
            'name_canton' => 'PUJILI',
            'province_id' => 5,
        ]);
        Canton::create([
            'name_canton' => 'SALCEDO',
            'province_id' => 5,
        ]);
        Canton::create([
            'name_canton' => 'SAQUISILÍ',
            'province_id' => 5,
        ]);
        Canton::create([
            'name_canton' => 'SIGCHOS',
            'province_id' => 5,
        ]);
        #endregion

        #region CHIMBORAZO
        Canton::create([
            'name_canton' => 'RIOBAMBA', //CHIMBORAZO
            'province_id' => 6,
        ]);
        Canton::create([
            'name_canton' => 'ALAUSI',
            'province_id' => 6,
        ]);
        Canton::create([
            'name_canton' => 'COLTA',
            'province_id' => 6,
        ]);
        Canton::create([
            'name_canton' => 'CHAMBO',
            'province_id' => 6,
        ]);
        Canton::create([
            'name_canton' => 'CHUNCHI',
            'province_id' => 6,
        ]);
        Canton::create([
            'name_canton' => 'GUAMOTE',
            'province_id' => 6,
        ]);
        Canton::create([
            'name_canton' => 'GUANO',
            'province_id' => 6,
        ]);
        Canton::create([
            'name_canton' => 'PALLATANGA',
            'province_id' => 6,
        ]);
        Canton::create([
            'name_canton' => 'PENIPE',
            'province_id' => 6,
        ]);
        Canton::create([
            'name_canton' => 'CUMANDÁ',
            'province_id' => 6,
        ]);
        #endregion

        #region EL ORO
        Canton::create([
            'name_canton' => 'MACHALA', // EL ORO
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'ARENILLAS',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'ATAHUALPA',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'BALSAS',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'CHILLA',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'EL GUABO',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'HUAQUILLAS',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'MARCABELÍ',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'PASAJE',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'PIÑAS',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'PORTOVELO',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'SANTA ROSA',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'ZARUMA',
            'province_id' => 7,
        ]);
        Canton::create([
            'name_canton' => 'LAS LAJAS',
            'province_id' => 7,
        ]);
        #endregion

        #region ESMERALDAS
        Canton::create([
            'name_canton' => 'ESMERALDAS', // ESMERALDAS
            'province_id' => 8,
        ]);
        Canton::create([
            'name_canton' => 'ELOY ALFARO',
            'province_id' => 8,
        ]);
        Canton::create([
            'name_canton' => 'MUISNE',
            'province_id' => 8,
        ]);
        Canton::create([
            'name_canton' => 'QUININDE',
            'province_id' => 8,
        ]);
        Canton::create([
            'name_canton' => 'SAN LORENZO',
            'province_id' => 8,
        ]);
        Canton::create([
            'name_canton' => 'ATACAMES',
            'province_id' => 8,
        ]);
        Canton::create([
            'name_canton' => 'RIOVERDE',
            'province_id' => 8,
        ]);
        Canton::create([
            'name_canton' => 'LA CONCORDIA',
            'province_id' => 8,
        ]);
        #endregion

        #region GUAYAS
        Canton::create([
            'name_canton' => 'GUAYAQUIL', //GUAYAS
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'ALFREDO BAQUERIZO MORENO (JUJÁN)',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'BALAO',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'BALZAR',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'COLIMES',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'DAULE',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'DURÁN',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'EL EMPALME',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'EL TRIUNFO',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'MILAGRO',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'NARANJAL',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'NARANJITO',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'PALESTINA',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'PEDRO CARBO',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'SAMBORONDÓN',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'SANTA LUCÍA',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'SALITRE (URBINA JADO)',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'SAN JACINTO DE YAGUACHI',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'PLAYAS',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'SIMÓN BOLÍVAR',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'CORONEL MARCELINO MARIDUEÑA',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'LOMAS DE SARGENTILLO',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'NOBOL',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'GENERAL ANTONIO ELIZALDE',
            'province_id' => 9,
        ]);
        Canton::create([
            'name_canton' => 'ISIDRO AYORA',
            'province_id' => 9,
        ]);
        #endregion

        #region IMBABURA
        Canton::create([
            'name_canton' => 'IBARRA', //IMBABURA
            'province_id' => 10,
        ]);
        Canton::create([
            'name_canton' => 'ANTONIO ANTE',
            'province_id' => 10,
        ]);
        Canton::create([
            'name_canton' => 'COTACACHI',
            'province_id' => 10,
        ]);
        Canton::create([
            'name_canton' => 'OTAVALO',
            'province_id' => 10,
        ]);
        Canton::create([
            'name_canton' => 'PIMAMPIRO',
            'province_id' => 10,
        ]);
        Canton::create([
            'name_canton' => 'SAN MIGUEL DE URCUQUÍ',
            'province_id' => 10,
        ]);
        #endregion

        #region LOJA
        Canton::create([
            'name_canton' => 'LOJA', //LOJA
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'CALVAS',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'CATAMAYO',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'CELICA',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'CHAGUARPAMBA',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'ESPÍNDOLA',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'GONZANAMÁ',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'MACARÁ',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'PALTAS',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'PUYANGO',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'SARAGURO',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'SOZORANGA',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'ZAPOTILLO',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'PINDAL',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'QUILANGA',
            'province_id' => 11,
        ]);
        Canton::create([
            'name_canton' => 'OLMEDO',
            'province_id' => 11,
        ]);
        #endregion

        #region LOS RIOS
        Canton::create([
            'name_canton' => 'BABAHOYO', //LOS RIOS
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'BABA',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'MONTALVO',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'PUEBLOVIEJO',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'QUEVEDO',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'URDANETA',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'VENTANAS',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'VÍNCES',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'PALENQUE',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'BUENA FÉ',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'VALENCIA',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'MOCACHE',
            'province_id' => 12,
        ]);
        Canton::create([
            'name_canton' => 'QUINSALOMA',
            'province_id' => 12,
        ]);
        #endregion

        #region MANABI
        Canton::create([
            'name_canton' => 'PORTOVIEJO', //MANABI
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'BOLÍVAR',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'CHONE',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'EL CARMEN',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'FLAVIO ALFARO',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'JIPIJAPA',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'JUNÍN',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'MANTA',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'MONTECRISTI',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'PAJÁN',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'PICHINCHA',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'ROCAFUERTE',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'SANTA ANA',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'SUCRE',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'TOSAGUA',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => '24 DE MAYO',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'PEDERNALES',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'OLMEDO',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'PUERTO LÓPEZ',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'JAMA',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'JARAMIJÓ',
            'province_id' => 13,
        ]);
        Canton::create([
            'name_canton' => 'SAN VICENTE',
            'province_id' => 13,
        ]);
        #endregion

        #region MORONA SANTIAGO
        Canton::create([
            'name_canton' => 'MORONA', // MORONA SANTIAGO
            'province_id' => 14,
        ]);
        Canton::create([
            'name_canton' => 'GUALAQUIZA',
            'province_id' => 14,
        ]);
        Canton::create([
            'name_canton' => 'LIMÓN INDANZA',
            'province_id' => 14,
        ]);
        Canton::create([
            'name_canton' => 'SANTIAGO',
            'province_id' => 14,
        ]);
        Canton::create([
            'name_canton' => 'SUCÚA',
            'province_id' => 14,
        ]);
        Canton::create([
            'name_canton' => 'HUAMBOYA',
            'province_id' => 14,
        ]);
        Canton::create([
            'name_canton' => 'SAN JUAN BOSCO',
            'province_id' => 14,
        ]);
        Canton::create([
            'name_canton' => 'TAISHA',
            'province_id' => 14,
        ]);
        Canton::create([
            'name_canton' => 'LOGROÑO',
            'province_id' => 14,
        ]);
        Canton::create([
            'name_canton' => 'PABLO SEXTO',
            'province_id' => 14,
        ]);
        Canton::create([
            'name_canton' => 'TIWINTZA',
            'province_id' => 14,
        ]);
        #endregion

        #region NAPO
        Canton::create([
            'name_canton' => 'TENA', // NAPO
            'province_id' => 15,
        ]);
        Canton::create([
            'name_canton' => 'ARCHIDONA',
            'province_id' => 15,
        ]);
        Canton::create([
            'name_canton' => 'EL CHACO',
            'province_id' => 15,
        ]);
        Canton::create([
            'name_canton' => 'QUIJOS',
            'province_id' => 15,
        ]);
        Canton::create([
            'name_canton' => 'CARLOS JULIO AROSEMENA TOLA',
            'province_id' => 15,
        ]);
        #endregion

        #region PASTAZA
        Canton::create([
            'name_canton' => 'PASTAZA', // PASTAZA
            'province_id' => 16,
        ]);
        Canton::create([
            'name_canton' => 'MERA', //
            'province_id' => 16,
        ]);
        Canton::create([
            'name_canton' => 'SANTA CLARA', //
            'province_id' => 16,
        ]);
        Canton::create([
            'name_canton' => 'ARAJUNO', //
            'province_id' => 16,
        ]);
        #endregion

        #region PICHINCHA
        Canton::create([
            'name_canton' => 'QUITO', // PICHINCHA
            'province_id' => 17,
        ]);
        Canton::create([
            'name_canton' => 'CAYAMBE',
            'province_id' => 17,
        ]);
        Canton::create([
            'name_canton' => 'MEJIA',
            'province_id' => 17,
        ]);
        Canton::create([
            'name_canton' => 'PEDRO MONCAYO',
            'province_id' => 17,
        ]);
        Canton::create([
            'name_canton' => 'RUMIÑAHUI',
            'province_id' => 17,
        ]);
        Canton::create([
            'name_canton' => 'SAN MIGUEL DE LOS BANCOS',
            'province_id' => 17,
        ]);
        Canton::create([
            'name_canton' => 'PEDRO VICENTE MALDONADO',
            'province_id' => 17,
        ]);
        Canton::create([
            'name_canton' => 'PUERTO QUITO',
            'province_id' => 17,
        ]);
        #endregion

        #region TUNGURAHUA
        Canton::create([
            'name_canton' => 'AMBATO', // TUNGURAHUA
            'province_id' => 18,
        ]);
        Canton::create([
            'name_canton' => 'BAÑOS DE AGUA SANTA',
            'province_id' => 18,
        ]);
        Canton::create([
            'name_canton' => 'CEVALLOS',
            'province_id' => 18,
        ]);
        Canton::create([
            'name_canton' => 'MOCHA',
            'province_id' => 18,
        ]);
        Canton::create([
            'name_canton' => 'PATATE',
            'province_id' => 18,
        ]);
        Canton::create([
            'name_canton' => 'QUERO',
            'province_id' => 18,
        ]);
        Canton::create([
            'name_canton' => 'SAN PEDRO DE PELILEO',
            'province_id' => 18,
        ]);
        Canton::create([
            'name_canton' => 'SANTIAGO DE PÍLLARO',
            'province_id' => 18,
        ]);
        Canton::create([
            'name_canton' => 'TISALEO',
            'province_id' => 18,
        ]);
        #endregion

        #region ZAMORA CHINCHIPE
        Canton::create([
            'name_canton' => 'ZAMORA', // ZAMORA CHINCHIPE
            'province_id' => 19,
        ]);
        Canton::create([
            'name_canton' => 'CHINCHIPE',
            'province_id' => 19,
        ]);
        Canton::create([
            'name_canton' => 'NANGARITZA',
            'province_id' => 19,
        ]);
        Canton::create([
            'name_canton' => 'YACUAMBI',
            'province_id' => 19,
        ]);
        Canton::create([
            'name_canton' => 'YANTZAZA (YANZATZA)',
            'province_id' => 19,
        ]);
        Canton::create([
            'name_canton' => 'EL PANGUI',
            'province_id' => 19,
        ]);
        Canton::create([
            'name_canton' => 'CENTINELA DEL CÓNDOR',
            'province_id' => 19,
        ]);
        Canton::create([
            'name_canton' => 'PALANDA',
            'province_id' => 19,
        ]);
        Canton::create([
            'name_canton' => 'PAQUISHA',
            'province_id' => 19,
        ]);
        #endregion

        #region GALAPAGOS
        Canton::create([
            'name_canton' => 'SAN CRISTÓBAL', // GALAPAGOS
            'province_id' => 20,
        ]);
        Canton::create([
            'name_canton' => 'ISABELA',
            'province_id' => 20,
        ]);
        Canton::create([
            'name_canton' => 'SANTA CRUZ',
            'province_id' => 20,
        ]);
        #endregion

        #region SUCUMBIOS
        Canton::create([
            'name_canton' => 'LAGO AGRIO', //SUCUMBIOS
            'province_id' => 21,
        ]);
        Canton::create([
            'name_canton' => 'GONZALO PIZARRO',
            'province_id' => 21,
        ]);
        Canton::create([
            'name_canton' => 'PUTUMAYO',
            'province_id' => 21,
        ]);
        Canton::create([
            'name_canton' => 'SHUSHUFINDI',
            'province_id' => 21,
        ]);
        Canton::create([
            'name_canton' => 'SUCUMBÍOS',
            'province_id' => 21,
        ]);
        Canton::create([
            'name_canton' => 'CASCALES',
            'province_id' => 21,
        ]);
        Canton::create([
            'name_canton' => 'CUYABENO',
            'province_id' => 21,
        ]);
        #endregion

        #region ORELLANA
        Canton::create([
            'name_canton' => 'ORELLANA', // ORELLANA
            'province_id' => 22,
        ]);
        Canton::create([
            'name_canton' => 'AGUARICO',
            'province_id' => 22,
        ]);
        Canton::create([
            'name_canton' => 'LA JOYA DE LOS SACHAS',
            'province_id' => 22,
        ]);
        Canton::create([
            'name_canton' => 'LORETO',
            'province_id' => 22,
        ]);
        #endregion

        #region SANTO DOMINGO DE LOS TSACHILAS
        Canton::create([
            'name_canton' => 'SANTO DOMINGO', // SANTO DOMINGO DE LOS TSACHILAS
            'province_id' => 23,
        ]);
        #endregion

        #region SANTA ELENA
        Canton::create([
            'name_canton' => 'SANTA ELENA', // SANTA ELENA
            'province_id' => 24,
        ]);
        Canton::create([
            'name_canton' => 'LA LIBERTAD',
            'province_id' => 24,
        ]);
        Canton::create([
            'name_canton' => 'SALINAS',
            'province_id' => 24,
        ]);
        #endregion
    }
}

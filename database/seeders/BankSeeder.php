<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
            1 => '001 - BANCO DO BRASIL S/A',
            2 => '002 - BANCO CENTRAL DO BRASIL',
            3 => '003 - BANCO DA AMAZONIA S.A',
            4 => '004 - BANCO DO NORDESTE DO BRASIL S.A',
            7 => '007 - BANCO NAC DESENV. ECO. SOCIAL S.A',
            8 => '008 - BANCO MERIDIONAL DO BRASIL',
            20 => '020 - BANCO DO ESTADO DE ALAGOAS S.A',
            21 => '021 - BANCO DO ESTADO DO ESPIRITO SANTO S.A',
            22 => '022 - BANCO DE CREDITO REAL DE MINAS GERAIS SA',
            24 => '024 - BANCO DO ESTADO DE PERNAMBUCO',
            25 => '025 - BANCO ALFA S/A',
            26 => '026 - BANCO DO ESTADO DO ACRE S.A',
            27 => '027 - BANCO DO ESTADO DE SANTA CATARINA S.A',
            28 => '028 - BANCO DO ESTADO DA BAHIA S.A',
            29 => '029 - BANCO DO ESTADO DO RIO DE JANEIRO S.A',
            30 => '030 - BANCO DO ESTADO DA PARAIBA S.A',
            31 => '031 - BANCO DO ESTADO DE GOIAS S.A',
            32 => '032 - BANCO DO ESTADO DO MATO GROSSO S.A.',
            33 => '033 - BANCO DO ESTADO DE SAO PAULO S.A',
            34 => '034 - BANCO DO ESADO DO AMAZONAS S.A',
            35 => '035 - BANCO DO ESTADO DO CEARA S.A',
            36 => '036 - BANCO DO ESTADO DO MARANHAO S.A',
            37 => '037 - BANCO DO ESTADO DO PARA S.A',
            38 => '038 - BANCO DO ESTADO DO PARANA S.A',
            39 => '039 - BANCO DO ESTADO DO PIAUI S.A',
            41 => '041 - BANCO DO ESTADO DO RIO GRANDE DO SUL S.A',
            47 => '047 - BANCO DO ESTADO DE SERGIPE S.A',
            48 => '048 - BANCO DO ESTADO DE MINAS GERAIS S.A',
            59 => '059 - BANCO DO ESTADO DE RONDONIA S.A',
            70 => '070 - BANCO DE BRASILIA S.A',
            104 => '104 - CAIXA ECONOMICA FEDERAL',
            106 => '106 - BANCO ITABANCO S.A.',
            107 => '107 - BANCO BBM S.A',
            109 => '109 - BANCO CREDIBANCO S.A',
            116 => '116 - BANCO B.N.L DO BRASIL S.A',
            148 => '148 - MULTI BANCO S.A',
            151 => '151 - CAIXA ECONOMICA DO ESTADO DE SAO PAULO',
            153 => '153 - CAIXA ECONOMICA DO ESTADO DO R.G.SUL',
            165 => '165 - BANCO NORCHEM S.A',
            166 => '166 - BANCO INTER-ATLANTICO S.A',
            168 => '168 - BANCO C.C.F. BRASIL S.A',
            175 => '175 - CONTINENTAL BANCO S.A',
            184 => '184 - BBA - CREDITANSTALT S.A',
            199 => '199 - BANCO FINANCIAL PORTUGUES',
            200 => '200 - BANCO FRICRISA AXELRUD S.A',
            201 => '201 - BANCO AUGUSTA INDUSTRIA E COMERCIAL S.A',
            204 => '204 - BANCO S.R.L S.A',
            205 => '205 - BANCO SUL AMERICA S.A',
            206 => '206 - BANCO MARTINELLI S.A',
            208 => '208 - BANCO PACTUAL S.A',
            210 => '210 - DEUTSCH SUDAMERIKANICHE BANK AG',
            211 => '211 - BANCO SISTEMA S.A',
            212 => '212 - BANCO MATONE S.A',
            213 => '213 - BANCO ARBI S.A',
            214 => '214 - BANCO DIBENS S.A',
            215 => '215 - BANCO AMERICA DO SUL S.A',
            216 => '216 - BANCO REGIONAL MALCON S.A',
            217 => '217 - BANCO AGROINVEST S.A',
            218 => '218 - BBS - BANCO BONSUCESSO S.A.',
            219 => '219 - BANCO DE CREDITO DE SAO PAULO S.A',
            220 => '220 - BANCO CREFISUL',
            221 => '221 - BANCO GRAPHUS S.A',
            222 => '222 - BANCO AGF BRASIL S. A.',
            223 => '223 - BANCO INTERUNION S.A',
            224 => '224 - BANCO FIBRA S.A',
            225 => '225 - BANCO BRASCAN S.A',
            228 => '228 - BANCO ICATU S.A',
            229 => '229 - BANCO CRUZEIRO S.A',
            230 => '230 - BANCO BANDEIRANTES S.A',
            231 => '231 - BANCO BOAVISTA S.A',
            232 => '232 - BANCO INTERPART S.A',
            233 => '233 - BANCO MAPPIN S.A',
            234 => '234 - BANCO LAVRA S.A.',
            235 => '235 - BANCO LIBERAL S.A',
            236 => '236 - BANCO CAMBIAL S.A',
            237 => '237 - BANCO BRADESCO S.A',
            239 => '239 - BANCO BANCRED S.A',
            240 => '240 - BANCO DE CREDITO REAL DE MINAS GERAIS S.',
            241 => '241 - BANCO CLASSICO S.A',
            242 => '242 - BANCO EUROINVEST S.A',
            243 => '243 - BANCO STOCK S.A',
            244 => '244 - BANCO CIDADE S.A',
            245 => '245 - BANCO EMPRESARIAL S.A',
            246 => '246 - BANCO ABC ROMA S.A',
            247 => '247 - BANCO OMEGA S.A',
            249 => '249 - BANCO INVESTCRED S.A',
            250 => '250 - BANCO SCHAHIN CURY S.A',
            251 => '251 - BANCO SAO JORGE S.A.',
            252 => '252 - BANCO FININVEST S.A',
            254 => '254 - BANCO PARANA BANCO S.A',
            255 => '255 - MILBANCO S.A.',
            256 => '256 - BANCO GULVINVEST S.A',
            258 => '258 - BANCO INDUSCRED S.A',
            261 => '261 - BANCO VARIG S.A',
            262 => '262 - BANCO BOREAL S.A',
            263 => '263 - BANCO CACIQUE',
            264 => '264 - BANCO PERFORMANCE S.A',
            265 => '265 - BANCO FATOR S.A',
            266 => '266 - BANCO CEDULA S.A',
            267 => '267 - BANCO BBM-COM.C.IMOB.CFI S.A.',
            275 => '275 - BANCO REAL S.A',
            277 => '277 - BANCO PLANIBANC S.A',
            282 => '282 - BANCO BRASILEIRO COMERCIAL',
            291 => '291 - BANCO DE CREDITO NACIONAL S.A',
            294 => '294 - BCR - BANCO DE CREDITO REAL S.A',
            295 => '295 - BANCO CREDIPLAN S.A',
            300 => '300 - BANCO DE LA NACION ARGENTINA S.A',
            302 => '302 - BANCO DO PROGRESSO S.A',
            303 => '303 - BANCO HNF S.A.',
            304 => '304 - BANCO PONTUAL S.A',
            308 => '308 - BANCO COMERCIAL BANCESA S.A.',
            318 => '318 - BANCO B.M.G. S.A',
            320 => '320 - BANCO INDUSTRIAL E COMERCIAL',
            341 => '341 - BANCO ITAU S.A',
            346 => '346 - BANCO FRANCES E BRASILEIRO S.A',
            347 => '347 - BANCO SUDAMERIS BRASIL S.A',
            351 => '351 - BANCO BOZANO SIMONSEN S.A',
            353 => '353 - BANCO GERAL DO COMERCIO S.A',
            356 => '356 - ABN AMRO S.A',
            366 => '366 - BANCO SOGERAL S.A',
            369 => '369 - PONTUAL',
            370 => '370 - BEAL - BANCO EUROPEU PARA AMERICA LATINA',
            372 => '372 - BANCO ITAMARATI S.A',
            375 => '375 - BANCO FENICIA S.A',
            376 => '376 - CHASE MANHATTAN BANK S.A',
            388 => '388 - BANCO MERCANTIL DE DESCONTOS S/A',
            389 => '389 - BANCO MERCANTIL DO BRASIL S.A',
            392 => '392 - BANCO MERCANTIL DE SAO PAULO S.A',
            394 => '394 - BANCO B.M.C. S.A',
            399 => '399 - BANCO BAMERINDUS DO BRASIL S.A',
            409 => '409 - UNIBANCO - UNIAO DOS BANCOS BRASILEIROS',
            412 => '412 - BANCO NACIONAL DA BAHIA S.A',
            415 => '415 - BANCO NACIONAL S.A',
            420 => '420 - BANCO NACIONAL DO NORTE S.A',
            422 => '422 - BANCO SAFRA S.A',
            424 => '424 - BANCO NOROESTE S.A',
            434 => '434 - BANCO FORTALEZA S.A',
            453 => '453 - BANCO RURAL S.A',
            456 => '456 - BANCO TOKIO S.A',
            464 => '464 - BANCO SUMITOMO BRASILEIRO S.A',
            466 => '466 - BANCO MITSUBISHI BRASILEIRO S.A',
            472 => '472 - LLOYDS BANK PLC',
            473 => '473 - BANCO FINANCIAL PORTUGUES S.A',
            477 => '477 - CITIBANK N.A',
            479 => '479 - BANCO DE BOSTON S.A',
            480 => '480 - BANCO PORTUGUES DO ATLANTICO-BRASIL S.A',
            483 => '483 - BANCO AGRIMISA S.A.',
            487 => '487 - DEUTSCHE BANK S.A - BANCO ALEMAO',
            488 => '488 - BANCO J. P. MORGAN S.A',
            489 => '489 - BANESTO BANCO URUGAUAY S.A',
            492 => '492 - INTERNATIONALE NEDERLANDEN BANK N.V.',
            493 => '493 - BANCO UNION S.A.C.A',
            494 => '494 - BANCO LA REP. ORIENTAL DEL URUGUAY',
            495 => '495 - BANCO LA PROVINCIA DE BUENOS AIRES',
            496 => '496 - BANCO EXTERIOR DE ESPANA S.A',
            498 => '498 - CENTRO HISPANO BANCO',
            499 => '499 - BANCO IOCHPE S.A',
            501 => '501 - BANCO BRASILEIRO IRAQUIANO S.A.',
            502 => '502 - BANCO SANTANDER S.A',
            504 => '504 - BANCO MULTIPLIC S.A',
            505 => '505 - BANCO GARANTIA S.A',
            600 => '600 - BANCO LUSO BRASILEIRO S.A',
            601 => '601 - BFC BANCO S.A.',
            602 => '602 - BANCO PATENTE S.A',
            604 => '604 - BANCO INDUSTRIAL DO BRASIL S.A',
            607 => '607 - BANCO SANTOS NEVES S.A',
            608 => '608 - BANCO OPEN S.A',
            610 => '610 - BANCO V.R. S.A',
            611 => '611 - BANCO PAULISTA S.A',
            612 => '612 - BANCO GUANABARA S.A',
            613 => '613 - BANCO PECUNIA S.A',
            616 => '616 - BANCO INTERPACIFICO S.A',
            617 => '617 - BANCO INVESTOR S.A.',
            618 => '618 - BANCO TENDENCIA S.A',
            621 => '621 - BANCO APLICAP S.A.',
            622 => '622 - BANCO DRACMA S.A',
            623 => '623 - BANCO PANAMERICANO S.A',
            624 => '624 - BANCO GENERAL MOTORS S.A',
            625 => '625 - BANCO ARAUCARIA S.A',
            626 => '626 - BANCO FICSA S.A',
            627 => '627 - BANCO DESTAK S.A',
            628 => '628 - BANCO CRITERIUM S.A',
            629 => '629 - BANCORP BANCO COML. E. DE INVESTMENTO',
            630 => '630 - BANCO INTERCAP S.A',
            633 => '633 - BANCO REDIMENTO S.A',
            634 => '634 - BANCO TRIANGULO S.A',
            635 => '635 - BANCO DO ESTADO DO AMAPA S.A',
            637 => '637 - BANCO SOFISA S.A',
            638 => '638 - BANCO PROSPER S.A',
            639 => '639 - BIG S.A. - BANCO IRMAOS GUIMARAES',
            640 => '640 - BANCO DE CREDITO METROPOLITANO S.A',
            641 => '641 - BANCO EXCEL ECONOMICO S/A',
            643 => '643 - BANCO SEGMENTO S.A',
            645 => '645 - BANCO DO ESTADO DE RORAIMA S.A',
            647 => '647 - BANCO MARKA S.A',
            648 => '648 - BANCO ATLANTIS S.A',
            649 => '649 - BANCO DIMENSAO S.A',
            650 => '650 - BANCO PEBB S.A',
            652 => '652 - BANCO FRANCES E BRASILEIRO SA',
            653 => '653 - BANCO INDUSVAL S.A',
            654 => '654 - BANCO A. J. RENNER S.A',
            655 => '655 - BANCO VOTORANTIM S.A.',
            656 => '656 - BANCO MATRIX S.A',
            657 => '657 - BANCO TECNICORP S.A',
            658 => '658 - BANCO PORTO REAL S.A',
            702 => '702 - BANCO SANTOS S.A',
            705 => '705 - BANCO INVESTCORP S.A.',
            707 => '707 - BANCO DAYCOVAL S.A',
            711 => '711 - BANCO VETOR S.A.',
            713 => '713 - BANCO CINDAM S.A',
            715 => '715 - BANCO VEGA S.A',
            718 => '718 - BANCO OPERADOR S.A',
            719 => '719 - BANCO PRIMUS S.A',
            720 => '720 - BANCO MAXINVEST S.A',
            721 => '721 - BANCO CREDIBEL S.A',
            722 => '722 - BANCO INTERIOR DE SAO PAULO S.A',
            724 => '724 - BANCO PORTO SEGURO S.A',
            725 => '725 - BANCO FINABANCO S.A',
            726 => '726 - BANCO UNIVERSAL S.A',
            728 => '728 - BANCO FITAL S.A',
            729 => '729 - BANCO FONTE S.A',
            730 => '730 - BANCO COMERCIAL PARAGUAYO S.A',
            731 => '731 - BANCO GNPP S.A.',
            732 => '732 - BANCO PREMIER S.A.',
            733 => '733 - BANCO NACOES S.A.',
            734 => '734 - BANCO GERDAU S.A',
            735 => '735 - BACO POTENCIAL',
            736 => '736 - BANCO UNITED S.A',
            737 => '737 - THECA',
            738 => '738 - MARADA',
            739 => '739 - BGN',
            740 => '740 - BCN BARCLAYS',
            741 => '741 - BRP',
            742 => '742 - EQUATORIAL',
            743 => '743 - BANCO EMBLEMA S.A',
            744 => '744 - THE FIRST NATIONAL BANK OF BOSTON',
            745 => '745 - CITIBAN N.A.',
            746 => '746 - MODAL SA',
            747 => '747 - RAIBOBANK DO BRASIL',
            748 => '748 - SICREDI',
            749 => '749 - BRMSANTIL SA',
            750 => '750 - BANCO REPUBLIC NATIONAL OF NEW YORK (BRA',
            751 => '751 - DRESDNER BANK LATEINAMERIKA-BRASIL S/A',
            752 => '752 - BANCO BANQUE NATIONALE DE PARIS BRASIL S',
            753 => '753 - BANCO COMERCIAL URUGUAI S.A.',
            755 => '755 - BANCO MERRILL LYNCH S.A',
            756 => '756 - BANCO COOPERATIVO DO BRASIL S.A.',
            757 => '757 - BANCO KEB DO BRASIL S.A.',
        ];

        Bank::truncate();

        foreach($banks as $bankId => $bankName) {
            Bank::create([
                'id' => $bankId,
                'name' => $bankName
            ]);
        }
    }
}

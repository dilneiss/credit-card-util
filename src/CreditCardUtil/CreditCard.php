<?php

namespace CreditCardUtil;

use Util\UtilString;

/**
 * Class CreditCard
 * @package CreditCardUtil
 */
class CreditCard
{

    /**
     * @param string $cardNumber
     * @return string
     */
    public static function discoverBrandName($cardNumber): string
    {

        $cardNumber = self::removeAllWhiteSpace($cardNumber);

        $bandeira = '';

        $cartoes = array(
            'visa' => array('len' => array(13, 16), 'cvc' => 3),
            'mastercard' => array('len' => array(16), 'cvc' => 3),
            'diners' => array('len' => array(14, 16), 'cvc' => 3),
            'elo' => array('len' => array(16), 'cvc' => 3),
            'amex' => array('len' => array(15), 'cvc' => 4),
            'discover' => array('len' => array(16), 'cvc' => 4),
            'aura' => array('len' => array(16), 'cvc' => 3),
            'jcb' => array('len' => array(16), 'cvc' => 3),
            'hipercard' => array('len' => array(13, 16, 19), 'cvc' => 3),
        );

        switch ($cardNumber) {
            case (bool)preg_match('/^(636368|636369|438935|504175|451416|636297|5067|4576|4011|506699|50900|50900|509009|50901|509014|50902|509030|50903|50904|50904|50905|50906|50906|50907|50907|50908|50909|50909|50910|50910|50911|50912|50913|50914|50915|50916|50917|50918|50919|50920|50921|50922|50923|50924|50925|50926|50927|50928|50929|50930|50931|50932|50933|50934|50935|50936|50937|50938|50939|50940|50941|50942|50943|50944|50945|50946|50947|50948|50949|50950|50951|50952|50953|50954|50955|50956|50957|50958|50959|50960|50961|50962|50963|50964|50965|50966|50967|50968|50969|50970|50971|50972|50973|50974|50975|50976|50977|50978|50979|50980|50983|50984|50985|50986|50987|50989|509900|50991|50992|50993|50994|50995|50996|50997|50998|50999|65040|65041|65042|65043|65048|65049|65050|65050|65051|65052|65053|65055|65056|65057|65058|65059|65072|65090|65091|65092|650928|650939|65094|65095|65096|65097|65165|65166|65167|65168|65169|65170|65500|65501|65502|65503|65504|65505|627780)/', $cardNumber) :
                $bandeira = 'elo';
                break;

            case (bool)preg_match('/^(606282|637095|637568|637599|637609|637612)/', $cardNumber) :
                $bandeira = 'hipercard';
                break;

            case (bool)preg_match('/^(3841)/', $cardNumber) :
                $bandeira = 'hipercard';
                break;

            case (bool)preg_match('/^(6011)/', $cardNumber) :
                $bandeira = 'discover';
                break;

            case (bool)preg_match('/^(622)/', $cardNumber) :
                $bandeira = 'discover';
                break;

            case (bool)preg_match('/^(300|301|305|36|38)/', $cardNumber) :
                $bandeira = 'diners';
                break;

            case (bool)preg_match('/^(34|37)/', $cardNumber) :
                $bandeira = 'amex';
                break;

            case (bool)preg_match('/^(64|65|6011|622)/', $cardNumber) :
                $bandeira = 'discover';
                break;

            case (bool)preg_match('/^(50)/', $cardNumber) :
                $bandeira = 'aura';
                break;

            case (bool)preg_match('/^(35)/', $cardNumber) :
                $bandeira = 'jcb';
                break;

            case (bool)preg_match('/^(60)/', $cardNumber) :
                $bandeira = 'hipercard';
                break;

            case (bool)preg_match('/^(4)/', $cardNumber) :
                $bandeira = 'visa';
                break;

            case (bool)preg_match('/^(5|(2(221|222|223|224|225|226|227|228|229|23|24|25|26|27|28|29|3|4|5|6|70|71|720)))/', $cardNumber) :
                $bandeira = 'mastercard';
                break;
        }

        if (!isset($cartoes[$bandeira])) {
            return '';
        }

        $dados_cartao = $cartoes[$bandeira];

        if (!in_array(strlen($cardNumber), $dados_cartao['len'])) {
            return '';
        }

        return $bandeira;

    }

    /**
     * @param $string
     * @return string
     */
    private static function removeAllWhiteSpace($string): string
    {

        $string = preg_replace('/[\s]+/mu', ' ', $string);
        $string = trim($string);
        while (strpos($string, " ") !== false) {
            $string = str_replace(" ", "", $string);
        }

        return $string;

    }

}
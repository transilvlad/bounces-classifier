<?php

    /**
     * BouncesClassifier
     *
     * Classifies email bounce messages.
     *
     * @filesource
     *
     * @category   Bounces
     * @package    \bounces
     * @subpackage \classifier
     *
     * @version    20141019
     * @since      20141019
     *
     * @author     Vlad Marian
     * @copyright  Vlad Marian 2014
     * @license    http://www.gnu.org/licenses/gpl.txt
     * @link       http://transilvlad.com Author Website
     *
     * @uses       BouncesClassifierMatches
     */
    abstract class BouncesClassifier {

        /**
         * BouncesClassifier::classify()
         *
         * Classifies email bounce message.
         *
         * @syntax BouncesClassifier::classify($content);
         * @param string $content Email message subject + delivery-status + body
         * @return array Bounce reason code and friendly name
         */
        static function classify($content) {
            // Find reasons
            $matches = [];
            foreach(BouncesClassifierMatches::$matches as $match)
                if(stristr($content, $match[1]))
                    $matches[] = $match;

            // Calculate reasons totals
            $results = [];
            foreach($matches as $match) {
                if(isset($results[$match[0]]))
                    $results[$match[0]]++;
                else
                    $results[$match[0]] = 1;
            }
            arsort($results, SORT_NUMERIC);

            // Get most common reason
            $code = key($results);
            $friendly = in_array($code, array_keys(BouncesClassifierMatches::$friendly)) ? BouncesClassifierMatches::$friendly[$code] : '';

            return ['code' => $code, 'friendly' => $friendly, 'results' => $results, 'matches' => $matches];
        }
    }

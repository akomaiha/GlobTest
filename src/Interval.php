<?php

/**
 * Class Interval
 */
class Interval
{
    /**
     * tri par ordre croissant et merge les intervalles
     * dans une liste plus optimale (en fusionnant ceux qui se croisent)
     *
     * @param array $intervals
     *
     * @return false|string
     */
    public function foo(array $intervals)
    {
        $sortedIntervals = $this->sort($intervals);
        return json_encode($this->merge($sortedIntervals));
    }

    /**
     * trie les intervalles par ordre croissant de $i
     *
     * @param array $intervals
     *
     * @return array
     */
    private function sort(array $intervals)
    {
        usort(
            $intervals,
            function ($i, $j) {
                return $i[0] <=> $j[0];
            }
        );
        return $intervals;
    }

    /**
     * fusionne les intervalles
     *
     * @param array $intervals
     *
     * @return array
     */
    private function merge(array $intervals)
    {
        $result = [$intervals[0]];
        // itère sur les intervalles $intervals et fusionne ceux qui se croisent
        // et si un interval $interval ne se croise pas avec un existant dans le resultat $result,
        // l'ajoute en tant qu'un nouveau à la fin de $result
        foreach ($intervals as $interval) {
            if (($interval[0] <= end($result)[1]) & ($interval[1] > end($result)[1])) {
                $result[array_key_last($result)][1] = $interval[1];
            } elseif ($interval[0] > end($result)[1]) {
                array_push($result, $interval);
            }
        }

        return $result;
    }

}

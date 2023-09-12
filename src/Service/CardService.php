<?php
namespace App\Service;

/**
 * Service qui permet de gerer la creation et le trie d'un je de carte
 */
class CardService
{
    /**
     * @var array|string[]
     * liste des valeurs
     */
    private array $valeurs=["As", "2", "3", "4", "5", "6", "7", "8", "9", "10","Valet", "Dame", "Roi"];

    /**
     * @var array|string[]
     * liste des couleurs
     */
    private array $couleurs=["Carreaux", "Coeur", "Pique", "Trèfle"];

    /**
     * @return array
     * fonction qui permet de gerer la creation d'un jeux de cartes
     */
    public function createGame(): array
    {
        $jeuDeCartes = [];
        foreach ($this->couleurs as $couleur) {
            foreach ($this->valeurs as $valeur) {
                $jeuDeCartes[] = ['couleur' => $couleur, 'valeur' => $valeur];
            }
        }
        shuffle($jeuDeCartes);
        // Distribuez une main de 10 cartes
        $hand = array_slice($jeuDeCartes, 0, 10);
        return $hand;
    }

    /**
     * @param $jeuDecarte
     * @return mixed
     * permet de trier la jeu de carte
     */
    public function sortedGame($jeuDecarte){
        usort($jeuDecarte, function ($a, $b) {
            // Triez d'abord par couleur
            $cmp = strcmp($a['couleur'], $b['couleur']);
            if ($cmp === 0) {

                // Si les couleurs sont les mêmes, triez par valeur
                $indexA=array_search($a['valeur'],$this->valeurs);
                $indexB=array_search($b['valeur'],$this->valeurs);
                if($indexA<$indexB){
                    return -1;
                }
                else{
                    if($indexA>$indexB){
                        return 1;
                    }
                    else{
                        return 0;
                    }
                }
            }
            return $cmp;
        });
        return $jeuDecarte;
    }
}
?>
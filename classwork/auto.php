<?php
    class Auto
    {
        protected $matches;
        
        function __construct($str) {
            $regex = '/([А-ЯЁа-яё]\d{3}[А-ЯЁа-яё]{2})(\d{2,3})?/iu';
            preg_match_all($regex, $str, $this->$matches);
        }

        public function printMatches() {
            echo "Found matches: " . implode(" ", $this->$matches[0]);
        }
    }

    $auto = new Auto('автомобиль с госномером В695СХ допустил столкновение с автомобилем марки Toyota corolla c госномером Т495СХ22');
    $auto->printMatches();
?>

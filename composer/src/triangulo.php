<?php    
    namespace Desarrollo\Proyectos;
    use Desarrollo\Proyectos\Figura;
    class Triangulo extends Figura{
        private $longitudLado;
        private $perimetro;
        private $area;
        private $altura;
        public function getPerimetro(){
            return $this->perimetro;
        }

        public function getArea(){
            return $this->area;
        }
        public function getAltura(){
            return $this->altura;
        }
        public function __construct($color,$longitudLado){
            $this->longitudLado=$longitudLado;
            $this->perimetro=$longitudLado*3;
            $this->altura=$longitudLado*sqrt(3)/2;
            $this->area=($longitudLado*$this->altura)/2;
            parent::__construct($color,$longitudLado);
        }

        public function __toString(){
            return parent::__toString().' Longitud del lado :'.$this->longitudLado.' Perimetro: '.$this->perimetro.' Area:'. $this->area.' Altura: '.$this->altura;
        }
        public function pintar(){
            echo self::__toString();
            $tamaño = $this->longitudLado."px";
            $tamaño2 = ($this->longitudLado/2)."px";
            echo<<<TRIANGULO
                <div class="triangulo">
                </div>
                TRIANGULO;
            echo<<<ESTILO
                <style>
                .triangulo{
                    width:0;
                    height:0;
                    border-left: $tamaño2  solid transparent;
                    border-right: $tamaño2 solid transparent;
                    border-bottom:  $tamaño solid aqua;
                }
                <style/>
            ESTILO;
        }
    }
?>
<?php
declare(strict_types=1);

class User {
    // propiedades privadas de la clase
    private string $name;
    private string $surname;
    private ?int $age = null;  // el ? indica que puede ser null
    
    // constantes para validacion
    private const  MIN_AGE = 0;
    private const  MAX_AGE = 120;

    // constructor de la clase
    public function __construct(string $name, string $surname) {
        $this->setName($name);
        $this->setSurname($surname);
    }

    // metodo magico para establecer propiedades
    public function __set(string $property, $value): void {
        // validamos que la propiedad sea 'age' y el valor sea un numero
        if ($property === 'age' && is_numeric($value)) {
            $this->setAge((int)$value);
        }
    }

    // metodo magico para obtener propiedades
    public function __get(string $property) {
        // validamos que la propiedad exista
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    // metodo magico toString para mostrar informacion del usuario
    public function __toString(): string {
        return "Usuario: {$this->name} {$this->surname}" . 
               ($this->age ? ", Edad: {$this->age}" : "");
    }

    // metodos para establecer valores con validacion
    private function setName(string $name): void {
        if (empty(trim($name))) {
            throw new InvalidArgumentException("El nombre no puede estar vacio");
        }
        $this->name = trim($name);
    }

    private function setSurname(string $surname): void {
        if (empty(trim($surname))) {
            throw new InvalidArgumentException("El apellido no puede estar vacio");
        }
        $this->surname = trim($surname);
    }

    private function setAge(int $age): void {
        if ($age < self::MIN_AGE || $age > self::MAX_AGE) {
            throw new InvalidArgumentException(
                "La edad debe estar entre " . self::MIN_AGE . 
                " y " . self::MAX_AGE . " anos"
            );
        }
        $this->age = $age;
    }

    // getters publicos
    public function getName(): string {
        return $this->name;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function getAge(): ?int {
        return $this->age;
    }

    // metodo para obtener informacion completa
    public function getFullInfo(): string {
        return (string)$this;  // usa el metodo __toString
    }
}
?>
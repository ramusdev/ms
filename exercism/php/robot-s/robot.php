<?php
/**
 * Robot simulator
 * 
 */

class Robot
{
   const DIRECTION_NORTH = 0;
   const DIRECTION_EAST = 1;
   const DIRECTION_SOUTH = 2;
   const DIRECTION_WEST = 3;
   
   public $position;
   public $direction;

   public function __construct(array $position, int $direction)
   {
        $this->position = $position;
        $this->direction = $direction;
   }

   public function turnRight() : void
   {
        $this->direction = ($this->direction + 1) % 4;
   }

   public function turnLeft() : void
   {
        if ($this->direction == 0) 
        {
            $this->direction = 3;
        } else {
            $this->direction = ($this->direction - 1) % 4;
        }
   }

   public function advance() : void
   {
        if ($this->direction == Robot::DIRECTION_WEST) {
            $this->position[0] = $this->position[0] - 1;
        }

        if ($this->direction == Robot::DIRECTION_EAST) {
            $this->position[0] = $this->position[0] + 1;
        }

        if ($this->direction == Robot::DIRECTION_NORTH) {
            $this->position[1] = $this->position[1] + 1;
        }

        if ($this->direction == Robot::DIRECTION_SOUTH) {
            $this->position[1] = $this->position[1]- 1;
        }
   }

   public function instruction(string $instruction) : void
   {
        $mas = str_split($instruction);

        foreach ($mas as $key => $value) {
            switch ($value) {
                case 'R':
                    $this->turnRight();
                    break;
                case 'L':
                    $this->turnLeft();
                    break;
                case 'A':
                    $this->advance();
                    break;
                default:
                    throw new InvalidArgumentException();
            }
        }
   }

}

//$robot = new Robot([0, -7], Robot::DIRECTION_EAST);
//$robot->instruction('RRAAAAALAA');
//echo $robot->direction;
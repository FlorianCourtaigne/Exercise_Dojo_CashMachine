<?php

class CashMachine {

private array $cash = [500 => 0, 200 => 2, 100 => 0, 50 => 0, 20 => 0, 10 => 0, 5 => 0];

    public function addCash($billValue, $billNumber)
    {
      if($billNumber <= 0){
        return false;
      }

      if(!array_key_exists($billValue, $this->cash)){
        return false;
      }

      foreach ($this->cash as $key => $value){
          if ($billValue === $key){
              $value = $billNumber;
              $this->cash[$key] = $value;
              $this->setCash($this->cash);
            }
        }
        return true;
    }

    public function getRemainingCash(): array
    {
      return $this->cash;
    }

    public function withdraw(int $cashWanted): array
    {
      $moneyMoney = [];
      // while($cashWanted > 4){
        foreach($this->cash as $key => $value){
          if($cashWanted / $key >= 1){
            $i = $cashWanted - ($cashWanted % $key);
            $i = $i / $key;
            if($i <= $value){
              $cashWanted = ($cashWanted % $key);
              $moneyMoney[] = [$key => $i];
            }
          }
          if($cashWanted === 0 || $cashWanted < 5){
            return $moneyMoney;
          }
        }
      // }
      return $moneyMoney;
    }

/**
 * Get the value of cash
 */ 
public function getCash()
{
return $this->cash;
}

/**
 * Set the value of cash
 *
 * @return  self
 */ 
public function setCash($cash)
{
$this->cash = $cash;

return $this;
}
}
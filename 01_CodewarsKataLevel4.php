<?php
function nextBigger($givenNumber) 
{
   $lengthOfGivenNumber = strlen((string)$givenNumber);
   $numberArray = str_split($givenNumber);  
 
         $indexToBeginSwap = getIndexToBeginSwap($lengthOfGivenNumber, $numberArray);    
  
  if ($indexToBeginSwap != SWAP_NOT_REQUIRED) {
         $smallestNumberIndex = findTheSmallestDigitIndex ($indexToBeginSwap, $numberArray, $lengthOfGivenNumber);
               
  if (empty($smallestNumberIndex) == true) {
         $numberArray = swapNumbers($numberArray, $indexToBeginSwap, $indexToBeginSwap - 1);
  } else {
         $numberArray = swapNumbers($numberArray, $indexToBeginSwap - 1, $smallestNumberIndex);
         }         
    
         $numberArray = reorderPartOfArray($numberArray, $indexToBeginSwap);       
         $rearrangedNumber = (int)implode("", $numberArray);
     
      return  $rearrangedNumber;            
    }

  return -1;
}

const SWAP_NOT_REQUIRED = -1;
function getIndexToBeginSwap ($lengthOfGivenNumber, $numberArray)
{   
 for ($i = $lengthOfGivenNumber - 1; $i >= 0; $i--) {
    
    if (
       array_key_exists($i - 1, $numberArray) == true 
       && ($numberArray[$i]) > ($numberArray[$i - 1])
    ) {       
      return $i;
    }
  }
      return SWAP_NOT_REQUIRED;
}

function swapNumbers($numberArray, $numberIndex1ToSwap, $numberIndex2ToSwap)
{  
    $tempValue = $numberArray[$numberIndex1ToSwap];    
    $numberArray[$numberIndex1ToSwap] = $numberArray[$numberIndex2ToSwap];
    $numberArray[$numberIndex2ToSwap] = $tempValue; 
    return $numberArray;  
}

function findTheSmallestDigitIndex($arrayIndexPointToStartCheck, $numberArray, $lengthOfGivenNumber) {
    $baseNumber = $numberArray[$arrayIndexPointToStartCheck - 1]; 
    $smallestNumber = $numberArray[$arrayIndexPointToStartCheck];    
    
      for ($arrayIndexPointToStartCheck; $arrayIndexPointToStartCheck < $lengthOfGivenNumber; $arrayIndexPointToStartCheck++) {
      
        if (
            array_key_exists($arrayIndexPointToStartCheck, $numberArray) === true
            && $baseNumber < $numberArray[$arrayIndexPointToStartCheck] 
            && $numberArray[$arrayIndexPointToStartCheck] <= $smallestNumber
        ) {            
            $smallestNumberIndex = $arrayIndexPointToStartCheck;
        }
        
       }
            return $smallestNumberIndex;
    }

function reorderPartOfArray($numberArray, $indexToBeginSwap)
  {
  $reorderedPartOfNumber = array_splice($numberArray, $indexToBeginSwap);    
  sort($reorderedPartOfNumber, SORT_NUMERIC);
  
  return $numberArray = array_merge($numberArray, $reorderedPartOfNumber);
  }
?>

// Link to Kata: https://www.codewars.com/kata/55983863da40caa2c900004e
// Link to answer : https://www.codewars.com/kata/reviews/5eb073560af08a000188bd80/groups/614d7044230b900001a03a9e

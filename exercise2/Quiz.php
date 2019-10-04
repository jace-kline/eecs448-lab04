<?php

$numQs = 5;

function scrapeInputAnswers() {
  $answers = array(
    $_POST["q1"],
    $_POST["q2"],
    $_POST["q3"],
    $_POST["q4"],
    $_POST["q5"],
  );
  return $answers;
}


function correctAnswersCount($correctAnswers, $answers) {
  $cnt = 0;
  foreach(range(0,4) as $i) {
    if(strcmp($correctAnswers[$i], $answers[$i]) == 0) {
      $cnt++;
    }
  }
  return $cnt;
}

function percentage($correctNum, $totalNum) {
  return ($correctNum / $totalNum) * 100;
}

function displayQuestionFeedback($qs, $inputAnswers, $correctAnswers) {
  foreach(range(0, 4) as $i) {
    echo $qs[$i] . "<br>" . "You Answered: " . $inputAnswers[$i] . "<br>" . "Correct Answer: " . $correctAnswers[$i] . "<br><br>";
  }
}

function displayTotal($numCorrect) {
  echo "You answered " . $numCorrect . " of the questions correctly." . "<br>";
}

function displayPercentage($percentCorrect) {
  echo "You answered " . $percentCorrect . "% of the questions correctly." . "<br>";
}

$qs = array("Q1: What is Donald Trump's middle name?",
            "Q2: What is the name of the head coach of the KU Men's Basketball Team?",
            "Q3: What is the name of Kansas City's Major League Baseball (MLB) team?",
            "Q4: What is the name of the current quarterback for the Kansas City Chiefs?",
            "Q5: How many distinct 5-permutations can be formed from the set {1, 2, 3, 4, 5}?");

$correctAnswers = array("John", "Bill Self", "Royals", "Patrick Mahomes", "120");
$inputAnswers = scrapeInputAnswers();

$correctCount = correctAnswersCount($correctAnswers, $inputAnswers);

displayQuestionFeedback($qs, $inputAnswers, $correctAnswers);
echo "<br><br>";
displayTotal($correctCount);
echo "<br><br>";
displayPercentage(percentage($correctCount, $numQs));

 ?>

<?php
$questions = [
    "q1"=>[
        "correct"=>"option1"
    ],
    "q2"=>[
        "correct"=>"option2"
    ],
    "q3"=>[
        "correct"=>"option3"
    ],
    "q4"=>[
        "correct"=>"option4"
    ]
];

$score = 0;
$total=count($questions);
foreach ($questions as $key => $q) {
    if (isset($_POST[$key]) && $_POST[$key] == $q["correct"]) {
        $score++;
    }
}
echo "<h1>Result</h1>";
echo "<p>Your score is $score out of $total</p>";
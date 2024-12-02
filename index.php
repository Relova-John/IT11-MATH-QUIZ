<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['level'] = $_POST['level'];
    $_SESSION['operator'] = $_POST['operator'];
    $_SESSION['numItems'] = $_POST['numItems'];
    $_SESSION['maxDifference'] = $_POST['maxDifference'];
    $_SESSION['rangeStart'] = isset($_POST['rangeStart']) ? $_POST['rangeStart'] : 1;
    $_SESSION['rangeEnd'] = isset($_POST['rangeEnd']) ? $_POST['rangeEnd'] : 10;
}

$level = isset($_SESSION['level']) ? $_SESSION['level'] : 'lvl1';
$operator = isset($_SESSION['operator']) ? $_SESSION['operator'] : 'add';
$numItems = isset($_SESSION['numItems']) ? $_SESSION['numItems'] : 10;
$maxDifference = isset($_SESSION['maxDifference']) ? $_SESSION['maxDifference'] : 10;
$rangeStart = isset($_SESSION['rangeStart']) ? $_SESSION['rangeStart'] : 1;
$rangeEnd = isset($_SESSION['rangeEnd']) ? $_SESSION['rangeEnd'] : 10;

if ($level == 'customlvl') {
    $rangeStart = isset($_POST['custom_min']) ? $_POST['custom_min'] : 1;
    $rangeEnd = isset($_POST['custom_max']) ? $_POST['custom_max'] : 10;
} elseif ($level == 'lvl1') {
    $rangeStart = 1;
    $rangeEnd = 10;
} elseif ($level == 'lvl2') {
    $rangeStart = 1;
    $rangeEnd = 100;
} elseif ($level == 'lvl3') {
    $rangeStart = 1;
    $rangeEnd = 1000;
}
?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #f8f9fa;
                margin: 0;
                font-family: Arial, sans-serif;
            }
            button {
                cursor: pointer;
            }
            .container {
                background-color: white;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: auto;
                max-width: 800px;
                height: auto;
                max-height: 600px;
            }
            h1, h2, h3 {
                text-align: center;
                margin-bottom: 20px;
            }
            .quiz-panel {
                display: flex;
                gap: 50px;
                justify-content: center;
                align-items: center;
            }
            .quiz-content {
                display: flex;
                gap: 20px;
                align-items:flex-start;
            }
            .button-panel {
                display: flex;
                flex-direction: column;
                gap: 20xp;
                align-items: center;
            }
            .button-panel button {
                width: 80px;
                height: 40px;
                font-size: 16px;
                background-color: #d3d3d3;
                border: none;
                border-radius: 8px;
            }
            .button-panel button:hover {
                background-color: #a3a3a3;
            }
            #scoring {
                display: flex;
                flex-direction: column;
                gap: 10px;
                width: auto;
                height: auto;
                margin-top: 20px;
            }
            .score-row {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
            }
            .score-row label {
                width: 50px;
                text-align: left;
            }
            .score-row input {
                width: 30px;
                text-align: center;
                padding: 10px;
            }
            .button-content {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
            .settings-panel {
                margin-top: 20px;
                display: block;
            }
            fieldset {
                border: 2px solid #000000;
                padding: 10px;
                border-radius: 5px;
            }
            #select-level, #select-operator {
                width: auto;
                height: auto;
            }
            legend {
                font-weight: bold;
            }
            .input-range {
                display: flex;
                gap: 10px;
                justify-content: center;
            }
            .input-box {
                width: 50px;
            }
            #inputnumber {
                padding: 20px;
                text-align: right;
            }
            #inputnumber input {
                width: 50px;
            }
            input[type="submit"] {
                display: block;
                margin: 20px auto 0;
                padding: 10px 20px;
                font-size: 16px;
                color: #fff;
                background-color: #0f0f0f;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                width: 20%;
            }
            input[type="submit"]:hover {
                background-color: #f0f0f0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div>
                <h2>Math</h2>
            </div>
            <div class="quiz-panel">
                <div>
                    <div>
                        <h3 id="question">0 * 0 = 0 </h3>
                    </div>
                    <div class="quiz-content">
                        <div class="button-panel">
                            <button type="button" id="btnA" onclick="checkAnswer('btnA')" disabled>A</button><br>
                            <button type="button" id="btnB" onclick="checkAnswer('btnB')" disabled>B</button><br>
                            <button type="button" id="btnC" onclick="checkAnswer('btnC')" disabled>C</button><br>
                            <button type="button" id="btnD" onclick="checkAnswer('btnD')" disabled>D</button><br>
                        </div>
                        <fieldset id="scoring">
                            <legend>Score</legend>
                            <div class="score-row">
                                <label for="correctitems">Correct</label>
                                <label for="wrongitems">Wrong</label>
                            </div>
                            <div class="score-row">
                                <input type="text" id="correctitems" name="correctitems" readonly>
                                <input type="text" id="wrongitems" name="wrongitems" readonly>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="button-content">
                        <button type="button" id="startQuiz" onclick="startQuiz()">Start Quiz</button>
                        <button type="button" id="endQuiz" onclick="endQuiz()" style="display:none">End Quiz</button>
                        <button type="button" onclick="toggleSettings()">Settings</button>
                </div>
            </div>
            <div id="settings-section" style="display:none;">
                <h1>Settings</h1>
                <div class="settings-panel">
                    <fieldset id="select-level">
                        <legend>Select Level</legend>
                        <div>
                            <input type="radio" id="lvl1" name="lvl" onclick="toggleCustom(false)" checked>
                            <label for="lvl1">Level 1 (1 - 10)</label>
                        </div>
                        <div>
                            <input type="radio" id="lvl2" name="lvl" onclick="toggleCustom(false)">
                            <label for="lvl2">Level 2 (1 - 100)</label>
                        </div>
                        <div>
                            <input type="radio" id="lvl3" name="lvl" onclick="toggleCustom(false)">
                            <label for="lvl3">Level 3 (1 - 1000)</label>
                        </div>
                        <div>
                            <input type="radio" id="customlvl" name="lvl" onclick="toggleCustom(true)">
                            <label for="customlvl">Custom Level:</label>
                            <div class="input-range">
                                <input type="number" class="input-box" id="rangeStart" placeholder="Min" value="1" disabled>
                                <span> - </span>
                                <input type="number" class="input-box" id="rangeEnd" placeholder="Max" value="10" disabled>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="select-operator">
                        <legend>Operator</legend>
                        <div>
                            <input type="radio" id="add" name="operator" checked>
                            <label for="add">Addition</label>
                        </div>
                        <div>
                            <input type="radio" id="sub" name="operator">
                            <label for="sub">Subtraction</label>
                        </div>
                        <div>
                            <input type="radio" id="mul" name="operator">
                            <label for="mul">Multiplication</label>
                        </div>
                        <div>
                            <input type="radio" id="comb" name="operator">
                            <label for="comb">Combination</label>
                        </div>
                    </fieldset>
                </div>
                <div id="inputnumber">
                    <label for="numItems">Number of Items: </label>
                    <input type="text" id="numItems" name="numItems" value="10"></br>
                    <label for="diffans">Maximum difference from the correct answer: </label>
                    <input type="text" id="diffans" name="diffans" value="10">
                </div>
                <div>
                <input type="submit" value="Save" onclick="updateQuizSettings()">
                </div>
            </div>
        </div>
        <script>
            let score = 0;
            let currentQuestionIndex = 0;
            let questions = [];
            let currentLevel = { min: <?php echo $rangeStart; ?>, max: <?php echo $rangeEnd; ?> };
            let operator = '<?php echo $operator; ?>';
            let numItems = <?php echo $numItems; ?>;
            let maxDifference = <?php echo $maxDifference; ?>;
            
            function startQuiz() {
                document.getElementById('startQuiz').style.display = 'none';
                document.getElementById('endQuiz').style.display = 'block';
                document.querySelectorAll('.button-panel button').forEach(btn => btn.disabled = false);
                generateQuestions();
                showQuestion();
            }
            function endQuiz() {
                alert(`Quiz ended! You scored ${score} out of ${numItems}`);
                score = 0;
                currentQuestionIndex = 0;
                document.querySelectorAll('.button-panel button').forEach(btn => btn.disabled = true);
                document.getElementById('startQuiz').style.display = 'block';
                document.getElementById('endQuiz').style.display = 'none';
                document.getElementById('correctitems').value = score;
                document.getElementById('wrongitems').value = 0;
                document.getElementById('question').textContent = "0 * 0 = 0";
            }
            function generateQuestions() {
                questions = [];
                for (let i = 0; i < numItems; i++) {
                    let a = Math.floor(Math.random() * (currentLevel.max - currentLevel.min + 1)) + currentLevel.min;
                    let b = Math.floor(Math.random() * (currentLevel.max - currentLevel.min + 1)) + currentLevel.min;
                    let correctAnswer = 0;
                    let operatorSymbol = '';
                    
                    if (operator === 'add') {
                        correctAnswer = a + b;
                        operatorSymbol = '+';
                    } else if (operator === 'sub') {
                        correctAnswer = a - b;
                        operatorSymbol = '-';
                    } else if (operator === 'mul') {
                        correctAnswer = a * b;
                        operatorSymbol = '*';
                    } else if (operator === 'comb') {
                        operator = Math.random() < 0.5 ? 'add' : 'mul';
                        if (operator === 'add') {
                            correctAnswer = a + b;
                            operatorSymbol = '+';
                        } else {
                            correctAnswer = a * b;
                            operatorSymbol = '*';
                        }
                    }
                    let answers = [correctAnswer];
                    while (answers.length < 4) {
                        let randomAnswer = correctAnswer + Math.floor(Math.random() * (maxDifference * 2 + 1)) - maxDifference;
                        
                        if (!answers.includes(randomAnswer)) {
                            answers.push(randomAnswer);
                        }
                    }                    
                    answers.sort(() => Math.random() - 0.5);
                    questions.push({
                        question: `${a} ${operatorSymbol} ${b}`,
                        answers: answers,
                        correctAnswer: correctAnswer
                    });
                }
            }
            function showQuestion() {
                if (currentQuestionIndex >= questions.length) {
                    endQuiz();
                    return;
                }
                const question = questions[currentQuestionIndex];
                document.getElementById('question').textContent = question.question;
                document.querySelectorAll('.button-panel button').forEach((button, index) => {
                    button.textContent = question.answers[index];
                    button.disabled = false;
                });
            }
            function checkAnswer(buttonId) {
                const question = questions[currentQuestionIndex];
                const selectedAnswer = document.getElementById(buttonId).textContent.trim();
                
                if (selectedAnswer == question.correctAnswer) {
                    score++;
                }
                document.getElementById('correctitems').value = score;
                document.getElementById('wrongitems').value = currentQuestionIndex + 1 - score;
                currentQuestionIndex++;
                showQuestion();
            }
            function updateQuizSettings() {
                const customLevel = document.getElementById('customlvl').checked;
                currentLevel.min = customLevel ? parseInt(document.getElementById('rangeStart').value) : 1;
                currentLevel.max = customLevel ? parseInt(document.getElementById('rangeEnd').value) : 10;
                operator = document.querySelector('input[name="operator"]:checked').id;
                numItems = parseInt(document.getElementById('numItems').value);
                maxDifference = parseInt(document.getElementById('diffans').value);
                toggleSettings();
            }
            function toggleCustom(enable) {
                document.getElementById('rangeStart').disabled = !enable;
                document.getElementById('rangeEnd').disabled = !enable;
            }
            function toggleSettings() {
                const settingsSection = document.getElementById('settings-section');
                if (settingsSection.style.display === "none") {
                    settingsSection.style.display = "block";
                } else {
                    settingsSection.style.display = "none";
                }
            }
            
        </script>
    </body>
</html>

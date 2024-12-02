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
                            <button type="button" id="btnA" onclick="checkAnswer('A')" disabled>A</button><br>
                            <button type="button" id="btnB" onclick="checkAnswer('B')" disabled>B</button><br>
                            <button type="button" id="btnC" onclick="checkAnswer('C')" disabled>C</button><br>
                            <button type="button" id="btnD" onclick="checkAnswer('D')" disabled>D</button><br>
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
                        <button>Close</button>
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
                    <label for="numItems">Maximum difference from the correct answer: </label>
                    <input type="text" id="numItems" name="numItems" value="10">
                </div>
                <div>
                    <input type="submit" value="Submit">
                </div>
            </div>
        </div>
        <script>
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

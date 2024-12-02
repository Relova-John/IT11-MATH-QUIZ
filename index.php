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
                        <h3>0 * 0 = 0 </h3>
                    </div>
                    <div class="quiz-content">
                        <div>
                            <button disabled>A</button><br>
                            <button disabled>B</button><br>
                            <button disabled>C</button><br>
                            <button disabled>D</button><br>
                        </div>
                        <fieldset id="scoring">
                            <legend>Score</legend>
                            <label>Correct</label>
                            <label>Wrong</label>
                        </fieldset>
                    </div>
                </div>
                <div class="button-content">
                        <button>Start Quiz</button>
                        <button>Close</button>
                        <button>Settings</button>
                </div>
            </div>
            <div>
                <h1>Settings</h1>
                <div class="settings-panel">
                    <fieldset id="select-level">
                        <legend>Select Level</legend>
                        <div>
                            <input type="radio" id="lvl1" name="lvl" onclick="toggleCustom(false)">
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
                                <input type="number" class="input-box" id="rangeStart" placeholder="Min" disabled>
                                <span> - </span>
                                <input type="number" class="input-box" id="rangeEnd" placeholder="Max" disabled>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="select-operator">
                        <legend>Operator</legend>
                        <div>
                            <input type="radio" id="add" name="operator">
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
                            <input type="radio" id="div" name="operator">
                            <label for="div">Division</label>
                        </div>
                    </fieldset>
                </div>
                <div id="inputnumber">
                    <label for="numItems">Number of Items: </label>
                    <input type="text" id="numItems" name="numItems"></br>
                    <label for="numItems">Maximum difference from the correct answer: </label>
                    <input type="text" id="numItems" name="numItems">
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
        </script>
    </body>
</html>

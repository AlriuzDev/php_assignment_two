<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    <header>
        <?php
        include('./includes/global-nav.php');
        ?>
    </header>
    <main class="index">
        <section class="section-form">
            <form method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="description">
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="income">
                    <label class="form-check-label" for="inlineRadio1">Income</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="expense">
                    <label class="form-check-label" for="inlineRadio2">Expense</label>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01"><i class='bx bx-receipt'></i></label>
                    <select name="option" class="form-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">$</span>
                    <input type="text" name="amount" class="form-control" placeholder="amount">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
            </form>
        </section>

        <section class="submit-message" id="submit-message">
            <?php
            include_once('database.php');
            include_once('validate.php');
            $valid = new validate();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                unset($desc, $type, $option, $amount, $comment);
                $desc = $_POST['description'];
                $type = isset($_POST['inlineRadioOptions']) ? $_POST['inlineRadioOptions'] : "";
                $option = $_POST['option'];
                $amount = $_POST['amount'];
                $comment = $_POST['comment'];

                //validations
                $checkDesc = $valid->isEmpty($desc);
                $checkType = $valid->isEmpty($type);
                $checkOption = $valid->isOptionValid($option);
                $checkAmount = $valid->isAmountValid($amount);
                //validation msgs
                $checkDescMsg = $checkDesc ? 'Description is empty' : Null;
                $checkTypeMsg = $checkType ? 'Type value is empty' : Null;
                $checkOptionMsg = $checkOption ? Null : 'Option value is invalid';
                $checkAmountMsg = $checkAmount  ? Null : 'Invalid amount MUST be a Number greater than 0';

                $TotalCheck = !$checkDesc && !$checkType && $checkOption && $checkAmount;

                $msg = null;
                $res = null;
                if ($TotalCheck) {
                    $res = $database->create($desc, $type, $option, $amount, $comment);
                }

                $msg = $res ? 'Successfully inserted data' : 'Failed to insert data';

                echo "<p>{$msg}</p>";
                echo "<p>{$checkDescMsg}</p>";
                echo "<p>{$checkTypeMsg}</p>";
                echo "<p>{$checkOptionMsg}</p>";
                echo "<p>{$checkAmountMsg}</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        <?php
        include('./includes/footer-nav.php');
        ?>
    </footer>

    <script>
        // JavaScript code to handle radio button change event
        const radioOption1 = document.getElementById('inlineRadio1');
        const radioOption2 = document.getElementById('inlineRadio2');
        const selectOptions = document.getElementById('inputGroupSelect01');
        const buttonSub = document.getElementById('btnSubmit');
        const sectionMsg = document.querySelector('main section.submit-message');

        radioOption1.addEventListener('change', function() {
            if (radioOption1.checked) {
                // Clear existing options
                selectOptions.innerHTML = '';

                // Add new options based on radio selection
                const option1 = document.createElement('option');
                option1.value = '';
                option1.text = 'Choose...';
                selectOptions.appendChild(option1);
                const option2 = document.createElement('option');
                option2.value = 'salary';
                option2.text = 'Salary';
                selectOptions.appendChild(option2);

                const option3 = document.createElement('option');
                option3.value = 'investment';
                option3.text = 'Investment';
                selectOptions.appendChild(option3);
            }
        });

        radioOption2.addEventListener('change', function() {
            if (radioOption2.checked) {
                // Clear existing options
                selectOptions.innerHTML = '';

                // Add new options based on radio selection
                const option1 = document.createElement('option');
                option1.value = '';
                option1.text = 'Choose...';
                selectOptions.appendChild(option1);
                const option2 = document.createElement('option');
                option2.value = 'rent';
                option2.text = 'Rent';
                selectOptions.appendChild(option2);

                const option3 = document.createElement('option');
                option3.value = 'grocery';
                option3.text = 'Grocery';
                selectOptions.appendChild(option3);
            }
        });

        const clearSection = () => {
            while (sectionMsg.firstChild) {
                sectionMsg.removeChild(sectionMsg.firstChild);
            }
        }
        setTimeout(clearSection, 5000);
    </script>

</body>

</html>